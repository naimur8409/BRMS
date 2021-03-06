<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['batch']==''){
    header("Location:login.php");
    $_SESSION['warning'] = "<div class='alert alert-danger'>Please Login First!!</div>";
    exit();
  }

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HOME | ADMIN</title>
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
                    <p class="text-white mt-3"><?php echo $_SESSION['name']; ?></p>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="change_pass.php">Change Password</a>
                        <a class="dropdown-item" href="profile.php">Profile</a>
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
            <div id="layoutSidenav_content ">
                <main>
                    <div class="">
                        <div class="row justify-content-center ">
                            <div class="col-xl-6 col-md-6 mt-1">
                                <div class="list-group pt-4">
                                    <h4 class="text-center pb-2">Student Profile</h4>
                                    <a href="#" class="list-group-item list-group-item-action">Name: <?php echo $_SESSION['name']; ?></a>
                                    <a href="#" class="list-group-item list-group-item-action">Student Id: <?php echo $_SESSION['s_id']; ?></a>
                                    <a href="#" class="list-group-item list-group-item-action">Email: <?php echo $_SESSION['email']; ?></a>
                                    <a href="#" class="list-group-item list-group-item-action">Status: <?php echo $_SESSION['status'];?></a>
                                    <a href="#" class="list-group-item list-group-item-action">Address: <?php echo $_SESSION['address']; ?></a>
                                    <a href="#" class="list-group-item list-group-item-action">Address: <?php echo $_SESSION['mobile']; ?></a>
                                    <h6 class="text-danger pt-2 text-right" style="font-size:12px;">***Contact <a href="mailto:someone@example.com">admin@gmail.com</a> if there is any problem***</h6>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>
                <p class="pt-4"></p>
                <p class="pt-4"></p>
                <p class="pt-4"></p>
                <?php include('include/footer.php') ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" ></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" ></script>
        
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" ></script>
        
    </body>
</html>
