<?php
/**
 * Created by PhpStorm.
 * User: savvior-intern2
 * Date: 5/11/2018
 * Time: 9:43 AM
 */

session_start();

unset($_SESSION['Username']);

header('Location: http://testproject.test/LoginPage.php');


?>