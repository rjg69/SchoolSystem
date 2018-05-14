<html>
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
    <!--
        Export to Text
    -->
    <form method = "post">
        <h3>Please Enter the Filename:</h3>
        <input type = "text" name = "filenameText">
        <input type = "submit" value = "Submit" name = "submitt">
    </form>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: savvior-intern2
 * Date: 5/11/2018
 * Time: 10:30 AM
 */

require ('vendor/autoload.php');


/*******************************************
 * Export to text file
 *******************************************/

if (isset($_POST['submitt'])) {

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

    $filename = $_POST['filenameText'];

    $fp = fopen($filename. '.csv', "w");

    foreach ($returnData as $entry) {
        fputcsv($fp, $entry);
    }

    fclose($fp);

    header("Content-type: text/csv; name='text'");
    header("Content-Disposition: attachment; filename= " . $filename . ".csv");
    header("Pragma: no-cache");
    header("Expires: 0");

}
?>