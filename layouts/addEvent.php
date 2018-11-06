<?php 
require("../assets/db.php");

if(isset($_POST["title"])){

    //Recuperer les POST
    $name = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;
    $eventStart = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $eventEnd = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $eventLocation = !empty($_POST['email']) ? trim($_POST['email']) : null;

    //Insert dans la BDD
    $sql = "INSERT INTO event (eventName, eventStartTime, eventEndTime, eventLocation, memberId) VALUES (:ename, :estart, :eend, :elocation, :memberid";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindValue(':ename', $name);
    $stmt->bindValue(':estart', $eventStart);
    $stmt->bindValue(':eend', $eventEnd);
    $stmt->bindValue(':elocation', $eventLocation);
    $stmt->bindValue(':memberid', $_SESSION["id"]);
 
    $result = $stmt->execute();
    


    
?>
