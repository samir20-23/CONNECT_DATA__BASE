<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{display: flex; justify-content: center; zoom: 1.5;}
        input{margin: 10px;}
        #in1{margin: 0; border: 3px solid #FF7B7B;}
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
        left: 1%;
}
    </style>
</head>
<body>
    <?php 
    if($_SERVER['REQUEST_METHOD']=="POST"){
        function filterdata($data){
            $data=htmlspecialchars($data);
            $data=stripslashes($data);
            $data=trim($data);
            return $data ;
        }
        $dbname = filterdata($_POST['dbname']);
        $tbname = filterdata($_POST['tbname']);
        $c1 = filterdata($_POST['c1']);
        $c2 = filterdata($_POST['c2']);
        $c3 = filterdata($_POST['c3']);
        $c4 = filterdata($_POST['c4']);
        $c5 = filterdata($_POST['c5']);
        $c6 = filterdata($_POST['c6']);
        try{
            $con = new PDO("mysql:host=localhost;dbname=$dbname","SAMIR","samir123");
            $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

            $sql = $con->beginTransaction();

            $con->exec("INSERT INTO $tbname(firstname , lastname , email) VALUES('$c1','$c2','$c3')");
            $con->exec("INSERT INTO $tbname(firstname , lastname , email) VALUES('$c4','$c5','$c6')");

            $con->commit();
            echo "<p>* IS CONNECT *</p>";
        }
        catch(PDOException ){
            $con->rollBack();
            echo "<span>* NOTE CONNECT*</span>";
        }
    }
    ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<pre>
    <input placeholder="data base" type="text" name="dbname" id="in1"><input placeholder="table" type="text" name="tbname" id="in1">
<input placeholder="first name value" type="text" name="c1">  <input placeholder="first name value" type="text" name="c4">
<input placeholder="last  name value" type="text" name="c2">  <input placeholder="last  name value" type="text" name="c5">
<input placeholder="email value" type="text" name="c3">  <input placeholder="email value" type="text" name="c6">
                    <input id="submit" type="submit" name="submit">
</pre>
</form>
</body>      
</html>