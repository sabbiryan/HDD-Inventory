<?php
//require "./security/DrsbdPermission.php";
$permission = new DrsbdPermission();

if(isset($_GET['id']))
    $delete_id= $_GET['id'];

if($permission->getUserDetails($delete_id) != false)
    $userDetails = $permission->getUserDetails($delete_id);
else
{
    error_reporting(0);
    $_SESSION['message'] = "No user data found";
}


?>

<div  class="col-lg-12">
    <div class="col-lg-12">
        <h4 class="text-danger">Do you really want to delete this User?</h4>
    </div>
</div>

<div class="col-lg-12">
    <form role="form" method="post" action="form/form_action/user_delete_action.php">
        <div class="col-lg-12">
            <br/>
        </div>
        <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-primary" name="delete_action" value="yes">Yes</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php?page_id=create" class="btn btn-danger">No</a>
        </div>
        <div class="col-lg-12">
            <br/>
        </div>


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

        <input type="hidden" value="<?php echo $delete_id ?>" name="delete_id" />

    </form>
</div>

