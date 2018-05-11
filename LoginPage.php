<html lang = "en">
<?php
session_start();

    if(array_key_exists('Username', $_SESSION)){
        header('Location: http://testproject.test/ManagementSystem.php');
    }

    if(array_key_exists('Username', $_POST) && array_key_exists('Password', $_POST)){

        $username = 'sa';
        $password = 'capcom5^';

        $q = "
                SELECT
                  u.Username
                FROM
                  UsersBase u
                WHERE
                  u.Username = :username
                AND
                  u.Password = :password
                  limit 1
                ";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $statement = $dbh->prepare($q);
        $statement->bindParam('username', $_POST['Username']);
        $statement->bindParam('password', $_POST['Password']);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            unset($_SESSION['Username']);
            unset($_SESSION['Password']);
            header('Location: http://testproject.test/LoginPage.php');
        }else{
            $_SESSION['Username'] = $_POST['Username'];
            header('Location: http://testproject.test/ManagementSystem.php');
        }
    }


?>
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
                    <input type="submit" value="Submit" name = "sendVal">
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
</body>


</html>