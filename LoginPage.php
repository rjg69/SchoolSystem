<html lang = "en">

<header>
    <h1 align = "center"><u><b>Savvior School District</b></u></h1>

    <title>Login</title>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">


    <link rel="stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">


    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script scr = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/vendors/jquery.min.js"></script>
    <script src="../assets/owlcarousel/owl.carousel.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#LoginModal').modal('show');
        });
    </script>

</header>


<!--
    Add style conventions using CSS
-->
<style>
    header{
        color: darkblue;
    }

    button{
        color: white;
        background-color: darkred;
        width: 100%;
    }

    .btn-toolbar{
        width: 33.59%;
    }

    .btn-group{
        color: white;
        background-color: #1775B3;
        width: 100%;
    }

    h2{
        color: navy;
    }

    table{
        position: relative;
        top: 50px;
    }

    select{
        color: white;
        background-color: #1775B3;
        position: relative;
        text-align: center;
        align-content: center;
        height: 40px;
    }

    p{
        position: relative;
        top: 20px;
    }

    submit{
        position: relative;
        left: 0%;
    }

    input{
        text-align:center;

    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

</style>



<body>
    <form action="" method="post">
        <table width = "100%">
            <tr>
                <td width = "30%">

                </td>
                <td width = "20%" align = "right">
                    <input type="text" name="Username" placeholder="Enter your username" required>
                </td>
                <td width = "20%" align = "left">
                    <input type="password" name="Password" placeholder="Enter your password" required>
                </td>
                <td width = "30%" align = "left">
                    <input type="submit" value="Submit" name = "sendVals">
                </td>
            </tr>
        </table>
    </form>

    <br />
    <br />
    <br />
    <br />

    <p><center>Please enter your username and password in the input boxes above.</center></p>

   <img class = "center" src = "SchoolPhotos\SchoolLogo.png">

    <?php
    /**
     * Created by PhpStorm.
     * User: savvior-intern2
     * Date: 5/10/2018
     * Time: 9:32 AM
     */

    session_start();

    if(isset($_REQUEST['sendVals'])){
        checkUser();
    }

    function checkUser(){

        $repeat = true;

        if(isset($_REQUEST['Username']) && isset($_REQUEST['Password'])){
            $username = 'sa';
            $password = 'capcom5^';

            $q = "
            SELECT
              u.Username,
              u.Password
            FROM
              UsersBase u
            ";

            $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
            $userData = $dbh->query($q, PDO::FETCH_ASSOC);

            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";


            $display = var_dump($userData);
            echo "<p>" . $display . "</p>";


            foreach ($userData as $user) {
                if (isset($_REQUEST['Username'])) {
                    if ($user['Username'] == ($_REQUEST['Username'])) {
                        if (isset($_REQUEST['Password'])) {
                            if ($user['Password'] == $_REQUEST['Password']) {
                                header('Location: http://www.testproject.test/ManagementSystem.php');
                                $repeat = false;
                            }
                        }
                    }
                }
            }

            if($repeat == true){
                header ('Location: http://www.testproject.test/LoginPage.php');
                echo "<p>Incorrect credentials, please try again.</p>";
            }
        }
    }
?>
</body>


</html>