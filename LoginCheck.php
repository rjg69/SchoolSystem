<?php
/**
 * Created by PhpStorm.
 * User: savvior-intern2
 * Date: 5/10/2018
 * Time: 9:31 AM
 */

/*********************************************
 * https://www.formget.com/login-form-in-php/
 *********************************************/

if(isset($_SESSION['login_user'])){
    //check to make sure the username and password are right
    //if they match, move on to the page
    if (isset($_SESSION['Username'])) {
        checkUser();
    }
    /****************************************************
     * Check that username and password match properly
     ****************************************************/
    function checkUser()
    {
        //Declare connection variables
        $username = "sa";
        $password = "capcom5^";
        $userData = array();

        //Pull all data
        $una = "
            SELECT
              u.Username,
              u.Password
            FROM
              UsersBase u
            ";
        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $users = $dbh->query($una, PDO::FETCH_ASSOC);
        foreach ($users as $user) {
            $userData [] = $user;
        }
        $match = false;

        //Check username and password match what is stored in the database
        foreach ($userData as $user) {
            if (isset($_SESSION['login_user'])) {
                if ($user['Username'] == ($_SESSION['login_user'])) {
                    if (isset($_SESSION['password'])) {
                        if ($user['Password'] == $_SESSION['password']) {
                            $match = true;
                        }
                    }
                }
            }
        }
        if ($match == false) {
            header('Location: http://www.testproject.test/LoginPage');
            echo "<p>Incorrect account information provided. Please re-enter your information.</p>";
        }
    }
}else{
   header('Location: http://www.testproject.test/LoginPage');
}
