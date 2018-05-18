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

    //connect to database
    $username = "sa";
    $password = "capcom5^";

    $q = "
            SELECT
                StudentTable.StudentID,
                StudentTable.StudentName,
                StudentTable.StudentImage,
                ClassesTable.BookID,
                ClassesTable.ClassID,
                ClassesTable.ClassName,
                ClassesTable.ClassroomID,
                BookTable.BookName,
                BookTable.BookImage,
                ClassroomTable.ClassroomNumber
            FROM
                StudentTable
            LEFT JOIN
                StudClass
            ON
                StudentTable.StudentID=StudClass.StudentID
            LEFT JOIN
                ClassesTable
            ON
                StudClass.ClassID=ClassesTable.ClassID
            LEFT JOIN
                BookTable
            ON
                ClassesTable.BookID=BookTable.BookID
            LEFT JOIN
                ClassroomTable
            ON
                ClassesTable.ClassroomID=ClassroomTable.ClassroomID
            ORDER BY
                ClassesTable.ClassID;
            ";

    //pull all necessary data
    $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
    $returnData = $dbh->query($q, PDO::FETCH_ASSOC);

    //retrieve filename
    $filename = $_POST['filenameText'];

    //input data to csv file
    $fp = fopen($filename.'.csv', 'w');

    foreach ($returnData as $entry) {
        fputcsv($fp, $entry);
    }

    fclose($fp);

    //return csv file as attachment
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename= " . $filename . ".csv");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo file_get_contents($filename . ".csv");
    unlink($filename . ".csv");

}

if(isset($_POST['home'])){
    header('Location: http://testproject.test/ManagementSystem.php');
}


?>