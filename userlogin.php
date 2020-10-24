
<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Student Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="" style="background-color: #c8d6e5;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class=" p-2" style="border-bottom: 4px solid green">
                                    <h2 class=" text-center  my-4" >
                                        <strong>BAIUST RESULT MANAGEMENT SYSTEM (BRMS)</strong>
                                    </h2>
                                </div>
                            </div>                            
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">STUDENT LOGIN</h3> 
                                    </div>
                                    
                                    <div class="card-body">
                                    <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                                        <form action="controller/UsersController.php" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputID">Student ID</label>
                                                <input class="form-control py-4" id="inputID" type="text" placeholder="Enter student ID" name="s_id" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                                            </div>
                                           

                                            <input type="hidden" name="action" value="login_process" required>
                                            <input type="hidden" name="action" value="student_login_process" required>

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2020 BAIUST</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

    <?php unset($_SESSION['message']); ?>
    </body>
</html>
