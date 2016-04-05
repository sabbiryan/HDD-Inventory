<?php
if(isset($_GET['id']))
    $edit_id= $_GET['id'];

//$mysql = mysqli_connect("localhost","root","") or die(mysqli_error());
//$db = mysqli_select_db("DRSBD_HDD_INVENTORY") or die(mysqli_error());
//if($mysql && $db){
    $query = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_HDD_INVENTORY WHERE TRACK_NO='$edit_id'");
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
        if($modelName == "Western Digital") {
            $result = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_WESTERN_DIGITAL WHERE TRACK_NO='$edit_id' ");
            if(mysqli_num_rows($result) > 0) {
                while ($resultData = mysqli_fetch_object($result)) {
                    $sn = $resultData->SN;
                    $dcm = $resultData->DCM;
                }
            }
        }

        if($modelName == "Seagate") {
            $result = mysqli_query($permission->dbConnect(), "SELECT * FROM  DONOR_SEAGATE WHERE TRACK_NO='$edit_id' ");
            if(mysqli_num_rows($result) > 0) {
                while ($resultData = mysqli_fetch_object($result)) {
                    $pn = $resultData->P/N;
                    $fw = $resultData->FW;
                    $siteCode = $resultData->SITE_CODE;
                    $pcbSticker = $resultData->PCB_STICKER;
                    $sn = $resultData->SN;
                }
            }
        }

        if($modelName == "Samsung") {
            $result = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_SAMSUNG WHERE TRACK_NO='$edit_id'");
            if(mysqli_num_rows($result) > 0) {
                while ($resultData = mysqli_fetch_object($result)) {
                    $pn = $resultData->PN;
                    $fw = $resultData->FW;
                    $rev = $resultData->REV;
                }
            }
        }

        if($modelName == "Hitachi/IBM") {
            $result = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_HITACHI_IBM WHERE TRACK_NO='$edit_id' ");
            if(mysqli_num_rows($result) > 0) {
                while ($resultData = mysqli_fetch_object($result)) {
                    $pn = $resultData->PN;
                    $mlc = $resultData->MLC;
                    $pcbSticker = $resultData->PCB_STICKER;
                    $mcu = $resultData->MCU;
                    $smooth = $resultData->SMOOTH;
                }
            }
        }

        if($modelName == "Fujitsu") {
            $result = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_FUJITSU WHERE TRACK_NO='$edit_id' ");
            if(mysqli_num_rows($result) > 0) {
                while ($resultData = mysqli_fetch_object($result)) {
                    $pn = $resultData->PN;
                }
            }
        }

        if($modelName == "Toshiba") {
            $result = mysqli_query($permission->dbConnect(), "SELECT * FROM DONOR_TOSHIBA WHERE TRACK_NO='$edit_id'");
            if(mysqli_num_rows($result) > 0) {
                while ($resultData = mysqli_fetch_object($result)) {
                    $sn = $resultData->SN;
                    $hddCode = $resultData->HDD_CODE;
                    $fw = $resultData->FW;
                }
            }
        }
    }
    else {
//        $track_no = 1;
    }
//}

?>

<div  class="col-lg-12">
    <div class="col-lg-12">
        <h3 class="text-danger">Edit Donor HDD inventory</h3>
    </div>
</div>

