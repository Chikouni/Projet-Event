<?php 
session_start();
require("../assets/db.php");

if(isset($_POST['title'])){

    //Recuperer les POST
    $title = !empty($_POST['title']) ? trim($_POST['title']) : null;
    $eventStart = !empty($_POST['start']) ? trim($_POST['start']) : null;
    $eventEnd = !empty($_POST['end']) ? trim($_POST['end']) : null;
    $descriptEvent = !empty($_POST['desc']) ? trim($_POST['desc']) : null;
    $eventLocation = !empty($_POST['location']) ? trim($_POST['location']) : null;

    //Insert dans la BDD
    $sql = "INSERT INTO event (eventName, eventStartTime, eventEndTime, eventLocation, descriptEvent, memberId) VALUES (:ename, :estart, :eend, :elocation, :desc, :memberid)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindValue(':ename', $title);
    $stmt->bindValue(':estart', $eventStart);
    $stmt->bindValue(':eend', $eventEnd);
    $stmt->bindValue(':elocation', $eventLocation);
    $stmt->bindValue(':desc', $descriptEvent);
    $stmt->bindValue(':memberid', $_SESSION["id"]);
 
    $result = $stmt->execute();
}
?>
