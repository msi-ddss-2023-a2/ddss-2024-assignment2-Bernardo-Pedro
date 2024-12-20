<?php
session_start();

// Verificar se o usuário está logado
$loggedIn = isset($_SESSION['username']);
?>

<!doctype html>
<!--

    =========================================
    Design and Development of Secure Software
    ============= MSI 2019/2020 =============
    ======== Practical Assignment #2 ========
    ================ Part #1 ================
    =========================================

      Department of Informatics Engineering
              University of Coimbra          
   
        Nuno Antunes <nmsa@dei.uc.pt>
        João Antunes <jcfa@dei.uc.pt>
        Marco Vieira <mvieira@dei.uc.pt>
   
-->
<html>

<head>
  <title>DDSS PA2 - Part 1.1</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--
            V3-php info:
            - corrected a few naming bugs in the inputs
            - fixed a few syntax issues in the HTML
            - added some explanations
            - corrected the form actions for php
        -->
</head>

<body>
  <div align="center">
    <h1>Design and Development of Secure Software</h1>
    <h2>Practical Assignment #2 - Part 1.1</h2>
    <div align="center">
      DISCLAIMER: This code is to be used in the scope of the
      <em>DDSS</em> course. <b>Important:</b> these sources are merely
      suggestions of implementations. You should modify everything you deem as
      necessary and be responsible for all the content that is delivered.
      <em>The contents of this repository do not replace the proper reading of
        the assignment description.</em>
    </div>
    <br />
    <br />

    <?php if ($loggedIn): ?>
      <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>! <a href="part1_logout.php">Logout</a></p>
    <?php endif; ?>

    <form action="/part1_register.php">
      <table border="1" cellpadding="1" style="width: 300px; background-color: #f1f1f1">
        <thead>
          <tr>
            <th colspan="2"><b>Part 1.0 - Register User</b></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><label>Username</label></td>
            <td>
              <input type="text" placeholder="Enter Username" name="r_username" required />
            </td>
          </tr>
          <tr>
            <td><label>Password</label></td>
            <td>
              <input type="password" placeholder="Enter Password" name="r_password" required />
            </td>
          </tr>
          <td align="right" colspan="2">
            <button type="submit">Register</button>
          </td>
          </tr>
        </tbody>
      </table>
    </form>

    <br />
    <br />

    <form action="/part1_vulnerable.php">
      <table border="1" cellpadding="1" style="width: 300px; background-color: #f19191">
        <thead>
          <tr>
            <th colspan="2"><b>Part 1.0 - Vulnerable Form</b></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><label>Username</label></td>
            <td>
              <input type="text" placeholder="Enter Username" name="v_username" required />
            </td>
          </tr>
          <tr>
            <td><label>Password</label></td>
            <td>
              <input type="password" placeholder="Enter Password" name="v_password" required />
            </td>
          </tr>
          <tr>
            <td><label>Remember me</label></td>
            <td>
              <input type="checkbox" checked="checked" name="v_remember" />
            </td>
          </tr>
          <tr>
            <td align="right" colspan="2">
              <button type="submit">Login</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>

    <br />
    <br />

    <form action="/part1_correct.php">
      <table style="width: 300px; background-color: #cbf4b3" border="1" cellpadding="1">
        <thead>
          <tr>
            <th colspan="2"><b>Part 1.1 - Correct Form</b></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><label>Username</label></td>
            <td>
              <input type="text" placeholder="Enter Username" name="c_username" required />
            </td>
          </tr>
          <tr>
            <td><label>Password</label></td>
            <td>
              <input type="password" placeholder="Enter Password" name="c_password" required />
            </td>
          </tr>
          <tr>
            <td><label>Remember me</label></td>
            <td>
              <input type="checkbox" checked="checked" name="c_remember" />
            </td>
          </tr>
          <tr>
            <td align="right" colspan="2">
              <button type="submit">Login</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</body>

</html>