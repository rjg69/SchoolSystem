<html lang = "en">
<!--
Assignment #1 - Design a management system for a school, where a school administrator can schedule students, classes, and books.
        Ability to add, edit, and delete students, classes, and books.
        Ability to add and remove students from their classes.
        Ability to add and remove books from classes (one book per class)
        Ability to upload student and book photos
        Add/Edit/Delete functionality for a single table
        Add/Edit/Delete functionality for 2 tables with foreign keys in second table
        Add/Edit/Delete functionality for 3 tables, one of which will be a join table
        This should use PDO and MySQL
        Build your HTML interfaces using Bootstrap (http://getbootstrap.com)
            Implement table, button, and panel classes
            Implement Modal Windows
            Implement Tooltips
            Implement tabs

            Input using Bootstrap:
            https://www.w3schools.com/bootstrap/bootstrap_forms_inputs.asp

-->
    <!--
        Add style conventions using CSS
    -->
    <style>
        header{
            color: darkblue;
        }

        button{
            background-color: darkred;
            color: white;
            width: 100%;
        }

        .modal-footer{
            color: white;
            background-color: darkred;
        }

        .modal-header{
            color: white;
            background-color: #1775B3;
        }

        .btn-toolbar{
            width: 33.59%;
        }

        .btn-group{
            color: white;
            background-color: #1775B3;
            width: 100%;
        }

        h2{
            color: navy;
        }

        table{
            position: relative;
            top: 50px;
        }

        select{
            color: white;
            background-color: #1775B3;
            position: relative;
            text-align: center;
            align-content: center;
            height: 40px;
        }

        p{
            position: relative;
            text-align: center;
            top: 25px;
            color: navy;
            left: 0%;
        }

        .carousel-inner>.item>img{
            margin:auto;
        }

        .carousel-indicators{
            position: relative;
            top: 5%;
        }

        .carousel{
            height: 27%;
            width: 60%;
            position: relative;
            top: 25px;
            align: center;
        }

    </style>

    <header>
        <h1 align = "center"><u><b>Savvior School District</b></u></h1>

        <title>Savvior School District</title>
        <meta charset="utf-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">


        <link rel="stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">


        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script scr = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="jquery.min.js"></script>
        <script src="owlcarousel/owl.carousel.min.js"></script>
        <script src="../assets/vendors/jquery.min.js"></script>
        <script src="../assets/owlcarousel/owl.carousel.js"></script>


        <script type="text/javascript">
            $(document).ready(function(){
                $('#LoginModal').modal('show');
            });
        </script>
    </header>

    <body>

        <h2 align = "center"><u>Home Page</u></h2>

        <!--
            Tabs
        -->
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="ManagementSystem.php" data-toggle = "tooltip" data-placement = "top" title = "View All Data">Home Page</a>
            </li>
            <li>
                <a href="DataStudent.php" data-toggle = "tooltip" data-placement = "top" title = "View Student Data">Student</a>
            </li>
            <li>
                <a href="DataBook.php" data-toggle = "tooltip" data-placement = "top" title = "View Book Data">Book</a>
            </li>
            <li>
                <a href="DataClass.php" data-toggle = "tooltip" data-plaement = "top" title = "View Class Data">Class</a>
            </li>
        </ul>
            <div class='btn-toolbar pull-right'>
                <div class='btn-group'>
                    <button type='button' class='btn btn-primary' name = 'Logout' id = 'Logout' title = 'Logout'>Logout</button>
                </div>
            </div>
            <div class='btn-toolbar pull-right'>
                <div class='btn-group'>
                    <button type='button' class='btn btn-primary' name = 'ExcelExport' id = 'ExcelExport' title = 'Excel Export'>Export Excel File</button>
                </div>
            </div>
            <div class='btn-toolbar pull-right'>
                <div class='btn-group'>
                    <button type='button' class='btn btn-primary' name ='TextExport' id = 'TextExport' title = 'Text Export'>Export Text File</button>
                </div>
            </div>

        <br />
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
            Logout
        -->
        <div class="modal" tabindex="-1" role="dialog" id = "LogoutModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id = "modalLabel">Logout</h5>
                    </div>
                    <div class="modal-body">
                        <form method = "post" action = "DataStudent.php">
                            <h3>Are you sure you'd like to log off?</h3>
                            <p>Press "Log Off" to proceed or "Cancel" to continue with this session.</p>
                            <input type = "submit" value = "Log Off" name = "submitl">
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
         * Logout
         *******************************************/

        if (isset($_POST['submitl'])) {
            endSession();
        }

        function endSession()
        {
            session_destroy();
            header('Location: http://www.testproject.test/LoginPage');
        }



        /*******************************************
         * Export to excel file
         *******************************************/
        if (isset($_POST['submite'])) {
            exportExcel($returnData);
        }

        function exportExcel($returnData)
        {
            $filename = "excel_full_data" . date('Y/m/d') . ".xls";

            header("Content: attachment; filename =\"$filename\"");
            header("Content Type: application/vnd.ms-excel");

            $flag = false;
            foreach ($returnData as $row) {
                if (!$flag) {
                    echo implode("\t", array_keys($row)) . "\n";
                    $flag = true;
                }

                array_walk($row, 'filterData');
                echo implode("\t", array_values($row)) . "\n";
            }
        }

    }else{
        header('Location: http://testproject.test/LoginPage.php');
    }

    ?>

</body>

</html>