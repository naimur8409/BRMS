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

  $student = new Students();
  $result = new Results();

  $getresult = $result->getResultById($_GET['id']);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Result</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Result</h3></div>

                                    <div class="card-body">
                                        <form action="../controller/resultController.php" method="post">
                                            
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Student Id</label>
                                                        <input class="form-control py-4" type="text" name="s_id" value="<?php echo $getresult['s_id']; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Course Code</label>
                                                        <input class="form-control py-4"type="text" name="c_code" value="<?php echo $getresult['c_code']; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Course Name</label>
                                                        <input class="form-control py-4"type="text" name="c_name" value="<?php echo $getresult['c_name']; ?> "/>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Credit</label>
                                                        <input class="form-control py-4" type="text" name="credit" value="<?php echo $getresult['credit']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Level</label>
                                                        <select  name="level" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3" >
                                                            
                                                            <option value=""  <?php echo $getresult['level']; ?>> Select Level</option>
                                                            <option value="1"  <?php if($getresult['level']=='1'){ echo "selected"; } ?>>1</option>
                                                            <option value="2"  <?php if($getresult['term']=='2'){ echo "selected"; } ?>>2</option>
                                                            <option value="3"  <?php if($getresult['term']=='3'){ echo "selected"; } ?>>3</option>
                                                            <option value="4"  <?php if($getresult['term']==4){ echo "selected"; } ?>>4</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Term</label>
                                                        <select  name="term" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3" >
                                                            
                                                            <option value=""  >Select Term</option>
                                                            <option value="I" <?php if($getresult['term']=='I'){ echo "selected"; } ?>>I</option>
                                                            <option value="II"  <?php if($getresult['term']=='II'){ echo "selected"; } ?> >II</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >GPA</label>
                                                <input class="form-control py-4" type="gpa" name="gpa"  value="<?php echo $getresult['gpa']; ?>"/>
                                            </div>
                                            <input type="hidden" name="action" value="update_results">
                                            <input type="hidden" name="id" value="<?=$getresult['id']?>">
                                            
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
</html>
