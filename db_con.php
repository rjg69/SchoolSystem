<?php
/**
 * Created by PhpStorm.
 * User: savvior-intern2
 * Date: 5/14/2018
 * Time: 9:43 AM
 */

$DB_host = "10.99.100.54";
$DB_user = "sa";
$DB_pass = "capcom5^";
$DB_name = "ryan_intern";

try{
    $db_con = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $DB_user, $DB_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}

?>