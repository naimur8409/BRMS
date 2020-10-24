<?php 
session_start();
include('../dbconnection/dbconnection.php');
include('../model/users.php');
include('../model/students.php');
include('../model/results.php');

$results = new Results();

switch($_POST['action']){
   
    case "save_results": 
 
        $results->s_id = $_POST['s_id'];
        $results->c_code = $_POST['c_code'];
        $results->c_name = $_POST['c_name'];
        $results->level = $_POST['level'];
        $results->term = $_POST['term'];
        $results->credit = $_POST['credit'];
        $results->gpa = $_POST['gpa'];
        $status = $results->save();
        
         if($status)
              {
                  $_SESSION['message'] = "<div class='alert alert-success'>Save result successfully!</div>";
              }
              else{
                  $_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
              }
 
              header("Location:../result/addResult.php");
 
      break;
      case "save_backlog": 
 
        $results->s_id = $_POST['s_id'];
        $results->c_code = $_POST['c_code'];
        $status = $results->backlogSave();
        
         if($status)
              {
                  $_SESSION['message'] = "<div class='alert alert-success'>Save  successfully!</div>";
              }
              else{
                  $_SESSION['message'] = "<div class='alert alert-danger'>Unable to save!</div>";
              }
 
              header("Location:../result/addBacklog.php");
 
      break;
      case "update_backlog":
        $results->s_id = $_POST['s_id'];
        $results->c_code = $_POST['c_code'];
        $status = $results->update_backlog($_POST['s_id']);
        
         if($status)
              {
                  $_SESSION['message'] = "<div class='alert alert-success'>Update successfully!</div>";
              }
              else{
                  $_SESSION['message'] = "<div class='alert alert-danger'>Unable to update!</div>";
              }
  
              header("Location:../result/backlogList.php");
        break;
 
    case "update_results":
      $results->s_id = $_POST['s_id'];
      $results->c_code = $_POST['c_code'];
      $results->c_name = $_POST['c_name'];
      $results->level = $_POST['level'];
      $results->term = $_POST['term'];
      $results->credit = $_POST['credit'];
      $results->gpa = $_POST['gpa'];
      // echo $_POST['id'];
      $status = $results->update($_POST['id']);
      
       if($status)
            {
                $_SESSION['message'] = "<div class='alert alert-success'>Update result successfully!</div>";
            }
            else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Unable to update!</div>";
            }

            // header("Location:../result/result_list.php");
      break;
 
    case "delete_results":
      $delete = $results->delete($_POST['s_id']);
	 
      if($delete)
              {
                $_SESSION['message'] = "<div class='alert alert-success'>Delete result successfully!</div>";
              }
              else{
                $_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
              }
   
              header("Location:../result/result_list.php");
      
       
        break;
 
        case "delete_backlog":
          $delete = $results->delete_backlog($_POST['s_id']);
       
          if($delete)
                  {
                    $_SESSION['message'] = "<div class='alert alert-success'>Deleted successfully!</div>";
                  }
                  else{
                    $_SESSION['message'] = "<div class='alert alert-danger'>Unable to delete!</div>";
                  }
       
                  header("Location:../result/backlogList.php");
          
           
            break;

   default:
 
   header("Location:../login.php");
 
 }

?>