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
  $student = $students->getStudent();
  $result = $results->getResult();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Result</title>
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
                        <h1 class="mt-4">Results</h1>
                    
                    </div>

                    <div class="container-fluid">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Result of CSE Spring'15</li>
                        </ol>
                        <div class="row">
<!-- =========================1/1======================== -->
                            <div class="col-xl-6 col-md-6">
                                <div class="table-responsive">
                                <ol class="breadcrumb mb-4 bg-info">
                                    <li class="breadcrumb-item">Level 1</li>
                                    <li class="breadcrumb-item ">Term 1</li>
                                </ol>
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Student Id</th>
                                                <th>Student Name</th><?php 
                                             foreach( $all as $data){ 
                                             if($data['level']==1 && $data['term']=='I' && $data['dept']=='CSE' && $data['batch']==$_GET['batch']){
                                                ?>
                                                <th><?php echo $data['c_code'] ?></th>
                                                <?php }
                                                }?>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Total Credit: </th>
                                                <th>Total GPA: </th>
                                            </tr>
                                        </tfoot>
                                            <?php 
                                             foreach( $all as $data){ 
                                             if($data['level']==1 && $data['term']=='I' && $data['dept']=='CSE' && $data['batch']==$_GET['batch']){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['s_id'] ?></td>
                                                    <td><?php echo $data['name'] ?></td>
                                                    <td><?php echo $data['c_code'] ?></td>
                                                    <td><?php echo $data['c_name'];?></td>
                                                    <td class="text-right"><?php echo $data['credit'] ?></td>
                                                    <td class="text-right"><?php echo $data['gpa'] ?></td>
                                                </tr>
                                                <?php }
                                                }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


<!-- =============================1/2=========================== -->
                            <div class="col-xl-6 col-md-6">
                                <div class="table-responsive">
                                <ol class="breadcrumb mb-4 bg-info">
                                    <li class="breadcrumb-item">Level 1</li>
                                    <li class="breadcrumb-item ">Term II</li>
                                </ol>
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Total Credit: </th>
                                                <th>Total GPA: </th>
                                            </tr>
                                        </tfoot>
                                            <?php 
                                             foreach( $all as $data){ 
                                             if($data['level']==1 && $data['term']=='II' && $data['dept']=='CSE' && $data['batch']=="Spring'15"){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['s_id'] ?></td>
                                                    <td><?php echo $data['name'] ?></td>
                                                    <td><?php echo $data['c_code'] ?></td>
                                                    <td><?php echo $data['c_name'];?></td>
                                                    <td class="text-right"><?php echo $data['credit'] ?></td>
                                                    <td class="text-right"><?php echo $data['gpa'] ?></td>
                                                </tr>
                                                <?php }
                                                }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


<!-- =============================2/1=========================== -->
                            <div class="col-xl-6 col-md-6">
                                <div class="table-responsive">
                                <ol class="breadcrumb mb-4 bg-info">
                                    <li class="breadcrumb-item">Level 2</li>
                                    <li class="breadcrumb-item ">Term II</li>
                                </ol>
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Total Credit: </th>
                                                <th>Total GPA: </th>
                                            </tr>
                                        </tfoot>
                                            <?php 
                                             foreach( $all as $data){ 
                                             if($data['level']==2 && $data['term']=='I' && $data['dept']=='CSE' && $data['batch']=="Spring'15"){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['s_id'] ?></td>
                                                    <td><?php echo $data['name'] ?></td>
                                                    <td><?php echo $data['c_code'] ?></td>
                                                    <td><?php echo $data['c_name'];?></td>
                                                    <td class="text-right"><?php echo $data['credit'] ?></td>
                                                    <td class="text-right"><?php echo $data['gpa'] ?></td>
                                                </tr>
                                                <?php }
                                                }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


<!-- =============================2/2=========================== -->
                            <div class="col-xl-6 col-md-6">
                                <div class="table-responsive">
                                <ol class="breadcrumb mb-4 bg-info">
                                    <li class="breadcrumb-item">Level 2</li>
                                    <li class="breadcrumb-item ">Term II</li>
                                </ol>
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Total Credit: </th>
                                                <th>Total GPA: </th>
                                            </tr>
                                        </tfoot>
                                            <?php 
                                             foreach( $all as $data){ 
                                             if($data['level']==2 && $data['term']=='II' && $data['dept']=='CSE' && $data['batch']=="Spring'15"){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['s_id'] ?></td>
                                                    <td><?php echo $data['name'] ?></td>
                                                    <td><?php echo $data['c_code'] ?></td>
                                                    <td><?php echo $data['c_name'];?></td>
                                                    <td class="text-right"><?php echo $data['credit'] ?></td>
                                                    <td class="text-right"><?php echo $data['gpa'] ?></td>
                                                </tr>
                                                <?php }
                                                }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


