<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
         input{margin-left: 45%;}
         h1{margin-left: 35%;text-shadow: 0px 0px 2px  black ;}
         #span1{ color:green; margin-left: 42.5%; text-shadow: 1px 1px  10px green ;}
         #span2{ color:red; margin-left: 42.5%; text-shadow: 1px 1px  10px red ;}
         table{margin-left: 22%;box-shadow: 5px 6px 5px 1px black ; margin-top: 60px;}
         th{box-shadow: 2px 2px 5px 1px black ;text-shadow: 0px 0px 2px  black ;}
         tr{box-shadow: 1px 1px 5px 1px black;text-shadow: 0px 0px 0.9px  rebeccapurple ;}
         td{box-shadow: 1px 1px 5px 1px black;}

        </style>
<body>
    <form action="" method="post">
        <input type="submit" name="submit">
    </form>
</body>
</html>
<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    echo "<table>";
    echo "<tr><th>id</th><th>lastname</th><th>firstname</th><th>email</th></tr>";
    class Myselect extends RecursiveIteratorIterator{
        function __construct($const){
            parent::__construct($const,self::LEAVES_ONLY);
        }
        function current(){
            return "<th style='width:150px;'>".parent::current()."</th>";
        }
        function beginChildren(){
            echo "<tr>";
        }
        function endChildren(){
            echo "</tr>"."\n";
        }
    }

    try{
        $con=new PDO("mysql:host=localhost;dbname=test","SAMIR","samir123");
        $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
         

        $select = $con->prepare("SELECT * FROM data1 ORDER BY firstname");
        $select->execute();
        $select->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new Myselect(new RecursiveArrayIterator($select->fetchAll()))as $key => $value ){
            echo $value;
        }
        $con= null;


        echo "<span id='span1'> * IS CONNECT * </span>";

        




    }
    catch(PDOException $e){
            echo "<span id='span2'>note COONECT</span>".$e->getMessage();
        }
        echo "</table>";
}
?>