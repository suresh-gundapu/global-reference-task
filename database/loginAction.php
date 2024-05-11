<?php
// Include database configuration file  
session_start();
require_once 'connection.php';

try {
    // print_r($_POST['data']);

    // exit;
    $user_data = $_POST['data'];
    $email = !empty($user_data['email']) ? $user_data['email'] : '';
    $user_password = !empty($user_data['password']) ? $user_data['password'] : '';

    if (!empty($email)) {
        //Checking email id exist for not
        $stmt = $db->prepare("SELECT email,password,user_id, status,name,auth_level FROM users WHERE (email=? && password=?)");
        $stmt->bind_param('ss', $email, $user_password);
        $stmt->execute();
        $stmt->bind_result($email, $user_password, $user_id, $status, $name, $auth_level);
        $rs = $stmt->fetch();
        $stmt->close();
        if (!$rs) {
            echo json_encode([
                'status' => 0,
                "message" => "Invalid Details. Please try again."
            ]);
        } elseif ($status == 0) {
            echo json_encode([
                'status' => 0,
                "message" => "Admin approval requered. Please wait some time.."
            ]);
        } else {
            $_SESSION['name'] = $name;
            $_SESSION['auth'] = $auth_level;
            $_SESSION['uid'] = $user_id;
            $output = [
                'status' => 1,
                "message" => "login successfully"
            ];
            echo json_encode($output);
        }
    } else {
        throw new error('username cant be empty');
    }
} catch (TypeError $e) {
    echo json_encode([
        'status' => 0,
        "message" => $e->getMessage() . "\n"
    ]);
}


// Render event data in JSON format 
