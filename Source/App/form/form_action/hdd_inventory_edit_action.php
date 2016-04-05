<?php
//session_start();
//error_reporting(0);
require "../../security/DrsbdPermission.php";
$permission = new DrsbdPermission();

$_SESSION['message']= "";

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



//$mysql = mysql_connect("localhost","root","") or die(mysql_error());
//$db = mysql_select_db("DRSBD_HDD_INVENTORY");
$result = mysqli_query($permission->dbConnect(), "UPDATE DONOR_HDD_INVENTORY SET MODEL_NAME='$modelName',MODEL_NO='$modelNo',DATE='$date',COUNTRY='$country',PCB='$pcb',NOTE='$note',DTTM='$dttm' WHERE TRACK_NO='$trackNo' ");

if($result){
    if($modelName == "Western Digital") {
        $final = mysqli_query($permission->dbConnect(), "UPDATE DONOR_WESTERN_DIGITAL SET SN='$sn', DCM='$dcm' WHERE TRACK_NO='$trackNo' ");
    }

    if($modelName == "Seagate") {
        $final = mysqli_query($permission->dbConnect(), "UPDATE DONOR_SEAGATE SET PN='$pn', FW='$fw', SITE_CODE='$siteCode', PCB_STICKER='$pcbSticker', SN='$sn' WHERE TRACK_NO='$trackNo' ");
    }

    if($modelName == "Samsung") {
        $final = mysqli_query($permission->dbConnect(), "UPDATE DONOR_SAMSUNG SET PN='$pn', FW='$fw', REV='$rev' WHERE TRACK_NO='$trackNo'");
    }

    if($modelName == "Hitachi/IBM") {
        $final = mysqli_query($permission->dbConnect(), "UPDATE DONOR_HITACHI_IBM SET PN='$pn', MLC='$mlc', PCB_STICKER='$pcbSticker', MCU='$mcu', SMOOTH='$smooth' WHERE TRACK_NO='$trackNo'");
    }

    if($modelName == "Fujitsu") {
        $final = mysqli_query($permission->dbConnect(), "UPDATE DONOR_FUJITSU SET PN='$pn' WHERE TRACK_NO='$trackNo'");
    }

    if($modelName == "Toshiba") {
        $final = mysqli_query($permission->dbConnect(), "UPDATE DONOR_TOSHIBA SET (SN='$sn', HDD_CODE='$hddCode', FW='$fw' WHERE TRACK_NO='$trackNo'");
    }

    if($final){
        mysqli_close($permission->dbConnect());
        $_SESSION['message'] = "Update database successfully";
        header("Location: ../../index.php?page_id=$page_id");
    }
    else{
        mysqli_close($permission->dbConnect());
        $_SESSION['message'] = "Edit Failed! Please, Contact with service provider";
        header("Location: ../../index.php?page_id=page_id=hdd_edit&id='$trackNo'");
    }

}

else{
    mysqli_close($permission->dbConnect());
    $_SESSION['message'] = "Edit Failed! Please, try again. Otherwise contact with service provider";
    header("Location: ../../index.php?page_id=page_id=hdd_edit&id='$trackNo'");
}

?>