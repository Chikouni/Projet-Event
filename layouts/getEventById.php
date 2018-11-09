<?php 
require("../assets/db.php");

    $sql = "SELECT * FROM event ORDER BY eventId WHERE memberId = :memberid";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':memberId', $_SESSION['id']);
    
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach($result as $row){
        $data[]=array(
        'id' => $row["eventId"],
        'title' => $row["eventName"],
        'start' => $row["eventStartTime"],
        'end' => $row["eventEndTime"],
        'location' => $row["eventLocation"],
        'desc' => $row["descriptEvent"]  
        );
    }

    echo json_encode($data);
?>
