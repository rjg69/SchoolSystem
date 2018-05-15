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

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Excel Export '. date(Y-m-d));

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save($filename . '.xlsx');


    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename =' . $filename . '.xlsx');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');

}


?>