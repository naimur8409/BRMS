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

  $student = new Students();
  $getstudent = $student->getStudentByNID($_GET['id']);

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
        <title>Update Student</title>
        
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
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Student</h3></div>
                                    <div class="card-body">
                                        <form action="../controller/StudentController.php" role="form" method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Student Id</label>
                                                        <input class="form-control py-4"type="text" name="s_id" value="<?=$getstudent['s_id'] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Student Name</label>
                                                        <input class="form-control py-4"type="text" name="name" value="<?=$getstudent['name'] ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Email</label>
                                                        <input class="form-control py-4" type="email" name="email" value="<?=$getstudent['email'] ?>"/>
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
                                                    
                                                    <option value=""  ><?=$getstudent['batch'] ?></option>
                                                    <option value="Spring'15" <?php if($getstudent['batch']=="Spring'15"){ echo "selected"; } ?> >Spring'15</option>
                                                    <option value="Fall'15" <?php if($getstudent['batch']=="Fall'15"){ echo "selected"; } ?> >Fall'15</option>
                                                    <option value="Spring'16" <?php if($getstudent['batch']=="Spring'16"){ echo "selected"; } ?> >Spring'16</option>
                                                    <option value="Fall'16" <?php if($getstudent['batch']=="Fall'16"){ echo "selected"; } ?> >Fall'16</option>
                                                    <option value="Spring'17" <?php if($getstudent['batch']=="Spring'17"){ echo "selected"; } ?> >Spring'17</option>
                                                    <option value="Fall'17" <?php if($getstudent['batch']=="Fall'17"){ echo "selected"; } ?> >Fall'17</option>
                                                    <option value="Spring'18" <?php if($getstudent['batch']=="Spring'18"){ echo "selected"; } ?> >Spring'18</option>
                                                    <option value="Fall'18" <?php if($getstudent['batch']=="Fall'18"){ echo "selected"; } ?> >Fall'18</option>
                                                    <option value="Spring'19" <?php if($getstudent['batch']=="Spring'19"){ echo "selected"; } ?> >Spring'19</option>
                                                    <option value="Fall'19" <?php if($getstudent['batch']=="Fall'19"){ echo "selected"; } ?> >Fall'19</option>
                                                    <option value="Spring'20" <?php if($getstudent['batch']=="Spring'20"){ echo "selected"; } ?> >Spring'20</option>
                                                    <option value="Fall'20" <?php if($getstudent['batch']=="Fall'20"){ echo "selected"; } ?> >Fall'20</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >Department</label>
                                                <select  name="dept" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3" >
                                                    
                                                    <option value=""  ><?=$getstudent['dept'] ?></option>
                                                    <option value="CSE" <?php if($getstudent['dept']=='CSE'){ echo "selected"; } ?> >CSE</option>
                                                    <option value="EEE" <?php if($getstudent['dept']=='EEE'){ echo "selected"; } ?> >EEE</option>
                                                    <option value="CE" <?php if($getstudent['dept']==''){ echo "CE"; } ?> >CE</option>
                                                    <option value="DBA" <?php if($getstudent['dept']==''){ echo "DBA"; } ?> >DBA</option>
                                                    <option value="ENG" <?php if($getstudent['dept']==''){ echo "ENG"; } ?> >ENG</option>
                                                    <option value="LAW" <?php if($getstudent['dept']==''){ echo "LAW"; } ?> >LAW</option>
                                                </select>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Level</label>
                                                        <select  name="level" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3" >
                                                            
                                                            <option value=""  ><?=$getstudent['level'] ?></option>
                                                            <option value="1" <?php if($getstudent['level']=='1'){ echo "selected"; } ?> >1</option>
                                                            <option value="2"  <?php if($getstudent['level']=='2'){ echo "selected"; } ?> >2</option>
                                                            <option value="3" <?php if($getstudent['level']=='2'){ echo "selected"; } ?> >3</option>
                                                            <option value="4"  <?php if($getstudent['level']=='4'){ echo "selected"; } ?> >4</option>
                                                            <option value="Graduated" <?php if($getstudent['level']=='Graduated'){ echo "selected"; } ?>>Graduate</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Term</label>
                                                        <select  name="term" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3" >
                                                            
                                                            <option value="" >Select Term</option>
                                                            <option value="I"  <?php if($getstudent['term']=='I'){ echo "selected"; } ?> >I</option>
                                                            <option value="II" <?php if($getstudent['term']=='II'){ echo "selected"; } ?> >II</option>
                                                    <option value="Graduated" <?php if($getstudent['term']=='Graduated'){ echo "selected"; } ?>>Graduate</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Mobile</label>
                                                        <input class="form-control py-4" type="text" name="mobile" value="<?=$getstudent['mobile'] ?>"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >Address</label>
                                                        <input class="form-control py-4" type="text" name="address" value="<?=$getstudent['address'] ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >Status</label>
                                                <select id="status" name="status" style="width:100%;background-color:white;border:1px solid #cdd4da;border-radius:5px;" class="py-3">
                                                
                                                    <option value="" >Select status</option>    
                                                    <option value="Undergraduate" <?php if($getstudent['status']=='Undergraduate'){ echo "selected"; } ?>>Undergraduate</option>
                                                    <option value="Graduated" <?php if($getstudent['status']=='Graduated'){ echo "selected"; } ?>>Graduate</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >CGPA</label>
                                                <input class="form-control py-4" type="text" name="cgpa" value="<?=$getstudent['CGPA'] ?>" />
                                            </div>

                                            <input type="hidden" name="action" value="update_student">
                                            <input type="hidden" name="id" value="<?=$getstudent['id']?>">
                                            
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
