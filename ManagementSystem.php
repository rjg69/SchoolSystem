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
     * GET INPUT FROM THE USER
     ****************************************************************/
    public function getInput(){
        /*Pull data from the Bootstrap Modal to be send into the necessary function*/
        $input = array();

    }


    /****************************************************************
     * REMOVE ALL VALUES ASSOCIATED WITH A GIVEN ID TO BE REMOVED
     ****************************************************************/
    public function delete($input){
        /*Delete all data in the table row if specified by the Bootstrap Modal input*/
        $changeData[] = $input;
        if($input['type'] == 'student'){
            foreach($input as $key => $object){
                $this->execQuery(
                    "DELETE FROM SavviorSchool WHERE 'ID' = :name;",
                    array(
                        ':name' => $object['StudentName']
                    )
                );
            }
        }
        if($input['type'] == 'book'){
            foreach($input as $key => $object){
                $this->execQuery(
                    "DELETE FROM SavviorSchool WHERE 'ID' = :name;",
                    array(
                        ':name' => $object['BookTitle']
                    )
                );
            }
        }
        if($input['type'] == 'class'){
            foreach($input as $key => $object){
                $this->execQuery(
                    "DELETE FROM SavviorSchool WHERE 'ID' = :name;",
                    array(
                        ':name' => $object['ClassTitle']
                    )
                );
            }
        }
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
     * INSERT ALL DATA PROVIDED INTO THE TABLE
     ****************************************************************/
    public function add($input){
        /*Add all data in the table if specified by the Bootstrap Modal input*/
        $changeData[] = $input;
        if($input['type'] == 'student'){
            foreach($input as $key => $object){
                $this->execQuery(
                    "INSERT INTO SavviorSchool VALUES(StudentName, ID)",
                    array(
                        $this['StudentName'] = $object['StudentName'],
                        $this['ID'] = $object['ID']
                    )
                );
            }
        }else if($input['type'] == 'book'){
            foreach($input as $key => $object) {
                $this->execQuery(
                    "INSERT INTO SavviorSchool VALUES(BookTitle, ID)",
                    array(
                        $this['BookTitle'] = $object['BookTitle'],
                        $this['ID'] = $object['ID']
                    )
                );
            }
        }else if($input['type'] == 'class'){
            foreach($input as $key => $object){
                $this->execQuery(
                    "INSERT INTO SavviorSchool VALUES(ClassTitle, ID)",
                    array(
                        $this['ClassTitle'] = $object['ClassTitle'],
                        $this['ID'] = $object['ID']
                    )
                );
            }
        }else if($input['type'] == 'studentPhoto'){
            foreach($input as $key => $object){
                $this->execQuery(
                    "INSERT INTO SavviorSchool VALUES(StudentPhoto)",
                    array(
                        $this['StudentPhoto'] = $object['StudentPhoto']
                    )
                );
            }
        }else if($input['type'] == 'bookPhoto'){
            foreach($input as $key => $object){
                $this->execQuery(
                    "INSERT INTO SavviorSchool VALUES(BookPhoto)",
                    array(
                        $this['BookPhoto'] = $object['BookPhoto']
                    )
                );
            }
        }

    }

    /****************************************************************
     * ALTER DATA IN THE LIST WITH THE CORRESPONDING KEY VALUE
     ****************************************************************/
    public function edit($input){
        $this->dbh->beginTransaction();

        $this->execQuery( "UPDATE SavviorSchool SET WHERE id = :id",
            array(
                ':id' => $input['key']['ID'],
                ':studName' => $input['key']['StudentName'],
                ':classTitle' => $input['key']['ClassTitle'],
                ':bookTitle' => $input['key']['BookTitle'],
                ':studImage' => $input['key']['StudentImage'],
                ':bookImage' => $input['key']['BookImage']
            )
        );

        $this->dbh->commit();
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
<header>
    <h1 align = "center"><u><b></b>
        Savvior School District</b></u></h1>
    <title>Savvior School District</title>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script scr = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</header>

<body>

<h2 align = "center">Home Page</h2>

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
<p>  </p>
<p>From the list above, select the data type with which you plan to work and follow the instructions on the subsequent page.</p>

</body>

</html>