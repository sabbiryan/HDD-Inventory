<?php
//session_start();
require "../security/DrsbdPermission.php";
$permission = new DrsbdPermission();

require "./class.search.php";
$search = new Search();

if(isset($_GET['searchFor']))
    $searchFor = $_GET['searchFor'];

if(isset($_GET['modelNo']))
    $modelNo = $_GET['modelNo'];

if(isset($_GET['modelName']))
    $modelName = $_GET['modelName'];

if(isset($_GET['track_no']))
    $trackNo = $_GET['track_no'];

if(isset($_GET['country']))
    $country = $_GET['country'];
if(isset($_GET['pcb']))
    $pcb = $_GET['pcb'];
if(isset($_GET['sn']))
    $sn = $_GET['sn'];
if(isset($_GET['mcu']))
    $mcu = $_GET['mcu'];


$donner_dhh = '';
if(!empty($modelName)){

    if($modelName == "Western Digital"){
        $donner_dhh = ", DONOR_WESTERN_DIGITAL AS H";
    }
    if($modelName == "Seagate"){
        $donner_dhh = ", DONOR_SEAGATE AS H";
    }
    if($modelName == "Samsung"){
        $donner_dhh = ", DONOR_SAMSUNG AS H";
    }
    if($modelName == "Hitachi/IBM" && $searchFor == "hdd"){
        $donner_dhh = ", DONOR_HITACHI_IBM AS H";
    }
    if($modelName == "Fujitsu"){
        $donner_dhh = ", DONOR_FUJITSU AS H";
    }
    if($modelName == "Toshiba"){
        $donner_dhh = ", DONOR_TOSHIBA AS H";
    }

    //PCB Exceptional
    if($modelName == "Hitachi/IBM" && $searchFor == "pcb"){
        $donner_dhh = ", DONOR_PCB_HITACHI_IBM AS H WHERE MODEL_NAME= '$modelName' AND D.TRACK_NO=H.TRACK_NO ";
    }
    if($modelName != "Hitachi/IBM" && $searchFor == "pcb"){
        $donner_dhh = " WHERE MODEL_NAME= '$modelName' ";
    }

}
$where_extensions = '';
if(!empty($modelNo))
    $where_extensions .= " AND D.MODEL_NO LIKE '$modelNo%' ";
if(!empty($trackNo))
    $where_extensions .= " AND D.TRACK_NO LIKE'$trackNo%' ";
if(!empty($country))
    $where_extensions .= " AND D.COUNTRY LIKE'$country%' ";
if(!empty($pcb) && $searchFor == "hdd")
    $where_extensions .= " AND D.PCB LIKE '$pcb%' ";
if(!empty($sn))
    $where_extensions .= " AND D.SN LIKE'$sn%' ";
if(!empty($mcu))
    $where_extensions .= " AND D.MCU LIKE '$mcu%' ";

//PCB Exceptional
if(!empty($pcb) && $searchFor == "pcb")
    $where_extensions .= " AND D.PCB_NO LIKE '$pcb%' ";


//$mysql = mysql_connect("localhost","root","") or die(mysql_error());
//$db = mysql_select_db("DRSBD_HDD_INVENTORY") or die(mysql_error());

if($searchFor == "hdd"){
    $sql = "SELECT * FROM DONOR_HDD_INVENTORY AS D " . $donner_dhh . " WHERE D.TRACK_NO=H.TRACK_NO " . $where_extensions . "";
    /*$query = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_HDD_INVENTORY AS D " . $donner_dhh . " WHERE D.TRACK_NO=H.TRACK_NO " . $where_extensions . "");

    //echo mysqli_num_rows($query);
    if(mysqli_num_rows($query) > 0 ){
        while($result = mysqli_fetch_array($query)){

        }
    }*/

    $result = $search->searchQuery($permission->dbConnect(), $sql);
    //print_r($result);
    $_SESSION['searchValue'] = $result;
    header("Location: ../index.php?page_id=result&search=hdd");
    exit;
}
if($searchFor == "pcb"){
    $sql = "SELECT * FROM DONOR_PCB_INVENTORY AS D" . $donner_dhh . " " . $where_extensions . "";
    /*$query = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_PCB_INVENTORY AS D" . $donner_dhh . " " . $where_extensions . "");

    //echo mysqli_num_rows($query);
    if(mysqli_num_rows($query) > 0 ){
        while($result = mysqli_fetch_array($query)){

        }
    }*/

    $result = $search->searchQuery($permission->dbConnect(),$sql);
    $_SESSION['searchValue'] = $result;
    header("Location: ../index.php?page_id=result&search=pcb");
    exit;
}


?>