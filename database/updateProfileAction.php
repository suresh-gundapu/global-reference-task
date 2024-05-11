<?php
// Include database configuration file  
session_start();
require_once 'connection.php';
define('SITE_ROOT', realpath(dirname(__FILE__)));

try {
    // print_r($_POST['data']);
    // print_r($_FILES['data']);
    // echo $_FILES['data']['tmp_name']['user_image'];
    // echo $_FILES['data']['tmp_name']['signature'];

    // exit;
    $user_data = $_POST['data'];
    $user_name = !empty($user_data['name']) ? $user_data['name'] : '';
    $user_email = !empty($user_data['email']) ? $user_data['email'] : '';
    $dob = !empty($user_data['dob']) ? $user_data['dob'] : '';
    $gender = !empty($user_data['gender']) ? $user_data['gender'] : '';
    $address = !empty($user_data['address']) ? $user_data['address'] : '';
    $mobile = !empty($user_data['mobile_no']) ? $user_data['mobile_no'] : '';
    $role = 'user';
    $auth = 3;
    $status = 1;
    if ($_SESSION['auth'] == "1" || $_SESSION['auth'] == "2") {
        $uid = !empty($user_data['uid']) ? $user_data['uid'] : '';
    } else {
        $uid = $_SESSION['uid'];
    }
    $target_dir = SITE_ROOT . '/uploads/';
    $target_file_image = $target_dir . basename($_FILES['data']['name']['user_image']);
    $target_file_sign = $target_dir . basename($_FILES['data']['name']['signature']);

    $file_image = "database/uploads/" . $_FILES['data']['name']['user_image'];
    $file_sign = "database/uploads/" . $_FILES['data']['name']['signature'];

    move_uploaded_file($_FILES['data']['tmp_name']['user_image'], $target_file_image);
    move_uploaded_file($_FILES['data']['tmp_name']['signature'], $target_file_sign);


    $ad = "update users set name=?,email=?,mobile_no=?,user_image=?,signature=?,gender=?,dob=?,auth_level=?,role=?,address=?,status=? where user_id=?";
    $stmt = $db->prepare($ad);
    echo $db->error;

    $stmt->bind_param("ssssssssssss", $user_name, $user_email,  $mobile, $file_image, $file_sign, $gender, $dob, $auth, $role, $address, $status, $uid);
    if ($stmt->execute()) {
        $output = [
            'status' => 1,
            "message" => "Update successfully"
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