<!-- =============================3/1=========================== -->
                            <div class="col-xl-6 col-md-6">
                                <div class="table-responsive">
                                <ol class="breadcrumb mb-4 bg-info">
                                    <li class="breadcrumb-item">Level 3</li>
                                    <li class="breadcrumb-item ">Term I</li>
                                </ol>
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Total Credit: </th>
                                                <th>Total GPA: </th>
                                            </tr>
                                        </tfoot>
                                            <?php 
                                             foreach( $all as $data){ 
                                             if($data['level']==3 && $data['term']=='I' && $data['dept']=='CSE' && $data['batch']=="Spring'15"){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['s_id'] ?></td>
                                                    <td><?php echo $data['name'] ?></td>
                                                    <td><?php echo $data['c_code'] ?></td>
                                                    <td><?php echo $data['c_name'];?></td>
                                                    <td class="text-right"><?php echo $data['credit'] ?></td>
                                                    <td class="text-right"><?php echo $data['gpa'] ?></td>
                                                </tr>
                                                <?php }
                                                }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


<!-- =============================3/2=========================== -->
                            <div class="col-xl-6 col-md-6">
                                <div class="table-responsive">
                                <ol class="breadcrumb mb-4 bg-info">
                                    <li class="breadcrumb-item">Level 3</li>
                                    <li class="breadcrumb-item ">Term II</li>
                                </ol>
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Total Credit: </th>
                                                <th>Total GPA: </th>
                                            </tr>
                                        </tfoot>
                                            <?php 
                                             foreach( $all as $data){ 
                                             if($data['level']==3 && $data['term']=='II' && $data['dept']=='CSE' && $data['batch']=="Spring'15"){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['s_id'] ?></td>
                                                    <td><?php echo $data['name'] ?></td>
                                                    <td><?php echo $data['c_code'] ?></td>
                                                    <td><?php echo $data['c_name'];?></td>
                                                    <td class="text-right"><?php echo $data['credit'] ?></td>
                                                    <td class="text-right"><?php echo $data['gpa'] ?></td>
                                                </tr>
                                                <?php }
                                                }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


<!-- =============================4/1=========================== -->
                            <div class="col-xl-6 col-md-6">
                                <div class="table-responsive">
                                <ol class="breadcrumb mb-4 bg-info">
                                    <li class="breadcrumb-item">Level 4</li>
                                    <li class="breadcrumb-item ">Term I</li>
                                </ol>
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Total Credit: </th>
                                                <th>Total GPA: </th>
                                            </tr>
                                        </tfoot>
                                            <?php 
                                             foreach( $all as $data){ 
                                             if($data['level']==4 && $data['term']=='I' && $data['dept']=='CSE' && $data['batch']=="Spring'15"){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['s_id'] ?></td>
                                                    <td><?php echo $data['name'] ?></td>
                                                    <td><?php echo $data['c_code'] ?></td>
                                                    <td><?php echo $data['c_name'];?></td>
                                                    <td class="text-right"><?php echo $data['credit'] ?></td>
                                                    <td class="text-right"><?php echo $data['gpa'] ?></td>
                                                </tr>
                                                <?php }
                                                }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


<!-- =============================4/2=========================== -->
                            <div class="col-xl-6 col-md-6">
                                <div class="table-responsive">
                                <ol class="breadcrumb mb-4 bg-info">
                                    <li class="breadcrumb-item">Level 4</li>
                                    <li class="breadcrumb-item ">Term II</li>
                                </ol>
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Total Credit: </th>
                                                <th>Total GPA: </th>
                                            </tr>
                                        </tfoot>
                                            <?php 
                                             foreach( $all as $data){ 
                                             if($data['level']==4 && $data['term']=='II' && $data['dept']=='CSE' && $data['batch']=="Spring'15"){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['s_id'] ?></td>
                                                    <td><?php echo $data['name'] ?></td>
                                                    <td><?php echo $data['c_code'] ?></td>
                                                    <td><?php echo $data['c_name'];?></td>
                                                    <td class="text-right"><?php echo $data['credit'] ?></td>
                                                    <td class="text-right"><?php echo $data['gpa'] ?></td>
                                                </tr>
                                                <?php }
                                                }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                           
                        </div>
                            <!-- ======= -->
                    </div>


                </main>
                <?php include('include/footer.php') ?>
            </div>
        </div>
    </body>
</html>
