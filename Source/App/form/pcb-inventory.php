<?php
//$mysql = mysql_connect("localhost","root","") or die(mysql_error());
//$db = mysql_select_db("DRSBD_HDD_INVENTORY") or die(mysql_error());

//if($mysql && $db){
    $query = mysqli_query($permission->dbConnect(), "SELECT TRACK_NO FROM DONOR_PCB_INVENTORY ORDER BY TRACK_NO DESC LIMIT 1");
    if(mysqli_num_rows($query) > 0){
        //while($data = mysql_fetch_object($query)){
        $data = mysqli_fetch_object($query);
        $track_no = $data->TRACK_NO + 1;
        //}
    }
    else {
        $track_no = 1;
    }
//}

?>

<div  class="col-lg-12">
    <div class="col-lg-12">
        <h3 class="text-danger">Add New Donor PCB</h3>
    </div>
</div>

<div class="col-lg-12">
    <form role="form" method="post" action="form/form_action/pcb_inventory_action.php">

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
                <select class="form-control" name="modelName" id="modelName" required="required" onchange="loadRequireFields(this);">
                    <option value="">Select HDD Model</option>
                    <option value="Western Digital">Western Digital</option>
                    <option value="Seagate">Seagate</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Hitachi/IBM">Hitachi/IBM</option>
                    <option value="Fujitsu">Fujitsu</option>
                    <option value="Toshiba">Toshiba</option>
                </select>
            </div>
        </div>

<!--        <div class="col-lg-12">-->
<!--            <br/>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="modelNo" class="control-label col-lg-12">Model No *</label>-->
<!--            <div class="col-lg-4">-->
<!--                <input type="text" class="form-control" id="modelNo" placeholder="Model no." name="modelNo" required="required">-->
<!--            </div>-->
<!--        </div>-->

        <div class="col-lg-12" id="pcbBr">
            <br/>
        </div>
        <div class="form-group" id="pcbController">
            <label class="control-label col-lg-12" for="pcb">PCB No *</label>
            <div class="col-lg-4">
                <input class="form-control" type="text" id="pcb" name="pcb" placeholder="PCB No." />
            </div>
        </div>

        <div id="hitachi_ibm_pcb"></div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-12" for="pcb">Note *</label>
            <div class="col-lg-4">
                <textarea class="form-control" type="text" id="note" name="note" placeholder="Note" required="required"></textarea>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </form>
</div>