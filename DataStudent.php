<!DOCTYPE html>
<html lang="en">


<head>
    <h1 align = "center"><u><b>
                Savvior School District</b></u></h1>
    <title>Student</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!---->
    <script src='select2/dist/js/select2.min.js' type='text/javascript'></script>
    <!-- CSS -->
    <link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>

    <script>
        $(document).ready(function(){

            // Initialize select2
            $("#myInput").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#myInput option:selected').text();
                var userid = $('#myInput').val();

            });
        });
    </script>
</head>

<!--
    Add style conventions using CSS
-->
<style>
    header{
        color: darkblue;
    }

    button{
        color: white;
        background-color: darkred;
        width: 10%;
    }

    .btn-group{
        color: white;
        background-color: darkorange;
        width: 100%;
        position: relative;
        text-align: center;
    }

    div.btn-group{
        margin: 0 auto;
        text-align: center;
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
        top: 20px;
    }

    submit{
        position: relative;
        left: 0%;
    }

</style>

<body>

<!--
    In this section, display the Student Table data and provide buttons to add, edit, and delete
-->

<h2 align = "center"><u>Student Data</u></h2>

<ul class="nav nav-tabs">
    <li>
        <a href="ManagementSystem.php" data-toggle = "tooltip" data-placement = "top" title = "Return to Home Page">Home Page</a>
    </li>
    <li class="active">
        <a href="DataStudent.php" data-toggle = "tooltip" data-placement = "top" title = "View Student Data">Student</a>
    </li>
    <li>
        <a href="DataBook.php" data-toggle = "tooltip" data-placement = "top" title = "View Book Data">Book</a>
    </li>
    <li>
        <a href="DataClass.php" data-toggle = "tooltip" data-plaement = "top" title = "View Class Data">Class</a>
    </li>
</ul>


<!--
    Add button & delete button, to be put in top right since only one item will be affected at a time
-->
<div class="btn-group">
    <button type="button" class="btn btn-primary" width = "100%" data-toggle = "tooltip" data-placement = "top" title = "Add Entry to Table">
        <a data-toggle = "modal" data-target = "#AddModal" style = color:white>Add</a>
    </button>
    <button type="button" class="btn btn-primary" width = "100%" data-toggle = "tooltip" data-placement = "top" title = "Remove Entry from Table">
        <a data-toggle = "modal" data-target = "#RemoveModal" style = color:white onclick = "delete();">Remove</a>
    </button>
</div>

