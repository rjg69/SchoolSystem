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
                ClassesTable.ClassID,
                ClassesTable.ClassName,
                ClassroomTable.ClassroomNumber,
                BookTable.BookName
            FROM
                StudentTable
            LEFT JOIN
                StudClass
            ON
                StudentTable.StudentID=StudClass.StudentID
            LEFT JOIN
                ClassesTable
            ON
                ClassesTable.ClassID=StudClass.ClassID
            LEFT JOIN
                ClassroomTable
            ON
                ClassroomTable.ClassroomID=ClassesTable.ClassroomID
            LEFT JOIN
                BookTable
            ON
                BookTable.BookID=ClassesTable.BookID
            WHERE
                ClassesTable.ClassroomID IS NOT NULL
            AND
                ClassesTable.ClassID IS NOT NULL
            AND 
                ClassesTable.BookID IS NOT NULL
            AND
                BookTable.BookName IS NOT NULL
            ORDER BY
                StudentTable.StudentID;
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