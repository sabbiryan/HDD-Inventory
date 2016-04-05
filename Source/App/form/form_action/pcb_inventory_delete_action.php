<?php
//session_start();
//error_reporting(0);
require "../../security/DrsbdPermission.php";
$permission = new DrsbdPermission();

$_SESSION['message']= "";

if(isset($_POST['delete_action']))
    $deleteAction = $_POST['delete_action'];
//exit();

if(isset($_POST['trackNo']))
    $trackNo = $_POST['trackNo'];
if(isset($_POST['modelName']))
    $modelName = $_POST['modelName'];
//if(isset($_POST['modelNo']))
//    $modelNo =$_POST['modelNo'];
if(isset($_POST['pcb']))
    $pcb = $_POST['pcb'];
if(isset($_POST['note']))
    $note = $_POST['note'];

if(isset($_POST['mcu']))
    $mcu = $_POST['mcu'];
if(isset($_POST['smooth']))
    $smooth = $_POST['smooth'];

$dttm = date("Y-m-d H:m:s");

//page_id
if($modelName=="Western Digital")
    $page_id = "pcb-western-digital";
elseif($modelName=="Seagate")
    $page_id = "pcb-seagate";
elseif($modelName=="Samsung")
    $page_id = "pcb-samsung";
elseif($modelName=="Hitachi/IBM")
    $page_id = "pcb-hitachi-ibm";
elseif($modelName=="Fujitsu")
    $page_id = "pcb-fujitsu";
elseif($modelName=="Toshiba")
    $page_id = "pcb-toshiba";

if($deleteAction == "yes"){

    //$mysql = mysql_connect("localhost","root","") or die(mysql_error());
    //$db = mysql_select_db("DRSBD_HDD_INVENTORY") or die(mysql_error());
    $result = mysqli_query($permission->dbConnect(), "DELETE FROM DONOR_PCB_INVENTORY WHERE TRACK_NO='$trackNo' ");

    if($result == true){

        if($modelName == "Hitachi/IBM") {
            mysqli_query($permission->dbConnect(), "DELETE FROM DONOR_PCB_HITACHI_IBM WHERE TRACK_NO='$trackNo' ");
        }

        mysqli_close($permission->dbConnect());
        $_SESSION['message'] = "Entry delete from database successfully";
        header("Location: ../../index.php?page_id=$page_id");
    }
}

if($deleteAction == "no"){
    $_SESSION['message'] = "Delete operation cancel successfully";
    header("Location: ../../index.php?page_id=$page_id");
}


?>