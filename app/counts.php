
<?php
require_once('bootstrap.php');
$total_users= $db->Getsum("SELECT COUNT(id) FROM users");
$total_students= $db->Getsum("SELECT COUNT(id) FROM students");
$total_jobs= $db->Getsum("SELECT COUNT(id) FROM jobs");
$total_salaries= $db->Getsum("SELECT COUNT(id) FROM salaries");
$total_classes= $db->Getsum("SELECT COUNT(id) FROM class");
$total_employees= $db->Getsum("SELECT COUNT(id) FROM employees");
$total_subjects= $db->Getsum("SELECT COUNT(id) FROM subjects");
$total_assigned_to_teachers= $db->Getsum("SELECT COUNT(id) FROM assign_subjects");
$total_assigned_to_class= $db->Getsum("SELECT COUNT(id) FROM class_subjects");

?>