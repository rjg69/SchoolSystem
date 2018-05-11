<?php
    require_once('HeaderLayout.php');
?>
<body>
<br />
        <p>From the list above, select the data type with which you plan to work and follow the instructions on the subsequent page. A full table containing student, book, and class data can be found below. Reduced views of the data and table manipulation functions can be accessed using the tabs above.</p>

        <br/>
        <h2><center><u>Home Page</u></center></h2>
        <br/>
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
                            <input class = 'pull-right' type = "submit" value = "Submit" name = "submite" onclick = "exportExcel();">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>



    <?php

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

    ?>

</body>

</html>