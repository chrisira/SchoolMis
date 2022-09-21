
<?php

require_once("app/bootstrap.php");
$id = $_GET['student_id'];
$students = $db->GetRows("SELECT students.id as id,students.names as names,age,sex,class.names as className,school_year.school_year as school_year,(SELECT DATE_FORMAT(students.createdAt,'%D %M %Y'))AS date FROM students  JOIN class ON class.id = students.class_id  JOIN school_year ON school_year.id = class.school_year WHERE students.id = ?",["$id"]);
    $flag = 0;
    foreach($students as $students){
      $flag++;}
      
$credentials = isLoggedIn();
if(($credentials == null && $credentials[0] == null) || $credentials[0] != '' && $credentials[1] == '' || $credentials[2] != "admin"){
  redirect($credentials[0],$credentials[1],$credentials[2]);
 
}


?>
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

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

            <?php require_once('header.php'); ?>
            <!-- ========== Left Sidebar Start ========== -->
            <?php require_once('sidebar.php'); ?>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        

<div class="row">
    <div class="col-lg-4">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h5 class="mt-0 font-size-18 mb-1 btn btn-sm btn-warning">Names : <?php echo $students['names'] ;?></h5>
                    </div>
                
                        
                </div>
                

                <hr>
                <div class="flex-grow-1">
                        <h6 class="" >Age :</h6>  <?php echo $students['age'] ;?>
                      <hr>
                        <h6 class="" >Sex :</h6>  <?php echo $students['sex'] ;?>
                   <hr>
                        <h6 class="" >Class :</h6>  <?php echo $students['className'] ;?>
                       <hr>
                        <h6 class="" >Academic Year :</h6>  <?php echo $students['school_year'] ;?>

                    </div>
                    <hr>
                    
                    
                <div class="">
                    
                    <a href="add_marks.php?student_id=<?php echo $students['id'];?>"class="btn btn-sm btn-warning">Add Marks</button>
                    <a class="btn btn-sm btn-primary" href="viewMarks.php?student_id=<?php echo $students['id'];?>">view Marks</a>
                
                </div>
                
            </div>
            
        </div>
        
    </div> <!-- end col -->


                           
                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <?php require_once('footer.php'); ?>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>


    </body>
</html>
