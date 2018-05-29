<!DOCTYPE html>
<html>
<?php
require 'vendor/autoload.php';
require_once('HeaderLayout.php');
?>
<body>
<?php
require_once('Navigation.php');
?>

<br />


<!--Data Manipulation Button Group-->
<div class="btn-toolbar">
    <div class = 'btn-group-justified'>

        <!--Add button-->
        <button type="button" class="btn btn-primary" data-toggle = "tooltip" data-placement = "top" style = "width: 100px;" title = "Add Entry to Table">
            <a data-toggle = "modal" data-target = "#AddModal" style = color:white>Add</a>
        </button>

        <!--Remove button-->
        <button type="button" class="btn btn-primary" data-toggle = "tooltip" data-placement = "top" style = "width: 100px;" title = "Remove Entry from Table">
            <a data-toggle = "modal" data-target = "#RemoveModal" style = color:white>Remove</a>
        </button>

        <!--Update button-->
        <button class="btn btn-primary dropdown-toggle" onclick="myFunction()" type="button" data-placement = "top" style = "width: 100px;" title = "Update Entry in Table">Update
            <span class="caret"></span></button>
        <div id = "myDropdown" class = "dropdown-content" style = "left: 55%;">
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
<br />
<br />

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
                    <div id="filelist">Please Select Images to Upload and Send.</div>
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

