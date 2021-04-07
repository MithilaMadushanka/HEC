<?php
      session_start();
      require_once('../php scripts/dbConnection.php');
      $msg =0;

      if(isset($_GET['msg']))
      {
          $msg=$_GET['msg'];
      }

      if (isset($_POST['upload_video'])) {
          
          $header=$_POST['video_header'];
          $description=$_POST['video_description'];
          $link=$_POST['video_link'];
          $file_name=$_FILES['file']['name'];
          $target_dir="uploads/";

          if (!empty(trim($header)) && !empty(trim($description)) && !empty(trim($link))) {
            
               if ($file_name !='')
               {  
                  $target_file=$target_dir.basename($_FILES['file']['name']);
                  $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                  $extensions_arr=array("jpg","jpeg","png","gif");

                  if (in_array($extension, $extensions_arr)) {
                  
                      $image_base64=base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                      $image="data::image/".$extension."base64,".$image_base64;

                      if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                            
                            $query="INSERT INTO images(header,description,tubmail,link,image) VALUES('$header','$description','$file_name','$link','$image')";
                            $result=mysqli_query($con,$query);
                            if ($result) {
                                header("Location:uploadVideo?msg=200");
                            }
                            else
                                header("Location:uploadVideo?msg=400");
                      }
                      else
                          echo "not moved";
                  }
                  else
                        echo "no";
              }
          }
          else
            echo "not filled";
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

  <title>හදව‌තේ ඉංජිනේරූ පංතිය</title>
  <link href="../img/logo.jpg" rel="icon">

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

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">
                       
            <!-- Pending Requests Card Example -->
            <div class="col-md-12 mb-4">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <h3><font color="green">Upload Video</font></h3>
                            <br>
                            <?php
                            if($msg==200)
                            {
                                echo "<div class='alert alert-success' role='alert'>
                                            Video file uploaded SuccessFully!.
                                        </div>";
                            }

                            if($msg==400)
                            {
                                echo "<div class='alert alert-danger' role='alert'>
                                            Unable to upload video file.
                                        </div>";
                            }
                            ?>
                            <form  action="uploadVideo.php" method="post" enctype="multipart/form-data">
                                <table class="table table-white">
                                    <tr><td>Video Header</td></tr>
                                    <tr><td><input type='text' class="form-control" name="video_header" required></td></tr>
                                    <tr><td>Video Description</td></tr>
                                    <tr><td><input type='text' class="form-control" name="video_description" required></td></tr>
                                    <tr><td>Video Tubmail</td></tr>
                                    <tr><td><input type='file' class="form-control" name="file" required></td></tr>
                                    <tr><td>Video Link</td></tr>
                                    <tr><td><input type='text' class="form-control" name="video_link" required></td></tr>

                                    <tr><td><input type='submit' class="btn btn-success" name="upload_video" value="Upload"></td></tr>
                                </table>
                            </form>
                            <br>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <font>If you want to remove video the try follow link</font><br><br>
                            <h3><font color="dark-pink">Remove Video</font></h3>
                            <br>
                            <table class="table table-white">
                                <tr><td>Video Header</td></tr>
                                <tr><td><input type='text' class="form-control" name="" required></td></tr>


                                <tr><td><input type='submit' class="btn btn-warning" name="" value="Remove"></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<!--            <div class="col-md-6 mb-4">-->
<!--                <img src="img/pic2.jpg">-->
<!--            </div>-->
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
