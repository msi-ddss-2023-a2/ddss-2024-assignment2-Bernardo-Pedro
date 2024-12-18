<?php
session_start();

// Gera um token CSRF para a sessão, se ainda não tiver um
if (empty($_SESSION['csrf_token'])) {
	$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$conn = pg_connect("host=db dbname=ddss-database-assignment-2 user=ddss-database-assignment-2 password=ddss-database-assignment-2");

if (!$conn) {
	die("Error connecting to database: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
		die("CSRF token inválido.");
	}

	$username = htmlspecialchars($_POST['c_username'], ENT_QUOTES, 'UTF-8');
	$password = htmlspecialchars($_POST['c_password'], ENT_QUOTES, 'UTF-8');
} else {
	$username = htmlspecialchars($_GET['c_username'], ENT_QUOTES, 'UTF-8');
	$password = htmlspecialchars($_GET['c_password'], ENT_QUOTES, 'UTF-8');
}

// Consulta segura usando pg_prepare e pg_execute
$sql = "SELECT username, password, salt FROM users WHERE username = $1";
$stmt = pg_prepare($conn, "fetch_user", $sql);
$result = pg_execute($conn, "fetch_user", array($username));

if ($result && pg_num_rows($result) > 0) {
	$user_data = pg_fetch_assoc($result);
	$hashed_password = $user_data['password'];
	$salt = $user_data['salt'];

	// Verificação da senha
	if (password_verify($password . $salt, $hashed_password)) {
		session_regenerate_id(true);
		$_SESSION['username'] = $username;

		// Após regenerar a sessão, exibir mensagens
		print ("Login bem-sucedido! Bem-vindo, " . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . ".<br/>");
	} else {
		print ("Senha incorreta!<br/>");
	}
} else {
	print ("Usuário não encontrado.<br/>");
}

pg_close($conn);
?>