

<div style="margin-top: 10px;">
    <div class="row">
        <form class="form" role="form" method="get" action="./search/search_action.php">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="control-label col-lg-12" for="searType" >Search Type *</label>
                    <div class="form-group col-lg-4" style="margin-left: 10px;">

                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="searchFor" id="searchFor" value="hdd" checked required="required">
                                HDD
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="searchFor" id="searchFor" value="pcb" required="required">
                                PCB
                            </label>
                        </div>

<!--<select class="form-control" id="searchFor" name="searchFor" required="">-->
                        <!--<option value="">Select Search Type</option>-->
                        <!--<option value="hdd">HDD</option>-->
                        <!--<option value="pcb">PCB</option>-->
                        <!--</select>-->
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-12" for="modelName">Brand *</label>
                    <div class="form-group col-lg-4">
                        <select class="form-control" id="modelName" name="modelName" required="required">
                            <option value="">Select Brand</option>
                            <option value="Western Digital">Western Digital</option>
                            <option value="Seagate">Seagate</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Hitachi/IBM">Hitachi/IBM</option>
                            <option value="Fujitsu">Fujitsu</option>
                            <option value="Toshiba">Toshiba</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class=" col-lg-12">
                <div class="form-group">
                    <label class="control-label col-lg-12" for="sn">Track No</label>
                    <div class="form-group col-lg-4">
                        <input type="text" class="form-control" id="track_no" placeholder="Track No" name="track_no">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-12" for="modelNo">Model No</label>
                    <div class="form-group col-lg-4">
                        <input type="text" class="form-control" id="modelNo" placeholder="Model No" name="modelNo">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-lg-12" for="country">Country</label>
                    <div class="form-group col-lg-4">
                        <select  class="form-control" id="country"  name="country">
                            <?php
                            include "include/country-list.php";
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-12" for="pcb">PCB</label>
                    <div class="form-group col-lg-4">
                        <input type="text" class="form-control" id="pcb" placeholder="PCB No." name="pcb">
                    </div>
                </div>
            </div>


            <div class="col-lg-12">

                <div class="form-group">
                    <label class="control-label col-lg-12" for="sn">SN</label>
                    <div class="form-group col-lg-4">
                        <input type="text" class="form-control" id="sn" placeholder="SN" name="sn">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-12" for="mcu">MCU</label>
                    <div class="form-group col-lg-4">
                        <input type="text" class="form-control" id="mcu" placeholder="MCU" name="mcu">
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-group btn-success">Search</button>
                </div>
            </div>
        </form>

        <!--<div class="col-lg-2">-->
        <!--    <a href="#" class="btn btn-success" id="">Western Digital</a>-->
        <!--</div>-->
        <!--<div class="col-lg-2">-->
        <!--    <a href="#" class="btn btn-success" id="">Seagate</a>-->
        <!--</div>-->
        <!--<div class="col-lg-2">-->
        <!--    <a href="#" class="btn btn-success" id="">Samsung</a>-->
        <!--</div>-->
        <!--<div class="col-lg-2">-->
        <!--    <a href="#" class="btn btn-success" id="">Hitachi/IBM</a>-->
        <!--</div>-->
        <!--<div class="col-lg-2">-->
        <!--    <a href="#" class="btn btn-success" id="">Fujitsu</a>-->
        <!--</div>-->
    </div>
</div>