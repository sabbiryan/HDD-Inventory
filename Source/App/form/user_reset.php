<?php
//require "./security/DrsbdPermission.php";
$permission = new DrsbdPermission();

if(isset($_GET['id']))
    $reset_id= $_GET['id'];
if(isset($_SESSION['reset']))
    $resetValue = $_SESSION['reset'];

if($permission->getUserDetails($reset_id) != false)
    $userDetails = $permission->getUserDetails($reset_id);
else
{
    error_reporting(0);
    $_SESSION['message'] = "No user data found";
}


?>

<div  class="col-lg-12">
    <div class="col-lg-12">
        <h4 class="text-danger">User Reset Panel: </h4>
    </div>
</div>

<div class="col-lg-12">
    <form role="form" method="post" action="form/form_action/user_reset_action.php">

        <div class="form-group">
            <label class="control-label col-lg-3">Full Name: </label>
            <div class="col-lg-9">
                <span><?php echo $userDetails[0]; ?></span>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label  class="control-label col-lg-3" >Username : </label>
            <div class="col-lg-9">
                <span><?php echo $userDetails[1]; ?></span>
            </div>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" >User Type: </label>
            <div class="col-lg-9">
                <span><?php echo $userDetails[2]; ?></span>
            </div>
        </div>

        <input type="hidden" value="<?php echo $reset_id ?>" name="reset_id" />

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-danger" name="reset_action" value="password">Reset Password</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-danger" name="reset_action" value="authentication">Reset Authentication</button>
        </div>
        <div class="col-lg-12">
            <br/>
        </div>

        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" ><?php if(isset($resetValue)) echo $resetValue; unset($_SESSION['reset']); ?></label>
            <div class="col-lg-9">
            </div>
        </div>

    </form>
</div>

