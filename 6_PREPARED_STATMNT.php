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
        p{color: green; text-shadow:  0 0 12px green; position: absolute;    left: 47%;}
        #insert-id{position: absolute;top: -10px;}
        span{color: red; text-shadow:  0 0 12px red; position: absolute;    left: 47%;}
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
    <form action="" method="post">
        <pre>
        <input type="text" name="firstname" placeholder="FIRSTNAME">        <input type="text" name="firstname2" placeholder="FIRSTNAME">
        <input type="text" name="lastname" placeholder="LASTNAME">        <input type="text" name="lastname2" placeholder="LASTNAME">
        <input type="text" name="email" placeholder="EMAIL">        <input type="text" name="email2" placeholder="EMAIL">
                                <input type="submit" id="submit">
        </pre>
    </form>
</body>
</html>
<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $firstname2= $_POST['firstname2'];
    $lastname2 = $_POST['lastname2'];
    $email2 = $_POST['email2'];
    try{
        if(!empty($firstname)||!empty($lastname)||!empty($email)||!empty($firstname2)||!empty($lastname2)||!empty($email2)){
      $con = new PDO("mysql:host=localhost;dbname=test","SAMIR","samir123");
      $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
      $sql= $con->prepare("INSERT INTO data2(firstname,lastname,email) VALUES(:firstname , :lastname , :email)");
      $sql->bindParam(':firstname',$firstname);
      $sql->bindParam(':lastname',$lastname);
      $sql->bindParam(':email',$email);
      $sql->execute();
      $sql->bindParam(':firstname',$firstname2);
      $sql->bindParam(':lastname',$lastname2);
      $sql->bindParam(':email',$email2);
      $sql->execute();
      
      echo "<p>* is connect *</p>";
    }else{echo "<span>* note connect *</span>";}
    }
    catch(PDOException){echo "<span>* note connect *</span>";}
}
?>