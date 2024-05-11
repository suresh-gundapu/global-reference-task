<?php
// Include database configuration file  
session_start();
require_once 'connection.php';
define('SITE_ROOT', realpath(dirname(__FILE__)));

try {

    $user_id = $_POST['id'];

    // echo $user_id;
    // exit;
    $adn = "delete from users where user_id=?";
    $stmt = $db->prepare($adn);
    $stmt->bind_param('s', $user_id);
    if ($stmt->execute()) {
        $output = [
            'status' => 1,
            "message" => "User Deleted successfully"
        ];
        echo json_encode($output);
    } else {
        echo json_encode([
            'status' => 0,
            "message" => "Failed"
        ]);
    }
} catch (TypeError $e) {
    echo json_encode([
        'status' => 0,
        "message" => $e->getMessage() . "\n"
    ]);
}


// Render event data in JSON format 
