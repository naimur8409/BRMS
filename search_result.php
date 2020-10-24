    <?php
 session_start();
  if(empty($_SESSION['user_id']) && $_SESSION['batch']==''){
    header("Location:login.php");
    $_SESSION['warning'] = "<div class='alert alert-danger'>Please Login First!!</div>";
    exit();
  }

include('dbconnection/dbconnection.php');
include('model/results.php');
$results = new Results();
$status = $results->search($_POST['level'],$_POST['term'],$_SESSION['s_id']);

$backlog = $results->getBacklog($_SESSION['s_id']);

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
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">


                    
                        <h1 class="mt-4 text-center">BAIUST Result Management System (BRMS)</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><?php echo "ID: ". $_SESSION['s_id']; ?></li>
                            <li class="breadcrumb-item "><?php echo $_SESSION['name']; ?></li>
                            <li class="breadcrumb-item "><?php echo $_SESSION['batch']; ?></li>
                            <li class="breadcrumb-item "><?php echo "Result of Level-".$_POST['level']." Term- ".$_POST['term']; ?></li>
                        </ol>
                    <div class="container-fluid">
                       
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">

                                <?php if(!empty($status)){ ?>
                                    <?php
                                
                                $i=0;
                                foreach($status as $data) {
                                
                                    if($data['gpa']=='0'){
                                        $i++;
                                        echo $data['c_code'];
                                    };
                                }
                                if($i>2){
                                    echo 
                                    '<p class=" p-2 text-right text-white">
                                     <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Term repeat</a>
                                    </p>';
                                }

                                
                                ?>



                                <!-- The Modal -->
                                <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">You have faild three courses</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <ul class="list-group list-group-flush">
                                        <?php 
                                        foreach($status as $data) {
                                
                                            if($data['gpa']=='0'){
                                                echo '<li class="list-group-item">'.$data['c_code'].'</li>';
                                            }
                                        }
                                        ?>
                                            
                                        </ul>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                    </div>
                                </div>
                                </div>


                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>

                                                
                                    
                                            
                                        <?php  foreach($status as $data) { ?>
                                            <tr>
                                                <td><?php echo $data['c_code'] ?></td>
                                                <td><?php echo $data['c_name'] ?></td>
                                                <td class="text-right">
                                                    <?php 
                                                        echo $data['credit'];
                                                        $credit[]=$data['credit'];
                                                        $res[]= $data['credit']*$data['gpa']."<br>";
                                                    ?>
                                                </td>
                                                <td class="text-right"><?php echo $data['gpa'] ?></td>
                                                
                                            </tr>
                                            
                                           
                                        </tbody>
                                    <?php } ?>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2"></th>
                                                <th class="text-right"> Total credit: <?php echo array_sum($credit); ?></th>
                                                <th class="text-right">Average GPA: <?php echo round((array_sum($res)/array_sum($credit)),2); ?></th>
                                            </tr>
                                        </tfoot>



                                    </table>

                                    <?php 
                                        }
                                        else{
                                            echo '<h3 class="text-danger">No result Found</h3>';
                                        }?>
                                    <a href="home.php" class="btn btn-info">Search Again</a>

                                
                                    
                                </div>

                            </div>
                        </div>

                        <ul class="list-group mb-4">

                            <li class="list-group-item active">List of Backlog All Courses</li>
                            <?php foreach($backlog as $data) { ?>
                                <li class="list-group-item ">
                                
                                <?php if(!empty($data['c_code'])){
                                    echo $data['c_code'];
                                } 
                                else{
                                    echo "No Backlog";
                                }
                                ?>
                                </li>
                            <?php }  ?>

                        </ul>
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
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" > </script>
        
    <?php unset($_SESSION['message']); ?>
</body>
</html>