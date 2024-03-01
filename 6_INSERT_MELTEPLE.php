<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{display: flex; justify-content: center; zoom: 1.5;}
        input{margin: 10px;}
        p{color: green; text-shadow:  0 0 12px green; position: absolute;    left: 47%;}
        span{color: red; text-shadow:  0 0 12px red; position: absolute;    left: 49%;}
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
        left: 0%;
}
    </style>
</head>
<body>

<form action="" method="post">
        <pre>
        <input type="text" name="c1" placeholder="FIRSTNAME">        <input type="text" name="c4" placeholder="FIRSTNAME">
        <input type="text" name="c2" placeholder="LASTNAME">        <input type="text" name="c5" placeholder="LASTNAME">
        <input type="text" name="c3" placeholder="EMAIL">        <input type="text" name="c6" placeholder="EMAIL">
                                <input type="submit" id="submit">
        </pre>
    </form>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];
    $c6 = $_POST['c6'];
if(!empty($c1)||!empty($c2)||!empty($c3)||!empty($c4)||!empty($c5)||!empty($c6)){
    try{
        $con = new PDO("mysql:host=localhost;dbname=test","SAMIR","samir123");
        $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

    $con->beginTransaction();
       $con->exec("INSERT INTO data1(firstname,lastname,email) VALUES('$c1','$c2','$c3')");
      
       
       $con->exec("INSERT INTO data1(firstname,lastname,email) VALUES('$c4','$c5','$c6')");
       $con->commit();


       echo "<p>* IS CONNECT  *</p>";

    }
    catch(PDOException){echo "<span>note connect</span>";}
}
else{
    echo "<span>* FILL *</span>";
}
}

?>