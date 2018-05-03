<!DOCTYPE html>
<html lang="en">

<head>
    <title>Class</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<!--
    In this section, display the Student Table data and provide buttons to add, edit, and delete
-->

<h2 align = "center"><u><b>Class Data</b></u></h2>

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
    <button type="button" class="btn btn-primary" onclick = "add($input)">Add</button>
    <button type="button" class="btn btn-primary" onclick = "delete($input)">Remove</button>
</div>

<!--
    Update button
-->
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Update
        <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <li><a href="#">Class Title</a></li>
        <li><a href="#">Book Title</a></li>
    </ul>
</div>


<?php
include("conn.php");
//$query = "select field1, fieldn from table [where clause][group by clause][order by clause][limit clause]";

$query = "SELECT 
            s.ClassTitle
            s.ID
          FROM
            SavviorSchool s";
$result = conn($query);
if (($result)||(mysql_errno == 0))
{
    echo "<table width='100%'><tr>";
    if (mysql_num_rows($result)>0)
    {
        //loop thru the field names to print the correct headers
        $i = 0;
        while ($i < mysql_num_fields($result))
        {
            echo "<th>". mysql_field_name($result, $i) . "</th>";
            $i++;
        }
        echo "</tr>";

//display the data
        while ($rows = mysql_fetch_array($result,MYSQL_ASSOC))
        {
            echo "<tr>";
            foreach ($rows as $data)
            {
                echo "<td align='center'>". $data . "</td>";
            }
        }
    }else{
        echo "<tr><td colspan='" . ($i+1) . "'>No Results found!</td></tr>";
    }
    echo "</table>";
}else{
    echo "Error in running query :". mysql_error();
}
?>

</body>
</html>