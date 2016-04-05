<?php
//require "./security/DrsbdPermission.php";
$permission = new DrsbdPermission();

?>


<div class="col-lg-6">
     <div class="col-lg-12">
        <h3 class="text-danger">Change Password:</h3>
    </div>
    
    <form role="form" method="post" action="form/form_action/change-password-authentication_action.php">

        <div class="form-group">
            <label for="currentPassword" class="control-label col-lg-12" >Current Password *</label>
            <div class="col-lg-10">
                <input type="password" name="currentPassword" id="currentPassword" required="required" class="form-control">
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label for="newPassword" class="control-label col-lg-12">New Password *</label>
            <div class="col-lg-10">
                <input type="password" name="newPassword" id="newPassword" required="required" class="form-control"/>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label for="confirmPassword" class="control-label col-lg-12">Confirm Password *</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required="required"/>
            </div>
        </div>



        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group col-lg-12">
            <input type="hidden" name="password" value="password" />
            <button type="submit" class="btn btn-danger">Change Password</button>
        </div>
    </form>

</div>

<div class="col-lg-6">
    <div class="col-lg-12">
        <h3 class="text-danger">Change Authentication:</h3>
    </div>
    <form role="form" method="post" action="form/form_action/change-password-authentication_action.php">

        <div class="form-group">
            <label for="currentAuthentication" class="control-label col-lg-12" >Current Authentication *</label>
            <div class="col-lg-10">
                <input type="password" name="currentAuthentication" id="currentAuthentication" required="required" class="form-control" maxlength="4" minlength="3" />
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label for="newAuthentication" class="control-label col-lg-12">New Authentication *</label>
            <div class="col-lg-10">
                <input type="password" name="newAuthentication" id="newAuthentication" required="required" class="form-control" maxlength="4" minlength="4"/>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label for="confirmAuthentication" class="control-label col-lg-12">Confirm Authentication *</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" id="confirmAuthentication" name="confirmAuthentication" required="required" maxlength="4" minlength="4"/>
            </div>
        </div>



        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group col-lg-12">
            <input type="hidden" name="authentication" value="authentication">
            <button type="submit" class="btn btn-danger">Change Authentication</button>
        </div>
    </form>

</div>