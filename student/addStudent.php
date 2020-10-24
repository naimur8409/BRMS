<?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['email']==''){
    header("Location:../login.php");
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
        <link rel="icon" href="../photos/baiust.png" type="image/png" sizes="16x16">
        <title>Add Student</title>
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
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Student</h3></div>
                                    <div class="card-body">
                                    <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                                        <form action="../controller/StudentController.php" role="form" method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Student Id</label>
                                                        <input class="form-control py-4"type="text" name="s_id"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Student Name</label>
                                                        <input class="form-control py-4"type="text" name="name"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Email</label>
                                                        <input class="form-control py-4" type="email" name="email"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Password</label>
                                                        <input class="form-control py-4" type="password" name="password"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >Batch</label>
                                                <select  name="batch" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3">
                                                    
                                                    <option value=""  >Select one</option>
                                                    <option value="Spring'15">Spring'15</option>
                                                    <option value="Fall'15">Fall'15</option>
                                                    <option value="Spring'16">Spring'16</option>
                                                    <option value="Fall'16">Fall'16</option>
                                                    <option value="Spring'17">Spring'17</option>
                                                    <option value="Fall'17">Fall'17</option>
                                                    <option value="Spring'18">Spring'18</option>
                                                    <option value="Fall'18">Fall'18</option>
                                                    <option value="Spring'19">Spring'19</option>
                                                    <option value="Fall'19">Fall'19</option>
                                                    <option value="Spring'20">Spring'20</option>
                                                    <option value="Fall'20">Fall'20</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >Department</label>
                                                <select  name="dept" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3" >
                                                    
                                                    <option value=""  >Select one</option>
                                                    <option value="CSE">CSE</option>
                                                    <option value="EEE">EEE</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DBA">DBA</option>
                                                    <option value="ENG">ENG</option>
                                                    <option value="LAW">LAW</option>
                                                </select>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Level</label>
                                                        <select  name="level" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3" >
                                                            
                                                            <option value=""  >Select one</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="Graduated">Graduate</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Term</label>
                                                        <select  name="term" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3" >
                                                            
                                                            <option value=""  >Select one</option>
                                                            <option value="I">I</option>
                                                            <option value="II">II</option>
                                                            <option value="Graduated">Graduate</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Mobile</label>
                                                        <input class="form-control py-4" type="text" name="mobile"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Address</label>
                                                        <input class="form-control py-4" type="text" name="address"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >Status</label>
                                                <select id="cars" name="status" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3">
                                                
                                                    <option value="" >Select one</option>    
                                                    <option value="Undergraduate">Undergraduate</option>
                                                    <option value="Graduated">Graduate</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >CGPA</label>
                                                <input class="form-control py-4" type="text" name="cgpa"/>
                                            </div>
                                            <input type="hidden" name="action" value="save_student">
                                            
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">Add</button></div>
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
