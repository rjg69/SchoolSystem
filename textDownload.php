<?php
/**
 * Created by PhpStorm.
 * User: savvior-intern2
 * Date: 5/15/2018
 * Time: 9:57 AM
 */


require ('vendor/autoload.php');


/*******************************************
 * Export to text file
 *******************************************/

if (isset($_POST['submitt'])) {

    //works if ran on load, not when called by the button
    $username = "sa";
    $password = "capcom5^";

    $q = "
                    SELECT
                        s.ID,
                        s.StudentName,
                        s.StudentImage,
                        s.ClassTitle,
                        s.BookTitle,
                        s.BookImage
                    FROM
                        SavviorSchool s
                    ";

    $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
    $returnData = $dbh->query($q, PDO::FETCH_ASSOC);

    $filename = $_POST['filenameText'];

    $fp = fopen($filename. '.csv', "w");

    foreach ($returnData as $entry) {
        fputcsv($fp, $entry);
    }

    fclose($fp);

    header("Content-type: text/csv; name='text'");
    header("Content-Disposition: attachment; filename= " . $filename . ".csv");
    header("Pragma: no-cache");
    header("Expires: 0");

}

?>