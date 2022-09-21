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

                

                    <!--- Sidemenu -->
                   <?php require_once('sidebar.php'); ?>
                    <!-- Sidebar -->
                </div>
            </div>
            
<div class="main-content">

<div class="page-content">
 <div class="container-fluid">

<!-- start page title -->
 <div class="row">

</div>


<div class="row">




<h4 class="card-title mb-4">Assign Subject To Class</h4>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <form action="submissions.php" method="POST">
                    <div class="mb-3">
                        <label>Subject Title</label>
                        
                    <select name="title" id="" class="form-control" required>
                   <option selected="true" disabled="disabled" value="" required>--select Subject-- </option>
                
                <?php
    
                $subjects = $db->GetRows("SELECT * FROM subjects");
                $flag = 0;
                foreach($subjects as $subjects){
                $flag++;
                ?>
                   <option value="<?=$subjects['id']?>" name="title"><?=$subjects['name']?> | <?=$subjects['code']?></option>
                 <?php

                }?>
                    </select>
            </div>
            <div class="mb-3">
                        <label>Class</label>
                        
                    <select name="class_name" id="" class="form-control" required>
                   <option selected="true" disabled="disabled" value="" required>--select Class-- </option>
                
                <?php
    
                $class = $db->GetRows("SELECT * FROM class");
                $flag = 0;
                foreach($class as $class){
                $flag++;
                ?>
                   <option value="<?=$class['id']?>" name="class_name"><?=$class['names']?></option>
                 <?php

                }?>
                    </select>
            </div>
                  
                        <div>
                            <button type="submit" class="btn btn-warning waves-effect waves-light me-1" name="assign_class">
                                Assign
                            </button>
                            
                            
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
        

                        </div>
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