<?php
if(isset($_GET['id']))
    $edit_id= $_GET['id'];


//$mysql = mysql_connect("localhost","root","") or die(mysql_error());
//$db = mysql_select_db("DRSBD_HDD_INVENTORY") or die(mysql_error());
//if($mysql && $db){
    $query = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_PCB_INVENTORY WHERE TRACK_NO='$edit_id' ");
    if(mysqli_num_rows($query) > 0){
        while($data = mysqli_fetch_object($query)){
            $track_no = $data->TRACK_NO;
            $modelName = $data->MODEL_NAME;
            $pcbNo = $data->PCB_NO;
            $note = $data->NOTE;
        }
        if($modelName == "Hitachi/IBM"){
            $hitachi = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_PCB_HITACHI_IBM WHERE TRACK_NO='$edit_id' ");
            if(mysqli_num_rows($hitachi) > 0) {
                while ($hitachiData = mysqli_fetch_object($hitachi)) {
                    $id=$hitachiData->ID;
                    $track_no = $hitachiData->TRACK_NO;
                    $mcu = $hitachiData->MCU;
                    $smooth = $hitachiData->SMOOTH;
                }
            }
        }
    }
    else {

    }
//}

?>

<div  class="col-lg-12">
    <div class="col-lg-12">
        <h3 class="text-danger">Edit Donor PCB</h3>
    </div>
</div>

<div class="col-lg-12">
    <form role="form" method="post" action="form/form_action/pcb_inventory_edit_action.php">

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
<!--                <select class="form-control" name="modelName" id="modelName" required="required" onchange="loadRequireFields(this);">-->
<!--                    <option value="">Select HDD Model</option>-->
<!--                    <option value="Western Digital" --><?php //if($modelName=='Western Digital') echo 'selected=selected'; ?><!-- >Western Digital</option>-->
<!--                    <option value="Seagate" --><?php //if($modelName=='Seagate') echo 'selected=selected'; ?><!-- >Seagate</option>-->
<!--                    <option value="Samsung" --><?php //if($modelName=='Samsung') echo 'selected=selected'; ?><!-- >Samsung</option>-->
<!--                    <option value="Hitachi/IBM" --><?php //if($modelName=='Hitachi/IBM') echo 'selected=selected'; ?><!-- >Hitachi/IBM</option>-->
<!--                    <option value="Fujitsu" --><?php //if($modelName=='Fujitsu') echo 'selected=selected'; ?><!-- >Fujitsu</option>-->
<!--                    <option value="Toshiba" --><?php //if($modelName=='Toshiba') echo 'selected=selected'; ?><!-- >Toshiba</option>-->
<!---->
<!--                </select>-->
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

        <?php
        if($modelName == "Hitachi/IBM"){
            $output = "<div class='col-lg-12 '><br/></div>
                <div>
                    <label class='control-label col-lg-12' for='pn'>MCU *</label>
                    <div class='col-lg-4'>
                        <input class='form-control' type='text' id='mcu' name='mcu' placeholder='MCU' required='required' value='$mcu' />
                    </div>
                </div>";
            $output .= "<div class='col-lg-12 '><br/></div>
                <div>
                    <label class='control-label col-lg-12' for='smooth'>Smooth *</label>
                    <div class='col-lg-4'>
                        <input class='form-control' type='text' id='smooth' name='smooth' placeholder='Smooth' required='required' value='$smooth' />
                    </div>
                </div>";
            echo $output;
        }else{
        ?>
        <div id="hitachi_ibm_pcb"></div>

        <div class="col-lg-12" id="pcbBr">
            <br/>
        </div>
        <div class="form-group" id="pcbController">
            <label class="control-label col-lg-12" for="pcb">PCB No *</label>
            <div class="col-lg-4">
                <input class="form-control" type="text" id="pcb" name="pcb" placeholder="PCB No." value="<?php echo $pcbNo; ?>" />
            </div>
        </div>
        <?php }?>


        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-12" for="pcb" >Note *</label>
            <div class="col-lg-4">
                <textarea class="form-control" type="text" id="note" name="note" placeholder="Note" required="required" ><?php echo $note; ?></textarea>
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

