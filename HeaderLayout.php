<html lang = "en">
<?php
session_start();

if(!array_key_exists('Username', $_SESSION)){
    header('Location: http://testproject.test/LoginPage.php');
}
?>
<!--
    Add style conventions using CSS

    https://www.w3schools.com/html/tryit.asp?filename=tryhtml_responsive_media_query3 --Responsive Web Example
-->
<style>

    * {
        box-sizing:border-box;
    }

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
        padding: 0;
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
        font-size: 2vw;
    }

    td{
        text-align: center;
    }

    p{
        color: black;
        font-size: 0.75vw;
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
        left: 0;
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
        align-self: center;
    }


    .left {
        padding:20px;
        float:left;
    }

    .main {
        padding:20px;
        float:left;
    }

    .right {
        padding:20px;
        float:left;
    }

    .first{
        padding: 5px;
        float: left;
        width: 3%;
    }

    .second{
        padding: 5px;
        float: left;
        width: 4%;
    }

    .third{
        padding: 5px;
        float: left;
        width: 3%;
    }

    .fourth{
        padding: 5px;
        float: left;
        width: 3%;
    }

    .fifth{
        padding: 5px;
        float: left;
        width: 3%;
    }

    @media screen and (max-width: 800px){
        .first, .second, .third, .fourth, .fifth, .btn-toolbar{
            width: 100%;
            text-align: center;
        }
    }

    #container{
        width: 100px;
        height: 100px;
        position: relative;
    }

    #pickfiles, #uploadfiles{
        width: 100%;
        height: 100%;
        position: absolute;
        top:0;
        left: =;
    }

    #uploadfiles{
        z-index: 10;
    }

    .btn-group{
        width: 5%;
        float: left;
    }

    .btn-group-justified{
        text-align: center;
    }



</style>

<header>
    <h1 align = "center" style = "font-size: 2.5vw;"><u><b>Savvior School District</b></u></h1>

    <title>Savvior School District</title>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <!--Carousel CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <!--Kendo CSS-->
    <link rel="stylesheet" href="vendor/savvior/kendoui/public/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="vendor/savvior/kendoui/public/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="vendor/savvior/kendoui/public/styles/kendo.default.mobile.min.css" />

    <!--jQuery-->
    <script src = "http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.js"></script>
    <script src = "http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--Form Validator-->
    <script src = "//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src = "http://malsup.github.com/jquery.form.js"></script>
    <script src = "https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src = "https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script src = "https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
    <script src = "https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>

    <!--Bootstrap-->
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--Plupload-->
    <script type = "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.2/plupload.full.min.js"></script>

    <!--Kendo-->
    <script src = "/vendor/savvior/kendoui/public/js/kendo.all.min.js"></script>

    <!--OWL-->
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

    <!--jQuery Form Validation-->
    <script>
        $(document).ready(function () {

            $('#AddModal').validate({ // initialize the plugin
                rules: {
                    field1: {
                        required: true,
                        email: true
                    },
                    field2: {
                        required: true,
                    }
                }
            });


            $('#RemoveModal').validate({ // initialize the plugin
                rules: {
                    field1: {
                        required: true,
                        email: true
                    },
                    field2: {
                        required: true,
                    }
                }
            });


            $('#UpdateStudentNameModal').validate({ // initialize the plugin
                rules: {
                    field1: {
                        required: true,
                        email: true
                    },
                    field2: {
                        required: true,
                    }
                }
            });


            $('#UpdateStudentImageModal').validate({ // initialize the plugin
                rules: {
                    field1: {
                        required: true,
                        email: true
                    },
                    field2: {
                        required: true,
                    }
                }
            });

        });

        /*
          function validate(contact){
          var form = document.contact,
              name = form.name.value,
              email = form.email.value,
              message = form.message.value;

          if (name.length == 0 || name.length > 200) {
            alert ("You must enter a name.");
            return false;
          }

          if (email.length == 0 || email.length > 200) {
            alert ("You must enter a email.");
            return false;
          }

          if (message.length == 0) {
            alert ("You must enter a message.");
            return false;
          }

          return true;
        }
         */
    </script>

    <script>
        $("form").validate({
            lang: 'es'
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

<div class = "first">
    <a href="ManagementSystem.php" class = "first" data-toggle = "tooltip" data-placement = "top" title = "View All Data">Home</a>
</div>
<div class = "second">
    <a href="DataStudent.php" class = "second" data-toggle = "tooltip" data-placement = "top" title = "View Student Data">Student</a>
</div>
<div class = "third">
    <a href="DataBook.php" class = "third" data-toggle = "tooltip" data-placement = "top" title = "View Book Data">Book</a>
</div>
<div class = "fourth">
    <a href="DataClass.php" class = "fourth" data-toggle = "tooltip" data-placement = "top" title = "View Class Data">Class</a>
</div>
<div class = "fifth">
    <a href = "DataClassroom.php" class = "fifth" data-toggle = "tooltip" data-placement = "top" title = "View Classroom Data">Classroom</a>
</div>
<hr width = 100%>

<div class='btn-toolbar'>
    <div class='btn-group-justified'>
        <a href = "Logout.php" class='btn btn-primary' id = 'Logout' title = 'Logout'>Logout</a>
        <a href = "excExp.php" class='btn btn-primary' name = 'ExcelExport' id = 'ExcelExport' title = 'Excel Export'>Export Excel</a>
        <a href = "textExp.php" class='btn btn-primary' name ='TextExport' id = 'TextExport' title = 'Text Export'>Export Text</a>
    </div>
</div>

<br />
</body>