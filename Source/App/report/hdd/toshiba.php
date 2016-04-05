<h4 class="text-danger">List of donor Toshiba HDD:</h4>
<table class="table table-bordered">
    <thead>
    <tr class="active ">
        <th>Track No</th>
        <th>Brand</th>
        <th>Model No.</th>
        <th>SN</th>
        <th>HDD Code</th>
        <th>FW</th>
        <th>Date</th>
        <th>Country</th>
        <th>PCB</th>
        <th>Note</th>
        <?php
        if( ($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN") )
            echo "<th>Actions</th>";
        ?>
    </tr>
    </thead>

<?php
//$mysql = mysql_connect("localhost","root","") or die(mysql_error());
//$db = mysql_select_db("DRSBD_HDD_INVENTORY") or die(mysql_error());
$result = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_HDD_INVENTORY AS D, DONOR_TOSHIBA AS T
          WHERE D.MODEL_NAME='Toshiba' AND D.TRACK_NO=T.TRACK_NO ORDER BY D.TRACK_NO ASC ");
if(mysqli_num_rows($result)){
    if( ($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN") ){
        while($data = mysqli_fetch_array($result)){
            echo "<tr>
            <td>". $data['TRACK_NO'] ."</td>
            <td>". $data['MODEL_NAME'] ."</td>
            <td>". $data['MODEL_NO'] ."</td>
            <td>". $data['SN'] ."</td>
            <td>". $data['HDD_CODE'] ."</td>
            <td>". $data['FW'] ."</td>
            <td>". $data['DATE'] ."</td>
            <td>". $data['COUNTRY'] ."</td>
            <td>". $data['PCB'] ."</td>
            <td>". $data['NOTE'] ."</td>
            <td><a href='index.php?page_id=hdd_edit&id=". $data['TRACK_NO'] ."'>Edit</a>&nbsp;<a href='index.php?page_id=hdd_delete&id=". $data['TRACK_NO'] ."'>Delete</a></td>
        </tr>";
        }
    }else{
        while($data = mysqli_fetch_array($result)){
            echo "<tr>
            <td>". $data['TRACK_NO'] ."</td>
            <td>". $data['MODEL_NAME'] ."</td>
            <td>". $data['MODEL_NO'] ."</td>
            <td>". $data['SN'] ."</td>
            <td>". $data['HDD_CODE'] ."</td>
            <td>". $data['FW'] ."</td>
            <td>". $data['DATE'] ."</td>
            <td>". $data['COUNTRY'] ."</td>
            <td>". $data['PCB'] ."</td>
            <td>". $data['NOTE'] ."</td>
        </tr>";
        }
    }

    mysqli_close($permission->dbConnect());
}
echo "</table>";?>