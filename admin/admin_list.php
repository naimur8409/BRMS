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

  $admin = new Users();
//   $students= $student->getUserByDept($_GET['dept']);
  $admins = $admin->getAdmins();
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
        <title>Update Admin</title>
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
                        <h1 class="mt-4">Student List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard/ Admin List </li>
                        </ol>
                    
                    </div>


                    <div class="container-fluid">
                       
                        <div class="card mb-4">
                                    <?php if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Admin Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($admins as $data) {?>
                                            <tr>
                                                <td><?php echo $data['name'] ?></td>
                                                <td><?php echo $data['email'] ?></td>
                                                <td>
                                                <a href="edit_admin.php?id=<?=$data['id'] ?>" class="btn btn-info btn-sm">UPDATE</a>
                                                <form action="../controller/AdminController.php" method="post" style="display:inline-block">
                                                
                                                <input type="hidden" name="action" value="delete_admin" />
                                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                                <input type="submit" name="submit" value="DELETE" class="btn btn-danger btn-sm" onclick="return confirm('Delete all data from this row.')" />
                                                
                                                </form>
                                                </td>
                                            </tr>
                                        <?php }  ?>
                                            
                                     
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
    </body>

    <?php unset($_SESSION['message']); ?>
</html>
