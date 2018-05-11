<?php
/**
 * Created by PhpStorm.
 * User: savvior-intern2
 * Date: 5/11/2018
 * Time: 10:30 AM
 */

/*******************************************
 * Export to excel file
 *******************************************/

/*

$filename = $_GET['filename'];

$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "xlsx");
$writer->setOffice2003Compatibility(true);
$writer->save($filename . ".xlsx");

*/


/*
include_once('xlsxwriter.class.php');
$filename = $_GET['filename'];
header('Content-disposition: attachment; filename"'.XLSXWriter::sanitize_filename($filename).'"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');

$header = array(
  'ID' => 'integer',
  'Subject' => 'string',
    'Content' => 'string',
);

$writer = new XLSXWriter();
$writer->writeSheetHeader('Sheet1', $header);

$array = array(
  '0' => array('1', 'Test Subject', 'Test Content'),
);

$writer->writeSheetRow('Sheet1', $array);
$writer->writeSheet($array, 'Sheet1', $header);
$writer->writeToStdOut();
exit(0);
*/

$DB_Server = "10.99.100.54";
$DB_Username = "sa";
$DB_Password = "capcom5^";
$DB_DBName = "ryan_intern";
$DB_TBLName = "UsersBase";
$filename = $_GET['filename'];

$sql = "SELECT * from $DB_TBLName";
$connect = new mysqli($DB_Server, $DB_Username, $DB_Password, $DB_DBName) or die("Failed to connect to MySQL:<br />" . mysqli_connect_error());

$Db = mysqli_connect_db($connect, $DB_DBName) or die("Failed to select database: <br />" . mysqli_connect_error() . "<br />");

$result = @mysqli_query($sql, $connect) or die ("Failed to execute query: <br />" . mysqli_error() . "<br />" . mysql_errno);

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expiers: 0");

$sep = "\t";

for($i = 0; $i < mysql_num_fields($result); $i++){
    echo mysql_field_name($result, $i) . "\t";
}
print("\n");

while($row = mysql_fetch_row($result)){
    $schema_insert = "";
    for($j=0; $j<mysql_num_fields($result); $j++){
        if(!isset($ow[$j])){
            $schema_insert .= "NULL".$sep;
        }
        elseif($row[$j] != ""){
            $schema_insert .= "$row[$j]".$sep;
        }
        else{
            $schema_insert .= "".$sep;
        }
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r|/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}

?>