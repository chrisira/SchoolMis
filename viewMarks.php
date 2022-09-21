<?php

require_once("app/bootstrap.php");
$id = $_GET['student_id'];

// $subjects = $db->GetRows("SELECT DISTINCT name,coalesce(marks,0)as marks,coalesce(students.names,'No Name') as student FROM subjects LEFT JOIN student_marks ON student_marks.subject_id = subjects.id left join students on students.id = student_marks.id WHERE students.id = ?",["$id"]);
$subjects = $db->GetRows("SELECT name,marks,students.names as student FROM subjects JOIN student_marks ON student_marks.subject_id = subjects.id  join students on students.id = student_marks.id WHERE students.id = ?",["$id"]);
$flag = 0;
foreach($subjects as $subjects){
      $flag++;


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

</a>

</div>

<h4 class="card-title mb-4"><?php echo $subjects['student'] ;?> | Marks</h4>

<div class="table-responsive">
<table class="table table-bordered mb-0 align-middle table-hover table-nowrap">
<thead class="table-light">
<tr>
    <th>#</th>

    <th><h6 class="mb-0">subject</h6></th>
    
    <th><h6 class="mb-0">Marks</h6></th>
    
    



</tr>
</thead><!-- end thead -->
<tbody>
    



    <tr>
        <td><?php echo $flag ?></td>
    <td><?php echo $subjects['name']; ?></td>
       
        <td><?php echo $subjects['marks'];?></td>
        
    </tr>
    
<?php } ?>
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