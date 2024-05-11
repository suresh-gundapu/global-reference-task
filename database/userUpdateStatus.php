<?php
// Include database configuration file  
session_start();
require_once 'connection.php';
define('SITE_ROOT', realpath(dirname(__FILE__)));

try {

    $user_id = $_POST['user_id'];
    $status_code = $_POST['status_code'];
    if ($status_code == "0") {
        $status_code_final = "1";
    } else {
        $status_code_final = "0";
    }
    // echo $user_id;
    // echo $status_code;
    // exit;
    $ad = "update users set status=? where user_id=?";
    $stmt = $db->prepare($ad);
    echo $db->error;

    $stmt->bind_param("ss", $status_code_final,  $user_id);
    if ($stmt->execute()) {
        $output = [
            'status' => 1,
            "message" => "Status Update successfully"
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
