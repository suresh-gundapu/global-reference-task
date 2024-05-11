<?php
session_start();
include_once "connection.php";

$outgoing_id = $_SESSION['uid'];

$sql = "SELECT * FROM users WHERE  role = 'user'";
$statement = $db->prepare($sql);
$statement->execute();
$result = $statement->get_result();
$resultSet = array();
while ($row = $result->fetch_assoc()) {
    $resultSet[] = $row;
}
if (!empty($resultSet)) {
    print json_encode($resultSet);
}
// Render event data in JSON format 
