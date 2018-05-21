<?php
    require_once('HeaderLayout.php');
?>
<body>
<br />
        <p>From the list above, select the data type with which you plan to work and follow the instructions on the subsequent page. A full table containing student, book, and class data can be found below. Reduced views of the data and table manipulation functions can be accessed using the tabs above.</p>

        <br/>
        <h2><center><u>Home Page</u></center></h2>
        <hr width = "75%">
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

<br />
<br />
<br />

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

    $sql = "
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
                StudentTable.StudentName;
            ";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $data = $dbh->query($sql, PDO::FETCH_ASSOC);

        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection ailed: " . $conn->connect_error);
        }

        foreach ($data as $entry) {
            $results [] = $entry;
        }

        $studentList = array();
        $bookList = array();

        echo "<table align = 'center' width = '70%'><tr>";

        echo "<td width = 16.67%><u>Student Name</u></td>";
        echo "<td width = 16.67%><u>Student Image</u></td>";
        echo "<td width = 16.67%><u>Class Title</u></td>";
        echo "<td width = 16.67%><u>Book Title</u></td>";
        echo "<td width = 16.67%><u>Book Image</u></td>";
        echo "<td width = 16.67%><u>ClassroomNumber</u></td>";
        echo "</tr><tr>";

        foreach ($results as $val) {
            $key = $val['StudentID'];
            if (!array_key_exists($key, $returnData) && $key != null) {
                $returnData[$key] = array(
                    'StudentName' => $val['StudentName'],
                    'StudentImage' => $val['StudentImage'],
                    'ClassTitle' => $val['ClassName'],
                    'BookTitle' => $val['BookName'],
                    'BookImage' => $val['BookImage'],
                    'ClassroomNumber' => $val['ClassroomNumber']
                );
            }
            if(!in_array($key, $studentList) && $key != null){
                echo "<td width = 16.67%>" . $returnData[$key]['StudentName'] . "</td>";
                echo "<td width = 16.67%>" . $returnData[$key]['StudentImage'] . "</td>";
                $studentList[] = $key;
            }else{
                echo "<td width = '16.67%'></td>";
                echo "<td width = '16.67%'></td>";
            }

            echo "<td width = 16.67%>" . $returnData[$key]['ClassTitle'] . "</td>";

            if(!in_array($key, $bookList) && $key != null){
                echo "<td width = 16.67%>" . $returnData[$key]['BookTitle'] . "</td>";
                echo "<td width = 16.67%>" . $returnData[$key]['BookImage'] . "</td>";
                $bookList[] = $key;
            }else{
                echo "<td width = '16.67%'></td>";
                echo "<td width = '16.67%'></td>";
            }

            echo "<td width = 16.67%>" . $returnData[$key]['ClassroomNumber'] . "</td>";
            echo "</tr><tr>";
        }
        echo "</tr></table>";

    ?>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</body>

</html>