<?php 
require("../assets/db.php");


if(isset($_POST['id'])){
    
    $id = !empty($_POST['id']) ? trim($_POST['id']) : null;
    
    $sql = "DELETE FROM event WHERE eventId = :id";
    $stmt = $conn->prepare($sql);  
 
    $stmt->bindValue(':id', $id);

    $result = $stmt->execute();
    
}
?>
