<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            body{margin:20px;display: flex; justify-content: center; zoom:1.7;}
    p{color:green; text-shadow: 0 0 12px green;position: absolute; top: -9px; left: 45%;}
    pre{color:red; text-shadow:  0 0 12px red ;position: absolute; top: -9px; left: 45%;}
@keyframes pulse {0% {transform: scale(1);}100% {transform: scale(1.1);}}
#submit{animation: pulse 1s alternate-reverse infinite;
        box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.3);
        padding: 7px 20px;
        background: #00458f;
        color: #fff;
        border-radius: 5px; 
        position: relative;
        left: 23%;
}
    </style>
</head>
<body>
    <?php 
$errcreat = $errempty="";
    function data($data){
        $data= htmlspecialchars($data);
        $data=stripslashes($data);
        $data=trim($data);
        return $data ; 

    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
$namecreat  = $_POST['namecreat'];
try{
    $con = new PDO("mysql:host=localhost;","SAMIR","samir123");
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    $table = "CREATE DATABASE $namecreat";
    $con->exec($table);


    echo "<p>is connect</p>";
}
catch(PDOException){
    echo  " <pre>note connect</pre>";
}
     

    }
    
    ?>

    <form method="post" enctype="multipart/form-data"  action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <span>NAME THE DATA BASE:</span><hr>
    <input type="text" name="namecreat"><hr>
    <input id="submit" type="submit">
    </form>
</body>
</html>