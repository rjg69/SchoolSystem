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
            <a href="#" data-toggle = "modal" data-target = "#UpdateModal">Class Title</a>
            <a href="#" data-toggle = "modal" data-target = "#UpdateModal">Class ID</a>
            <a href="#" data-toggle = "modal" data-target = "#UpdateModal">Classroom Number</a>
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
<h2><center><u>Classroom Data</u></center></h2>
<hr width = 75%>

<p>Using the buttons above, select a function to perform on the data displayed below. Note: Any changes you make to the data below will also be carried over to the master table on the Home Page.</p>

<!--https://stackoverflow.com/questions/16323360/submitting-html-form-using-jquery-ajax-->
<script type = "text/javascript">
    //Submit forms using ajax/POST
    $("#addForm").submit(function(event){
        event.preventDefault();
        var $form = $( this ),
            url = $form.attr( 'action' );

        var posting = $.post( url, {ClassTitle: $('#ClassTitle').val(), ClassID: $('#ClassID').val(), RoomNumber: $('#RoomNumber').val() });

        posting.done(function( data ){
            alert('success');
        });
    });
</script>

<!--
    Add Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "AddModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id = "modalLabel">Add Student</h5>
            </div>
            <div class="modal-body" id = "addForm" method = "post">
                <form id = "addForm" action="">
                    <h2>Class Title</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <h2>Class ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
                    <h2>Room Number</h2><br>
                    <input type = "text" name = "RoomNumber"><br>
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
                    <h2>Room Number</h2><br>
                    <input type = "text" name = "RoomNumber"><br>
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
    Update Modal Classroom Number
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Room Number</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Old Classroom Number</h2><br>
                    <input type = "text" name = "OldClass"><br>
                    <h2>New Classroom Number</h2><br>
                    <input type = "text" name = "NewClass"><br>
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
    Update Modal Classroom ID
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Room Number</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Classroom Number</h2><br>
                    <input type = "text" name = "ClassNum"><br>
                    <h2>New Classroom ID</h2><br>
                    <input type = "text" name = "ClassID"><br>
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
    Update Modal Classroom Class Title
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Room Number</h5>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Classroom Number</h2><br>
                    <input type = "text" name = "ClassNum"><br>
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
            ClassroomTable.ClassroomNumber
        FROM
            ClassesTable
        LEFT JOIN
            ClassroomTable
        ON
            ClassroomTable.ClassroomID=ClassesTable.ClassroomID
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
     ****************************************************************/

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

    $classNumber = new \Kendo\UI\GridColumn();
    $classNumber->field('ClassroomNumber');

    $classID = new \Kendo\UI\GridColumn();
    $classID->field('ClassID');

    $className = new \Kendo\UI\GridColumn();
    $className->field('ClassName');

    $grid = new \Kendo\UI\Grid('grid');
    $grid->addColumn($classNumber, $classID, $className)->dataSource($dataSource);

    echo $grid->render();


    /****************************************************************
     *  ASSIGNMENT 6 - SORTABLE BOOK & CLASS LISTS
     ****************************************************************/

    $sortable = new \Kendo\UI\Sortable('#sortable-basic');
    $sortable->hint(new \Kendo\JavaScriptFunction('hint'))->placeholder(new \Kendo\JavaScriptFunction('placeholder'));

    echo $sortable->render();


    /****************************************************************
     *  ADD NEW CLASSROOM TO THE DATABASE -- MySQL
     ****************************************************************/
    if (isset($_GET['submit'])) {

        $ClassID = $_GET['ClassID'];
        $class = $_GET['ClassTitle'];
        $ClassroomNum = $_GET['RoomNumber'];

        $username = "sa";
        $password = "capcom5^";

        $sqlb = "INSERT INTO ClassroomTable(ClassroomID, ClassroomNumber) VALUES ('$ClassroomNum', '$ClassroomNum');";

        $sqlc = "INSERT INTO ClassesTable(ClassroomID, ClassTitle, ClassID) VALUES ('$ClassroomNum', '$class', '$ClassID');";

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

        $ClassNum = $_GET['RoomNumber'];

        $username = "sa";
        $password = "capcom5^";

        /*Delete all data in the table row if specified by the Bootstrap Modal input*/

        $sql = "DELETE FROM ClassroomTable WHERE ClassroomNumber = '$ClassNum'";


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
     * EDIT DESIGNATED CLASSROOM NUMBER
     ****************************************************************/

    if (isset($_GET['submit2'])) {

        $ClassNum = $_GET['NewClass'];
        $ClassID = $_GET['OldClass'];

        $username = "sa";
        $password = "capcom5^";

        //classroom query
        $sql = ("UPDATE ClassroomTable 
                    SET ClassroomNumber = '$ClassNum'
                    WHERE ClassroomID = '$ClassID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClassroom.php?reload=1">';
        }
    }


    /****************************************************************
     * EDIT DESIGNATED CLASSROOM ID
     ****************************************************************/

    if (isset($_GET['submit3'])) {

        $ClassNum = $_GET['ClassNum'];
        $ClassID = $_GET['ClassID'];

        $username = "sa";
        $password = "capcom5^";

        //classroom query
        $sql = ("UPDATE ClassroomTable 
                    SET ClassroomID = '$ClassID'
                    WHERE ClassroomNumber = '$ClassNum'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClassroom.php?reload=1">';
        }
    }


    /****************************************************************
     * EDIT DESIGNATED CLASSROOM CLASS TITLE
     ****************************************************************/

    if (isset($_GET['submit4'])) {

        $ClassNum = $_GET['ClassNum'];
        $ClassTitle = $_GET['ClassTitle'];

        $username = "sa";
        $password = "capcom5^";

        //classroom query
        $sql = ("UPDATE ClassroomTable 
                    SET ClassTitle = '$ClassTitle'
                    WHERE ClassroomNumber = '$ClassNum'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClassroom.php?reload=1">';
        }
    }


    /****************************************************************
     * EDIT DESIGNATED STUDENT VALUES -- MSSQL
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
*/

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