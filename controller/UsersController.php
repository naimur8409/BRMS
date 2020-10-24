<?php 
session_start();
include('../dbconnection/dbconnection.php');
include('../model/users.php');
include('../model/students.php');

$admin = new Users();
$student = new Students();

switch($_POST['action']){
    case "login_process":
 
    $getUser = $admin->getUserByEmail($_POST['email']);
 
       if(count($getUser) > 0 && $getUser['email']!='')
            {
                if($getUser['password']==md5($_POST['password']))
                        {
 
                     $_SESSION['user_id'] = $getUser['id'];
                     $_SESSION['email'] = $getUser['email'];
                     $_SESSION['name'] = $getUser['name'];
 
                        header("Location:../index.php");
 
                        }
                        else{
                             $_SESSION['message'] = "<div class='alert alert-danger'>Invalid Password!!</div>";
                             header("Location:../login.php");
                        }
            }
            else{
              $_SESSION['message'] = "<div class='alert alert-danger'>Invalid Email!</div>";
                header("Location:../login.php");
            }
 
      break;
      case "student_login_process":
   
      $getUser = $student->getStudentById($_POST['s_id']);
   
         if(count($getUser) > 0 && $getUser['s_id']!='')
              {
                  if($getUser['password']==md5($_POST['password']))
                          {
   
                       $_SESSION['s_id'] = $getUser['s_id'];
                       $_SESSION['batch'] = $getUser['batch'];
                       $_SESSION['name'] = $getUser['name'];
                       $_SESSION['email'] = $getUser['email'];
                       $_SESSION['level'] = $getUser['level'];
                       $_SESSION['term'] = $getUser['term'];
                       $_SESSION['mobile'] = $getUser['mobile'];
                       $_SESSION['address'] = $getUser['address'];
                       $_SESSION['status'] = $getUser['status'];
   
                          header("Location:../home.php");
   
                          }
                          else{
                               $_SESSION['message'] = "<div class='alert alert-danger'>Invalid Password!!</div>";
                               header("Location:../userlogin.php");
                          }
              }
              else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Invalid Student ID!!</div>";
                  header("Location:../userlogin.php");
              }
   
        break;
 
    case "logout_process":
       session_destroy();
       header("Location:../index.html");
      break;
 
    case "save_student": 
 
        $admin->s_id = $_POST['s_id'];
        $admin->name = $_POST['name'];
        $admin->email = $_POST['email'];
        $admin->password = md5($_POST['password']);
        $admin->batch = $_POST['batch'];
        $admin->dept = $_POST['dept'];
        $admin->level = $_POST['level'];
        $admin->term = $_POST['term'];
        $admin->mobile = $_POST['mobile'];
        $admin->address = $_POST['address'];
        $admin->status = $_POST['status'];
        $admin->cgpa = $_POST['cgpa'];
        $status = $admin->save();
        
         if($status)
              {
                  $_SESSION['message'] = "<div class='alert alert-success'>Save user successfully!</div>";
              }
              else{
                  $_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
              }
 
              header("Location:../student/addStudent.php");
 
      break;
 
    case "update_user":
 
      break;
 
    case "delete_user":
 
 
      break;
 
   default:
 
   header("Location:../index.php");
 
 }

?>