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
    $user_password = !empty($user_data['password']) ? $user_data['password'] : '';
    $dob = !empty($user_data['dob']) ? $user_data['dob'] : '';
    $gender = !empty($user_data['gender']) ? $user_data['gender'] : '';
    $address = !empty($user_data['address']) ? $user_data['address'] : '';
    $mobile = !empty($user_data['mobile_no']) ? $user_data['mobile_no'] : '';
    $role = 'user';
    $auth = 3;
    if ((isset($_SESSION['auth']) == "1" || isset($_SESSION['auth']) == "2") && isset($_SESSION['uid'])) {
        $status = 1;
        $message = "User added successfully";
    } else {
        $status = 0;
        $message = "Register successfully";
    }


    if (!empty($user_name)) {
        //Checking email id exist for not
        $result = "SELECT count(*) FROM users WHERE email=?";
        $stmt = $db->prepare($result);
        $stmt->bind_param('s', $user_email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        //if email already exist
        if ($count > 0) {
            echo json_encode([
                'status' => 0,
                "message" => "Email already registered"
            ]);
        } else {
            $target_dir = SITE_ROOT . '/uploads/';
            $target_file_image = $target_dir . basename($_FILES['data']['name']['user_image']);
            $target_file_sign = $target_dir . basename($_FILES['data']['name']['signature']);

            $file_image = "database/uploads/" . $_FILES['data']['name']['user_image'];
            $file_sign = "database/uploads/" . $_FILES['data']['name']['signature'];

            move_uploaded_file($_FILES['data']['tmp_name']['user_image'], $target_file_image);
            move_uploaded_file($_FILES['data']['tmp_name']['signature'], $target_file_sign);

            // Insert   data into the database 
            $sqlQ = "INSERT INTO users (name,email,password,mobile_no,user_image,signature,gender,dob,auth_level,role,address,status) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $db->prepare($sqlQ);
            $stmt->bind_param("ssssssssssss", $user_name, $user_email, $user_password, $mobile, $file_image, $file_sign, $gender, $dob, $auth, $role, $address, $status);
            //  $stmt->send_long_data(1, file_get_contents($_FILES['data']['tmp_name']['image']));

            $insert = $stmt->execute();

            if ($insert) {
                // $_SESSION['name'] = $user_name;
                // $_SESSION['auth'] = $auth;
                // $_SESSION['uid'] = $stmt->insert_id;
                $output = [
                    'status' => 1,
                    "message" => $message
                ];
                echo json_encode($output);
            } else {
                echo json_encode([
                    'status' => 0,
                    "message" => "Failed"
                ]);
            }
        }
    } else {
        throw new error('name cant be empty');
    }
} catch (TypeError $e) {
    echo json_encode([
        'status' => 0,
        "message" => $e->getMessage() . "\n"
    ]);
}


// Render event data in JSON format 
