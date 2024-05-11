<?php
session_start();
include_once "database/connection.php";

$status = "Offline";
mysqli_query($db, "UPDATE chat_user_table SET user_status = '{$status}' WHERE user_id={$_SESSION['uid']}");

session_destroy();
header('location:index.php');
