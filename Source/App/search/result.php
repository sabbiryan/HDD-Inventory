<?php
//session_start();

if (isset($_GET['search'])) {

    $resultFor = $_GET['search'];
    $result = $_SESSION['searchValue'];

    //print_r($result);
}

if($resultFor == "hdd"){
?>
    <h4 class="text-danger">Search Result For Donner HDD: </h4>
    <table class="table table-bordered">
        <thead>
            <tr class="active ">
                <th>Track No</th>
                <th>Brand</th>
                <th>Model No.</th>
                <th>Date</th>
                <th>Country</th>
                <th>PCB</th>
                <th>SN</th>
                <th>MCU</th>
                <th>Note</th>
                <?php
                if (($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN"))
                    echo "<th>Actions</th>";
                ?>
            </tr>
        </thead>

        <?php
        if($result != 0){
            $i = 0;
            if (($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN")) {
                while ($i < sizeof($result)) {
                    $data = $result[$i];
                    if(!isset($data['MCU']))
                        $data['MCU'] = '';
                    if(!isset($data['SN']))
                        $data['SN'] = '';
                    echo "<tr>
                    <td>" . $data['TRACK_NO'] . "</td>
                    <td>" . $data['MODEL_NAME'] . "</td>
                    <td>" . $data['MODEL_NO'] . "</td>
                    <td>" . $data['DATE'] . "</td>
                    <td>" . $data['COUNTRY'] . "</td>
                    <td>" . $data['PCB'] . "</td>
                    <td>" . $data['SN'] . "</td>
                    <td>" . $data['MCU'] . "</td>
                    <td>" . $data['NOTE'] . "</td>
                    <td><a href='index.php?page_id=hdd_edit&id=" . $data['TRACK_NO'] . "'>Edit</a>&nbsp;<a href='index.php?page_id=hdd_delete&id=" . $data['TRACK_NO'] . "'>Delete</a></td>
                </tr>";
                    $i++;
                }
            } else {
                while ($i < sizeof($result)) {
                    $data = $result[$i];
                    if(!isset($data['MCU']))
                        $data['MCU'] = '';
                    if(!isset($data['SN']))
                        $data['SN'] = '';
                    echo "<tr>
                    <td>" . $data['TRACK_NO'] . "</td>
                    <td>" . $data['MODEL_NAME'] . "</td>
                    <td>" . $data['MODEL_NO'] . "</td>
                    <td>" . $data['DATE'] . "</td>
                    <td>" . $data['COUNTRY'] . "</td>
                    <td>" . $data['PCB'] . "</td>
                    <td>" . $data['SN'] . "</td>
                    <td>" . $data['MCU'] . "</td>
                    <td>" . $data['NOTE'] . "</td>
                </tr>";
                    $i++;
                }
            }
        }
        else{
            echo "<tr>
                    <td>No result found for this search key! try with different one</td>
                </tr>";
        }
        echo "</table>";
}

if($resultFor == "pcb"){
?>

    <h4 class="text-danger">Search Result for Donner PCB:</h4>
    <table class="table table-bordered">
        <thead>
            <tr class="active ">
                <th>Track No</th>
                <th>Brand</th>
                <th>PCB No</th>
                <th>Note</th>
                <?php
                if (($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN")) {
                    echo "<th>Actions</th>";
                }
                ?>

            </tr>
        </thead>

        <?php

        if($result != 0){
            $i = 0;
            if (($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN")) {
                while ($i < sizeof($result)) {
                    $pcbData = $result[$i];
                    echo "<tr>
                    <td>" . $pcbData['TRACK_NO'] . "</td>
                    <td>" . $pcbData['MODEL_NAME'] . "</td>
                    <td>" . $pcbData['PCB_NO'] . "</td>
                    <td>" . $pcbData['NOTE'] . "</td>
                    <td><a href='index.php?page_id=pcb_edit&id=" . $pcbData['TRACK_NO'] . "'>Edit</a>&nbsp;<a href='index.php?page_id=pcb_delete&id=" . $pcbData['TRACK_NO'] . "'>Delete</a></td>
                </tr>";
                    $i++;
                }
            } else {
                while ($i < sizeof($result)) {
                    $pcbData = $result[$i];
                    echo "<tr>
                    <td>" . $pcbData['TRACK_NO'] . "</td>
                    <td>" . $pcbData['MODEL_NAME'] . "</td>
                    <td>" . $pcbData['PCB_NO'] . "</td>
                    <td>" . $pcbData['NOTE'] . "</td>
                </tr>";
                    $i++;
                }
            }
        }
        else{
            echo "<tr>
                    <td>No result found for this search key! try with different one</td>
                </tr>";
        }

    echo "</table>";

}

?>

        