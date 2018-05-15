<html>
    <header>
        <h1 align = "center" style = 'color:navy'><u><b>Savvior School District</b></u></h1>

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

    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>

    <body>
        <!--
            Export to Excel
        -->
        <form method = "post" action = "excDownload.php">
            <h3>Please Enter the Filename:</h3>
            <input type = "text" name = "filenameText">
            <input type = "submit" value = "Submit" data-toggle="modal" data-target=".bs-example-modal-lg" name = "submite">
        </form>


        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h2>Congratulations!</h2><br/>
                    <p>Your data successfully exported to an Excel file!</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" width = "100%" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <br/>
        <br/>
        <br/>
        <img class = "center" src = "SchoolPhotos\SchoolLogo.png">
</html>