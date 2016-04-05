<?php 
require 'security/check_security.php'; 
?>
<style>
    .dashboard{
        border: #204d74 solid thick;
        border-radius: 5px;
        padding: 40px;
        margin: 10px;
        font-size: 2.3em;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <a href="index.php?page_id=hdd-list">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="text-center text-uppercase dashboard">
                        <label class="control-label" style="cursor: pointer">HDD List</label>                
                    </div>
                </div>
            </a>
            <a href="index.php?page_id=pcb-list">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="text-center text-uppercase dashboard">
                        <label class="control-label" style="cursor: pointer">PCB List</label>                        
                    </div>			
                </div>
            </a>
            <a href="index.php?page_id=search">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="text-center text-uppercase dashboard">
                        <label class="control-label" style="cursor: pointer">Search</label>                        
                    </div>			
                </div>
            </a>
            <?php
            if( ($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN") ) {
                echo '<a href="index.php?page_id=hdd">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="text-center text-uppercase dashboard">
                            <label class="control-label" style="cursor: pointer">Add HDD</label>                        
                        </div>			
                    </div>
                </a>';
            }
            ?>
            <?php
            if( ($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN") ) {
                echo '<a href="index.php?page_id=pcb">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="text-center text-uppercase dashboard">
                            <label class="control-label" style="cursor: pointer">Add PCB</label>                        
                        </div>			
                    </div>
                </a>';
            }
            ?>            
        </div>
    </div>
</div>
