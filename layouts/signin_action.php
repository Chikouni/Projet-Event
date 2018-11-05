<?php 
require("../assets/db.php");

if(isset($_POST)){

    //Recuperer les POST
    $lastname = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;

    //Hashage du MDP
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT);
    
    //Insert dans la BDD
    $sql = "INSERT INTO member (pseudo, name, email, password, dateCreated) VALUES (:identifiant, :lastname, :email, :password, NOW())";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindValue(':identifiant', $username);
    $stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':email', $email);
 
    $result = $stmt->execute();
    
    if($result){

        echo 'Félicitation vous avez créée un compte !';
        header('Location: ../layouts/signup.php');
    }


}
    
?>
