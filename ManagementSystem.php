<html lang = "en">
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



<?php

class savviorSchool{

    private $tableData;
    private $changeData;
    private $input;


    /****************************************************************
     * PULL ALL DATA FROM TEH DESIGNATED TABLE
     ****************************************************************/
    public function getTableData(){
        #type is the student, class, or book
        #input is the student name, class name, or book title
        $tableData = array();

        //sql query, properly pulls all data from SavviorSchool
        $q = "SELECT
              s.ID,
              s.StudentName,
              s.ClassTitle,
              s.BookTitle
            FROM
              SavviorSchool s";

        /*Foreign Key Table
         *
         * SELECT
         *      f.ID AS id,
         * FROM
         *      foreignTableStudent/Class
         * INNER JOIN
         *      foreignTableBook AS f ON foreignTableStudent/Class.ID = foreignTableBook.ID;
         *
         */

        /*Join Table
         *
         * SELECT
         *     c.ID as id
         * FROM
         *     classJoin AS c
         * INNER JOIN
         *      studentJoin ON classJoin.ClassID = studentJoin.ClassID
         * INNER JOIN
         *      bookJoin ON classJoin.BookID = bookJoin.BookID;
         */

        $stmt = $this->dbh->prepare($q);
        $stmt->execute();
        $results = $stmt->fetchAll();

        if(count($results) == 0){ throw new Exception('No data returned'); }

        foreach($results as $result){
            $key = $result['ID'];
            if(!array_key_exists($key, $tableData)){
                $tableData[$key] = array(
                    $tableData['StudentName'] = $result['StudentName'],
                    $tableData['ClassTitle'] = $result['ClassTitle'],
                    $tableData['BookTitle'] = $result['BookTitle'],
                    $tableData['StudentImage'] = $result['StudentImage'],
                    $tableData['BookImage'] = $result['BookImage']
                );
            }
        }

        return $tableData;
    }

    /****************************************************************
     * GENERATE LIST OF CHANGES TO USER/BOOK/CLASS DATA
     ****************************************************************/
    public function listChanges($changeData, $oldData){
        /*Track all changes made to the table*/
        $arrChanges = array();
        foreach(array_keys($changeData) as $sku){
            if(!(key_exists($sku, $oldData) || key_exists(trim($sku), $oldData) || key_exists(strtoupper(trim($sku)), $oldData))){
                $arrChanges[] = $sku;
            }
        }

        return $arrChanges;
    }

    /****************************************************************
     * CONSTRUCTOR -- ESTABLISH SQL CONNECTION
     ****************************************************************/
    public function __construct(){
        $this->runTime = date('Y-m-d H:i:s');
        $servername = "10.99.100.54";
        $username = "ryan_intern";
        $password = "intern";
        $dbname = "ryan_intern";

        $this->dbh = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

    }

    /****************************************************************
     * CALL QUERY AND EXECUTE FUNCTION ASSOCIATED
     ****************************************************************/
    private function execQuery($query, $params){
        $errorMessage = '';
        $stmt = $this->dbh->prepare($query);

        $modParams = array();
        foreach($params AS $key => $value){
            $modKey = str_replace('/^:/', '', $key);
            $modParams[$modKey] = $value;
        }

        $stmt->execute($modParams);

        if($stmt->errorCode() != '00000'){
            $errorInfoMessage = print_r($stmt->errorInfo(), 1);
            $errorMessage = $errorMessage . "<p> Error Code: $stmt->errorCode() $errorInfoMessage </p>";
            return $errorMessage;
        }

        return null;
    }
}

?>

<style>
    header{
        color: darkblue;
    }

    button{
        color: white;
        background-color: darkred;
        width: 100%;
    }

    .btn-group{
        color: white;
        background-color: darkred;
        width: 100%;
    }

    h2{
        color: navy;
    }

    table{
        position: relative;
        top: 50px;
    }

    p{
        color: navy;
        position: relative;
        top: 20px;
        font-size: x-large;
        text-align: center;
    }



</style>

<header>
    <h1 align = "center"><u><b>
        Savvior School District</b></u></h1>
    <title>Savvior School District</title>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script scr = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</header>

<body>

<h2 align = "center"><u>Home Page</u></h2>

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
<p>  </p>
<p>From the list above, select the data type with which you plan to work and follow the instructions on the subsequent page. A full table containing student, book, and class data can be found below. Reduced views of the data and table manipulation functions can be accessed using the tabs above.</p>

<?php

    /*********************************************
     * https://www.formget.com/login-form-in-php/     sessions example
     *********************************************/

    session_start();

    if(isset($_SESSIONS['login_user'])){
        unset($_SESSIONS['login_user']);
        unset($_SESSIONS['password']);
    }else{

    }





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
            s.StudentImage,
            s.ClassTitle,
            s.BookTitle,
            s.BookImage
        FROM
            SavviorSchool s
        ";

    $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
    $data = $dbh->query($q, PDO::FETCH_ASSOC);

    #Alternative Method of Pulling Data
    #$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    #$data = $dbh->query($q);
    #$sth = $dbh->prepare($q);
    #$sth->execute();
    #$data = $sth->fetch(PDO::FETCH_ASSOC);

    $conn = new mysqli($servername, $username, $password);
    if($conn->connect_error){
        die("Connection ailed: " . $conn->connect_error);
    }
    #echo "Connected successfully ";

    foreach($data as $entry){
        $results [] = $entry;
    }

    echo "<table align = 'center' width = '70%'><tr>";

    echo "<td width = '25%'><u>ID</u></td>";
    echo "<td width = '25%'><u>Student Name</u></td>";
    echo "<td width = '25%'><u>Class Title</u></td>";
    echo "<td width = '25%'><u>Book Title</u></td>";
    echo "</tr><tr>";

    foreach($results as $val){
        $key = $val['ID'];
        echo "<td>" . $val['ID'] . "</td>";
        if(!array_key_exists($key, $reportData)){
            $returnData[$key] = array(
              'StudentName' => $val['StudentName'],
              'ClassTitle' => $val['ClassTitle'],
              'BookTitle' => $val['BookTitle']
            );
        }
        echo "<td>" . $returnData[$key]['StudentName'] . "</td>";
        echo "<td>" . $returnData[$key]['ClassTitle'] . "</td>";
        echo "<td>" . $returnData[$key]['BookTitle'] . "</td>";
        echo "</tr><tr>";
    }
    echo "</tr></table>";



    /*******************************************************
     * Create Class Lists, Ensure 1 Book Per Class
     *******************************************************/
    $classes = array();
    $books = array();

    foreach($returnData as $entry){
          $classes[] = $entry['ClassTitle'];
          $books[] = $entry['BookTitle'];
    }

    ksort($classes);
    ksort($books);

    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    $classBookTie = array();
    $i = 0;
    foreach($classes AS $class){
        $key = $class;
        if(!array_key_exists($key, $classBookTie)){
            $classBookTie[$key] = array(
              'BookTitle' => $books[$i],
            );
        }
        $i = $i + 1;
    }

    foreach($returnData as $result){
        $key = $result['ClassTitle'];
        if(!array_key_exists($key, $classBookTie)){
            if($classBookTie['BookTitle'] != $result['BookTitle']){
                $result['BookTitle'] = $classBookTie['BookTitle'];
            }
        }
    }
?>

</body>

</html>