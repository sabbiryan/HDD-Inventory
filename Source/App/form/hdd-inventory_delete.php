<?php

if(isset($_GET['id']))
    $delete_id= $_GET['id'];

//$mysql = mysql_connect("localhost","root","") or die(mysql_error());
//$db = mysql_select_db("DRSBD_HDD_INVENTORY") or die(mysql_error());
//if($mysql && $db){
    $query = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_HDD_INVENTORY WHERE TRACK_NO='$delete_id'");
    if(mysqli_num_rows($query) > 0){
        while($data = mysqli_fetch_object($query)){
            $track_no = $data->TRACK_NO;
            $modelName = $data->MODEL_NAME;
            $modelNo = $data->MODEL_NO;
            $date = $data->DATE;
            $country = $data->COUNTRY;
            $pcb = $data->PCB;
            $note = $data->NOTE;
        }
    }
    else {
        //$track_no = 1;
    }
//}

?>

<div  class="col-lg-12">
    <div class="col-lg-12">
        <h4 class="text-danger">Do you really want to delete this Donor HDD inventory?</h4>
    </div>
</div>

<div class="col-lg-12">
    <form role="form" method="post" action="form/form_action/hdd_inventory_delete_action.php">

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-danger" name="delete_action" value="yes">Yes</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-danger" name="delete_action" value="no">No</button>
        </div>
        <div class="col-lg-12">
            <br/>
        </div>

        <div class="form-group">
            <label for="trackNo" class="control-label col-lg-12">Track No</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="trackNo" name="trackNo" required="required" value="<?php echo $track_no; ?>" readonly="readonly"/>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label for="modelName" class="control-label col-lg-12" >Brand</label>
            <div class="col-lg-4">
                <input class="form-control" name="modelName" id="modelName" required="required" readonly="readonly" value="<?php echo $modelName; ?>" />
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label for="modelNo" class="control-label col-lg-12">Model No *</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="modelNo" placeholder="Model no." name="modelNo" required="required" readonly="readonly" value="<?php echo $modelNo; ?>">
            </div>
        </div>


        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-12" for="date">Date *</label>
            <div class="col-lg-4">
                <input class="form-control" type="date" id="date" name="date" placeholder="Date-Formate: YYYY-MM-DD" required="required" readonly="readonly" value="<?php echo $date; ?>"/>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-12" for="country">Country *</label>
            <div class="col-lg-4">
                <input class="form-control" type="text" id="country" name="country" placeholder="Country" required="required" readonly="readonly" value="<?php echo $country; ?>"/>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group" id="pcbGroup">
            <label class="control-label col-lg-12" for="pcb">PCB *</label>
            <div class="col-lg-4">
                <input class="form-control" type="text" id="pcb" name="pcb" placeholder="PCB no."  readonly="readonly" value="<?php echo $pcb; ?>"/>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-12" for="pcb">Note *</label>
            <div class="col-lg-4">
                <textarea class="form-control" type="text" id="note" name="note" placeholder="Note" required="required" readonly="readonly"><?php echo $note; ?></textarea>
            </div>
        </div>

    </form>
</div>