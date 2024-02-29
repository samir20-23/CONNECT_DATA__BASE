<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{display: flex; justify-content: center; zoom: 1.5;}
        input{margin: 10px;}
        #table{ border: 2px solid black; width: 180px; margin-left: -1px;}
        p{color: green; text-shadow:  0 0 12px green; position: absolute;}
        span{color: red; text-shadow:  0 0 12px red; position: absolute;}
        pre{margin-top: 40px;}
        @keyframes pulse {0% {transform: scale(1);}100% {transform: scale(1.1);}}
#submit{animation: pulse 1s alternate-reverse infinite;
        box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.3);
        padding: 7px 20px;
        background: #00458f;
        color: #fff;
        border-radius: 5px; 
        position: relative;
        top: 87%;
        left: 40%;
}
    </style>
</head>
<body>
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        //fiilter data
        function funcdata($data){
            $data=htmlspecialchars($data);
            $data=stripslashes($data);
            $data=trim($data);
            return $data;
        }
        //posts
    $table     = funcdata($_POST['table']);

    $Column1   = funcdata($_POST['Column1']);
    $Column2   = funcdata($_POST['Column2']);
    $Column3   = funcdata($_POST['Column3']);
    $Column4   = funcdata($_POST['Column4']);
    //connect
try{
    $con = new PDO("mysql:host=localhost;dbname=test","SAMIR","samir123");
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);


    $sql = "CREATE TABLE $table (

        $Column1 INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        $Column2 VARCHAR(30) NOT NULL,
        $Column3 VARCHAR(50),
        $Column4 VARCHAR(50)
    )";
$con->exec($sql);
    echo "<p>* CONNECT *</p>";
}
catch(PDOException  ){echo "<span>* NOTE CONNECT *</span>";}


    }
    ?>
    <form  method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <pre>
NAME TABL:<input  id="table" type="text" name="table">

Column 1 :<input type="text" name="Column1">
Column 2 :<input type="text" name="Column2" />
Column 3 :<input type="text" name="Column3" />
Column 4 :<input type="text" name="Column4" />

<input id="submit" type="submit" name="submit" />
</pre>
    </form>
</body>
</html>
