<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
        <style>
         input{margin-left: 38%;}
         h1{margin-left: 35%;text-shadow: 0px 0px 2px  black ;}
         #span1{ color:green; margin-left: 46%; text-shadow: 1px 1px  10px green ;}
         #span2{ color:red; margin-left: 46%; text-shadow: 1px 1px  10px red ;}
         table{margin-left: 22%;box-shadow: 5px 6px 5px 1px black ;}
         th{box-shadow: 2px 2px 5px 1px black ;text-shadow: 0px 0px 2px  black ;}
         tr{box-shadow: 1px 1px 5px 1px black;text-shadow: 0px 0px 0.9px  rebeccapurple ;}
         td{box-shadow: 1px 1px 5px 1px black;}

        </style>
   
</head>
<body>
    <h1>SELECT WHERE DATA </h1>
    <form action="" method="post">
        <div>
        <input type="text" name="where">
        <button type="submit" name="submit">HWERE</button></div>
    </form>
    
<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    function filterdata($data){
        $data=htmlspecialchars($data);
        $data  =stripslashes($data);
        $data =trim($data);
        return $data;
    }
    $where = filterdata( $_POST['where']);
    echo "<table style='border:3px solid wheat;'>";
    echo "<tr><th>id</th><th>lastname</th><th>firstname</th><th>email</th></tr>";

    class Myselect extends RecursiveIteratorIterator{
        function __construct($const){
            parent::__construct($const,self::LEAVES_ONLY);
        }
        function current(){
            return "<td style='width:150px; border:3px solid wheat;'>".parent::current()."</td>";
        }
        function beginChildren(){
            echo "<tr>";
        }
        function endChildren(){
            echo "</tr>";
        }
    }

    try{
        $con=new PDO("mysql:host=localhost;dbname=test","SAMIR","samir123");
        $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

       $select = $con->prepare("SELECT * FROM data1 WHERE lastname='$where'");
       $select->execute();
       $select->setFetchMode(PDO::FETCH_ASSOC);
       foreach(new Myselect(new RecursiveArrayIterator($select->fetchAll()))as $key => $value){
        echo $value;
       }
       $con = null;
        echo "<span id='span1'>connect</span>";
    }
    catch(PDOException){
        echo "<span id='span2'>note connect</span>".$e->getMessage();
    }
}
?>
</body>
</html>
