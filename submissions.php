<?php
require_once('app/bootstrap.php');


if(isset($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
    $email   = $_POST["email"];
    $password   = $_POST["password"];
    if($function->isValidEmail($email)){
        loginUser($email,$password);
    }else{
        echo "<script>alert('Not Valid Email.'); document.location = 'login.php';</script>";
    }
}

function loginUser($email,$password){
    global $db;
    $password = hash("sha256",$password);
    if($user = $db->GetRow("SELECT * FROM users WHERE users.email = ? AND users.password = ? ",["$email","$password"])){
        $_SESSION['type'] = $user['role'];
        $_SESSION['userEmail'] = $user['email'];
        $_SESSION['username'] = $user['names'];
        $_SESSION['userId'] = $user['id'];
        $_SESSION['userType'] = $user['role'];
        $_SESSION['user_password'] = "true";
        redirect($email,"true",$user['role']);

    }else{
        echo "<script>alert('Invalid Email or Password.'); document.location = 'auth/login.php';</script>";
    }

}

if(isset($_POST['register'])){
    $names = $_POST['names'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    if ($db->Check("SELECT * FROM users WHERE email like  ?",["$email"])){
        echo "<script>alert('user already exists!');document.location='users.php'</script>";
       }
       else{

       
    if($db->InsertData("INSERT INTO `users` ( `names`,`email`,`role`,`password`, `createdAt`, `updatedAt`) VALUES (?, ?,?, ?,current_timestamp(), current_timestamp())",["$names","$email","$role",hash("sha256","$password")])){
     header("Location: ".URLROOT."users.php");
         }else{
             echo "failed to save";
         }
        }
}

if(isset($_POST['save_job'])){
    $title = $_POST['title'];
    if ($db->Check("SELECT * FROM jobs WHERE title like  ?",["$title"])){
     echo "<script>alert('job already exists!');document.location='jobs.php'</script>";
    }
     else{

    if($db->InsertData("INSERT INTO `jobs` (title) VALUES (?)",["$title"])){
     header("Location: ".URLROOT."jobs.php");
         }else{
             echo "failed to save";
         }

     }
     }


 if(isset($_POST['save_year'])){
    $name = $_POST['year'];
    if ($db->Check("SELECT * FROM school_year WHERE school_year like  ?",["$name"])){
     echo "<script>alert('year already exists!');document.location='years.php'</script>";
    }
     else{

    if($db->InsertData("INSERT INTO `school_year` (school_year) VALUES (?)",["$name"])){
     header("Location: ".URLROOT."years.php");
         }else{
             echo "failed to save";
         }

     }
     }    



if(isset($_POST['save_salary'])){
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    if ($db->Check("SELECT * FROM salaries WHERE job_id like  ?",["$title"])){
     echo "<script>alert('salary already exists!');document.location='salaries.php'</script>";
    }
     else{
    if($db->InsertData("INSERT INTO `salaries` ( `job_id`, `amount`) VALUES (?, ?)",["$title","$amount"])){
     header("Location: ".URLROOT."salaries.php");
         }else{
             echo "failed to save";
         }
     }

     }


     if(isset($_POST['save_employee'])){
        $names = $_POST['names'];
        $email = $_POST['email'];
        $title = $_POST['title'];
   
        if ($db->Check("SELECT * FROM employees WHERE names like  ? AND email like ? and job_id like ?",["$names","$email","$title"])){
         echo "<script>alert('employee already exists!');document.location='employees.php'</script>";
        }
         else{
        if($db->InsertData("INSERT INTO `employees` ( `names`,`email`,`job_id`) VALUES (?, ?,?)",["$names","$email","$title"])){
         header("Location: ".URLROOT."employees.php");
             }else{
                 echo "failed to save";
             }
         }
    
         }

    if(isset($_GET['employee_id'])){
    $id = $_GET['employee_id'];
   
    if($db->DeletingData("DELETE FROM employees WHERE id=?", ["$id"])){
        header("Location: ".URLROOT."employees.php");
         }else{
             echo "failed to delete";
         }
        }

if(isset($_POST['save_subject'])){
        $name = $_POST['name'];
        $credits = $_POST['credits'];
        $code = $_POST['code'];
        
   
        if ($db->Check("SELECT * FROM subjects WHERE name like  ? AND code like ?",["$name","$code"])){
         echo "<script>alert('subject already exists!');document.location='subjects.php'</script>";
        }
         else{
        if($db->InsertData("INSERT INTO `subjects` ( `name`,`credits`,`code`) VALUES (?, ?,?)",["$name","$credits","$code"])){
         header("Location: ".URLROOT."subjects.php");
             }else{
                 echo "failed to save";
             }
         }
    
         }
        if(isset($_POST['assign_class'])){
        $title = $_POST['title'];
        $class_name = $_POST['class_name'];
        if ($db->Check("SELECT * FROM class_subjects WHERE  subject_id like  ? AND class_id like ?",["$title","$class_name"])){
            echo "<script>alert('subject already assigned to this class!');document.location='class_subjects.php'</script>";
           }else{

           
        if($db->InsertData("INSERT INTO `class_subjects` ( `subject_id`,`class_id`) VALUES (?, ?)",["$title","$class_name"])){
         header("Location: ".URLROOT."class_subjects.php");
             }else{
                 echo "failed to save";
             }
         }
        }
        if(isset($_POST['assign_subject'])){
            $title = $_POST['title'];
            $employee = $_POST['employee_name'];
            if ($db->Check("SELECT * FROM assign_subjects WHERE  subject_id like  ? AND employee_id like ?",["$title","$employee"])){
                echo "<script>alert('subject already assigned to this teacher!');document.location='assigned_subjects.php'</script>";
               }else{
    
               
            if($db->InsertData("INSERT INTO `assign_subjects` ( `subject_id`,`employee_id`) VALUES (?, ?)",["$title","$employee"])){
             header("Location: ".URLROOT."assigned_subjects.php");
                 }else{
                     echo "failed to save";
                 }
             }
            }
    if(isset($_POST['save_class'])){
    $year = $_POST['year'];
    $name = $_POST['name'];
    if ($db->Check("SELECT * FROM class WHERE names like  ? AND school_year like ?",["$name","$year"])){
     echo "<script>alert('Class already exists!');document.location='classes.php'</script>";
    }
     else{

    if($db->InsertData("INSERT INTO `class` (names,school_year) VALUES (?,?)",["$name","$year"])){
     header("Location: ".URLROOT."Classes.php");
         }else{
             echo "failed to save";
         }

     }
     }


     if(isset($_POST['save_marks'])){
        $id = $_POST['student_id'];
        $subject = $_POST['subject'];
        $grades = 1;
        $marks = $_POST['marks'];
        if ($db->Check("SELECT * FROM student_marks WHERE id like  ? AND subject_id like ?",["$id","$subject"])){
         echo "<script>alert('Marks already exists!');document.location='students.php'</script>";
        }
         else{
    
        if($db->InsertData("INSERT INTO `student_marks` (student_id,grade_id,subject_id,marks) VALUES (?,?,?,?)",["$id","$grades","$subject","$marks"])){
         header("Location: ".URLROOT."students.php");
             }else{
                 echo "failed to save";
             }
    
         }
         }
     if(isset($_POST['save_student'])){
        $names = $_POST['names'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $class = $_POST['class'];
        if ($db->Check("SELECT * FROM students WHERE email like ?",["$email"])){
         echo "<script>alert('Student already exists!');document.location='students.php'</script>";
        }
         else{
    
        if($db->InsertData("INSERT INTO `students` (names,age,sex,email,class_id) VALUES (?,?,?,?,?)",["$names","$age","$gender","$email","$class"])){
         header("Location: ".URLROOT."students.php");
             }else{
                 echo "failed to save";
             }
    
         }
         }

     if(isset($_POST['save_shift'])){
        $class = $_POST['class'];
        $shift = $_POST['shift'];
        if ($db->Check("SELECT * FROM shifts WHERE names like  ? AND class_id like ?",["$shift","$class"])){
         echo "<script>alert('Shift already exists!');document.location='shifts.php'</script>";
        }
         else{
    
        if($db->InsertData("INSERT INTO `shifts` (names,class_id) VALUES (?,?)",["$shift","$class"])){
         header("Location: ".URLROOT."Shifts.php");
             }else{
                 echo "failed to save";
             }
    
         }
         }
         
 ?>