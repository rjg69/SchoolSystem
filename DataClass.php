<!DOCTYPE html>
<?php
require 'vendor/autoload.php';
require_once('HeaderLayout.php');
?>
<body>
<br />

<!--
    Add button & delete button
-->

<div class="btn-group pull-right">
    <button type="button" class="btn btn-primary" data-toggle = "tooltip" data-placement = "top" title = "Add Entry to Table">
        <a data-toggle = "modal" data-target = "#AddModal" style = color:white>Add</a>
    </button>
    <button type="button" class="btn btn-primary" data-toggle = "tooltip" data-placement = "top" title = "Remove Entry from Table">
        <a data-toggle = "modal" data-target = "#RemoveModal" style = color:white onclick = "delete();">Remove</a>
    </button>
</div>

<!--
    Update button
-->

<div class="dropdown pull-right">
    <button class="dropbtn" onclick="myFunction()" type="button" data-placement = "top" title = "Update Entry in Table">Update
        <span class="caret"></span></button>
    <div id = "myDropdown" class = "dropdown-content">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <a href="#" data-toggle = "modal" data-target = "#AddStudentToRoster">Add Student to Class</a>
        <a href="#" data-toggle = "modal" data-target = "#RemoveStudentFromRoster">Remove Student from Class</a>
        <a href="#" data-toggle = "modal" data-target = "#UpdateClassTitleModal">Class Title</a>
        <a href="#" data-toggle = "modal" data-target = "#UpdateBookTitleModal">Book Title</a>
        <a href="#" data-toggle = "modal" data-target = "#UpdateClassroomNumberModal">Classroom Number</a>
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
                <form>
                    <h2>Class Title</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <h2>Class ID</h2>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Book Title</h2><br>
                    <input type = "text" name = "BookTitle"><br>
                    <h2>Book ID</h2><br>
                    <input type = "text" name = "BookID"><br>
                    <input type = "submit" value = "Submit">
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
                <form>
                    <h2>Class Title</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <input type = "submit" value = "Submit">
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
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Student ID</h2><br>
                    <input type = "text" name = "StudentID"><br>
                    <input type = "submit" value = "Submit">
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
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Student ID</h2><br>
                    <input type = "text" name = "StudentID"><br>
                    <input type = "submit" value = "Submit">
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
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Class Title</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <input type = "submit" value = "Submit">
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
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Book Title</h2><br>
                    <input type = "text" name = "BookTitle"><br>
                    <h2>Book ID</h2><br>
                    <input type = "text" name = "BookID"><br>
                    <input type = "submit" value = "Submit">
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
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Old Classroom Number</h2><br>
                    <input type = "text" name = "OldClassroomNumber"><br>
                    <h2>New Classroom Number</h2><br>
                    <input type = "text" name = "ClassroomNumber"><br>
                    <input type = "submit" value = "Submit">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


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
    $dataSource->data($data);

    $nameColumn = new \Kendo\UI\GridColumn();
    $nameColumn->field('StudentName');

    $studImageColumn = new \Kendo\UI\GridColumn();
    $studImageColumn->field('StudentImage');

    $classColumn = new \Kendo\UI\GridColumn();
    $classColumn->field('ClassTitle');

    $bookColumn = new \Kendo\UI\GridColumn();
    $bookColumn->field('BookTitle');

    $bookImageColumn = new \Kendo\UI\GridColumn();
    $bookImageColumn->field('BookImage');

    $grid = new \Kendo\UI\Grid('grid');
    $grid->addColumn($nameColumn, $studImageColumn, $classColumn, $bookColumn, $bookImageColumn)->dataSource($dataSource);

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

        $sqlc = "INSERT INTO ClassesTable(ClassID, ClassName) VALUES ('$ClassID', '$class');";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sqlb);
        $dbh->exec($sqlc);

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

        $BookName = $_GET['BookName'];
        $BookID = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        /*Delete all data in the table row if specified by the Bootstrap Modal input*/

        $sql = "DELETE FROM BookTable WHERE BookID = '$BookID' AND BookName = '$BookName'";


        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

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
     * EDIT BOOK TITLE
     ****************************************************************/

    if (isset($_GET['submit2'])) {

        if ($_GET['BookTitle']) {
            $name = $_GET['BookName'];
        }else{
            foreach($data as $user){
                if($data['id'] == $_GET['BookID']){
                    $name = $data['id']['BookTitle'];
                }
            }
        }

        if ($_GET['BookID']) {
            $id = $_GET['BookID'];
        } else {
            $id = null;
        }

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE BookTable 
                    SET BookName = '$name'
                    WHERE BookID = '$BookID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataBook.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT CLASSROOM NUMBER
     ****************************************************************/

    if (isset($_GET['submit3'])) {

        if ($_GET['ClassroomNumber']) {
            $room = $_GET['ClassroomNumber'];
        }else{
            $room = null;
        }

        if ($_GET['OldClassroomNumber']) {
            $oldRoom = $_GET['OldClassroomNumber'];
        }else{
            $oldRoom = null;
        }

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
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataBook.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT CLASS TITLE
     ****************************************************************/

    if(isset($_GET['submit4'])){

        if ($_GET['ClassTitle']) {
            $title = $_GET['ClassTitle'];
        }else{
            $title = null;
        }

        if ($_GET['ClassID']) {
            $id = $_GET['ClassID'];
        } else {
            $id = null;
        }

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE ClassTable 
                    SET ClassName = '$title'
                    WHERE ClassID = '$ClassID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataBook.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT ADD TO ROSTER
     ****************************************************************/

    if (isset($_GET['submit5'])) {

        if ($_GET['StudentID']) {
            $studID = $_GET['StudentID'];
        }else{
            $studID = null;
        }

        if ($_GET['ClassID']) {
            $classID = $_GET['ClassID'];
        } else {
            $classID = null;
        }

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("INSERT INTO StudClass 
                    VALUES StudentID = '$studID', ClassID = '$classID'
                ");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataBook.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT REMOVE FROM ROSTER
     ****************************************************************/

    if (isset($_GET['submit6'])) {

        if ($_GET['ClassID']) {
            $classID = $_GET['ClassID'];
        }else{
            $classID = null;
        }

        if ($_GET['StudentID']) {
            $studID = $_GET['StudentID'];
        } else {
            $studID = null;
        }

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("DELETE FROM StudClass
                    WHERE StudentID = '$studID', ClassID = '$classID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataBook.php?reload=1">';
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

    echo "<td width = '16.67%'><u>Class ID</u></td>";
    echo "<td width = '16.67%'><u>Class Title</u></td>";
    echo "<td width = '16.67%'><u>Student Name</u></td>";
    echo "<td width = '16.67%'><u>Book ID</u></td>";
    echo "<td width = '16.67%'><u>Book Name</u></td>";
    echo "<td width = '16.67%'><u>Book Image</u></td>";
    echo "</tr><tr>";

    $j = 0;
    $classList = array();
    $bookList = array();

    foreach ($results as $val) {
        $j = $j + 1;
        $key = $val['BookID'];
        if (!array_key_exists($key, $reportData)) {
            $returnData[$key] = array(
                'BookID' => $val['BookID'],
                'BookTitle' => $val['BookName'],
                'BookImage' =>  '\BookPhotos\\' . $val['BookName'] . '.jpg',
                'ClassID' => $val['ClassID'],
                'ClassTitle' => $val['ClassName'],
                'StudentName' => $val['StudentName']
            );
        }

        if(!in_array($val['ClassID'], $classList) && $val['ClassID'] != null){
            echo "<td width = '16.67%'>" . $returnData[$key]['ClassID'] . "</td>";
            echo "<td width = '16.67%'>" . $returnData[$key]['ClassTitle'] . "</td>";
            $classList[] = $val['ClassID'];
        }else{
            echo "<td width = '16.67%'></td>";
            echo "<td width = '16.67%'></td>";
        }

        echo "<td width = '16.67%'>" . $returnData[$key]['StudentName'] . "</td>";

        if(!in_array($val['BookID'], $bookList) && $val['BookID'] != null){
            echo "<td width = '16.67%'>" . $returnData[$key]['BookID'] . "</td>";
            echo "<td width = '16.67%'>" . $returnData[$key]['BookTitle'] . "</td>";
            echo "<td width = '16.67%'>" . $returnData[$key]['BookImage'] . "</td>";
            $bookList[] = $val['BookID'];
        }else{
            echo "<td width = '16.67%'></td>";
            echo "<td width = '16.67%'></td>";
            echo "<td width = '16.67%'></td>";
        }

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