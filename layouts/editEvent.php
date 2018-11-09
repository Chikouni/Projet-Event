<?php 
require("../assets/db.php");


if(isset($_POST['id'])){
    
    $title = !empty($_POST['title']) ? trim($_POST['title']) : null;
    $eventStart = !empty($_POST['start']) ? trim($_POST['start']) : null;
    $eventEnd = !empty($_POST['end']) ? trim($_POST['end']) : null;
    $id = !empty($_POST['id']) ? trim($_POST['id']) : null;
    
    $sql = "UPDATE event SET eventName = :title, eventStartTime = :start_event, eventEndTime = :stop_event WHERE eventId = :id";
    $stmt = $conn->prepare($sql);
    
    
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':start_event', $eventStart);
    $stmt->bindValue(':stop_event', $eventEnd);
    $stmt->bindValue(':id', $id);
 
    $result = $stmt->execute();

}
?>
