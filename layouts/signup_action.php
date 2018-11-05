<?php
require("../assets/db.php");
session_start();
    //Recuperer les POST
    $pseudo = !empty($_POST['pseudo']) ? trim($_POST['pseudo']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT * FROM member WHERE email = :email OR pseudo = :pseudo";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':pseudo', $pseudo);
    
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    
    if(password_verify($pass,$user->password))
        {
        
          $_SESSION['pseudo'] = $user->pseudo;
          $_SESSION['id'] = $user->memberId;
          $_SESSION['connect']=1;
          $_SESSION['email']=$email;
          header('Location: ../index.php');

        }
    else{

            header('Location: ../layouts/signin.php');

        }
