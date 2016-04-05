<?php
//session_start();
require "security/DrsbdPermission.php";
$permission = new DrsbdPermission();
$permission->getUserType();
//echo $permission->continuingAccess();
//echo $permission->validateLogin();

//exit;
if($permission->validateLogin()){
    $permission->continuingAccess();
    //echo $permission->getUserType();
    //echo $_SESSION['userType'];
    //exit;
}
else{
    $permission->redirectToLogin();
    exit;
}

if(isset($_GET['page_id']))
    $page_id = $_GET['page_id'];

//logout
if(isset($_GET['page_id']) && $page_id == "logout"){
    //include "security/logout.php";
    $permission->logout();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Recovery Station | HDD Inventory</title>

    <!-- Bootstrap Core CSS -->
    <link href="include/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="include/css/simple-sidebar.css" rel="stylesheet">

    <link href="include/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">
                        HDD Inventory Manager
                    </a>
                </li>
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo1">Donor HDD<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo1" class="collapse">
                        <?php
                        if( ($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN") ) {
                            echo '<li>
                                <a href="index.php?page_id=hdd">Add</a>
                            </li>';
                        }
                        ?>
                        <li>
                            <a href="index.php?page_id=hdd-western-digital">List of Western Digital</a>
                        </li>
                        <li>
                            <a href="index.php?page_id=hdd-seagate">List of Seagate</a>
                        </li>
                        <li>
                            <a href="index.php?page_id=hdd-samsung">List of Samsung</a>
                        </li>
                        <li>
                            <a href="index.php?page_id=hdd-hitachi-ibm">List of Hitachi/IBM</a>
                        </li>
                        <li>
                            <a href="index.php?page_id=hdd-fujitsu">List of Fujitsu</a>
                        </li>
                        <li>
                            <a href="index.php?page_id=hdd-toshiba">List of Toshiba</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse"  data-target="#demo2">Donor PCB<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo2" class="collapse" >
                        <?php
                        if( ($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN") ) {
                            echo '<li>
                                <a href="index.php?page_id=pcb">Add</a>
                            </li>';
                        }
                        ?>
                        <li>
                            <a href="index.php?page_id=pcb-western-digital">List of Western Digital</a>
                        </li>
                        <li>
                            <a href="index.php?page_id=pcb-seagate">List of Seagate</a>
                        </li>
                        <li>
                            <a href="index.php?page_id=pcb-samsung">List of Samsung</a>
                        </li>
                        <li>
                            <a href="index.php?page_id=pcb-hitachi-ibm">List of Hitachi/IBM</a>
                        </li>
                        <li>
                            <a href="index.php?page_id=pcb-fujitsu">List of Fujitsu</a>
                        </li>
                        <li>
                            <a href="index.php?page_id=pcb-toshiba">List of Toshiba</a>
                        </li>
                    </ul>
                </li>


                <?php
                if( ($permission->getUserType() == "ADMIN") || ($permission->getUserType() == "SUPER_ADMIN") ) {
                    echo "<li >
                        <a href=\"index.php?page_id=create\">User Management</a>
                    </li>";
                }
                ?>

                <li >
                    <a href="index.php?page_id=changePassAuth">Change Pass / Auth</a>
                </li>


                <li >
                    <a href="index.php?page_id=search">Search</a>
                </li>

                <li >
                    <a href="index.php?page_id=logout">
                        Log out [<?php echo $_SESSION['username']; ?>]
                    </a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="col-md-12 col-sm-12 col-lg-2 text-center">
                            <div style="margin-top: 20px">
                                <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Menu</a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-10 text-center">
                            <h2 class="text-center text-success" ><span class="text-danger">Data Recovery Station</span> - HDD Inventory Management System</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <br/>
                    </div>
                    <hr/>
                    <div class="col-lg-12" style="background-color: #dddddd"></div>
                    <br/>


                    <div class="col-lg-12">


                        <?php
                        if(isset($_SESSION['message'])) {
                            echo "<label class='label label-success'></label><h4 class='text-capitalize text-success text-center'>" . $_SESSION['message'] . "</h4></label>";
                            unset($_SESSION['message']);
                        }

                        if(isset($page_id)){
                            //hdd and report
                            if($page_id == "hdd")
                                include "form/hdd-inventory.php";
                            elseif($page_id == "hdd-western-digital")
                                include "report/hdd/western-digital.php";
                            elseif($page_id == "hdd-seagate")
                                include "report/hdd/seagate.php";
                            elseif($page_id == "hdd-samsung")
                                include "report/hdd/samsung.php";
                            elseif($page_id == "hdd-hitachi-ibm")
                                include "report/hdd/hitachi-ibm.php";
                            elseif($page_id == "hdd-fujitsu")
                                include "report/hdd/fujitsu.php";
                            elseif($page_id == "hdd-toshiba")
                                include "report/hdd/toshiba.php";

                            //pcb and report
                            elseif($page_id == "pcb")
                                include "form/pcb-inventory.php";
                            elseif($page_id == "pcb-western-digital")
                                include "report/pcb/western-digital.php";
                            elseif($page_id == "pcb-seagate")
                                include "report/pcb/seagate.php";
                            elseif($page_id == "pcb-samsung")
                                include "report/pcb/samsung.php";
                            elseif($page_id == "pcb-hitachi-ibm")
                                include "report/pcb/hitachi-ibm.php";
                            elseif($page_id == "pcb-fujitsu")
                                include "report/pcb/fujitsu.php";
                            elseif($page_id == "pcb-toshiba")
                                include "report/pcb/toshiba.php";

                            //search
                            elseif($page_id == "search")
                                include "search/search.php";

                            //edit
                            elseif($page_id == "pcb_edit")
                                include "form/pcb-inventory_edit.php";
                            elseif($page_id == "hdd_edit")
                                include "form/hdd-inventory_edit.php";

                            //delete
                            elseif($page_id == "pcb_delete")
                                include "form/pcb-inventory_delete.php";
                            elseif($page_id == "hdd_delete")
                                include "form/hdd-inventory_delete.php";


                            //create manager
                            elseif($page_id == "create"){
                                include "form/create-user.php";
                            }

                            //change password
                            elseif($page_id=="changePassAuth")
                                include "form/change-password-authentication.php";

                            //delete user
                            elseif($page_id=="userDelete")
                                include "form/user_delete.php";

                            //reset user
                            elseif($page_id=="reset")
                                include "form/user_reset.php";

                            //search result
                            elseif($page_id=="result")
                                include "search/result.php";
                            
                            elseif($page_id=="hdd-list")
                            	include "report/hdd-list.php";
                            elseif($page_id=="pcb-list")
                            	include "report/pcb-list.php";

                            else
                                include "report/dashboard.php";
                        }
                        else{
                            include_once "report/dashboard.php";
                        }?>

                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->


        <hr/>
        <div class="col-md-12" style="background-color: #dddddd; height: 50px;">
            <div class="col-md-12"> &nbsp;</div>
            <div class="col-md-12 text-center">
                <strong><span>Powered by &copy; <strong><a target="_blank" style="color: #269abc; font-size: 16px; text-decoration: none;" href="http://www.securebitlink.com">Secure Bit Link</a></strong></span></strong>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="include/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="include/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>

    <script type="text/javascript" src="include/js/hdd_inventory.js"></script>
    <script type="text/javascript" src="include/js/pcb_inventory.js"></script>
    <script type="text/javascript" src="include/js/jquery.validate.js"></script>


</body>

</html>
