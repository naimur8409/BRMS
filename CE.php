<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['email']==''){
    header("Location:login.php");
    $_SESSION['warning'] = "<div class='alert alert-danger'>Please Login First!!</div>";
    exit();
    
  }


  include('dbconnection/dbconnection.php');

  include('model/students.php');
  $students = new Students();
  $all = $students->getUserByDept('CE');
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
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
                    <ol class="breadcrumb mb-4 mt-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Student List of CE</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Student ID:</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Batch</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Status</th>

                                            <th>CGPA</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($all as $data) { ?>
                                        <tr>
                                        <td><?php echo $data['s_id'] ?></td>
                                            <td><?php echo $data['name'] ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td><?php echo $data['batch'] ?></td>
                                            <td><?php echo $data['mobile'] ?></td>
                                            <td><?php echo $data['address'] ?></td>
                                            <td><?php echo $data['status'] ?></td>
                                            <td><?php echo $data['CGPA'] ?></td>
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
