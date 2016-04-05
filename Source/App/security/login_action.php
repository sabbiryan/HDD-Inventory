<?php
//session_start();

require "DrsbdPermission.php";
$permission = new DrsbdPermission();


$username = $_POST['username'];
$password = $_POST['password'];
$authentication = $_POST['authentication'];
//var_dump(function_exists('mysqli_connect'));

//exit;
if($permission->login($username,$password,$authentication) == true){
    //echo $permission->login($username,$password,$authentication);
    //exit;
    header("Location: ../index.php");
    exit;
}else{
    header("Location: ../login.php");
}



?>