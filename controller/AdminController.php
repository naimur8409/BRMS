<?php 
session_start();
include('../dbconnection/dbconnection.php');
include('../model/users.php');
include('../model/students.php');

$admin = new Users();

switch($_POST['action']){
 
    case "save_admin": 
        $admin->name = $_POST['name'];
        $admin->email = $_POST['email'];
        $admin->password = md5($_POST['password']);

        $status = $admin->save();

        if($status)
        {
            $_SESSION['message'] = "<div class='alert alert-success'>Saved successfully!</div>";
        }
        else{
            $_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
        }

        header("Location:../admin/add_admin.php");
      break;
 
    case "update_admin":
  
      $admin->name = $_POST['name'];
      $admin->email = $_POST['email'];
      $admin->password = md5($_POST['password']);

      $status = $admin->update($_POST['id']);

      if($status)
      {
          $_SESSION['message'] = "<div class='alert alert-success'>Saved successfully!</div>";
      }
      else{
          $_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
      }

      header("Location:../admin/admin_list.php");
      break;
 
    case "delete_admin":
 
      $delete = $admin->delete_admin($_POST['id']);
       
      if($delete)
              {
                $_SESSION['message'] = "<div class='alert alert-success'>Deleted successfully!</div>";
              }
              else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
              }
   
              header("Location:../admin/admin_list.php");
      
       
        break;
 
      break;

    case "update_pass":
        // $old = $_POST['opass'];
        // echo $new = $_POST['npass'];
        // $rmew = $_POST['rpass'];
        $admin->npass = md5($_POST['npass']);
        $status = $admin->update_pass($_SESSION['email']);
        // echo $_SESSION['email'];
        if($status)
            {
                $_SESSION['message'] = "<div class='alert alert-success'>Update password successfully!</div>";
            }
            else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Unable to Update!</div>";
            }

            header("Location:../admin/change_pass.php");
                
        break;

   default:
 
   header("Location:../index.php");
 
 }

?>