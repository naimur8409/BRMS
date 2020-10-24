<?php 
session_start();
include('../dbconnection/dbconnection.php');
include('../model/users.php');
include('../model/students.php');

$student = new Students();

switch($_POST['action']){
   
    case "save_student": 
 
        $student->s_id = $_POST['s_id'];
        $student->name = $_POST['name'];
        $student->email = $_POST['email'];
        $student->password = md5($_POST['password']);
        $student->batch = $_POST['batch'];
        $student->dept = $_POST['dept'];
        $student->level = $_POST['level'];
        $student->term = $_POST['term'];
        $student->mobile = $_POST['mobile'];
        $student->address = $_POST['address'];
        $student->status = $_POST['status'];
        $student->cgpa = $_POST['cgpa'];
        $status = $student->save();
        
         if($status)
              {
                  $_SESSION['message'] = "<div class='alert alert-success'>Save Student successfully!</div>";
              }
              else{
                  $_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
              }
 
              header("Location:../student/addStudent.php");
 
      break;
      
 
    case "update_student":
      $student->id = $_POST['id'];
      $student->s_id = $_POST['s_id'];
      $student->name = $_POST['name'];
      $student->email = $_POST['email'];
      $student->password = md5($_POST['password']);
      $student->batch = $_POST['batch'];
      $student->dept = $_POST['dept'];
      $student->level = $_POST['level'];
      $student->term = $_POST['term'];
      $student->mobile = $_POST['mobile'];
      $student->address = $_POST['address'];
      $student->status = $_POST['status'];
      $student->cgpa = $_POST['cgpa'];
      $status = $student->update($_POST['id']);
      
       if($status)
            {
                $_SESSION['message'] = "<div class='alert alert-success'>Update Student successfully!</div>";
            }
            else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Unable to Update!</div>";
            }

            header("Location:../student/batch_student.php?batch=".$_POST['batch']."&&dept=".$_POST['dept']);
      break;
 
    case "delete_student":
      $delete = $student->delete($_POST['id']);
	 
      if($delete)
              {
                $_SESSION['message'] = "<div class='alert alert-success'>delete student successfully!</div>";
              }
              else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
              }
   
              header("Location:../student/batch_student.php?batch=".$_POST['batch']."&&dept=".$_POST['dept']);
      
 
      break;

      case "update_pass":
              $old = $_POST['opass'];
              $new = $_POST['npass'];
              $rmew = $_POST['rpass'];
              $student->npass = md5($_POST['npass']);
              $status = $student->update_pass($_SESSION['s_id']);
              
              if($status)
                  {
                      $_SESSION['message'] = "<div class='alert alert-success'>Update password successfully!</div>";
                  }
                  else{
                      $_SESSION['message'] = "<div class='alert alert-danger'>Unable to Update!</div>";
                  }

                  header("Location:../change_pass.php");
               
     break;
  

   default:
 
   header("Location:../login.php");
 
 }

?>