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
            <a href="#" data-toggle = "modal" data-target = "#AddStudentToRoster">Add Student to Class</a>
            <a href="#" data-toggle = "modal" data-target = "#RemoveStudentFromRoster">Remove Student from Class</a>
            <a href="#" data-toggle = "modal" data-target = "#UpdateClassTitleModal">Class Title</a>
            <a href="#" data-toggle = "modal" data-target = "#UpdateBookTitleModal">Book ID</a>
            <a href="#" data-toggle = "modal" data-target = "#UpdateClassroomNumberModal">Classroom Number</a>
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
<h2><center><u>Class Data</u></center></h2>
<hr width = 75%>

<p position = relative top = "100px" align = 'center'>Using the buttons above, select a function to perform on the data displayed below. Note: Any changes you make to the data below will also be carried over to the master table on the Home Page.</p>

<br/>
<br/>
<br/>

<!--
    Add Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "AddModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id = "modalLabel">Add Class</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Class Title</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <h2>Class ID</h2>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Book Title</h2><br>
                    <input type = "text" name = "BookTitle"><br>
                    <h2>Book ID</h2><br>
                    <input type = "text" name = "BookID"><br>
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
                <h5 class="modal-title">Remove Class</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Class Title</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <input type = "submit" value = "Submit" name = "submit1">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--
    Add Student to Roster
-->

<div class="modal" tabindex="-1" role="dialog" id = "AddStudentToRoster">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Class</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Student ID</h2><br>
                    <input type = "text" name = "StudentID"><br>
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
    Remove Student from Roster
-->

