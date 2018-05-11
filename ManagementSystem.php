<?php
    require_once('HeaderLayout.php');
?>
<body>
        <p>From the list above, select the data type with which you plan to work and follow the instructions on the subsequent page. A full table containing student, book, and class data can be found below. Reduced views of the data and table manipulation functions can be accessed using the tabs above.</p>

        <!--
            Carousel Code
        -->
        <div class="container" align = "center">
            <h2 align = "center">Student Highlights</h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" align = "center">
                <!-- Indicators -->
                <ol class="carousel-indicators" align = "center">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" align = "center">
                    <div class="item active">
                        <img height = '100%' src="StudentPhotos\student3.jpg">
                    </div>

                    <div class="item">
                        <img height = '100%' src="StudentPhotos\student4.jpg">
                    </div>

                    <div class="item">
                        <img height = '100%' src="StudentPhotos\student9.jpg">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


        <!--
            Export to Excel
        -->
        <div class="modal" tabindex="-1" role="dialog" id = "ExcelExport">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id = "modalLabel">Excel Export</h5>
                    </div>
                    <div class="modal-body">
                        <form method = "post" action = "DataStudent.php">
                            <h3>File Name:</h3>
                            <input type = "text" name = "filenameExcel">
                            <input class = 'pull-right' type = "submit" value = "Submit" name = "submite">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>


        <!--
            Export to Text
        -->
        <div class="modal" tabindex="-1" role="dialog" id = "TextModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id = "modalLabel">Export Text</h5>
                    </div>
                    <div class="modal-body">
                        <form method = "post" action = "DataStudent.php">
                            <h3>Please Enter the Filename:</h3>
                            <input type = "text" name = "filenameText">
                            <input class = 'pull-right' type = "submit" value = "Submit" name = "submitt">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    <?php

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    //$spreadsheet = new Spreadsheet();

    //$spreadsheet->getProperties()->setCreator('Ryan Gabrin')->setLastModifiedBy('Ryan Gabrin')->setTitle('Spreadsheet')->setSubject('PHPSpreadsheet');
    //$spreadsheet->getActiveSheet()->setTitle('Simple');

    $continue = include 'LoginCheck.php';

    if($continue == true) {

        $i = 0;
        $results = array();
        $returnData = array();

        $servername = "10.99.100.54";
        $username = "sa";
        $password = "capcom5^";
        $dbname = "ryan_intern";

        /**************************************************************
         * Dynamic Table Display
         **************************************************************/

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
        $data = $dbh->query($q, PDO::FETCH_ASSOC);

        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection ailed: " . $conn->connect_error);
        }

        foreach ($data as $entry) {
            $results [] = $entry;
        }

        echo "<table align = 'center' width = '70%'><tr>";

        echo "<td width = '25%'><u>ID</u></td>";
        echo "<td width = '25%'><u>Student Name</u></td>";
        echo "<td width = '25%'><u>Class Title</u></td>";
        echo "<td width = '25%'><u>Book Title</u></td>";
        echo "</tr><tr>";

        foreach ($results as $val) {
            $key = $val['ID'];
            echo "<td>" . $val['ID'] . "</td>";
            if (!array_key_exists($key, $returnData)) {
                $returnData[$key] = array(
                    'StudentName' => $val['StudentName'],
                    'ClassTitle' => $val['ClassTitle'],
                    'BookTitle' => $val['BookTitle']
                );
            }
            echo "<td>" . $returnData[$key]['StudentName'] . "</td>";
            echo "<td>" . $returnData[$key]['ClassTitle'] . "</td>";
            echo "<td>" . $returnData[$key]['BookTitle'] . "</td>";
            echo "</tr><tr>";
        }
        echo "</tr></table>";


        /*******************************************************
         * Create Class Lists, Ensure 1 Book Per Class
         *******************************************************/
        $classes = array();
        $books = array();

        foreach ($returnData as $entry) {
            $classes[] = $entry['ClassTitle'];
            $books[] = $entry['BookTitle'];
        }

        $classBookTie = array();
        $i = 0;
        foreach ($classes AS $class) {
            $key = $class;
            if (!array_key_exists($key, $classBookTie)) {
                $classBookTie[$key] = array(
                    'BookTitle' => $books[$i],
                );
            }
            $i = $i + 1;
        }

        foreach ($returnData as $result) {
            $key = $result['ClassTitle'];
            if (!array_key_exists($key, $classBookTie)) {
                if ($classBookTie['BookTitle'] != $result['BookTitle']) {
                    $result['BookTitle'] = $classBookTie['BookTitle'];
                }
            }
        }


        /*******************************************
         * Export to text file
         *******************************************/

        if (isset($_POST['submitt'])) {
            exportTxt();
        }

        function exportTxt()
        {
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

            $fp = fopen('FullData.csv', "w");

            foreach ($returnData as $entry) {
                fputcsv($fp, $entry);
            }

            fclose($fp);
        }




        /*******************************************
         * Export to excel file
         *******************************************/
        if (isset($_POST['submite'])) {
            exportExcel();
        }

        function exportExcel()
        {
            require_once __DIR__ . '/../../src/Bootstrap.php';
            $helper = new Sample();
            if ($helper->isCli()) {
                $helper->log('This example should only be run from a Web Browser' . PHP_EOL);
                return;
            }
            // Create new Spreadsheet object
            $spreadsheet = new Spreadsheet();
                // Set document properties
            $spreadsheet->getProperties()->setCreator('Ryan Gabrin')
                ->setLastModifiedBy('Ryan Gabrin')
                ->setTitle('Total Data')
                ->setSubject('Full School Data')
                ->setDescription('Excel Document with all school data, generated using PHP classes.')
                ->setKeywords('office 2007 openxml php')
                ->setCategory('Result file');
            // Add some data
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Hello')
                ->setCellValue('B2', 'world!')
                ->setCellValue('C1', 'Hello')
                ->setCellValue('D2', 'world!');
            // Miscellaneous glyphs, UTF-8
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A4', 'Miscellaneous glyphs')
                ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
            // Rename worksheet
            $spreadsheet->getActiveSheet()->setTitle('TotalOutput');
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);
            // Redirect output to a client’s web browser (Xlsx)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="01simple.xlsx"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');
            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        }

    }else{
        header('Location: http://testproject.test/LoginPage.php');
    }

    ?>

</body>

</html>