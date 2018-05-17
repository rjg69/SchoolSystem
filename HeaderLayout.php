<html lang = "en">
<?php
session_start();

if(!array_key_exists('Username', $_SESSION)){
    header('Location: http://testproject.test/LoginPage.php');
}
?>
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
    }

    .modal-footer{
        color: white;
        background-color: darkred;
    }

    .modal-header{
        color: white;
        background-color: #1775B3;
    }

    .dropbtn {
        background-color: #1775B3;
        color: white;
        font-size: 16px;
        border: none;
        cursor: pointer;
        height: 34px;
    }

    .dropbtn:hover, .dropbtn:focus {
        background-color: #1775B8;
    }

    #myInput {
        border-box: box-sizing;
        background-image: url('searchicon.png');
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 10px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    #myInput:focus {outline: 3px solid #ddd;}

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f6f6f6;
        min-width: 230px;
        overflow: auto;
        border: 1px solid #ddd;
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }


    .dropdown a:hover {background-color: #ddd}

    .show {display:block;}

    .btn-group{
        color: white;
        background-color: #1775C3;
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
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>


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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script type="text/javascript" src="js/plupload.full.min.js"></script>
    <script src = "http//cdn.kendostatic.com/2014.2.903/js/jquery.min.js"></script>
    <script src = "http://cdn.kendostatic.com/2014.2.903/js/kendo.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function(){
            $('#LoginModal').modal('show');
        });

        $('.js-data-example-ajax').select2({
            ajax: {
                url: 'https://api.github.com/search/repositories',
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });
    </script>
    <script>
        // jQuery not really required, it's here to overcome an inability to pass configuration options to the fiddle remotely
        $(document).ready(function() {
            // Custom example logic
            function $(id) {
                return document.getElementById(id);
            }

            var uploader = new plupload.Uploader({
                runtimes : 'html5,flash,silverlight,html4',
                browse_button : 'pickfiles', // you can pass in id...
                container: $('container'), // ... or DOM Element itself
                max_file_size : '10mb',

                // Fake server response here
                // url : '../upload.php',
                url: "/echo/json",

                flash_swf_url : 'http://rawgithub.com/moxiecode/moxie/master/bin/flash/Moxie.cdn.swf',
                silverlight_xap_url : 'http://rawgithub.com/moxiecode/moxie/master/bin/silverlight/Moxie.cdn.xap',
                filters : [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"}
                ],

                init: {
                    PostInit: function() {
                        $('filelist').innerHTML = '';

                        $('uploadfiles').onclick = function() {
                            uploader.start();
                            return false;
                        };
                    },

                    FilesAdded: function(up, files) {
                        plupload.each(files, function(file) {
                            $('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                        });
                    },

                    UploadProgress: function(up, file) {
                        $(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                    },

                    Error: function(up, err) {
                        $('console').innerHTML += "\nError #" + err.code + ": " + err.message;
                    }
                }
            });

            uploader.init();
        });

    </script>
    <script>
        // jQuery not really required, it's here to overcome an inability to pass configuration options to the fiddle remotely
        $(document).ready(function() {
            // Custom example logic
            function $(id) {
                return document.getElementById(id);
            }

            var uploader = new plupload.Uploader({
                runtimes : 'html5,flash,silverlight,html4',
                browse_button : 'pickfiles', // you can pass in id...
                container: $('container'), // ... or DOM Element itself
                max_file_size : '10mb',

                // Fake server response here
                // url : '../upload.php',
                url: "/echo/json",

                flash_swf_url : 'http://rawgithub.com/moxiecode/moxie/master/bin/flash/Moxie.cdn.swf',
                silverlight_xap_url : 'http://rawgithub.com/moxiecode/moxie/master/bin/silverlight/Moxie.cdn.xap',
                filters : [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"}
                ],

                init: {
                    PostInit: function() {
                        $('filelist').innerHTML = '';

                        $('uploadfiles').onclick = function() {
                            uploader.start();
                            return false;
                        };
                    },

                    FilesAdded: function(up, files) {
                        plupload.each(files, function(file) {
                            $('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                        });
                    },

                    UploadProgress: function(up, file) {
                        $(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                    },

                    Error: function(up, err) {
                        $('console').innerHTML += "\nError #" + err.code + ": " + err.message;
                    }
                }
            });

            uploader.init();
        });

    </script>
    <script>
        $.validate({
            lang: 'es'
        });
    </script>
    <script>
        $(function(){
            //bind 'addForm' and provide simple callback function
            $('#addForm').ajaxForm(function(){
                alert("Submission Successful!");
            });
        });
    </script>
    <script>
        $(function(){
            //bind 'removeForm' and provide simple callback function
            $('#removeForm').ajaxForm(function(){
                alert("Submission Successful!");
            });
        });
    </script>
    <script>
        $(function(){
            //bind 'updateForm' and provide simple callback function
            $('#updateForm').ajaxForm(function(){
                alert("Submission Successful!");
            });
        });
    </script>
</header>

<body>

<!--
    Tabs
-->
<ul class="nav nav-tabs">
    <li>
        <a href="ManagementSystem.php" data-toggle = "tooltip" data-placement = "top" title = "View All Data">Home Page</a>
    </li>
    <li>
        <a href="DataStudent.php" data-toggle = "tooltip" data-placement = "top" title = "View Student Data">Student</a>
    </li>
    <li>
        <a href="DataBook.php" data-toggle = "tooltip" data-placement = "top" title = "View Book Data">Book</a>
    </li>
    <li>
        <a href="DataClass.php" data-toggle = "tooltip" data-placement = "top" title = "View Class Data">Class</a>
    </li>
    <li>
        <a href = "DataClassroom.php" data-toggle = "tooltip" data-placement = "top" title = "View Classroom Data">Classroom</a>
    </li>
</ul>

<div class='btn-toolbar pull-right'>
    <div class='btn-group'>
        <a href = "Logout.php" class='btn btn-primary' id = 'Logout' title = 'Logout'>Logout</a>
    </div>
</div>
<div class='btn-toolbar pull-right'>
    <div class='btn-group'>
        <a href = "excExp.php" class='btn btn-primary' name = 'ExcelExport' id = 'ExcelExport' title = 'Excel Export'>Export Excel File</a>
    </div>
</div>
<div class='btn-toolbar pull-right'>
    <div class='btn-group'>
        <a href = "textExp.php" class='btn btn-primary' name ='TextExport' id = 'TextExport' title = 'Text Export'>Export Text File</a>
    </div>
</div>

<br />
</body>