<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{display: flex; justify-content: center; zoom: 1.5;}
        input{margin: 10px;position: relative;left: 5%;}
        p{color: green; text-shadow:  0 0 12px green; position: absolute;left: 41.5%;}
        #insert-id{position: absolute;top: -10px;left: 38%;}
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
        left: -36%;
}
#next{position: absolute; top: 185px;  left: 58%;}
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
        $c1 = filterdata($_POST['c1']);
        $c2 = filterdata($_POST['c2']);
        $c3 = filterdata($_POST['c3']);
        if(!empty($c1)||!empty($c2)||!empty($c3)){
        try{
            $con = new PDO("mysql:host=localhost;dbname=test","SAMIR","samir123");
            $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $insert = "INSERT INTO data1(lastname,firstname,email) VALUES('$c1','$c2','$c3')";
            $con->exec($insert);
            $last_id= $con->lastInsertId();
            echo "<p>* IS CONNECT *</p>";
            echo "<p id='insert-id'>* LAST INSERT ID IS $last_id*</p>";
        }
        catch(PDOException ){
            echo "<span>* NOTE CONNECT*</span>";
        }}
        else{
            echo "<span>* FILL *</span>";
        }
    }
    if(isset($_POST['next'])){ header("location:6_PREPARED_STATMNT.php");};
    ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<pre>
<input placeholder="first name value" type="text" name="c1"> 
<input placeholder="last  name value" type="text" name="c2"> 
<input placeholder="email value" type="text" name="c3">
                    <input id="submit" type="submit" name="submit">
                    <button name="next" id="next">➡️</button>
</pre>
</form>
</body>      
</html>