<div class="modal" tabindex="-1" role="dialog" id = "RemoveStudentFromRoster">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Class</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Student ID</h2><br>
                    <input type = "text" name = "StudentID"><br>
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
    Update Class Title
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateClassTitleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Class</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Class Title</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <input type = "submit" value = "Submit" name = "submit4">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!--
    Update Book Title
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateBookTitleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Class</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Book ID</h2><br>
                    <input type = "text" name = "BookID"><br>
                    <input type = "submit" value = "Submit" name = "submit5">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!--
    Update Classroom Number Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateClassroomNumberModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Class</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Old Classroom Number</h2><br>
                    <input type = "text" name = "OldClassroomNumber"><br>
                    <h2>New Classroom Number</h2><br>
                    <input type = "text" name = "ClassroomNumber"><br>
                    <input type = "submit" value = "Submit" name = "submit6">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


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
            ClassesTable.ClassName,
            ClassesTable.ClassID,
            StudentTable.StudentID,
            StudentTable.StudentName,
            BookTable.BookName,
            BookTable.BookImage,
            BookTable.BookID,
            ClassroomTable.ClassroomID
        FROM
            ClassesTable
        LEFT JOIN
            StudClass
        ON
            ClassesTable.ClassID=StudClass.ClassID
        LEFT JOIN
            StudentTable
        ON
            StudentTable.StudentID=StudClass.StudentID
        LEFT JOIN
            BookTable
        ON  
            ClassesTable.BookID=BookTable.BookID
        LEFT JOIN
            ClassroomTable
        ON 
            ClassesTable.ClassroomID=ClassroomTable.ClassroomID
        WHERE
		    BookTable.BookName IS NOT NULL
	    AND
		    ClassroomTable.ClassroomID IS NOT NULL
	    AND
		    StudentTable.StudentID IS NOT NULL
        ORDER BY
            ClassesTable.ClassID;
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
        WHERE
            BookTable.BookName IS NOT NULL
        AND
            ClassroomTable.ClassroomID IS NOT NULL
        AND
            StudentTable.StudentID IS NOT NULL
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
    $dataSource->data($results);

    $classID = new \Kendo\UI\GridColumn();
    $classID->field('ClassID');

    $className= new \Kendo\UI\GridColumn();
    $className->field('ClassName');

    $studentName = new \Kendo\UI\GridColumn();
    $studentName->field('StudentName');

    $bookID = new \Kendo\UI\GridColumn();
    $bookID->field('BookID');

    $bookName = new \Kendo\UI\GridColumn();
    $bookName->field('BookName');

    $bookImageColumn = new \Kendo\UI\GridColumn();
    $bookImageColumn->field('BookImage');

    $grid = new \Kendo\UI\Grid('grid');
    $grid->addColumn($classID, $className, $studentName, $bookID, $bookName, $bookImageColumn)->dataSource($dataSource);

    echo $grid->render();


    /****************************************************************
     *  ASSIGNMENT 6 - SORTABLE BOOK & CLASS LISTS
     ****************************************************************/

    $sortable = new \Kendo\UI\Sortable('#sortable-basic');
    $sortable->hint(new \Kendo\JavaScriptFunction('hint'))->placeholder(new \Kendo\JavaScriptFunction('placeholder'));

    echo $sortable->render();


    /****************************************************************
     *  ADD NEW CLASS TO THE DATABASE -- MySQL
     ****************************************************************/
    if (isset($_GET['submit'])) {

        $BookID = $_GET['BookID'];
        $bookName = $_GET['BookName'];
        $ClassID = $_GET['ClassID'];
        $class = $_GET['ClassTitle'];

        $username = "sa";
        $password = "capcom5^";

        $sqlb = "INSERT INTO BookTable(BookID, BookName) VALUES ('$BookID', '$bookName');";

        $sqlc = "INSERT INTO ClassesTable(ClassID, ClassName, BookID) VALUES ('$ClassID', '$class', '$BookID');";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sqlb);
        $dbh->exec($sqlc);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }


    /****************************************************************
     *  ADD NEW STUDENT TO THE DATABASE -- MSSQL
     ****************************************************************/

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

        $ClassName = $_GET['ClassTitle'];
        $ClassID = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        /*Delete all data in the table row if specified by the Bootstrap Modal input*/

        $sql = "DELETE FROM ClassesTable WHERE ClassName = '$ClassName'";

        $sqls = "DELETE FROM StudClass WHERE ClassID = '$ClassID'";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);
        $dbh->exec($sqls);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }


    /****************************************************************
     * REMOVE ALL VALUES ASSOCIATED WITH A GIVEN ID -- MSSQL
     ****************************************************************/

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
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }



    /****************************************************************
     * EDIT BOOK ID
     ****************************************************************/

    if (isset($_GET['submit2'])) {

        $ClassID = $_GET['ClassID'];
        $BookID = $_GET['BookID'];

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE ClassesTable
                    SET BookID = '$BookID'
                    WHERE ClassID = '$ClassID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT CLASSROOM NUMBER
     ****************************************************************/

    if (isset($_GET['submit3'])) {

        $room = $_GET['ClassroomNumber'];
        $oldRoom = $_GET['OldClassroomNumber'];

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE ClassesTable 
                    SET ClassroomID = '$room'
                    WHERE ClassroomID = '$oldRoom'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT CLASS TITLE
     ****************************************************************/

    if(isset($_GET['submit4'])){

        $title = $_GET['ClassTitle'];
        $ClassID = $_GET['ClassID'];

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE ClassesTable 
                    SET ClassName = '$title'
                    WHERE ClassID = '$ClassID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT ADD TO ROSTER
     ****************************************************************/

    if (isset($_GET['submit5'])) {

        $studID = $_GET['StudentID'];
        $classID = $_GET['ClassID'];

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("INSERT INTO StudClass(StudentID, ClassID)
                    VALUES ('$studID', '$classID')
                ");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT REMOVE FROM ROSTER
     ****************************************************************/

    if (isset($_GET['submit6'])) {

        $classID = $_GET['ClassID'];
        $studID = $_GET['StudentID'];

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("DELETE FROM StudClass
                    WHERE StudentID = '$studID' AND ClassID = '$classID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }



    /****************************************************************
     * EDIT DESIGNATED BOOK ID -- MSSQL
     ****************************************************************/

    if(isset($_GET['submit2'])){

        $msid = $_GET['id'];
        $msstudName = $_GET['StudentName'];

        $msusername = "sa";
        $mspassword = "capcom5^";

        $sql = ("UPDATE ClassesTable
                    SET BookID = '$BookID'
                    WHERE ClassID = '$ClassID'");

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);


        $result = $dbc->query($sql, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }


    /****************************************************************
     * EDIT DESIGNATED CLASSROOM NUMBER -- MSSQL
     ****************************************************************/

    if(isset($_GET['submit3'])){

        $msid = $_GET['id'];
        $msstudName = $_GET['StudentName'];

        $msusername = "sa";
        $mspassword = "capcom5^";

        //student query
        $sql = ("UPDATE ClassesTable 
                    SET ClassroomID = '$room'
                    WHERE ClassroomID = '$oldRoom'");

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);


        $result = $dbc->query($sql, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }


    /****************************************************************
     * EDIT DESIGNATED CLASS TITLE -- MSSQL
     ****************************************************************/

    if(isset($_GET['submit4'])){

        $msid = $_GET['id'];
        $msstudName = $_GET['StudentName'];

        $msusername = "sa";
        $mspassword = "capcom5^";

        //student query
        $sql = ("UPDATE ClassesTable 
                    SET ClassName = '$title'
                    WHERE ClassID = '$ClassID'");

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);


        $result = $dbc->query($sql, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }


    /****************************************************************
     * EDIT DESIGNATED CLASS ADD TO ROSTER -- MSSQL
     ****************************************************************/

    if(isset($_GET['submit5'])){

        $msid = $_GET['id'];
        $msstudName = $_GET['StudentName'];

        $msusername = "sa";
        $mspassword = "capcom5^";

        //student query
        $sql = ("INSERT INTO StudClass(StudentID, ClassID)
                    VALUES ('$studID', '$classID')
                ");

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);


        $result = $dbc->query($sql, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }


    /****************************************************************
     * EDIT DESIGNATED CLASS REMOVE FROM ROSTER -- MSSQL
     ****************************************************************/

    if(isset($_GET['submit6'])){

        $msid = $_GET['id'];
        $msstudName = $_GET['StudentName'];

        $msusername = "sa";
        $mspassword = "capcom5^";

        $sql = ("DELETE FROM StudClass
                    WHERE StudentID = '$studID' AND ClassID = '$classID'");

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);


        $result = $dbc->query($sql, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }



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