<?php
//session_start();

require "../../security/DrsbdPermission.php";
$permission = new DrsbdPermission();

if(isset($_POST['password'])) {
    $password = $_POST['password'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if($permission->changePasswordAuthentication($currentPassword, $newPassword, $confirmPassword, $password) == true){
        $_SESSION['message'] = "Password changed successfully " ;
        header("Location: ../../index.php?page_id=changePassAuth");
    }else{
        $_SESSION['message'] = "Password changed failed, try again";
        header("Location: ../../index.php?page_id=changePassAuth");
    }

}

if(isset($_POST['authentication'])) {
    $authentication = $_POST['authentication'];
    $currentAuthentication = $_POST['currentAuthentication'];
    $newAuthentication = $_POST['newAuthentication'];
    $confirmAuthentication = $_POST['confirmAuthentication'];

    if($permission->changePasswordAuthentication($currentAuthentication, $newAuthentication, $confirmAuthentication , $authentication) == true){
        $_SESSION['message'] = "Authentication changed successfully";
        header("Location: ../../index.php?page_id=changePassAuth");
    }else{
        $_SESSION['message'] = "Authentication changed failed, try again";
        header("Location: ../../index.php?page_id=changePassAuth");
    }
}


?>