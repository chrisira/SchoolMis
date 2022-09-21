<?php

require_once("app/bootstrap.php");

$credentials = isLoggedIn();
if(($credentials == null && $credentials[0] == null) || $credentials[0] != '' && $credentials[1] == '' || $credentials[2] != "admin"){
  redirect($credentials[0],$credentials[1],$credentials[2]);
}

?>
<div class="vertical-menu">

<div data-simplebar class="h-100">

<!-- User details -->
<div class="user-profile text-center mt-3">
    
    
</div>

<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="users.php" class="waves-effect">
                <i class="ri-contacts-line"></i><span class="badge rounded-pill bg-success float-end"><?php echo $total_users ?></span>
                <span>Users</span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-team-fill"></i>
                <span>employees</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
            <li><a href="employees.php">List </i><span class="badge rounded-pill bg-primary float-end"><?php echo $total_employees; ?></span></a></li>
                <li><a href="jobs.php">Jobs </i><span class="badge rounded-pill bg-success float-end"><?php echo $total_jobs ?></span></a></li>
                <li><a href="salaries.php">Salaries </i><span class="badge rounded-pill bg-warning float-end"><?php echo $total_salaries; ?></span></a></li>
            </ul>
        </li>
        <li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-pencil-ruler-2-fill"></i>
                <span>Class</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="years.php">Years </i><span class="badge rounded-pill bg-primary float-end">5</span></a></li>
            <li><a href="classes.php">classes List </i><span class="badge rounded-pill bg-primary float-end">5</span></a></li>
                <li><a href="shifts.php">Shifts </i><span class="badge rounded-pill bg-success float-end">2</span></a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-group-line"></i>
                <span>Students</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="students.php">List </i><span class="badge rounded-pill bg-primary float-end"><?php echo $total_students?></span></a></li>
                
                
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-hand-coin-fill"></i>
                <span>Finance</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
            
                <li><a href="email-inbox.html">School fees</a></li>
                
            </ul>           
            
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-calendar-todo-fill"></i>
                <span>Subjects</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="subjects.php">List</i><span class="badge rounded-pill bg-primary float-end"><?php echo $total_subjects ?></span></a></li>
                <li><a href="class_subjects.php">Class Assigned Subjects</i><span class="badge rounded-pill bg-success float-end"><?php echo $total_assigned_to_class ; ?>
                </span></a></li>
                <li><a href="assigned_subjects.php">Teacher Assigned Subjects</i><span class="badge rounded-pill bg-warning float-end"><?php echo $total_assigned_to_teachers ;?></span></a></li>
            </ul>
        </li>
        <li>
        <li>

    </ul>
</div>
<!-- Sidebar -->
</div>
</div>