<?php
// Include database configuration file  
session_start();
require_once 'connection.php';
define('SITE_ROOT', realpath(dirname(__FILE__)));

try {
    // print_r($_POST['data']);
    // print_r($_FILES['data']);
    //echo $_FILES['data']['tmp_name']['file'];
    //echo $_FILES['data']['tmp_name']['signature'];

    $user_id = !empty($_SESSION['uid']) ? $_SESSION['uid'] : '';
    if (!empty($_FILES['data']['name']['file'])) {

        $target_dir = SITE_ROOT . '/uploads/';
        $target_file_image = $target_dir . basename($_FILES['data']['name']['file']);

        $file_image = "database/uploads/" . $_FILES['data']['name']['file'];

        move_uploaded_file($_FILES['data']['tmp_name']['file'], $target_file_image);

        // Insert   data into the database 
        $sqlQ = "INSERT INTO file_manage(file,user_id) 
        VALUES (?,?)";
        $stmt = $db->prepare($sqlQ);
        $stmt->bind_param("ss", $file_image, $user_id);
        //  $stmt->send_long_data(1, file_get_contents($_FILES['data']['tmp_name']['image']));

        $insert = $stmt->execute();
        // echo $db->error;
        // exit;
        if ($insert) {
            // $_SESSION['name'] = $user_name;
            // $_SESSION['auth'] = $auth;
            // $_SESSION['uid'] = $stmt->insert_id;
            $output = [
                'status' => 1,
                "message" => "file uploaded successfully."
            ];
            echo json_encode($output);
        } else {
            echo json_encode([
                'status' => 0,
                "message" => "Failed"
            ]);
        }
    } else {
        throw new error('file cant be empty');
    }
} catch (TypeError $e) {
    echo json_encode([
        'status' => 0,
        "message" => $e->getMessage() . "\n"
    ]);
}


// Render event data in JSON format 
