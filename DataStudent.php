<!DOCTYPE html>
<html lang="en">

<head>
    <h1 align = "center"><u><b></b>
            Savvior School District</b></u></h1>
    <title>Student</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
    header{
        color: darkblue;
    }

    button{
        color: red;
        width: 100%;
    }

    .btn-group{
        color: red;
        width: 100%;
    }

    h2{
        color: navy;
    }


</style>

<body>

<!--
    In this section, display the Student Table data and provide buttons to add, edit, and delete
-->

<h2 align = "center"><u><b>Student Data</b></u></h2>

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
    <button type="button" class="btn btn-primary" width = "100%" data-toggle = "tooltip" data-placement = "top" title = "Add Entry to Table">Add</button>
    <button type="button" class="btn btn-primary" width = "100%" data-toggle = "tooltip" data-placement = "top" title = "Remove Entry from Table">Remove</button>
</div>

<!--
    Update button, to be added to each row of the table to specify which item to update
-->
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" data-toggle = "tooltip" data-placement = "top" title = "Update Entry in Table">Update
        <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <li><a href="#">Student Name</a></li>
        <li><a href="#">Student Image</a></li>
        <li><a href="#">Class Title</a></li>
        <li><a href="#">Book Title</a></li>
        <li><a href="#">Book Image</li>
    </ul>
</div>

<!--
    Modal intended upon taking in input to be added to the table
-->
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Student Input</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please input the necessary data for the student you wish to update/create.</p>
                <textarea rows = "1" cols = "50">

                </textarea>
                <textarea rows = "1" cols = "50">

                </textarea>
                <textarea rows = "1" cols = "50">

                </textarea>
                <img src = "" alt = "" height = "" width = "">
                <img src = "" alt = "" height = "" width = "">
                <div class = "dropdown">
                    <button class = "btn btn-secondary dropdown-toggle" type = "button" id = "dropdownMenuButton" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                        Select Type
                    </button>
                    <div class = "dropdown-menu" aria-labelledby = "dropdownMenuButton">
                        <a class = "dropdown-item" href = "#">Student</a>
                        <a class = "dropdown-item" href = "#">Book</a>
                        <a class = "dropdown-item" href = "#">Class</a>
                        <a class = "dropdown-item" href = "#">Student Photo</a>
                        <a class = "dropdown-item" href = "#">Book Photo</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php

    echo "Current Student Data";
    $i = 0;

    $servername = "10.99.100.54";
    $username = "sa";
    $password = "capcom5^";
    $dbname = "ryan_intern";

    $q = "
        SELECT
            s.ID
            s.StudentName
            s.ClassTitle
            s.BookTitle
        FROM
            SavviorSchool s
        ";

    $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
    $results = $dbh->query($q, PDO::FETCH_ASSOC);

    $conn = new mysqli($servername, $username, $password);
    if($conn->connect_error){
        die("Connection ailed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $count = count($results);
    echo "<table align = 'center' width = '70%'><tr>";

    for($i = 0; $i < $count; $i++){
        if(($i % 4) == 0 && ($i != 0)){
            echo "</tr><tr>";
        }
        echo "<td>".$results[$i]."</td>";
    }

    echo "</tr></table>";
?>


</body>
</html>