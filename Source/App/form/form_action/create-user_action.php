<?php
//session_start();

require "../../security/DrsbdPermission.php";
$permission = new DrsbdPermission();


$um_fullName = $_POST['fullName'];
$um_email = $_POST['email'];
$um_username = $_POST['username'];
$um_password = $_POST['password'];
$um_userType = $_POST['userType'];
$um_authentication = $_POST['authentication'];

//exit;

//if($permission->dbConnect() == true){
    if($permission->createUser($um_fullName, $um_email, $um_username, $um_password, $um_userType, $um_authentication) == true){
        $_SESSION['message'] = "You have created one " . strtolower($um_userType);
        header("Location: ../../index.php?page_id=create");
    }else{
        $_SESSION['message'] = "User creation failed, try again";
        header("Location: ../../index.php?page_id=create");
    }
//}else{
//    $_SESSION['message'] = "User creation failed! Database connection error! Please contact with service provider.";
//    header("Location: ../../index.php?page_id=create");
//}



?>