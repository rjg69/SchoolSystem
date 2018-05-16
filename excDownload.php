<?php
/**
 * Created by PhpStorm.
 * User: savvior-intern2
 * Date: 5/14/2018
 * Time: 12:42 PM
 */


require ('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/*******************************************
 * Export to excel file
 *******************************************/
if (isset($_POST['submite'])) {

    $i = 2;

    $filename = $_POST['filenameText'];
    $servername = "10.99.100.54";
    $username = "sa";
    $password = "capcom5^";
    $dbname = "ryan_intern";

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
    $result = $dbh->query($q, PDO::FETCH_ASSOC);

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Excel Export');

    $headerArray = ['ID', 'Student Name', 'Student Image', 'Class Title', 'Book Title', 'Book Image'];
    $spreadsheet->getActiveSheet()
        ->fromArray(
            $headerArray,   // The data to set
            NULL,        // Array values with this value will not be set
            'A1'         // Top left coordinate of the worksheet range where
        //    we want to set these values (default is A1)
        );

    foreach($result as $data){
        //generate individual array containing the data for each column in the order specified above
        $row = array(
            $data['ID'],
            $data['StudentName'],
            $data['StudentImage'],
            $data['ClassTitle'],
            $data['BookTitle'],
            $data['BookImage']
        );

        //write the individual array to the spreadsheet, increment $i to adjust row always starting in A
        //$row is the individual array
        $spreadsheet->getActiveSheet()->fromArray(
            $row,
            NULL,
            ('A' . $i)
        );

        $i++;
    }

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save($filename . '.xlsx');

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename =' . $filename . '.xlsx');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');

    echo file_get_contents($filename . ".xlsx");
    unlink($filename . ".xlsx");

    header("Location: http://testproject.test/ManagementSystem.php");
}


if(isset($_POST['home'])){
    header('Location: http://testproject.test/ManagementSystem.php');
}
?>