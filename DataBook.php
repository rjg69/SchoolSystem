<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <h1 align = "center"><u><b></b>
            Savvior School District</b></u></h1>
</head>


<body>

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

<!--
    In this section, display the Student Table data and provide buttons to add, edit, and delete
-->

<h2 align = "center"><u><b>Book Data</b></u></h2>

<ul class="nav nav-tabs">
    <li class="active">
        <a href="ManagementSystem.php">Home Page</a>
    </li>
    <li>
        <a href="DataStudent.php">Student</a>
    </li>
    <li>
        <a href="DataBook.php">Book</a>
    </li>
    <li>
        <a href="DataClass.php">Class</a>
    </li>
</ul>

<!--
    Add button & delete button
-->
<div class="btn-group">
    <button type="button" class="btn btn-primary" width = "100%">Add</button>
    <button type="button" class="btn btn-primary" width = "100%">Remove</button>
</div>

<!--
    Update button
-->
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Update
        <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <li><a href="#">Name</a></li>
        <li><a href="#">Photo</a></li>
        <li><a href="#">Class Title</a></li>
        <li><a href="#">Book Title</a></li>
    </ul>
</div>


<?php

    echo "Current Book Data";
    $i = 0;

    $q = "
        SELECT
            s.ID
            s.ClassTitle
            s.BookTitle
            s.BookImage
        FROM
            SavviorSchool s
        ";

    $stmt = $this->dbh->prepare($q);
    $stmt->execute();
    $results = $stmt->fetchAll();

    $count = count($results);
    echo "<table><tr>";

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