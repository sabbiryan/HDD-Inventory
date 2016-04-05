<?php
//session_start();
//error_reporting(0);
require ("../../security/DrsbdPermission.php");
$permission = new DrsbdPermission();

//var_dump($permission->dbConnect());

//exit;

//for(;;){
//    mysqli_close($permission->dbConnect());
//}

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


//$mysql = mysql_connect("localhost","root","") or die(mysql_errno());
//$db = mysql_select_db("DRSBD_HDD_INVENTORY");
//mysqli_close($permission->dbConnect());
//$connect = mysqli_connect("localhost","root","","DRSBD_HDD_INVENTORY") or die(mysqli_connect_error());
//var_dump($permission->dbConnect());
//echo $permission->dbConnect()->begin_transaction();
//xdebug_var_dump($permission->dbConnect());
//exit;
$result = mysqli_query($permission->dbConnect(), "INSERT INTO DONOR_HDD_INVENTORY (TRACK_NO,MODEL_NAME,MODEL_NO,DATE,COUNTRY,PCB,NOTE,DTTM) VALUES('$trackNo','$modelName','$modelNo','$date','$country','$pcb','$note','$dttm') ");
//var_dump($result);
//mysqli_close($permission->dbConnect());
//exit;
if($result){

    if($modelName == "Western Digital") {
        $final = mysqli_query($permission->dbConnect(), "INSERT INTO DONOR_WESTERN_DIGITAL (TRACK_NO, SN, DCM) VALUES('$trackNo','$sn','$dcm')");
    }

    if($modelName == "Seagate") {
        //echo $trackNo. " "; echo $pn. " "; echo $fw. " "; echo $siteCode. " "; echo $pcbSticker. " ";
        //exit;
        $final = mysqli_query($permission->dbConnect(), "INSERT INTO DONOR_SEAGATE (TRACK_NO, PN, FW, SITE_CODE, PCB_STICKER, SN) VALUES('$trackNo','$pn','$fw','$siteCode','$pcbSticker', '$sn')");
        //exit;
    }

    if($modelName == "Samsung") {
        $final = mysqli_query($permission->dbConnect(), "INSERT INTO DONOR_SAMSUNG (TRACK_NO, PN, FW, REV) VALUES('$trackNo','$pn','$fw','$rev')");
    }

    if($modelName == "Hitachi/IBM") {
        $final = mysqli_query($permission->dbConnect(), "INSERT INTO DONOR_HITACHI_IBM (TRACK_NO, PN, MLC, PCB_STICKER, MCU, SMOOTH) VALUES('$trackNo','$pn','$mlc','$pcbSticker','$mcu','$smooth')");
    }

    if($modelName == "Fujitsu") {
        $final = mysqli_query($permission->dbConnect(), "INSERT INTO DONOR_FUJITSU (TRACK_NO, PN) VALUES('$trackNo','$pn')");
    }

    if($modelName == "Toshiba") {
        $final = mysqli_query($permission->dbConnect(), "INSERT INTO DONOR_TOSHIBA (TRACK_NO, SN, HDD_CODE, FW) VALUES('$trackNo','$sn','$hddCode','$fw')");
    }

    if($final){
        mysqli_close($permission->dbConnect());
        $_SESSION['message'] = "One row added successfully";
        header("Location: ../../index.php?page_id=$page_id");
    }
    else{
        //var_dump($final); exit;

        mysqli_close($permission->dbConnect());
        $_SESSION['message'] = "Donor HDD add failed! Please contact with service provider";
        header("Location: ../../index.php?page_id=hdd");
    }
}

else{
    //var_dump($result); exit;

    mysqli_close($permission->dbConnect());
    $_SESSION['message'] = "Donor HDD add failed! Please contact with service provider";
    header("Location: ../../index.php?page_id=hdd");
}


?>