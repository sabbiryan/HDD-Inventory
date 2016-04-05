<?php
//session_start();

require "../../security/DrsbdPermission.php";
$permission = new DrsbdPermission();


$reset_id = $_POST['reset_id'];
$reset_type = $_POST['reset_action'];

if($permission->userReset($reset_id,$reset_type) != false){
    $values = $permission->userReset($reset_id, $reset_type);
    $_SESSION['reset'] = $values[0];
    $id = $values[1];
    header("Location: ../../index.php?page_id=reset&id=$id");
}else{
    $_SESSION['message'] = "Reset operation for this failed, try again";
    header("Location: ../../index.php?page_id=reset");
}



?>