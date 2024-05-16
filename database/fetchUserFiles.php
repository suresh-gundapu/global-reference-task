
<?php
include_once "connection.php";

$outgoing_id = $_SESSION['uid'];

try {

    $sql = "SELECT * FROM file_manage WHERE  user_id = {$outgoing_id} ORDER BY id DESC";
    $query = $db->query($sql);
    $result = $query->fetch_all(MYSQLI_ASSOC);
} catch (TypeError $e) {
    echo "Error: " . $e->getMessage() . "\n";
}


// Render event data in JSON format 
