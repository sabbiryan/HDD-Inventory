<?php
//session_start();
//error_reporting(0);
require "../../security/DrsbdPermission.php";
$p = new DrsbdPermission();

$_SESSION['message']= "";

if(isset($_POST['delete_action']))
    $deleteAction = $_POST['delete_action'];
//exit();

if(isset($_POST['trackNo']))
    $trackNo = $_POST['trackNo'];
if(isset($_POST['modelName']))
    $modelName = $_POST['modelName'];
if(isset($_POST['modelNo']))
    $modelNo = $_POST['modelNo'];
if(isset($_POST['date']))
    $date = $_POST['date'];
if(isset($_POST['country']))
    $country = $_POST['country'];
if(isset($_POST['pcb']))
    $pcb = $_POST['pcb'];
if(isset($_POST['note']))
    $note = $_POST['note'];

if(isset($_POST['sn']))
    $sn = $_POST['sn'];
if(isset($_POST['dcm']))
    $dcm = $_POST['dcm'];

if(isset($_POST['pn']))
    $pn = $_POST['pn'];
if(isset($_POST['fw']))
    $fw = $_POST['fw'];
if(isset($_POST['siteCode']))
    $siteCode = $_POST['siteCode'];
if(isset($_POST['PCBSticker']))
    $pcbSticker = $_POST['PCBSticker'];

if(isset($_POST['rev']))
    $rev = $_POST['rev'];

if(isset($_POST['mlc']))
    $mlc = $_POST['mlc'];
if(isset($_POST['mcu']))
    $mcu = $_POST['mcu'];
if(isset($_POST['smooth']))
    $smooth = $_POST['smooth'];

if(isset($_POST['hddCode']))
    $hddCode = $_POST['hddCode'];


$dttm = date("Y-m-d H:m:s");


//page_id
if($modelName=="Western Digital")
    $page_id = "hdd-western-digital";
elseif($modelName=="Seagate")
    $page_id = "hdd-seagate";
elseif($modelName=="Samsung")
    $page_id = "hdd-samsung";
elseif($modelName=="Hitachi/IBM")
    $page_id = "hdd-hitachi-ibm";
elseif($modelName=="Fujitsu")
    $page_id = "hdd-fujitsu";
elseif($modelName=="Toshiba")
    $page_id = "hdd-toshiba";

if($deleteAction == "yes"){
    //$mysql = mysql_connect("localhost","root","") or die(mysql_errno());
    //$db = mysql_select_db("DRSBD_HDD_INVENTORY");
    $result = mysqli_query($p->dbConnect(), "DELETE FROM DONOR_HDD_INVENTORY WHERE TRACK_NO='$trackNo' ");

    if($result){
        if($modelName == "Western Digital") {
            $final = mysqli_query($p->dbConnect(), "DELETE FROM DONOR_WESTERN_DIGITAL WHERE TRACK_NO='$trackNo' ");
        }

        if($modelName == "Seagate") {
            $final = mysqli_query($p->dbConnect(), "DELETE FROM DONOR_SEAGATE WHERE TRACK_NO='$trackNo' ");
        }

        if($modelName == "Samsung") {
            $final = mysqli_query($p->dbConnect(), "DELETE FROM DONOR_SAMSUNG WHERE TRACK_NO='$trackNo' ");
        }

        if($modelName == "Hitachi/IBM") {
            $final = mysqli_query($p->dbConnect(), "DELETE FROM DONOR_HITACHI_IBM WHERE TRACK_NO='$trackNo'");
        }

        if($modelName == "Fujitsu") {
            $final = mysqli_query($p->dbConnect(), "DELETE FROM DONOR_FUJITSU WHERE TRACK_NO='$trackNo'");
        }

        if($modelName == "Toshiba") {
            $final = mysqli_query($p->dbConnect(), "DELETE FROM DONOR_TOSHIBA WHERE TRACK_NO='$trackNo'");
        }

        if($final){
            mysql_close($p->dbConnect());
            $_SESSION['message'] = "Entry delete from database successfully";
            header("Location: ../../index.php?page_id=$page_id");
        }

        else{
            mysql_close($p->dbConnect());
            $_SESSION['message'] = "Delete Failed! Please contact with service provider";
            header("Location: ../../index.php?page_id=$page_id");
        }
    }
    else{

        mysql_close($p->dbConnect());
        $_SESSION['message'] = "Delete Failed! Please contact with service provider";
        header("Location: ../../index.php?page_id=$page_id");
    }
}

if($deleteAction == "no"){
    $_SESSION['message'] = "Delete operation cancel successfully";
    header("Location: ../../index.php?page_id=$page_id");
}


?>