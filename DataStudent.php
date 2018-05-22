<!DOCTYPE html>
<?php
require 'vendor/autoload.php';
require_once('HeaderLayout.php');
?>

<body>
<br />

<!--Data Manipulation Button Group-->
<div class="btn-toolbar">
    <div class = 'btn-group-justified'>



        <!--Add button-->
        <button type="button" class="btn btn-primary" data-toggle = "tooltip" data-placement = "top" title = "Add Entry to Table">
            <a data-toggle = "modal" data-target = "#AddModal" style = color:white>Add</a>
        </button>

        <!--Remove button-->
        <button type="button" class="btn btn-primary" data-toggle = "tooltip" data-placement = "top" title = "Remove Entry from Table">
            <a data-toggle = "modal" data-target = "#RemoveModal" style = color:white>Remove</a>
        </button>

        <!--Update button-->
        <button class="btn btn-primary dropdown-toggle" onclick="myFunction()" type="button" data-placement = "top" title = "Update Entry in Table">Update
            <span class="caret"></span></button>
        <div id = "myDropdown" class = "dropdown-content">
            <input id="myInput" type="text" placeholder="Search.." onkeyup="filterFunction()">
            <a href="#" data-toggle = "modal" data-target = "#UpdateStudentNameModal">Student Name</a>
            <a href="#" data-toggle = "modal" data-target = "#UpdateStudentImageModal">Student Image</a>
        </div>



    </div>
</div>



<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

</script>

<br/>
<h2 style = "font-size: 2vw;"><center><u>Student Data</u></center></h2>

<hr width = 75%>

<p position = relative top = "200px" align = 'center'>Using the buttons provided, select a function to perform on the data displayed below. Note: Any changes you make to the data below will also be carried over to the master table on the Home Page.</p>

<!--
    Add Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "AddModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id = "modalLabel">Add Student</h5>
            </div>
            <div class="modal-body">
                <form id = "AddModal" method = "get" action = "DataStudent.php">
                    <h2>Student Name</h2><br>
                    <input type = "text" placeholder = "Student Name" name = "StudentName" required><br>
                    <h2>Student ID</h2><br>
                    <input type = "text" placeholder = "Student ID" name = "StudID" required><br>
                    <h2>Class Name</h2><br>
                    <input type = "text" placeholder = "Class Title" name = "ClassTitle"><br>
                    <h2>Class ID</h2><br>
                    <input type = "text" placeholder = "Class ID" name = "ClassID"><br>
                    <input type = "submit" value = "Submit" name = "submit">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!--
    Remove Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "RemoveModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove Student</h5>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php" id = "RemoveModal">
                    <h2>Student Name</h2><br>
                    <input type = "text" placeholder = "Student Name" name = "StudentName" required><br>
                    <h2>Student ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" required><br>
                    <input href = "DataStudent.php" type = "submit" value = "Submit" name = "submit1">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--
    Update Student Name Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateStudentNameModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php" id = "UpdateStudentNameModal">
                    <h2>Student ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" required><br>
                    <h2>Student Name</h2><br>
                    <input type = "text" placeholder = "Student Name" name = "StudentName" required><br>
                    <input type = "submit" value = "Submit" name = "submit2">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--
    Update Student Image Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateStudentImageModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body" style = "position: relative;">
                <form method = "get" action = "DataStudent.php" id = "UpdateStudentImageModal">
                    <h2>Student ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" style = "position: relative" required><br>

                    <h2>Student Image</h2><br>
                    <div id="filelist">Please Select Images to Uplaod and Send.</div>
                    <div id="container" style="position: relative;">
                        <a id="pickfiles" href="javascript:;" style="position: relative; z-index: 1;">[Select files]</a>
                        <a id="uploadfiles" href="javascript:;">[Upload files]</a>
                        <div id="html5_1cdnooc7soq715hq1eof7km4ii4_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 2px; left: 0; width: 75px; height: 16px; overflow: hidden; z-index: 0;">
                            <input name = "StudentImage" id="html5_1cdnooc7soq715hq1eof7km4ii4" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;" multiple="" accept=".jpg,.gif,.png,.zip">
                        </div>
                    </div>

                    <br />
                    <pre id="console"></pre>
                    <br>
                    <input type = "submit" value = "Submit" name = "submit3">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--
    Update Student Image Script