<div class="col-lg-12">
    <form role="form" method="post" action="form/form_action/hdd_inventory_edit_action.php">

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
<!--                </select>-->
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label for="modelNo" class="control-label col-lg-12">Model No *</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="modelNo" placeholder="Model no." name="modelNo" required="required" value="<?php echo $modelNo; ?>">
            </div>
        </div>

        <?php if($modelName == "Western Digital"){ ?>
        <!-- WD-->
            <div class='col-lg-12 '><br/></div>
               <div>
                   <label class='control-label col-lg-12' for='sn'>SN *</label>
                   <div class='col-lg-4'>
                       <input class='form-control' type='text' id='sn' name='sn' placeholder='SN' required='required' value="<?php echo $sn; ?>"/>
                    </div>
                </div>

            <div class='col-lg-12 '><br/></div>

            <div>
                <label class='control-label col-lg-12' for='dcm'>DCM *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='dcm' name='dcm' placeholder='DCM' required='required' value="<?php echo $dcm; ?>" />
                </div>
            </div>


        <?php } elseif($modelName == "Seagate"){ ?>
        <!-- Seagate-->

            <div class='col-lg-12 '><br/></div>
                                                         <div>
                <label class='control-label col-lg-12' for='pn'>P/N *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='pn' name='pn' placeholder='P/N' required='required' value="<?php echo $pn; ?>" />
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                                                                     <div>
                <label class='control-label col-lg-12' for='fw'>FW *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='fw' name='fw' placeholder='FW' required='required' value="<?php echo $fw; ?>"/>
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                                                                     <div>
                <label class='control-label col-lg-12' for='siteCode'>Site Code *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='siteCode' name='siteCode' placeholder='Site Code' required='required' value="<?php echo $siteCode; ?>"/>
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                <div>
	                <label class='control-label col-lg-12' for='PCBSticker'>PCB Sticker *</label>
	                <div class='col-lg-4'>
	                    <input class='form-control' type='text' id='PCBSticker' name='PCBSticker' placeholder='PCB Sticker' required='required' value="<?php echo $pcbSticker; ?>" />
                    </div>
                </div>
                <div>
	                <label class='control-label col-lg-12' for='sn'>S/N *</label>
	                <div class='col-lg-4'>
	                    <input class='form-control' type='text' id='sn' name='sn' placeholder='S.N' required='required' value="<?php echo $sn; ?>" />
                    </div>
                </div>


        <?php } elseif($modelName == "Samsung"){?>
        <!-- Samsung-->
            <div class='col-lg-12 '><br/></div>
                                               <div>
                <label class='control-label col-lg-12' for='pn'>PN *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='pn' name='pn' placeholder='PN' required='required' value="<?php echo $pn; ?>"/>
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                                                                     <div>
                <label class='control-label col-lg-12' for='fw'>FW</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='fw' name='fw' placeholder='FW'  value="<?php $fw = $fw != null ? $fw : ""; echo $fw?>"/>
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                                                                     <div>
                <label class='control-label col-lg-12' for='rev'>Rev *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='rev' name='rev' placeholder='Rev' required='required' value="<?php echo $rev; ?>" />
                    </div>
                </div>

        <?php } elseif($modelName == "Hitachi/IBM"){?>
        <!-- Hitachi/IBM-->
            <div class='col-lg-12 '><br/></div>
                                               <div>
                <label class='control-label col-lg-12' for='pn'>PN</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='pn' name='pn' placeholder='PN' value="<?php $pn = $pn != null ? $pn : ""; echo $pn; ?>" />
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                                                                     <div>
                <label class='control-label col-lg-12' for='mlc'>MLC *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='mlc' name='mlc' placeholder='MLC' required='required' value="<?php echo $mlc; ?>" />
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                                                                     <div>
                <label class='control-label col-lg-12' for='PCBSticker'>PCB Sticker</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='PCBSticker' name='PCBSticker' placeholder='PCB Sticker' value="<?php $pcbSticker = $pcbSticker != null ? $pcbSticker : ""; echo $pcbSticker; ?>" />
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                                                                     <div>
                <label class='control-label col-lg-12' for='mcu'>MCU *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='mcu' name='mcu' placeholder='MCU' required='required' value="<?php echo $mcu; ?>" />
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                                                                     <div>
                <label class='control-label col-lg-12' for='smooth'>SMOOTH *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='smooth' name='smooth' placeholder='SMOOTH' required='required' value="<?php echo $smooth; ?>"/>
                    </div>
                </div>

        <?php } elseif($modelName == "Fujitsu"){?>
        <!-- Fujitsu-->
            <div class='col-lg-12 '><br/></div>
                                               <div>
                <label class='control-label col-lg-12' for='pn'>PN *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='pn' name='pn' placeholder='PN' required='required' value="<?php echo $pn; ?>" />
                    </div>
                </div>

        <?php } elseif($modelName == "Toshiba"){?>
        <!-- Toshiba-->
            <div class='col-lg-12 '><br/></div>
                                               <div>
                <label class='control-label col-lg-12' for='sn'>SN *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='sn' name='sn' placeholder='SN' required='required' value="<?php echo $sn; ?>" />
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                                                                     <div>
                <label class='control-label col-lg-12' for='hddCode'>HDD Code *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='hddCode' name='hddCode' placeholder='HDD Code' required='required' value="<?php echo $hddCode; ?>" />
                    </div>
                </div>
                       <div class='col-lg-12 '><br/></div>
                                                                     <div>
                <label class='control-label col-lg-12' for='fw'>FW *</label>
                <div class='col-lg-4'>
                    <input class='form-control' type='text' id='fw' name='fw' placeholder='FW' required='required' value="<?php echo $fw; ?>" />
                    </div>
                </div>

        <?php }?>

        <div id="wd"></div>
        <div id="seagate"></div>
        <div id="samsung"></div>
        <div id="hitachi_ibm"></div>
        <div id="fujitsu"></div>
        <div id="toshiba"></div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-12" for="date">Date *</label>
            <div class="col-lg-4">
                <input class="form-control" type="date" id="date" name="date" placeholder="Date-Formate: YYYY-MM-DD" required="required" value="<?php echo $date; ?>"/>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-12" for="country">Country *</label>
            <div class="col-lg-4">
                <select class="form-control"  id="country" name="country"  required="required" >
                    <option value="<?php echo $country; ?>" selected><?php echo $country; ?></option>
                    <?php
                    include "include/country-list.php";
                    ?>
                </select>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group" id="pcbGroup">
            <label class="control-label col-lg-12" for="pcb">PCB *</label>
            <div class="col-lg-4">
                <input class="form-control" type="text" id="pcb" name="pcb" placeholder="PCB no." value="<?php echo $pcb; ?>"/>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-12" for="pcb">Note *</label>
            <div class="col-lg-4">
                <textarea class="form-control" type="text" id="note" name="note" placeholder="Note" required="required"><?php echo $modelNo; ?></textarea>
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