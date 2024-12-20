<?php session_start(); // Verificar se o usuário está logado 
if (!isset($_SESSION['username'])) {
    printf("Error: User not logged in. Please log in first!<br/>");
    exit();
} ?>

<!DOCTYPE html>
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
    <title>DDSS PA2 - Part 1.3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h2>Practical Assignment #2 - Part 1.3</h2>
        <div align="center">
            DISCLAIMER: This code is to be used in the scope of the <em>DDSS</em> course.
            <b>Important:</b> these sources are merely suggestions of implementations.
            You should modify everything you deem as necessary and be responsible for all the content that is delivered.
            <em>The contents of this repository do not replace the proper reading of the assignment description.</em>
            <a href="part3_postbook.php"> Inserir Livro</a>
        </div>
        <br>
        <br>


        <table>

            <tr>
                <td>

                    <form action="/part3_vulnerable.php">


                        <table border="1" cellpadding="1"
                            style="font-size: 10pt; width: 400px; background-color:#f1f1f1">
                            <thead>
                                <tr>
                                    <th colspan="2" style="font-size: 12pt;"><b>Part 3.0 - Vulnerable Form</b></th>
                                </tr>
                            </thead>


                            <tbody>

                                <tr>
                                    <td valign="middle">Title</td>
                                    <td style="border-width: 1pt"><input type="text" name="v_name" maxlength="200"
                                            value="" size="20"></td>
                                </tr>
                                <tr>
                                    <td valign="middle">Author</td>
                                    <td style="border-width: 1pt"><input type="text" name="v_author" maxlength="100"
                                            value="" size="20"></td>
                                </tr>

                                <tr>
                                    <td valign="middle">Category</td>
                                    <td style="border-width: 1pt"><select name="v_category_id">
                                            <option value="">All</option>
                                            <option value="2">Databases</option>
                                            <option value="3">HTML &amp; Web design</option>
                                            <option value="1">Programming</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td valign="middle">Price more then</td>
                                    <td style="border-width: 1pt"><input type="text" name="v_pricemin" maxlength="100"
                                            value="" size="10"></td>
                                </tr>
                                <tr>
                                    <td valign="middle">Price less then</td>
                                    <td style="border-width: 1pt"><input type="text" name="v_pricemax" maxlength="100"
                                            value="" size="10"></td>
                                </tr>


                                <tr>
                                    <td colspan="2" align="center" valign="middle">Advanced</td>
                                </tr>
                                <tr>
                                    <td valign="middle">
                                        Search For:<br>
                                    </td>
                                    <td>
                                        <input size=35 name="v_search_input">
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle">
                                        Within:
                                    </td>
                                    <td><select name="v_search_field" size=1>
                                            <option value="any" selected>Anywhere</option>
                                            <option value="title">Title</option>
                                            <option value="authors">Authors</option>
                                            <option value="desc">Description</option>
                                            <option value="keys">Keywords</option>
                                            <option value="notes">Notes</option>
                                        </select>
                                    </td>
                                </tr>
                                <!-- Allow "any," "all," or "phrase" -->
                                <tr>
                                    <td valign="middle">
                                        Match:
                                    </td>
                                    <td>
                                        <input type=radio name="v_radio_match" value="any" checked="checked">Any word
                                        <br>
                                        <input type=radio name="v_radio_match" value="all">All words <br>
                                        <input type=radio name="v_radio_match" value="phrase">Exact phrase<br>
                                    </td>
                                </tr>
                                <!-- Date range criteria -->
                                <tr>
                                    <td colspan="2" align="center">Date</td>
                                </tr>
                                <tr>
                                    <td align=right>
                                        <input type=radio name="v_sp_d" value="custom" checked>
                                    </td>
                                    <td>
                                        <select name="v_sp_date_range" size=1>
                                            <option value=-1 selected>Anytime</option>
                                            <option value=7>Within the last week</option>
                                            <option value=14>Within the last 2 weeks</option>
                                            <option value=30>Within the last 30 days</option>
                                            <option value=60>Within the last 60 days</option>
                                            <option value=90>Within the last 90 days</option>
                                            <option value=180>Within the last 180 days</option>
                                            <option value=365>Within the last year</option>
                                            <option value=730>Within the last two years</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan=2 align=right>
                                        <input type=radio name="v_sp_d" value=specific>
                                    </td>
                                    <td>From:
                                        <select name="v_sp_start_month" size=1>
                                            <option value=0 selected></option>
                                            <option value=1>January</option>
                                            <option value=2>February</option>
                                            <option value=3>March</option>
                                            <option value=4>April</option>
                                            <option value=5>May</option>
                                            <option value=6>June</option>
                                            <option value=7>July</option>
                                            <option value=8>August</option>
                                            <option value=9>September</option>
                                            <option value=10>October</option>
                                            <option value=11>November</option>
                                            <option value=12>December</option>
                                        </select>
                                        <select name="v_sp_start_day" size=1>
                                            <option value=0 selected></option>
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                            <option value=6>6</option>
                                            <option value=7>7</option>
                                            <option value=8>8</option>
                                            <option value=9>9</option>
                                            <option value=10>10</option>
                                            <option value=11>11</option>
                                            <option value=12>12</option>
                                            <option value=13>13</option>
                                            <option value=14>14</option>
                                            <option value=15>15</option>
                                            <option value=16>16</option>
                                            <option value=17>17</option>
                                            <option value=18>18</option>
                                            <option value=19>19</option>
                                            <option value=20>20</option>
                                            <option value=21>21</option>
                                            <option value=22>22</option>
                                            <option value=23>23</option>
                                            <option value=24>24</option>
                                            <option value=25>25</option>
                                            <option value=26>26</option>
                                            <option value=27>27</option>
                                            <option value=28>28</option>
                                            <option value=29>29</option>
                                            <option value=30>30</option>
                                            <option value=31>31</option>
                                        </select>
                                        <!--comma-->,
                                        <input size=4 name="v_sp_start_year">
                                    </td>
                                </tr>
                                <tr>
                                    <td>To:

                                        <select name="v_sp_end_month" size=1>
                                            <option value=0 selected></option>
                                            <option value=1>January</option>
                                            <option value=2>February</option>
                                            <option value=3>March</option>
                                            <option value=4>April</option>
                                            <option value=5>May</option>
                                            <option value=6>June</option>
                                            <option value=7>July</option>
                                            <option value=8>August</option>
                                            <option value=9>September</option>
                                            <option value=10>October</option>
                                            <option value=11>November</option>
                                            <option value=12>December</option>
                                        </select>
                                        <select name="v_sp_end_day" size=1>
                                            <option value=0 selected></option>
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                            <option value=6>6</option>
                                            <option value=7>7</option>
                                            <option value=8>8</option>
                                            <option value=9>9</option>
                                            <option value=10>10</option>
                                            <option value=11>11</option>
                                            <option value=12>12</option>
                                            <option value=13>13</option>
                                            <option value=14>14</option>
                                            <option value=15>15</option>
                                            <option value=16>16</option>
                                            <option value=17>17</option>
                                            <option value=18>18</option>
                                            <option value=19>19</option>
                                            <option value=20>20</option>
                                            <option value=21>21</option>
                                            <option value=22>22</option>
                                            <option value=23>23</option>
                                            <option value=24>24</option>
                                            <option value=25>25</option>
                                            <option value=26>26</option>
                                            <option value=27>27</option>
                                            <option value=28>28</option>
                                            <option value=29>29</option>
                                            <option value=30>30</option>
                                            <option value=31>31</option>
                                        </select>
                                        <!--comma-->,
                                        <input size=4 name="v_sp_end_year">
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="2" align="center"> </td>
                                </tr>

                                <!-- List box selects number of results to show per page -->
                                <tr>
                                    <td valign="middle">
                                        Show:
                                    </td>
                                    <td>
                                        <select name="v_sp_c" size=1>
                                            <option value=5>5</option>
                                            <option value=10 selected>10</option>
                                            <option value=25>25</option>
                                            <option value=50>50</option>
                                            <option value=100>100</option>
                                        </select> results
                                        <!-- Show or hide summaries in search results -->
                                        <select name="v_sp_m" size=1>
                                            <option value=1 selected>with</option>
                                            <option value=0>without</option>
                                        </select> summaries<br>
                                    </td>
                                </tr>
                                <!-- Sort results by relevance or by date -->
                                <tr>
                                    <td valign="middle">
                                        Sort by:
                                    </td>
                                    <td>
                                        <select name="v_sp_s" size=1>
                                            <option value=0 selected>relevance</option>
                                            <option value=1>date</option>
                                        </select>
                                    </td>
                                </tr>









                                <tr>
                                    <td align="right" colspan="2"><button type="submit">Search</button></td>
                                </tr>
                            </tbody>
                        </table>


                    </form>
                </td>
                <td>
                </td>
                <td>
                    <form action="/part3_correct.php">
                        <table border="1" cellpadding="1"
                            style="font-size: 10pt; width: 400px; background-color:   #f19191">
                            <thead>
                                <tr>
                                    <th colspan="2" style="font-size: 12pt;"><b>Part 3.1 - Correct Form</b></th>
                                </tr>
                            </thead>


                            <tbody>

                                <tr>
                                    <td valign="middle">Title</td>
                                    <td style="border-width: 1pt"><input type="text" name="c_name" maxlength="200"
                                            value="" size="20"></td>
                                </tr>
                                <tr>
                                    <td valign="middle">Author</td>
                                    <td style="border-width: 1pt"><input type="text" name="c_author" maxlength="100"
                                            value="" size="20"></td>
                                </tr>

                                <tr>
                                    <td valign="middle">Category</td>
                                    <td style="border-width: 1pt"><select name="c_category_id">
                                            <option value="">All</option>
                                            <option value="2">Databases</option>
                                            <option value="3">HTML &amp; Web design</option>
                                            <option value="1">Programming</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td valign="middle">Price more then</td>
                                    <td style="border-width: 1pt"><input type="text" name="c_pricemin" maxlength="100"
                                            value="" size="10"></td>
                                </tr>
                                <tr>
                                    <td valign="middle">Price less then</td>
                                    <td style="border-width: 1pt"><input type="text" name="c_pricemax" maxlength="100"
                                            value="" size="10"></td>
                                </tr>


                                <tr>
                                    <td colspan="2" align="center" valign="middle">Advanced</td>
                                </tr>
                                <tr>
                                    <td valign="middle">
                                        Search For:<br>
                                    </td>
                                    <td>
                                        <input size=35 name="c_search_input">
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle">
                                        Within:
                                    </td>
                                    <td><select name="c_search_field" size=1>
                                            <!--                        
                                        category_id          int NOT NULL,
                                        name                 varchar(255) NOT NULL,
                                        author               varchar(100) NULL,
                                        notes                text NULL,
                                        is_recommended       tinyint NULL DEFAULT 0,
                                        rating               int default 0,
                                        rating_count         int default 0
                                                -->


                                            <option value="any" selected>Anywhere</option>
                                            <option value="title">Title</option>
                                            <option value="authors">Authors</option>
                                            <option value="desc">Description</option>
                                            <option value="keys">Keywords</option>
                                            <option value="notes">Notes</option>
                                        </select>
                                    </td>
                                </tr>
                                <!-- Allow "any," "all," or "phrase" -->
                                <tr>
                                    <td valign="middle">
                                        Match:
                                    </td>
                                    <td>
                                        <input type=radio name="c_radio_match" value="any" checked="checked">Any word
                                        <br>
                                        <input type=radio name="c_radio_match" value="all">All words <br>
                                        <input type=radio name="c_radio_match" value="phrase">Exact phrase<br>
                                    </td>
                                </tr>
                                <!-- Date range criteria -->
                                <tr>
                                    <td colspan="2" align="center">Date</td>
                                </tr>
                                <tr>
                                    <td align=right>
                                        <input type=radio name="c_sp_d" value="custom" checked>
                                    </td>
                                    <td>
                                        <select name="c_sp_date_range" size=1>
                                            <option value=-1 selected>Anytime</option>
                                            <option value=7>Within the last week</option>
                                            <option value=14>Within the last 2 weeks</option>
                                            <option value=30>Within the last 30 days</option>
                                            <option value=60>Within the last 60 days</option>
                                            <option value=90>Within the last 90 days</option>
                                            <option value=180>Within the last 180 days</option>
                                            <option value=365>Within the last year</option>
                                            <option value=730>Within the last two years</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan=2 align=right>
                                        <input type=radio name="c_sp_d" value=specific>
                                    </td>
                                    <td>From:
                                        <select name="c_sp_start_month" size=1>
                                            <option value=0 selected></option>
                                            <option value=1>January</option>
                                            <option value=2>February</option>
                                            <option value=3>March</option>
                                            <option value=4>April</option>
                                            <option value=5>May</option>
                                            <option value=6>June</option>
                                            <option value=7>July</option>
                                            <option value=8>August</option>
                                            <option value=9>September</option>
                                            <option value=10>October</option>
                                            <option value=11>November</option>
                                            <option value=12>December</option>
                                        </select>
                                        <select name="c_sp_start_day" size=1>
                                            <option value=0 selected></option>
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                            <option value=6>6</option>
                                            <option value=7>7</option>
                                            <option value=8>8</option>
                                            <option value=9>9</option>
                                            <option value=10>10</option>
                                            <option value=11>11</option>
                                            <option value=12>12</option>
                                            <option value=13>13</option>
                                            <option value=14>14</option>
                                            <option value=15>15</option>
                                            <option value=16>16</option>
                                            <option value=17>17</option>
                                            <option value=18>18</option>
                                            <option value=19>19</option>
                                            <option value=20>20</option>
                                            <option value=21>21</option>
                                            <option value=22>22</option>
                                            <option value=23>23</option>
                                            <option value=24>24</option>
                                            <option value=25>25</option>
                                            <option value=26>26</option>
                                            <option value=27>27</option>
                                            <option value=28>28</option>
                                            <option value=29>29</option>
                                            <option value=30>30</option>
                                            <option value=31>31</option>
                                        </select>
                                        <!--comma-->,
                                        <input size=4 name="c_sp_start_year">
                                    </td>
                                </tr>
                                <tr>
                                    <td>To:

                                        <select name="c_sp_end_month" size=1>
                                            <option value=0 selected> </option>
                                            <option value=1>January</option>
                                            <option value=2>February</option>
                                            <option value=3>March</option>
                                            <option value=4>April</option>
                                            <option value=5>May</option>
                                            <option value=6>June</option>
                                            <option value=7>July</option>
                                            <option value=8>August</option>
                                            <option value=9>September</option>
                                            <option value=10>October</option>
                                            <option value=11>November</option>
                                            <option value=12>December</option>
                                        </select>
                                        <select name="c_sp_end_day" size=1>
                                            <option value=0 selected></option>
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                            <option value=6>6</option>
                                            <option value=7>7</option>
                                            <option value=8>8</option>
                                            <option value=9>9</option>
                                            <option value=10>10</option>
                                            <option value=11>11</option>
                                            <option value=12>12</option>
                                            <option value=13>13</option>
                                            <option value=14>14</option>
                                            <option value=15>15</option>
                                            <option value=16>16</option>
                                            <option value=17>17</option>
                                            <option value=18>18</option>
                                            <option value=19>19</option>
                                            <option value=20>20</option>
                                            <option value=21>21</option>
                                            <option value=22>22</option>
                                            <option value=23>23</option>
                                            <option value=24>24</option>
                                            <option value=25>25</option>
                                            <option value=26>26</option>
                                            <option value=27>27</option>
                                            <option value=28>28</option>
                                            <option value=29>29</option>
                                            <option value=30>30</option>
                                            <option value=31>31</option>
                                        </select>
                                        <!--comma-->,
                                        <input size=4 name="c_sp_end_year">
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="2" align="center"> </td>
                                </tr>

                                <!-- List box selects number of results to show per page -->
                                <tr>
                                    <td valign="middle">
                                        Show:
                                    </td>
                                    <td>
                                        <select name="c_sp_c" size=1>
                                            <option value=5>5</option>
                                            <option value=10 selected>10</option>
                                            <option value=25>25</option>
                                            <option value=50>50</option>
                                            <option value=100>100</option>
                                        </select> results
                                        <!-- Show or hide summaries in search results -->
                                        <select name="c_sp_m" size=1>
                                            <option value=1 selected>with</option>
                                            <option value=0>without</option>
                                        </select> summaries<br>
                                    </td>
                                </tr>
                                <!-- Sort results by relevance or by date -->
                                <tr>
                                    <td valign="middle">
                                        Sort by:
                                    </td>
                                    <td>
                                        <select name="c_sp_s" size=1>
                                            <option value=0 selected>relevance</option>
                                            <option value=1>date</option>
                                        </select>
                                    </td>
                                </tr>









                                <tr>
                                    <td align="right" colspan="2"><button type="submit">Search</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>