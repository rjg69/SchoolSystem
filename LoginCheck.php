<?php
/**
 * Created by PhpStorm.
 * User: savvior-intern2
 * Date: 5/10/2018
 * Time: 9:31 AM
 */

function checkUser(){

    $repeat = true;
    $continue = false;

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

        foreach ($userData as $user) {
            if (isset($_REQUEST['Username'])) {
                if ($user['Username'] == ($_REQUEST['Username'])) {
                    if (isset($_REQUEST['Password'])) {
                        if ($user['Password'] == $_REQUEST['Password']) {
                            header("Location: http://testproject.test/ManagementSystem.php");
                            $repeat = false;
                            $continue = true;
                        }
                    }
                }
            }
        }

        if($repeat == true){
            header ("Location: http://testproject.test/LoginPage.php");
        }
    }

    return $continue;
}
?>