-->

<script type="text/javascript">
    // Custom example logic
    var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,html4',
        browse_button : 'pickfiles', // you can pass in id...
        container: document.getElementById('container'), // ... or DOM Element itself
        url : "DataStudent.php",
        filters : {
            max_file_size : '10kb',
            mime_types: [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip"}
            ]
        },
        // Flash settings
        flash_swf_url : '/plupload/js/Moxie.swf',
        // Silverlight settings
        silverlight_xap_url : '/plupload/js/Moxie.xap',
        init: {
            PostInit: function() {
                document.getElementById('filelist').innerHTML = '';
                document.getElementById('uploadfiles').onclick = function() {
                    uploader.start();
                    return false;
                };
            },
            FilesAdded: function(up, files) {
                plupload.each(files, function(file) {
                    document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                });
            },
            UploadProgress: function(up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },
            Error: function(up, err) {
                document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
            }
        }
    });
</script>

<!--Kendo hint and placeholder functions-->
<script>
    function hint(element) {
        return element.clone().addClass("hint");
    }

    function placeholder(element) {
        return element.clone().addClass("placeholder").text("drop here");
    }
</script>

<?php

$continue = include 'LoginCheck.php';

if($continue == true) {

    $i = 0;
    $results = array();
    $reportData = array();


    /****************************************************************
     *  GET TOTAL DATA - MySQL
     ****************************************************************/

    $servername = "10.99.100.54";
    $username = "sa";
    $password = "capcom5^";
    $dbname = "ryan_intern";

    $q = "
        SELECT
            StudentTable.StudentID,
            StudentTable.StudentName,
            StudentTable.StudentImage,
            ClassesTable.ClassName,
            BookTable.BookName,
            BookTable.BookImage
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
            BookTable
        ON  
            ClassesTable.BookID=BookTable.BookID
        LEFT JOIN
            ClassroomTable
        ON 
            ClassesTable.ClassroomID=ClassroomTable.ClassroomID
        ORDER BY
            StudentTable.StudentID;
        ";

    $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
    $data = $dbh->query($q, PDO::FETCH_ASSOC);

    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    foreach ($data as $entry) {
        $results [] = $entry;
    }


    /****************************************************************
     *  GET TOTAL DATA - MSSQL
     ****************************************************************

    $msservername = "10.99.100.38";
    $msusername = "sa";
    $mspassword = "capcom5^";
    $msdbname = "ryan_intern";

    $connectionInfo = array("Database" => $msdbname, "UID"=>$msusername, "PWD" => $mspassword);
    $conn = sqlsrv_connect($msservername, $connectionInfo);

    if($conn){
        echo "connection established <br />";
    }else{
        echo "connection could not be established <br />";
        die( print_r( sqlsrv_errors(), true));
    }


    /****************************************************************
     *  ASSIGNMENT 6 - KENDOUI GRID COMPATIBILITY
     ****************************************************************/

    $dataSource = new \Kendo\Data\DataSource();
    $dataSource->data($results);

    $idColumn = new \Kendo\UI\GridColumn();
    $idColumn->field('StudentID');

    $nameColumn = new \Kendo\UI\GridColumn();
    $nameColumn->field('StudentName');

    $studImageColumn = new \Kendo\UI\GridColumn();
    $studImageColumn->field('StudentImage');

    $classColumn = new \Kendo\UI\GridColumn();
    $classColumn->field('ClassName');

    $bookColumn = new \Kendo\UI\GridColumn();
    $bookColumn->field('BookName');

    $grid = new \Kendo\UI\Grid('grid');
    $grid->addColumn($idColumn, $nameColumn, $studImageColumn, $classColumn, $bookColumn)->dataSource($dataSource);

    echo $grid->render();


    /****************************************************************
     *  ASSIGNMENT 6 - SORTABLE BOOK & CLASS LISTS
     ****************************************************************/

    $sortable = new \Kendo\UI\Sortable('#sortable-basic');
    $sortable->hint(new \Kendo\JavaScriptFunction('hint'))->placeholder(new \Kendo\JavaScriptFunction('placeholder'));

    echo $sortable->render();


    /****************************************************************
     *  ADD NEW STUDENT TO THE DATABASE -- MySQL
     ****************************************************************/
    if (isset($_GET['submit'])) {

        $StudID = $_GET['StudID'];
        $studName = $_GET['StudentName'];
        $ClassID = $_GET['ClassID'];
        $class = $_GET['ClassTitle'];

        $username = "sa";
        $password = "capcom5^";

        $sql = "INSERT INTO StudentTable(StudentID, StudentName) VALUES ('$StudID', '$studName');";

        $sqlb = "INSERT INTO StudClass(StudentID, ClassID) VALUES ('$StudID', '$ClassID');";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);
        $dbh->exec($sqlb);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }

    /****************************************************************
     *  ADD NEW STUDENT TO THE DATABASE -- MSSQL
     ****************************************************************

    if(isset($_GET['submit'])){

        $msid = $_GET['id'];
        $msstudName = $_GET['StudentName'];
        $msclass = $_GET['ClassTitle'];
        $msbook = $_GET['BookTitle'];

        $msservername = "10.99.100.38";
        $msusername = "sa";
        $mspassword = "capcom5^";
        $msdbname = "ryan_intern";

        $changeData[] = $id;

        $dbc = mssql_connect($msservername, $msusername, $mspassword, $msdbname) or die('Error connecting to the SQL Server database.');

        $sql = 'INSERT INTO SavviorSchool(ID, StudentName, ClassTitle, BookTitle) VALUES ('$msid', '$msstudName', '$msclass', '$msbook')';
        $result = mssql_query($dbc, $sql) or die('Error querying MSSQL database');

        mssql_close($dbc);

    }


    /****************************************************************
     * REMOVE ALL VALUES ASSOCIATED WITH A GIVEN ID --MySQL
     ****************************************************************/

    if (isset($_GET['submit1'])) {

        $name = $_GET['StudentName'];
        $id = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        /*Delete all data in the table row if specified by the Bootstrap Modal input*/

        $sql = "DELETE FROM StudentTable WHERE StudentID = '$id' AND StudentName = '$name'";

        $sqlc = "DELETE FROM StudClass WHERE StudentID = '$id'";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);
        $dbh->exec($sqlc);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }


    /****************************************************************
     * REMOVE ALL VALUES ASSOCIATED WITH A GIVEN ID -- MSSQL
     ****************************************************************

    if(isset($_GET['submit1'])){

        $msid = $_GET['id'];
        $msstudName = $_GET['StudentName'];

        $msservername = "10.99.100.38";
        $msusername = "sa";
        $mspassword = "capcom5^";
        $msdbname = "ryan_intern";

        $changeData[] = $id;

        $dbc = mssql_connect($msservername, $msusername, $mspassword, $msdbname) or die('Error connecting to the SQL Server database.');

        $sql = "DELETE FROM SavviorSchool WHERE ID = '$id' AND StudentName = '$name'";
        $result = mssql_query($dbc, $sql) or die('Error querying MSSQL database');

        mssql_close($dbc);

    }



    /****************************************************************
     * EDIT STUDENT NAME
     ****************************************************************/

    if (isset($_GET['submit2'])) {

        $q = ("
        SELECT
            StudentTable.StudentID,
            StudentTable.StudentName,
            StudentTable.StudentImage,
            ClassesTable.ClassName,
            BookTable.BookName,
            BookTable.BookImage
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
            BookTable
        ON  
            ClassesTable.BookID=BookTable.BookID
        LEFT JOIN
            ClassroomTable
        ON 
            ClassesTable.ClassroomID=ClassroomTable.ClassroomID
        ORDER BY
            ClassesTable.ClassID;
        ");


        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $data = $dbh->query($q, PDO::FETCH_ASSOC);


        if ($_GET['StudentName']) {
            $name = $_GET['StudentName'];
        }else{
            foreach($data as $user){
                if($data['id'] == $_GET['ID']){
                    $name = $data['id']['StudentName'];
                }
            }
        }

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE StudentTable 
                    SET StudentName = '$name'
                    WHERE ID = '$StudID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }


    /****************************************************************
     * EDIT DESIGNATED STUDENT IMAGE
     ****************************************************************/

    if (isset($_GET['submit3'])) {

        $q = ("
        SELECT
            StudentTable.StudentID,
            StudentTable.StudentName,
            StudentTable.StudentImage,
            ClassesTable.ClassName,
            BookTable.BookName,
            BookTable.BookImage
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
            BookTable
        ON  
            ClassesTable.BookID=BookTable.BookID
        LEFT JOIN
            ClassroomTable
        ON 
            ClassesTable.ClassroomID=ClassroomTable.ClassroomID
        ORDER BY
            ClassesTable.ClassID;
        ");


        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $data = $dbh->query($q, PDO::FETCH_ASSOC);


        if ($_GET['StudentImage']) {
            $image = $_GET['StudentImage'];
        }else{
            foreach($data as $user){
                if($data['id'] == $_GET['ID']){
                    $name = $data['id']['StudentImage'];
                }
            }
        }

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE StudentTable 
                    SET StudentImage = '$image'
                    WHERE ID = '$StudID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT DESIGNATED STUDENT VALUES
     ****************************************************************

    if(isset($_GET['submit2'])){

    $msid = $_GET['id'];
    $msstudName = $_GET['StudentName'];

    $msservername = "10.99.100.38";
    $msusername = "sa";
    $mspassword = "capcom5^";
    $msdbname = "ryan_intern";

    $changeData[] = $id;


    if ($_GET['StudentName']) {
        $name = $_GET['StudentName'];
    }else{
        foreach($data as $user){
            if($data['id'] == $_GET['ID']){
                $name = $data['id']['StudentName'];
            }
        }
    }

    if ($_GET['id']) {
        $id = $_GET['id'];
    } else {
        $id = null;
    }

    if ($_GET['ClassTitle']) {
        $class = $_GET['ClassTitle'];
    }else{
        foreach($data as $user){
        if($data['id'] == 'ID'){
                $name = $data['id']['ClassTitle'];
            }
        }
    }

    if ($_GET['BookTitle']) {
        $book = $_GET['BookTitle'];
    }else {
        foreach ($data as $user) {
            if ($data['id'] == 'ID') {
                $name = $data['id']['BookTitle'];
            }
        }
    }

    $dbc = mssql_connect($msservername, $msusername, $mspassword, $msdbname) or die('Error connecting to the SQL Server database.');

    $sql = ("UPDATE SavviorSchool
    SET StudentName = '$name', ClassTitle = '$class', BookTitle = '$book'
    WHERE ID = '$id'");

    mssql_close($dbc);

    }


    /****************************************************************
     *  OUTPUT DYNAMIC TABLE DISPLAY
     ****************************************************************/


    echo "<table align = 'center' width = '70%'><tr>";

    echo "<td width = '15%'><u>StudentID</u></td>";
    echo "<td width = '15%'><u>Student Name</u></td>";
    echo "<td width = '20%'><u>Student Image</u></td>";
    echo "<td width = '15%'><u>Class Title</u></td>";
    echo "<td width = '15%'><u>Book Title</u></td>";
    echo "</tr><tr>";

    $j = 0;
    $studentNameList = array();

    foreach ($results as $val) {
        $j = $j + 1;
        $key = $val['StudentID'];
        if (!array_key_exists($key, $reportData)) {
            $returnData[$key] = array(
                'StudentName' => $val['StudentName'],
                'StudentImage' => '\StudentPhotos\\' . $val['StudentName'] . '.jpg',
                'ClassTitle' => $val['ClassName'],
                'BookTitle' => $val['BookName'],
                'BookImage' =>  '\BookPhotos\\' . $val['BookName'] . '.jpg'
            );
        }

        if(!in_array($val['StudentName'], $studentNameList) && $val['StudentName'] != null){
            echo "<td>" . $key . "</td>";
            echo "<td>" . $returnData[$key]['StudentName'] . "</td>";
            echo "<td>" . $returnData[$key]['StudentImage'] .  "</td>"; //"<img style = 'width: 100%; height: auto;' src = $returnData[$key]['StudentImage'] />" . "</td>";
            $studentNameList[] = $val['StudentName'];
        }else{
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
        }
        echo "<td>" . $returnData[$key]['ClassTitle'] . "</td>";
        echo "<td>" . $returnData[$key]['BookTitle'] . "</td>";
        echo "</tr><tr>";

        $j += 1;
    }
    echo "</tr></table>";


    /**********************************************************************************************
     * Assignment 1 & 2
     * CREATE TABLES FOR CLASSES, STUDENTS, BOOKS, AND CLASSROOMS
     * CONNECT CLASS AND STUDENT WITH JOIN TABLE, CONNECT 1 TO 1 CLASSES AND BOOKS, CLASSES AND CLASSROOMS
     *
     * Assignment 3
     *
     * https://www.youtube.com/watch?v=tAcx8N0VcgY  -- MySQL to MSSQL tutorial
     * https://docs.microsoft.com/en-us/sql/ssma/mysql/converting-mysql-databases-mysqltosql?view=sql-server-2017
     *
     * Assignment 4
     *
     * https://www.w3schools.com/jquery/jquery_ajax_get_post.asp -- $.ajax and $.post methods
     * https://jquery-form.github.io/form/
     *
     * Assignment 5
     *
     * https://www.w3schools.com/howto/howto_js_filter_dropdown.asp
     *
     * Assignment 6
     *
     * http://docs.telerik.com/kendo-ui/php/widgets/grid/overview
     * http://docs.telerik.com/kendo-ui/php/widgets/sortable/overview
     *
     * Assignment 7
     *
     * https://www.formget.com/login-form-in-php/     sessions example
     * https://www.johnmorrisonline.com/build-php-login-form-using-sessions/
     *
     * Assignment 8
     *
     * http://php.net/manual/en/function.fputcsv.php -- export student and class data to text files
     * https://stackoverflow.com/questions/15501463/creating-csv-file-with-php
     *
     * Assignment 9
     *
     * https://stackoverflow.com/questions/15699301/export-mysql-data-to-excel-in-php
     * https://phpspreadsheet.readthedocs.io/en/develop/topics/accessing-cells/
     *
     * Assignment 10
     *
     * http://www.plupload.com/
     *
     * Assignment 11
     *
     * https://getbootstrap.com/docs/4.0/components/carousel/
     * https://codepen.io/grbav/pen/qNZjPy
     * https://owlcarousel2.github.io/OwlCarousel2/demos/responsive.html
     * https://github.com/OwlCarousel2/OwlCarousel2/blob/develop/docs/demos/test.html
     *
     * Assignment 12
     *
     * https://www.w3schools.com/html/html_responsive.asp
     **********************************************************************************************/

}else{
    header('Location: http://testproject.test/LoginPage.php');
}
?>

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