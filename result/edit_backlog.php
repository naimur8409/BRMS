<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['email']==''){
    header("Location:../login.php");
    $_SESSION['warning'] = "<div class='alert alert-danger'>Please Login First!!</div>";
    exit();
  }
  include('../dbconnection/dbconnection.php');
  include('../model/results.php');
  $results = new Results();
  
  $backlog = $results->getBacklogById($_GET['s_id']);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Update Backlog</title>
        <link rel="icon" href="../photos/baiust.png" type="image/png" sizes="16x16">
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include('include/topbar.php') ?>


        <div id="layoutSidenav">
            
            
        <?php include('include/sidebar.php') ?>
            <div id="layoutSidenav_content">
                
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container" >
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Backlog</h3></div>
                                    <div class="card-body">
                                    <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                                        <form action="../controller/resultController.php" method="post">
                                            
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Student Id</label>
                                                        <input class="form-control py-4" type="text" name="s_id" value="<?php echo $backlog['s_id']; ?>" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Course Code</label>
                                                        <input class="form-control py-4"type="text" name="c_code" value="<?php echo $backlog['c_code']; ?>" required />
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <input type="hidden" name="action" value="update_backlog">
                                            
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">Update</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        
            </div>
                <?php include('include/footer.php') ?>
            </div>
        </div>
    </body>


    <?php unset($_SESSION['message']); ?>
</html>