<p position = relative top = "200px" align = 'center'>Using the buttons provided, select a function to perform on the data displayed below. Note: Any changes you make to the data below will also be carried over to the master table on the Home Page.</p>
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
                <form method = "get" action = "DataStudent.php">
                    <h2>Name</h2><br>
                    <input type = "text" name = "StudentName"><br>
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
                    <h2>Class</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <h2>Book</h2><br>
                    <input type = "text" name = "BookTitle"><br>
                    <input type = "submit" value = "click" name = "submit">
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
                <form method = "get" action = "DataStudent.php">
                    <h2>Name</h2><br>
                    <input type = "text" name = "StudentName"><br>
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
                    <input href = "DataStudent.php" type = "submit" value = "click" name = "submit1">
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php">
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
                    <h2>Student Name</h2><br>
                    <input type = "text" name = "StudentName"><br>
                    <input type = "submit" value = "click" name = "submit2">
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php">
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
                    <h2>Student Image</h2><br>
                    <input type = "text" name = "StudentImage"><br>
                    <input type = "submit" value = "click" name = "submit2">
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
                <form method = "get" action = "DataStudent.php">
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
                    <h2>Class Title</h2><br>
                    <input type = "text" name = "ClassTitle"><br>
                    <input type = "submit" value = "click" name = "submit2">
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
                <form method = "get" action = "DataStudent.php">
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
                    <h2>Book Title</h2><br>
                    <input type = "text" name = "BookTitle"><br>
                    <input type = "submit" value = "click" name = "submit2">
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
                <h5 class="modal-title">Update Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php">
                    <h2>ID</h2><br>
                    <input type = "text" name = "id"><br>
                    <h2>Book Image</h2><br>
                    <input type = "text" name = "BookImage"><br>
                    <input type = "submit" value = "click" name = "submit2">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
        #echo "Current Student Data";
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
            s.StudentName,
            s.ClassTitle,
            s.BookTitle
        FROM
            SavviorSchool s
        ";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $data = $dbh->query($q, PDO::FETCH_ASSOC);

        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        #echo "Connected successfully";

        foreach ($data as $entry) {
            $results [] = $entry;
        }


        if(isset($_GET['submit'])){
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

            if(!isset($_GET['reload'])){
                echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
            }

            #https://www.codeproject.com/Articles/8681/Uploading-Downloading-Pictures-to-from-a-SQL-Serve
        }

        if(isset($_GET['submit1'])){
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

            if(!isset($_GET['reload'])){
                echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
            }
        }

        if(isset($_GET['submit2'])){
            edit();
        }

        /****************************************************************
         * EDIT DESIGNATED STUDENT VALUES
         ****************************************************************/
        function edit()
        {
            if($_GET['StudentName']){
                $name = $_GET['StudentName'];
            }

            if($_GET['id']){
                $id = $_GET['id'];
            }else{
                $id = null;
            }

            if($_GET['ClassTitle']){
                $class = $_GET['ClassTitle'];
            }

            if($_GET['BookTitle']){
                $book = $_GET['BookTitle'];
            }

            $username = "sa";
            $password = "capcom5^";

            $changeData[] = $id;
            $sql = ("UPDATE SavviorSchool 
                    SET StudentName = '$name', ClassTitle = '$class', BookTitle = '$book' 
                    WHERE ID = '$id'");

            $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->exec($sql);

            #Refresh page one time after executing
            if(!isset($_GET['reload'])){
                echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
            }

        }


        echo "<table align = 'center' width = '70%'><tr>";

        echo "<td width = '15%'><u>ID</u></td>";
        echo "<td width = '15%'><u>Student Name</u></td>";
        echo "<td width = '20%'><u>Student Image</u></td>";
        echo "<td width = '15%'><u>Class Title</u></td>";
        echo "<td width = '15%'><u>Book Title</u></td>";
        echo "<td width = '20%'><u>Book Image</u></td>";
        echo "</tr><tr>";


        foreach ($results as $val) {
            $key = $val['ID'];
            echo "<td>" . $val['ID'] . "</td>";
            if (!array_key_exists($key, $reportData)) {
                $returnData[$key] = array(
                    'StudentName' => $val['StudentName'],
                    'ClassTitle' => $val['ClassTitle'],
                    'BookTitle' => $val['BookTitle']
                );
            }
            echo "<td>" . $returnData[$key]['StudentName'] . "</td>";
            echo "<td>" /*. $returnData[$key]['StudentImage'] */. "</td>";
            echo "<td>" . $returnData[$key]['ClassTitle'] . "</td>";
            echo "<td>" . $returnData[$key]['BookTitle'] . "</td>";
            echo "<td>" /*. $returnData[$key]['BookImage']*/ . "</td>";
            echo "</tr><tr>";
        }
        echo "</tr></table>";


?>
<br/>
<br/>
<br/>
<br/>


<!--
    Update button
-->
<div align = "center" class = "dropdown">
    <select id='selUser'>
        <option value = '0' href="#" data-toggle = "modal" data-target = "#">Select Option</option>
        <option value = '1' href="#" data-toggle = "modal" data-target = "#UpdateStudentNameModal">Student Name</option>
        <option value = '2' href="#" data-toggle = "modal" data-target = "#UpdateStudentImageModal">Student Image</option>
        <option value = '3' href="#" data-toggle = "modal" data-target = "#UpdateClassTitleModal">Class Title</option>
        <option value = '4' href="#" data-toggle = "modal" data-target = "#UpdateBookTitleModal">Book Title</option>
        <option value = '5' href="#" data-toggle = "modal" data-target = "#UpdateBookImageModal">Book Image</option>
    </select>

    <button class="btn btn-primary" type="button" data-toggle = "tooltip" data-placement = "top" title = "Update Entry in Table" data-target = $modalTarget>Update</button><br/>
</div>

</body>
</html>