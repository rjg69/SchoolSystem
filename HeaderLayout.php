<html lang = "en">
<?php
session_start();

if(!array_key_exists('Username', $_SESSION)){
    header('Location: http://testproject.test/LoginPage.php');
}
?>
<!--
Assignment #1 - Design a management system for a school, where a school administrator can schedule students, classes, and books.
        Ability to add, edit, and delete students, classes, and books.
        Ability to add and remove students from their classes.
        Ability to add and remove books from classes (one book per class)
        Ability to upload student and book photos
        Add/Edit/Delete functionality for a single table
        Add/Edit/Delete functionality for 2 tables with foreign keys in second table
        Add/Edit/Delete functionality for 3 tables, one of which will be a join table
        This should use PDO and MySQL
        Build your HTML interfaces using Bootstrap (http://getbootstrap.com)
            Implement table, button, and panel classes
            Implement Modal Windows
            Implement Tooltips
            Implement tabs

            Input using Bootstrap:
            https://www.w3schools.com/bootstrap/bootstrap_forms_inputs.asp

-->
<!--
    Add style conventions using CSS
-->
<style>
    header{
        color: darkblue;
    }

    button{
        background-color: darkred;
        color: white;
        width: 100%;
    }

    .modal-footer{
        color: white;
        background-color: darkred;
    }

    .modal-header{
        color: white;
        background-color: #1775B3;
    }

    .btn-toolbar{
        width: 33.59%;
    }

    .btn-group{
        color: white;
        background-color: #1775B3;
        width: 100%;
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
        text-align: center;
        top: 25px;
        color: navy;
        left: 0%;
    }

    .carousel-inner>.item>img{
        margin:auto;
    }

    .carousel-indicators{
        position: relative;
        top: 5%;
    }

    .carousel{
        height: 27%;
        width: 60%;
        position: relative;
        top: 25px;
        align: center;
    }

</style>

<header>
    <h1 align = "center"><u><b>Savvior School District</b></u></h1>

    <title>Savvior School District</title>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">


    <link rel="stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">


    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script scr = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/vendors/jquery.min.js"></script>
    <script src="../assets/owlcarousel/owl.carousel.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#LoginModal').modal('show');
        });
    </script>
</header>

<body>

<h2 align = "center"><u>Home Page</u></h2>

<!--
    Tabs
-->
<ul class="nav nav-tabs">
    <li class="active">
        <a href="ManagementSystem.php" data-toggle = "tooltip" data-placement = "top" title = "View All Data">Home Page</a>
    </li>
    <li>
        <a href="DataStudent.php" data-toggle = "tooltip" data-placement = "top" title = "View Student Data">Student</a>
    </li>
    <li>
        <a href="DataBook.php" data-toggle = "tooltip" data-placement = "top" title = "View Book Data">Book</a>
    </li>
    <li>
        <a href="DataClass.php" data-toggle = "tooltip" data-plaement = "top" title = "View Class Data">Class</a>
    </li>
</ul>
<div class='btn-toolbar pull-right'>
    <div class='btn-group'>
        <a href = "Logout.php" class='btn btn-primary' id = 'Logout' title = 'Logout'>Logout</a>
    </div>
</div>
<div class='btn-toolbar pull-right'>
    <div class='btn-group'>
        <button type='button' class='btn btn-primary' name = 'ExcelExport' id = 'ExcelExport' title = 'Excel Export'>Export Excel File</button>
    </div>
</div>
<div class='btn-toolbar pull-right'>
    <div class='btn-group'>
        <button type='button' class='btn btn-primary' name ='TextExport' id = 'TextExport' title = 'Text Export'>Export Text File</button>
    </div>
</div>

<br />
</body>