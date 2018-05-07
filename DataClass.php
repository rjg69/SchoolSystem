<!DOCTYPE html>
<html lang="en">

<head>
    <h1 align = "center"><u><b>
            Savvior School District</b></u></h1>
    <title>Class</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<!--
    Add style conventions using CSS
-->
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

    table{
        position: relative;
        top: 20px;
    }


</style>

<body>

<!--
    In this section, display the Class Table data and provide buttons to add, edit, and delete
-->

<h2 align = "center"><u>Class Data</u></h2>

<ul class="nav nav-tabs">
    <li>
        <a href="ManagementSystem.php" data-toggle = "tooltip" data-placement = "top" title = "Return to Home Page">Home Page</a>
    </li>
    <li>
        <a href="DataStudent.php" data-toggle = "tooltip" data-placement = "top" title = "View Student Data">Student</a>
    </li>
    <li>
        <a href="DataBook.php" data-toggle = "tooltip" data-placement = "top" title = "View Book Data">Book</a>
    </li>
    <li class = "active">
        <a href="DataClass.php" data-toggle = "tooltip" data-plaement = "top" title = "View Class Data">Class</a>
    </li>
</ul>

<!--
    Add button & delete button
    TODO: Update onclick functino variables
-->
<div class="btn-group">
    <button type="button" class="btn btn-primary" width = "100%" data-toggle = "tooltip" data-placement = "top" title = "Add Entry to Table" onclick = "ManagementSystem.php?add()">Add</button>
    <button type="button" class="btn btn-primary" width = "100%" data-toggle = "tooltip" data-placement = "top" title = "Remove Entry from Table" onclick = "ManagementSystem.php?delete()">Remove</button>
</div>

<!--
    Update button
-->
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" data-toggle = "tooltip" data-placement = "top" title = "Update Entry in Table">Update
        <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <li><a href="#">Class Title</a></li>
        <li><a href="#">Book Title</a></li>
    </ul>
</div>

<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php

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
    if($conn->connect_error){
        die("Connection ailed: " . $conn->connect_error);
    }
    #echo "Connected successfully";

    foreach($data as $entry){
        $results [] = $entry;
    }

    echo "<table align = 'center' width = '70%'><tr>";

    echo "<td width = '25%'><u>ID</u></td>";
    echo "<td width = '25%'><u>Class Title</u></td>";
    echo "<td width = '25%'><u>Book Title</u></td>";
    echo "<td width = '25%'><u>Book Image</u></td>";
    echo "</tr><tr>";

    foreach($results as $val){
        $key = $val['ID'];
        echo "<td>" . $val['ID'] . "</td>";
        if(!array_key_exists($key, $reportData)){
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
?>

</body>
</html>