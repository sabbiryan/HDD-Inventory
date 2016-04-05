<?php
//require "DrsbdPermission.php";
$permission = new DrsbdPermission();
$permission->getUserType();
//echo $permission->continuingAccess();
//echo $permission->validateLogin();

//exit;
if($permission->validateLogin()){
    $permission->continuingAccess();
    //echo $permission->getUserType();
    //echo $_SESSION['userType'];
    //exit;
}
else{
    $permission->redirectToLogin();
    exit;
}

if(isset($_GET['page_id']))
    $page_id = $_GET['page_id'];

//logout
if(isset($_GET['page_id']) && $page_id == "logout"){
    //include "security/logout.php";
    $permission->logout();
    exit;
}
?>