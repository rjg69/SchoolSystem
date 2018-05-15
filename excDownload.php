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

}


?>