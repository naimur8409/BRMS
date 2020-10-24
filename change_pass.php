<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['batch']==''){
    header("Location:login.php");
    $_SESSION['warning'] = "<div class='alert alert-danger'>Please Login First!!</div>";
    exit();
  }

include('dbconnection/dbconnection.php');
include('model/results.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Student Result</title>
        <link rel="icon" href="photos/baiust.png" type="image/png" sizes="16x16">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"  />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" ></script>
    </head>
    <body class="container-fluid">
    <!-- =====================topbar================== -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="home.php" title="BAIUST Result Management System"><img src="photos/baiust.png" width="50px;"> &nbsp; BRMS</a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">Logout</a>
                    </div>
                    <form id="logout-form" action="controller/UsersController.php" method="post">
                        <input type="hidden" name="action" value="logout_process">
                    </form>
                </li>
            </ul>
        </nav>
        <!-- =============================== -->
            <div id="layoutSidenav_content">
                <main>

                <div class="container" >
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change Password</h3></div>
                                    <div class="card-body">
                                    <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                                        
                                        <form action="controller/StudentController.php" method="post">
                                            
                                            
                                            <div class="form-group">
                                                <label class="small mb-1" >Old Password</label>
                                                <input class="form-control py-4" type="password" name="opass"/>
                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" >New Password</label>
                                                <input class="form-control py-4" type="password" name="npass"/>
                                            </div> 

                                            <div class="form-group">
                                                <label class="small mb-1" >Retype Password</label>
                                                <input class="form-control py-4" type="password" name="rpass"/>
                                            </div>

                                            <input type="hidden" name="action" value="update_pass">
                                            <input type="hidden" name="id" value="<?=$_SESSION['s_id']?>">
                                            
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">Change Password</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include('include/footer.php') ?>
            </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" ></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" ></script>
        
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" ></script>
        
    </body>

    <?php unset($_SESSION['message']); ?>
</html>
  