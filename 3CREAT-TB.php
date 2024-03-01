<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{display: flex; justify-content: center; zoom: 1.5;}
        input{margin: 10px;}
        #table{ border: 3px solid black; width: 180px; margin-left: -15px;}
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
        left: 35%;
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
    $tbname    = funcdata($_POST['tbname']) ;

    $Column0   = funcdata($_POST['Column0']);
    $Column1   = funcdata($_POST['Column1']);
    $Column2   = funcdata($_POST['Column2']);
    $Column3   = funcdata($_POST['Column3']);
    //connect
try{
    $con = new PDO("mysql:host=localhost;dbname=test","SAMIR","samir123");
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);


    $sql = "CREATE TABLE $tbname (
        $Column0 INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        $Column1 VARCHAR(30)NOT NULL,
        $Column2 VARCHAR(50)NOT NULL,
        $Column3 VARCHAR(50)
    )";
$con->exec($sql);
    echo "<p>* CONNECT ✅*</p>";
    header("location:4insert-DATA.php");
}
catch(PDOException  ){echo "<span>* NOTE CONNECT❌ *</span>";}


    }
    ?>
    <form  method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <pre>
TABLE NAME :<input id="table" type="text" name="tbname" />
Column 0 :<input id="in0" type="text" name="Column0" />id
Column 1 :<input id="in1" type="text" name="Column1" />varchar
Column 2 :<input id="in2" type="text" name="Column2" />varchar
Column 3 :<input id="in3" type="text" name="Column3" />varchar

<input id="submit" type="submit" name="submit" />
</pre>
    </form>


    <script>
     
    </script>
</body>
</html>
