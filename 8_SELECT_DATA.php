    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SelectData</title>
        <style>
           
        body{
            width: 100vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
             background-color: #f0f5f5;
            height: 100vh;
            font-size: 25px;}
        th{ box-shadow: 1px 1px 11px 2px red; color: red;}
        #th{box-shadow: 1px 1px 11px 2px black;text-shadow: 0 0 12px blue; text-align: center;}
        p{color: green; text-shadow:  0 0 12px green;position: absolute;left: 42.5%;top: 12%;font-size: 28px;}
        span{color: red; text-shadow:  0 0 12px red; position: absolute;    left: 47%;}
        </style>
    </head>
    <body>
        


<h1>PHP MySQL Select Data</h1>



    <?php

    if($_SERVER['REQUEST_METHOD']=="POST"){
    echo "<table style='border:2px solid black;'>";
    echo "<tr><th>ID</th><th>lastname</th><th>firstname</th><th>email</th></tr>";
    class Myslect extends RecursiveIteratorIterator{ 
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }
        function current(){
            return "<td id='th' style='width:150px; border:2px solid black;'>".parent::current()."</td>";
        }
        function beginChildren(){
            echo "<tr>";
        }   
        function endChildren(){
            echo "</tr>"."\n";
        }
    }
    try{
        $con = new PDO("mysql:host=localhost;dbname=test","SAMIR","samir123");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $select = $con->prepare("SELECT id,lastname,firstname,email FROM data1");
        $select->execute();
        $fetch = $select->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new Myslect(new RecursiveArrayIterator($select->fetchAll())) as $key=>$value){
            echo $value;
        }
        $con = null;
        echo "<p>* is connect *</p>";
    }
    catch(PDOException $e){
        echo "<span>* note connect *</span>". $e->getMessage();
    }
    echo "</table>";
    }
    ?>
    </body>
    </html>

