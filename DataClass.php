<!DOCTYPE html>
<?php
require_once('HeaderLayout.php');
?>
<body>

<!--
    Add button & delete button
-->

<div class="btn-group">
    <button type="button" class="btn btn-primary" width = "100%" data-toggle = "tooltip" data-placement = "top" title = "Add Entry to Table">
        <a data-toggle = "modal" data-target = "#AddModal" style = color:white>Add</a>
    </button>
    <button type="button" class="btn btn-primary" width = "100%" data-toggle = "tooltip" data-placement = "top" title = "Remove Entry from Table">
        <a data-toggle = "modal" data-target = "#RemoveModal" style = color:white>Remove</a>
    </button>
</div>

<!--
    Update button
-->

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" data-toggle = "tooltip" data-placement = "top" title = "Update Entry in Table">Update
        <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <li><a href="#" data-toggle = "modal" data-target = "#UpdateClassTitleModal">Class Title</a></li>
        <li><a href="#" data-toggle = "modal" data-target = "#UpdateBookTitleModal">Book Title</a></li>
    </ul>
</div>

<p position = relative top = "100px" align = 'center'>Using the buttons above, select a function to perform on the data displayed below. Note: Any changes you make to the data below will also be carried over to the master table on the Home Page.</p>
<p position = relative top = "100px" align = 'center'>To update data, utilize the dropdown menu at the bottom of the page.</p>

<!--
    Add Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "AddModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id = "modalLabel">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Name</h2><br>
                    <input type = "text" name = "StudentName"><br>
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
                    <h2>Class</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <h2>Book</h2><br>
                    <input type = "text" name = "BookTitle"><br>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <h2>Name</h2><br>
                    <input type = "text" name = "StudentName"><br>
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
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
    Update Class Title Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateClassTitleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
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
    Update Book Title Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateBookTitleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
                    <h2>Book Title</h2><br>
                    <input type = "text" name = "BookTitle"><br>
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

    #echo "Current Class Data";
    $i = 0;
    $results = array();
    $reportData = array();

    $servername = "10.99.100.54";
    $username = "sa";
    $password = "capcom5^";
    $dbname = "ryan_intern";

    $q = "
        SELECT
            s.ID,
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
    #echo "Connected successfully";

    foreach ($data as $entry) {
        $results [] = $entry;
    }

    if (isset($_GET['submit'])) {
        add();
    }

    /****************************************************************
     * ADD A NEW STUDENT WITH ALL AVAILABLE DATA PROVIDED
     ****************************************************************/
    function add()
    {
        $id = $_GET['id'];
        $studName = $_GET['StudentName'];
        $class = $_GET['ClassTitle'];
        $book = $_GET['BookTitle'];

        $username = "sa";
        $password = "capcom5^";

        $changeData[] = $id;

        $sql = "INSERT INTO SavviorSchool(ID, StudentName, ClassTitle, BookTitle) VALUES ('$id', '$studName', '$class', '$book')";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }

        #https://www.codeproject.com/Articles/8681/Uploading-Downloading-Pictures-to-from-a-SQL-Serve
    }

    if (isset($_GET['submit1'])) {
        delete();
    }

    /****************************************************************
     * REMOVE ALL VALUES ASSOCIATED WITH A GIVEN ID TO BE REMOVED
     ****************************************************************/
    function delete()
    {
        $name = $_GET['StudentName'];
        $id = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        /*Delete all data in the table row if specified by the Bootstrap Modal input*/
        $changeData[] = $id;

        $sql = "DELETE FROM SavviorSchool WHERE ID = '$id' AND StudentName = '$name'";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }
    }

    if (isset($_GET['submit2'])) {
        edit();
    }

    /****************************************************************
     * EDIT DESIGNATED STUDENT VALUES
     ****************************************************************/
    function edit()
    {
        if ($_GET['StudentName']) {
            $name = $_GET['StudentName'];
        }

        if ($_GET['id']) {
            $id = $_GET['id'];
        } else {
            $id = null;
        }

        if ($_GET['ClassTitle']) {
            $class = $_GET['ClassTitle'];
        }

        if ($_GET['BookTitle']) {
            $book = $_GET['BookTitle'];
        }

        $username = "sa";
        $password = "capcom5^";

        $changeData[] = $id;
        $sql = "UPDATE SavviorSchool SET 'StudentName' = '$name', 'ClassTitle' = '$class', 'BookTitle' = '$book' WHERE 'ID' = '$id'";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataClass.php?reload=1">';
        }

    }

    echo "<table align = 'center' width = '70%'><tr>";

    echo "<td width = '25%'><u>ID</u></td>";
    echo "<td width = '25%'><u>Class Title</u></td>";
    echo "<td width = '25%'><u>Book Title</u></td>";
    echo "<td width = '25%'><u>Book Image</u></td>";
    echo "</tr><tr>";

    foreach ($results as $val) {
        $key = $val['ID'];
        echo "<td>" . $val['ID'] . "</td>";
        if (!array_key_exists($key, $reportData)) {
            $returnData[$key] = array(
                'ClassTitle' => $val['ClassTitle'],
                'BookTitle' => $val['BookTitle'],
                'BookImage' => $val['BookImage']
            );
        }
        echo "<td>" . $returnData[$key]['ClassTitle'] . "</td>";
        echo "<td>" . $returnData[$key]['BookTitle'] . "</td>";
        echo "<td>" . $returnData[$key]['BookImage'] . "</td>";
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

    ksort($classes);
    ksort($books);

    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

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

    if (isset($_GET['TextExport'])) {
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

    if (isset($_GET['Logout'])) {
        endSession();
    }

    function endSession()
    {
        session_destroy();
        header('Location: http://www.testproject.test/LoginPage');
    }

    /*
     * Login again
     * echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/ManagementSystem.php?reload=1">'; (reload page)
     */


    /*******************************************
     * Export to excel file
     *******************************************/
    if (isset($_GET['ExcelExport'])) {
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
    header('Location: http://testproject.test/LoginPage');
}
?>

</body>
</html>