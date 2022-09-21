<?php

require_once("app/bootstrap.php");

$credentials = isLoggedIn();
if(($credentials == null && $credentials[0] == null) || $credentials[0] != '' && $credentials[1] == '' || $credentials[2] != "admin"){
  redirect($credentials[0],$credentials[1],$credentials[2]);
}

?>

<!doctype html>
<html lang="en">

<head>

<meta charset="utf-8" />
<title>School management</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="" name="description" />
<meta content="Themesdesign" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- jquery.vectormap css -->
<link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  

<!-- Bootstrap Css -->
<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>


    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

           <?php require_once('header.php');?>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">Julia Hudda</h4>
                            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                        </div>
                    </div>

                    <!--- Sidemenu -->
                   <?php require_once('sidebar.php'); ?>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
<div class="main-content">

<div class="page-content">
 <div class="container-fluid">

<!-- start page title -->
 <div class="row">

</div>


<div class="row">
 <div class="col-xl-10">
<div class="card">
<div class="card-body">
<div class="dropdown float-end">
<a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-dots-vertical"></i>
</a>
<div class="dropdown-menu dropdown-menu-end">
<!-- item-->
<a href="auth/register.php" class="dropdown-item">Register a New user</a>

</div>
</div>

<h4 class="card-title mb-4">All users</h4>

<div class="table-responsive">
<table class="table table-centered mb-0 align-middle table-hover table-nowrap">
<thead class="table-light">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Status</th>
    <th>Role</th>
    <th>Added on</th>

    <?php
    
    $users = $db->GetRows("SELECT names,email,status,role,(SELECT DATE_FORMAT(users.createdAt,'%D %M %Y'))AS date FROM users");
    $flag = 0;
    foreach($users as $users){
      $flag++;
      ?>

</tr>
</thead><!-- end thead -->
<tbody>
<tr>
    <td><h6 class="mb-0"><?php echo $users['names']; ?> </h6></td>
    <td><?php echo $users['email']; ?></td>
    <?php
    $status = $users['status'];
    if ($status == "active"){
        ?>
        <td><div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i><?php echo $users['status']; ?></div></span></td>

        <?php
    }else{
        ?>
        <td><div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i><?php echo $users['status']; ?></div></span></td>
        <?php
       }
       
       ?>  
        
    </td>
    <td>
    <?php echo $users['role']; ?>
    </td>
    <td>
    <?php echo $users['date']; ?>
    </td>
   
</tr>
    <!-- end -->

<?php
    }
    ?>
    <!-- end -->
</tbody><!-- end tbody -->
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            
                        </div>
                        <!-- end row -->
                    </div>
                    
                </div>
                <!-- End Page-content -->
               
                <?php require_once('footer.php'); ?>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        
        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>

</html>