/*
    $(function() {
        $("#uploader").pluploadQueue({
            runtimes : 'html5,html4',
            url : '/StudentPhotos',
            max_file_size : '5000kb',
            multiple_queues : true,
            unique_names : true,
            filters : [
                {title : "Image files", extensions : "jpg,gif,png,jpeg"}
            ]
        });

        var uploader = $('#uploader').pluploadQueue();

        uploader.bind('FileUploaded', function() {
            if (uploader.files.length == (uploader.total.uploaded + uploader.total.failed)) {
                $(".outputimages").html('The output goes here');
            }
        });
    });

*/

    // Custom example logic
    //http://artax.karlin.mff.cuni.cz/~ttel5535/lib/plupload-1.5.2/examples/example_custom.html
    var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,html4',
        browse_button : 'pickfiles', // you can pass in id...
        container: document.getElementById('container'), // ... or DOM Element itself
        url : "/StudentPhotos",
        filters : {
            max_file_size : '2000kb',
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



<!--Kendo Headers
<div id="grid"></div>
<script>

    $("#grid").kendoGrid({
        columns: [{
            field: "StudentID",
            title: "Student ID"
        },{
            field: "StudentName",
            title: "Student Name"
        },{

            field: "StudentImage",
            title: "Student Image"
        },{

            field: "ClassTitle",
            title: "Class Title"
        },{

            field: "BookTitle",
            title: "Book Title"
        }],
        dataBound: function() {
            var grid = this;
            grid.tbody.find("tr td:first-child").each(function(index, elem){
                $(elem).text("Row header " + (index + 1));
            });
        }
    });
</script>
-->
<!--Kendo sortable script
<div id="example">
    <script>
            $(document).ready(function() {
                $("#sortable-basic").kendoSortable({
                    hint:function(element) {
                        return element.clone().addClass("hint");
                    },
                    placeholder:function(element) {
                        return element.clone().addClass("placeholder").text("drop here");
                    },
                    cursorOffset: {
                        top: -10,
                        left: -230
                    }
                });
            });
    </script>
</div>
-->


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
        WHERE
		    StudentTable.StudentID IS NOT NULL
	    AND
		    ClassesTable.ClassID IS NOT NULL
	    AND
		    BookTable.BookID IS NOT NULL
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

    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";

    //Filter data to avoid repeat student data
    $studentIDList = array();
    $outputData = array();

    foreach($results as $val) {
        $key = $val['StudentID'];
        if (!array_key_exists($key, $studentIDList)) {
            $returnData[$key] = array(
                'StudentID' => $key,
                'StudentName' => $val['StudentName'],
                'StudentImage' => '\StudentPhotos\\' . $val['StudentName'] . '.jpg',
                'ClassTitle' => $val['ClassName'],
                'BookTitle' => $val['BookName'],
                'BookImage' => '\BookPhotos\\' . $val['BookName'] . '.jpg'
            );
        }
    }

    //Generate Output Data for Kendo Grid Display
    $usedNames = array();
    $usedID = array();
    $usedImage = array();

    foreach($results as $val){

        $skipName = $val['StudentName'];
        $skipID = $val['StudentID'];
        $skipImage = $val['StudentImage'];

        if(in_array($skipName, $usedNames)){
            $output['StudentName'] = null;
        }else{
            $output['StudentName'] = $val['StudentName'];
            $usedNames[] = $output['StudentName'];
        }

        if(in_array($skipID, $usedID)){
            $output['StudentID'] = null;
        }else{
            $output['StudentID'] = $val['StudentID'];
            $usedID[] = $output['StudentID'];
        }

        if(in_array($skipImage, $usedImage)){
            $output['StudentImage'] = null;
        }else{
            $output['StudentImage'] = $val['StudentImage'];
            $usedImage[] = $output['StudentImage'];
        }

        $output['ClassName'] = $val['ClassName'];
        $output['BookName'] = $val['BookName'];

        $outputData[] = $output;
    }


    /****************************************************************
     *  GET TOTAL DATA - MSSQL
     *
     * https://stackoverflow.com/questions/22523298/error-sqlstatehy000-2002-no-connection-could-be-made-because-the-target-mac
     *
     ****************************************************************

    $dsn = 'mysql:dbname=ryan_intern;host=10.99.100.38';
    $msuser = "sa";
    $mspassword = "capcom5^";

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

    $dbh = new PDO($dsn, $msuser, $mspassword);
    $queryRef = $dbh->query($q);
    $results = $queryRef->fetchAll(PDO::FETCH_ASSOC);



    /****************************************************************
     *  ASSIGNMENT 6 - KENDOUI GRID COMPATIBILITY
     ****************************************************************/

    $dataSource = new \Kendo\Data\DataSource();
    $dataSource->data($outputData);

    $idColumn = new \Kendo\UI\GridColumn();
    $idColumn->field('StudentID')->title("Student ID");

    $nameColumn = new \Kendo\UI\GridColumn();
    $nameColumn->field('StudentName')->title("Student Name");

    $studImageColumn = new \Kendo\UI\GridColumn();
    $studImageColumn->field('StudentImage')->title("Student Image");

    $classColumn = new \Kendo\UI\GridColumn();
    $classColumn->field('ClassName')->title("Class Name");

    $bookColumn = new \Kendo\UI\GridColumn();
    $bookColumn->field('BookName')->title("Book Name");

    $grid = new \Kendo\UI\Grid('grid');
    $grid->addColumn($idColumn, $nameColumn, $studImageColumn, $classColumn, $bookColumn)->dataSource($dataSource);

    echo $grid->render();

    ?>
    <script>
        $(function(){
            var grid = $("#productGrid").data("kendoGrid");
        })
    </script>

<?php


    /****************************************************************
     *  ASSIGNMENT 6 - SORTABLE BOOK & CLASS LISTS
     ****************************************************************/

    $sortable = new \Kendo\UI\Sortable('grid');
  //$sortable->hint(new \Kendo\JavaScriptFunction('hint'))->placeholder(new \Kendo\JavaScriptFunction('placeholder'));

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

        $StudID = $_GET['id'];
        $studName = $_GET['StudentName'];
        $ClassID = $_GET['ClassID'];
        $class = $_GET['ClassTitle'];

        $msusername = "sa";
        $mspassword = "capcom5^";

        $sql = "INSERT INTO StudentTable(StudentID, StudentName) VALUES ('$StudID', '$studName');";

        $sqlb = "INSERT INTO StudClass(StudentID, ClassID) VALUES ('$StudID', '$ClassID');";

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);

        $result = $dbc->query($sql, PDO::FETCH_ASSOC);
        $result = $dbc->query($sqlb, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
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

        $msusername = "sa";
        $mspassword = "capcom5^";

        $sql = "DELETE FROM StudentTable WHERE StudentID = '$id' AND StudentName = '$name'";

        $sqlc = "DELETE FROM StudClass WHERE StudentID = '$id'";

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);

        $sql = "DELETE FROM SavviorSchool WHERE ID = '$id' AND StudentName = '$name'";
        $result = $dbc->query($sql, PDO::FETCH_ASSOC);
        $result = $dbc->query($sqlc, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }



    /****************************************************************
     * EDIT STUDENT NAME
     ****************************************************************/

    if (isset($_GET['submit2'])) {

        $name = $_GET['StudentName'];
        $StudID = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE StudentTable 
                    SET StudentName = '$name'
                    WHERE StudentID = '$StudID'");

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

        $image = $_GET['StudentImage'];
        $StudID = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE StudentTable 
                    SET StudentImage = '$image'
                    WHERE StudentID = '$StudID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT DESIGNATED STUDENT NAME -- MSSQL
     ****************************************************************

    if(isset($_GET['submit2'])){

        $msid = $_GET['id'];
        $msstudName = $_GET['StudentName'];

        $msusername = "sa";
        $mspassword = "capcom5^";

        $sql = ("UPDATE StudentTable
                    SET StudentName = '$name'
                    WHERE StudentID = '$StudID'");

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);

        $result = $dbc->query($sql, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT DESIGNATED STUDENT IMAGE -- MSSQL
     ****************************************************************

    if(isset($_GET['submit3'])){

        $msid = $_GET['id'];
        $msstudImage = $_GET['StudentImage'];

        $msusername = "sa";
        $mspassword = "capcom5^";

        $sql = ("UPDATE StudentTable
                    SET StudentImage = '$image'
                    WHERE StudentID = '$StudID'");

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);

        $result = $dbc->query($sql, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }



    /**********************************************************************************************
     * Assignment 1 & 2
     * CREATE TABLES FOR CLASSES, STUDENTS, BOOKS, AND CLASSROOMS
     * CONNECT CLASS AND STUDENT WITH JOIN TABLE, CONNECT 1 TO 1 CLASSES AND BOOKS, CLASSES AND CLASSROOMS
     *
     * Assignment 3
     *
     * https://docs.microsoft.com/en-us/sql/ssma/mysql/converting-mysql-databases-mysqltosql?view=sql-server-2017
     * http://php.net/manual/en/function.sqlsrv-execute.php
     *
     * Assignment 6
     *
     * http://docs.telerik.com/kendo-ui/php/widgets/grid/overview
     * http://docs.telerik.com/kendo-ui/php/widgets/sortable/overview
     *
     * Assignment 10
     *
     * http://www.plupload.com/
     **********************************************************************************************/

}else{
    header('Location: /LoginPage.php');
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