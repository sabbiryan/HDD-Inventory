<?php
//session_start();

require "../../security/DrsbdPermission.php";
$permission = new DrsbdPermission();


$delete_id = $_POST['delete_id'];

//exit;

//if($permission->dbConnect() == true){
    if($permission->deleteUser($delete_id) == true){
        $_SESSION['message'] = "User delete completed!! ";
        header("Location: ../../index.php?page_id=create");
    }else{
        $_SESSION['message'] = "User deletion failed, try again";
        header("Location: ../../index.php?page_id=create");
    }
//}else{
//    $_SESSION['message'] = "User creation failed! Database connection error! Please contact with service provider.";
//    header("Location: ../../index.php?page_id=create");
//}



?>