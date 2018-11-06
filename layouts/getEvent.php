<?php 
require("../assets/db.php");

    $sql = "SELECT * FROM event ORDER BY eventId";
    $stmt = $conn->prepare($sql);
    
    $result = $stmt->execute(fetchAll());

    foreach($result as $row){
        $data[]=array(
        'id' => $row["eventId"],
        'title' => $row["eventName"],
        'start' => $row["eventStartTime"],
        'end' => $row["eventEndTime"]
        'location' => $row["eventLocation"]   
        );
    }

    echo json_encode($data);
?>
