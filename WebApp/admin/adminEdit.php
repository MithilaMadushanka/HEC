<?php
      session_start();
      require_once('../php scripts/dbConnection.php'); 

      $user_id=$_SESSION['user_id'];
      $full_name="";
      $province="";
      $district="";
      $home_city="";
      $account_type="";
      $email="";
      $mobile_no="";
      $user_name="";
      $password="";
      $pwd="";


      $query="";
      $result;
      $user;
      $err=array();

      $query="SELECT *FROM account WHERE id=$user_id";
      $result=mysqli_query($con,$query);

      if ($result) {
        $user=mysqli_fetch_assoc($result);
        $full_name=$user['full_name'];
        $province=$user['province'];
        $district=$user['district'];
        $home_city=$user['home_city'];
        $account_type=$user['account_type'];
        $email=$user['email'];
        $mobile_no=$user['mobile_no'];
        $user_name=$user['user_name'];

      }

      if (isset($_POST['submit'])) {
          
          $province=$_POST['province'];
          $district=$_POST['district'];
          $home_city=$_POST['home_city'];
          $account_type=$_POST['account_type'];
          $email=$_POST['email'];
          $user_name=$_POST['user_name'];
          $password=$_POST['password'];

          if (empty(trim($password))) {
              $query="UPDATE account SET province='{$province}', district='{$district}', home_city='{$home_city}', account_type='{$account_type}',email='{$email}',user_name='{$user_name}' WHERE id=$user_id";

              $result=mysqli_query($con,$query);
              if ($result) {
                      $err[]="Data Updated Sucessfully!..";
                      header('Location:admin.php');
                  }
                  else
                      $err[]="Unable to Update data!!..";
              }
              else{
                      $pwd=sha1($password);

                      $query="UPDATE account SET province='{$province}', district='{$district}', home_city='{$home_city}', account_type='{$account_type}',email='{$email}',user_name='{$user_name}',password='{$pwd}' WHERE id=$user_id";
                      $result=mysqli_query($con,$query);

                      if ($result) {
                          $err[]="Data Updated Sucessfully!..";
                          header('Location:admin.php');
                      }
                      else
                          $err[]="Unable to Update data!!..";
                  }


          }
      
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin Edit</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        User Details
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>User settings</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="studentEdit.php">Student</a>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Account Settings</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="adminEdit.php">Edit Me</a>
            
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Views and Uploads :</h6>
            <a class="collapse-item" href="allUsers.php">All Users</a>
            <a class="collapse-item" href="uploadVideo.php">Upload Video</a>
            <a class="collapse-item" href="uploadNote.php">Upload Notes</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="uploadPaper.php">Upload Papers</a>
            <!--<a class="collapse-item" href="approvel.php">Approvel</a>-->
          </div>
        </div>
      </li>

      

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="../php scripts/logout.php">
          <i class="fas fa-fw fa-log"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
    <div class="container-fluid">

          
          <!-- Content Row -->
          <div class="row">
                       
            <!-- Pending Requests Card Example -->
            <div class="col-md-6 mb-4" style="background-color: white">
                <h3><font color="blue">Welcome to Admin Edit Panel</font></h3><br>
                <font>&nbsp;&nbsp;&nbsp;&nbsp;Check your details correct or not and you can update your details as well.&nbsp;&nbsp;In addition , you don't have permission to change some of data fields.</font>
                <br><br>
                <h4>My Details,</h4><br>  
                <form  action="adminEdit.php" method="post">
                  <table>
                    <tr>
                        <td><label>Full name </label></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="full_name" style="width: 300px;" disabled value= <?php echo $full_name; ?>></td>
                    </tr>
                    <tr>
                        <td><label>Province :</label></td>
                    </tr>
                    <tr>
                      <td><input type="text" class="form-control" name="province" style="width: 300px;" required value= <?php echo $province; ?>></td>
                    </tr>
                    <tr>
                        <td><label>District :</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="district" style="width: 300px;" required value= <?php echo $district; ?>></td>
                    </tr>
                    <tr>
                        <td><label>Home City :</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="home_city" style="width: 300px;" required value= <?php echo $home_city; ?>></td>
                    </tr>
                    <tr>
                        <td><label>Account type :</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="account_type" style="width: 300px;" required value= <?php echo $account_type; ?>></td>
                    </tr>
                    <tr>
                        <td><label><br>Email :</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="email" style="width: 300px;" required value= <?php echo $email; ?>></td>
                    </tr>
                    <tr>
                        <td><label>Mobile no :</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="mobile_no" disabled style="width: 300px;" value= <?php echo $mobile_no; ?>></td>
                    </tr>
                    <tr>
                        <td><label>User name :</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="user_name" style="width: 300px;" required value= <?php echo $user_name; ?>></td>
                    </tr>
                    <tr>
                        <td><label>Reset password :</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="password" style="width: 300px;" ></td>
                    </tr>
                    <tr>
                        <td><br><input type="submit" class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='submit' value='Update'></td>
                    </tr>
                    <tr>
                        <td><?php 

                               if (!empty($err)) {
                                    echo "<br>";
                                    echo "<font color=green>".$err[0]."</font>";
                                } 
                         ?>
                        </td>
                    </tr>
                </table>
                </form>
            </div>

            <div class="col-xl-3 col-md-6 mb-4" style="background-color: white">
                                        
                    <img src="img/pic2.jpg">
            </div>  
          </div>

          

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; හදව‌තේ ඉංජිනේරූ පංතිය</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
