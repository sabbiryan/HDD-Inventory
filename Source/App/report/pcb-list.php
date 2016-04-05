


<h4 class="text-danger">List of donor PCB:</h4>
<table class="table table-bordered">
        <thead>
        <tr class="active ">
            <th>Track No</th>
            <th>Brand</th>
            <th>PCB No</th>
            <th>Note</th>
            <?php
            if( ($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN") ){
                echo "<th>Actions</th>";
            }
            ?>

        </tr>
        </thead>

<?php
//$mysql = mysql_connect("localhost","root","") or die(mysql_error());
//$db = mysql_select_db("DRSBD_HDD_INVENTORY") or die(mysql_error());
$result = mysqli_query($permission->dbConnect(),"SELECT * FROM DONOR_PCB_INVENTORY ORDER BY TRACK_NO ASC ");
if(mysqli_num_rows($result)){
    if( ($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN") ){
        while($pcbData = mysqli_fetch_array($result)){
            echo "<tr>
            <td>". $pcbData['TRACK_NO'] ."</td>
            <td>". $pcbData['MODEL_NAME'] ."</td>
            <td>". $pcbData['PCB_NO'] ."</td>
            <td>". $pcbData['NOTE'] ."</td>
            <td><a href='index.php?page_id=pcb_edit&id=". $pcbData['TRACK_NO'] ."'>Edit</a>&nbsp;<a href='index.php?page_id=pcb_delete&id=". $pcbData['TRACK_NO'] ."'>Delete</a></td>
        </tr>";
        }
    }
    else{
        while($pcbData = mysqli_fetch_array($result)) {
            echo "<tr>
            <td>" . $pcbData['TRACK_NO'] . "</td>
            <td>" . $pcbData['MODEL_NAME'] . "</td>
            <td>" . $pcbData['PCB_NO'] . "</td>
            <td>" . $pcbData['NOTE'] . "</td>

            </tr>";
        }
    }

    mysqli_close($permission->dbConnect());
}
echo "</table>";

