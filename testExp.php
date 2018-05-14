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

    $filename = $_POST['filenameText'];

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

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet;
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', "Hello World!");

    $writer = new Xlsx($spreadsheet);
    $writer->save('hello world');

/*
    include('db_con.php');

    $stmt = $db_con->prepare($q);
    $stmt->execute();

    $columnHeader = '';
    $columnHeader = "Student Name" . "\t" . "ID" . "\t" . "Student Image" . "\t" . "Class Title" . "\t" . "Book Title" . "\t" . "Book Image" . "\t";

    $setData = '';

    while($rec = $stmt->FETCH(PDO::FETCH_ASSOC))
    {
        $rowData = '';
        foreach($rec as $value){
            $value = '"' . $value . '"' . "\t";
            $rowData .= $value;
        }
        $setData .= trim($rowData) . "\n";
    }

    header("Content-type: application/vnd.ms-excel; name='excel'");
    header("Content-Disposition: attachment; filename= " . $filename . ".xls");
    header("Pragma: no-cache");
    header("Expires: 0");


    echo ucwords($columnHeader) . "\n" . $setData . "\n";
*/
}


?>