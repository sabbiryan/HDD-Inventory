<?php
//require "./security/DrsbdPermission.php";
$permission = new DrsbdPermission();
?>

<div class="col-lg-12">
    <div class="col-lg-6">
        <div class="col-lg-12">
            <h3 class="text-danger">Create new user:</h3>
        </div>

        <form role="form" method="post" action="form/form_action/create-user_action.php">

            <div class="form-group">
                <label for="fullName" class="control-label col-lg-12">Full Name *</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="fullName" name="fullName" required="required"/>
                </div>
            </div>

            <div class="col-lg-12">
                <br/>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-lg-12" >Email *</label>
                <div class="col-lg-10">
                    <input type="email" name="email" id="email" required="required" class="form-control">
                </div>
            </div>

            <div class="col-lg-12">
                <br/>
            </div>
            <div class="form-group">
                <label for="username" class="control-label col-lg-12">Username *</label>
                <div class="col-lg-10">
                    <input type="text" name="username" id="username" required="required" class="form-control"/>
                </div>
            </div>


            <div class="col-lg-12">
                <br/>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-lg-12">Password *</label>
                <div class="col-lg-10">
                    <input type="password" name="password" id="password" required="required" class="form-control" />
                </div>
            </div>
            <div class="col-lg-12">
                <br/>
            </div>
            <div class="form-group">
                <label for="userType" class="control-label col-lg-12">User Type *</label>
                <div class="col-lg-10">
                    <select name="userType" id="userType" required="required" class="form-control" >
                        <option value="">Select User Type</option>
                        <option value="ADMIN">Admin</option>
                        <option value="MANAGER">Manager</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-12">
                <br/>
            </div>
            <div class="form-group">
                <label for="authentication" class="control-label col-lg-12">Authentication *</label>
                <div class="col-lg-10">
                    <input type="number" name="authentication" id="authentication" required="required" class="form-control" maxlength="4" minlength="4" placeholder="4 Digit Security Pin"/>
                </div>
            </div>

            <div class="col-lg-12">
                <br/>
            </div>
            <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-danger">Create</button>
            </div>
        </form>
    </div>        

    <div class="col-lg-6">
        <div class="col-lg-12">
            <h3 class="text-danger">User List:</h3>
        </div>

        <table class="table table-bordered col-lg-12 table-responsive" >
            <thead>
                <tr class="active">
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    echo $permission->getAllUser();
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>