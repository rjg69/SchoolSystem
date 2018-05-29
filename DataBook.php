<!DOCTYPE html>
<body>
<?php
require 'vendor/autoload.php';
require_once('HeaderLayout.php');
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
            <a href="#" data-toggle = "modal" data-target = "#UpdateBookTitleModal">Book Title</a>
            <a href="#" data-toggle = "modal" data-target = "#UpdateBookImageModal">Book Image</a>
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
<h2><center><u>Book Data</u></center></h2>
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
                <form action = "" method = "GET">
                    <h2>Name</h2><br>
                    <input type = "text" name = "StudentName"><br>
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
                    <h2>Class</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <h2>Book</h2><br>
                    <input type = "text" name = "BookTitle"><br>
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
                <form>
                    <h2>Name</h2><br>
                    <input type = "text" name = "StudentName"><br>
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
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
    Update Book Title Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateBookTitleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Book</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Book Title</h2><br>
                    <input type = "text" name = "BookTitle"><br>
                    <h2>Book ID</h2><br>
                    <input type = "text" name = "BookID"><br>
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
    Update Book Image Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateBookImageModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Book</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Book Title</h2><br>
                    <input type = "text" name = "BookTitle"><br>
                    <h2>Book Image</h2><br>
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

<!--Kendo sortable script-->
<div id="example">
    <div class="demo-section k-content wide">
        <div id="singleSort"></div>
    </div>

    <div class="demo-section k-content wide">
        <div id="multipleSort"></div>
    </div>

    <script>
        $(document).ready(function () {
            $("#singleSort").kendoGrid({
                dataSource: {
                    data: orders,
                    pageSize: 6
                },
                sortable: {
                    mode: "single",
                    allowUnsort: false
                },
                pageable: {
                    buttonCount: 5
                },
                scrollable: false,
                columns: [
                    {
                        field: "ShipCountry",
                        title: "Ship Country",
                        sortable: {
                            initialDirection: "desc"
                        },
                        width: 300
                    },
                    {
                        field: "Freight",
                        width: 300
                    },
                    {
                        field: "OrderDate",
                        title: "Order Date",
                        format: "{0:dd/MM/yyyy}"
                    }
                ]
            });

            $("#multipleSort").kendoGrid({
                dataSource: {
                    data: orders,
                    pageSize: 6
                },
                sortable: {
                    mode: "multiple",
                    allowUnsort: true,
                    showIndexes: true
                },
                pageable: {
                    buttonCount: 5
                },
                scrollable: false,
                columns: [
                    {
                        field: "ShipCountry",
                        title: "Ship Country",
                        width: 300
                    },
                    {
                        field: "Freight",
                        width: 300
                    },
                    {
                        field: "OrderDate",
                        title: "Order Date",
                        format: "{0:d}"
                    }
                ]
            });
        });
    </script>
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
            BookTable.BookName,
            BookTable.BookImage,
            BookTable.BookID
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

    $bookID = new \Kendo\UI\GridColumn();
    $bookID->field('BookID');

    $bookColumn = new \Kendo\UI\GridColumn();
    $bookColumn->field('BookName');

    $bookImage = new \Kendo\UI\GridColumn();
    $bookImage->field('BookImage');

    $classID = new \Kendo\UI\GridColumn();
    $classID->field('ClassID');

    $className = new \Kendo\UI\GridColumn();
    $className->field('ClassName');

    $grid = new \Kendo\UI\Grid('grid');
    $grid->addColumn($bookID, $bookColumn, $bookImage, $classID, $className)->dataSource($dataSource);

    echo $grid->render();


    /****************************************************************
     *  ASSIGNMENT 6 - SORTABLE BOOK & CLASS LISTS
     ****************************************************************/

    $sortable = new \Kendo\UI\Sortable('#sortable-basic');
    $sortable->hint(new \Kendo\JavaScriptFunction('hint'))->placeholder(new \Kendo\JavaScriptFunction('placeholder'));

    echo $sortable->render();


    /****************************************************************
     *  ADD NEW BOOK TO THE DATABASE -- MySQL
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
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }

    /****************************************************************
     *  ADD NEW BOOK TO THE DATABASE -- MSSQL
     ****************************************************************

    if(isset($_GET['submit'])){

        $BookID = $_GET['BookID'];
        $bookName = $_GET['BookName'];
        $ClassID = $_GET['ClassID'];
        $class = $_GET['ClassTitle'];

        $msusername = "sa";
        $mspassword = "capcom5^";


        $sqlb = "INSERT INTO BookTable(BookID, BookName) VALUES ('$BookID', '$bookName');";

        $sqlc = "INSERT INTO ClassesTable(ClassID, ClassName, BookID) VALUES ('$ClassID', '$class', '$BookID');";


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

        $BookName = $_GET['BookName'];
        $BookID = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        /*Delete all data in the table row if specified by the Bootstrap Modal input*/

        $sql = "DELETE FROM BookTable WHERE BookID = '$BookID' AND BookName = '$BookName'";

        $sqlClass = "DELETE BookID FROM ClassesTable WHERE BookID = '$BookID'";


        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);
        $dbh->exec($sqlClass);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }


    /****************************************************************
     * REMOVE ALL VALUES ASSOCIATED WITH A GIVEN ID -- MSSQL
     ****************************************************************

    if(isset($_GET['submit1'])){

        $msid = $_GET['id'];
        $msbookName = $_GET['BookName'];

        $msusername = "sa";
        $mspassword = "capcom5^";

    $sql = "DELETE FROM BookTable WHERE BookID = '$msid' AND BookName = '$msbookName'";

    $sqlClass = "DELETE BookID FROM ClassesTable WHERE BookID = '$msid'";

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


     *
    /****************************************************************
     * EDIT DESIGNATED BOOK TITLE
     ****************************************************************/

    if(isset($_GET['submit2'])){

        $BookName = $_GET['BookTitle'];
        $BookID = $_GET['BookID'];

        $username = "sa";
        $password = "capcom5^";

        //book query
        $sql = ("UPDATE BookTable 
                    SET BookName = '$BookName'
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
     * EDIT DESIGNATED BOOK IMAGE
     ****************************************************************/

    if (isset($_GET['submit3'])) {

        $image = $_GET['BookImage'];
        $BookID = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE BookTable 
                    SET BookImage = '$image'
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
     * EDIT DESIGNATED BOOOK TITLE
     ****************************************************************

    if(isset($_GET['submit2'])){

        $msid = $_GET['id'];
        $msbookName = $_GET['BookName'];

        $msusername = "sa";
        $mspassword = "capcom5^";

        //book query
        $sql = ("UPDATE BookTable
        SET BookName = 'msbookName'
        WHERE BookID = '$msid'");

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);

        $result = $dbc->query($sql, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }

     /****************************************************************
     * EDIT DESIGNATED BOOOK IMAGE
     ****************************************************************

    if(isset($_GET['submit2'])){

        $msid = $_GET['id'];
        $msimage = $_GET['BookImage'];

        $msusername = "sa";
        $mspassword = "capcom5^";

        //student query
        $sql = ("UPDATE BookTable
                    SET BookImage = '$msimage'
                    WHERE BookID = '$msid'");

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);


        $result = $dbc->query($sql, PDO::FETCH_ASSOC);

        sqlsrv_close($conn);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }
     */

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