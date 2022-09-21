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
<a href="add_student.php" class="dropdown-item">Register a New Student</a>

</div>
</div>

<h4 class="card-title mb-4">All Students</h4>

<div class="table-responsive">
<table class="table table-centered mb-0 align-middle table-hover table-nowrap">
<thead class="table-light">
<tr>
    <th>Names</th>
    <th>age</th>
    <th>Sex</th>
    <th>Class</th>
    <th>Academic Year </th>
    <th>Registered On </th>
    <th>Actions</th>

    <?php
    
    $students = $db->GetRows("SELECT students.id as id,students.names as names,age,sex,class.names as className,school_year.school_year as school_year,(SELECT DATE_FORMAT(students.createdAt,'%D %M %Y'))AS date FROM students JOIN class ON class.id = students.class_id JOIN school_year ON school_year.id = class.school_year");
    $flag = 0;
    foreach($students as $students){
      $flag++;
      ?>

</tr>
</thead><!-- end thead -->
<tbody>
<tr>
    <td><h6 class="mb-0"><?php echo $students['names']; ?> </h6></td>
    <td><?php echo $students['age']; ?></td>
    
    
    <td>
    <?php echo $students['sex']; ?>
    </td>

    <td>
    <?php echo $students['className']; ?>
    </td>
    <td>
    <?php echo $students['school_year']; ?>
    </td>
   
    <td>
    <?php echo $students['date']; ?>
    </td>
    <td>
    <a class ="btn btn-sm btn-success"href="viewStudentMarks.php?student_id=<?php echo $students['id'];?>">View Details</a>
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