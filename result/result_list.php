<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['email']==''){
    header("Location:../login.php");
    $_SESSION['warning'] = "<div class='alert alert-danger'>Please Login First!!</div>";
    exit();
  }
  include('../dbconnection/dbconnection.php');
  include('../model/users.php');
  include('../model/students.php');
  include('../model/results.php');
  
  $results = new Results();
  $students = new Students();
  $all = $students->all();
  

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="../photos/baiust.png" type="image/png" sizes="16x16">
        <title>Result List</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include('include/topbar.php') ?>


        <div id="layoutSidenav">
            
            
        <?php include('include/sidebar.php') ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Student List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard/ Result List </li>
                        </ol>
                    
                    </div>


                    <div class="container-fluid">
                       
                        <div class="card mb-4">
                                    <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Student ID:</th>
                                                <th>Student Name</th>
                                                <th>Batch</th>
                                                <th>Department</th>
                                                <th>Level</th>
                                                <th>Term</th>
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Student ID:</th>
                                                <th>Student Name</th>
                                                <th>Batch</th>
                                                <th>Department</th>
                                                <th>Level</th>
                                                <th>Term</th>
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach($all as $data) { ?>
                                            <tr>
                                                <td><?php echo $data['s_id'] ?></td>
                                                <td><?php echo $data['name'] ?></td>
                                                <td><?php echo $data['batch'] ?></td>
                                                <td><?php echo $data['dept'] ?></td>
                                                <td><?php echo $data['level'] ?></td>
                                                <td><?php echo $data['term'] ?></td>
                                                <td><?php echo $data['c_code'] ?></td>
                                                <td><?php echo $data['c_name'] ?></td>
                                                <td><?php echo $data['credit'] ?></td>
                                                <td><?php echo $data['gpa'] ?></td>
                                                <td>
                                                <!-- <a href="edit_result.php?id=<?=$data['id'] ?>" class="btn btn-info btn-sm">UPDATE</a> -->
                                                <form action="../controller/resultController.php" method="post" style="display:inline-block">
                                                
                                                <input type="hidden" name="action" value="delete_results" />
                                                <input type="hidden" name="s_id" value="<?php echo $data['id']; ?>" />
                                                <input type="submit" name="submit" value="DELETE" class="btn btn-danger btn-sm" onclick="return confirm('Delete all data from this row.')" />
                                                
                                                </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </main>
                <?php include('include/footer.php') ?>
            </div>
        </div>

    </body>

    <?php unset($_SESSION['message']); ?>
</html>