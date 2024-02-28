<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // if($_SERVER['REQUEST_METHOD']=="POST"){
    // try{
    //     $con = new PDO("mysql:host=localhost;dbname=samir","SAMIR","samir123");
    //     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     $insert = "INSERT INTO LOGIN(email,password)
    //     VALUES('smair@gmail.com','samir1234567')";
    //     $con->exec($insert);

    // }   
    // catch(PDOException $e){echo "note connect" . $e->getMessage();}
    // }
    ?>
    <form method="post" enctype="multipart/form-data" action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
     <input type="text" name="ex1">
     <input type="submit">
   </form>
</body>
</html>
 -->







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            body{ margin:20px;display: flex; justify-content: center; zoom:1.7;}
    p{color:green; text-shadow: 0 0 12px green;position: absolute; top: -11px; left: 45%;}
    pre{color:red; text-shadow:  0 0 12px red ;position: absolute; top: -11px; left: 43%;}
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
if($_SERVER['REQUEST_METHOD']=="POST"){
    $values = $_POST['values'];
   try{
    $con =new PDO("mysql:host=localhost;dbname=test","SAMIR","samir123");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $valuesdata ="INSERT INTO $values(firstname , lastname , email)
    VALUES ('morad','aoulad','morad@gmail.com')";
    $con->exec($valuesdata);

    echo "<p>* DONE *</p>";
   }
   catch(PDOException){echo "<pre>* NOTE CONNECT *</pre>";}
}
?>

    <form method="post" enctype="multipart/form-data"  action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <span> INSERT  THE DATABASE :</span><hr>
    <input type="text" name="values"><hr>
    <input id="submit" type="submit">
    </form>
</body>
</html>