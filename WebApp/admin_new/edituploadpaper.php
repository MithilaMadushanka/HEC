<?php
      require_once('../php scripts/dbConnection.php');
      session_start();

      $msg=0;
      if (isset($_GET['msg'])) {
          $msg= $_GET['msg'];
      }

      $name ="";
      $id;
      $p_id=0;
      $email="";
      $contact;
      $user_name;
      $password;
      $paper_id=0;
      $title="";
      $description="";
      $owner_name="";

      if (isset($_GET['paper_id'])) {
          $paper_id = $_GET['paper_id'];

          $query = "SELECT * FROM papers WHERE id =$paper_id LIMIT 1";
          $result = mysqli_query($con,$query);

          if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);

              $p_id = $row['id'];
              $title = $row['header'];
              $description = $row['description'];
          }
      }

      if (isset($_SESSION['user_id'])) {
          $name = $_SESSION['full_name'];
          $id= $_SESSION['user_id'];

          $query = "SELECT *FROM account WHERE id=$id";
          $result = mysqli_query($con,$query);

          if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $email = $row['email'];
              $contact = $row['mobile_no'];
              $user_name = $row['user_name'];
          }
      }

      $table="";
      $query = "SELECT *FROM papers WHERE is_deleted=0";
      $result = mysqli_query($con,$query);

      if (mysqli_num_rows($result) > 0) {
          
          while ($rows = mysqli_fetch_assoc($result)) {
              
              $table.="<tr>";
              $table.="<td>".$rows['header']."</td>";
              $table.="<td>"."<a href='edituploadpaper.php?paper_id=".$rows['id']."'><span class='mdi mdi-eyedropper ' style='color:green;font-size:14px;''> Edit</span></a>".
                    "<a href=''><span class='mdi mdi-close-circle ml-2' style='color:red;font-size:14px;''> Remove</span></a>".
                  "</td>";
              $table.="</tr>";
          }

      }


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Heart Engineering Class</title>
    <link href="../img/logo.jpg" rel="icon">
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico" /> -->
  </head>
  <body>
    <div class="container-scroller">
        
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <span class="mdi mdi-account-circle" style="font-size: 30px;color: purple;"></span>
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $name; ?></span>
                  <span class="text-secondary text-small">Administrator</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Account Setting</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="myaccount.php">My Account Details</a></li>
                  <li class="nav-item"> <a class="nav-link" href="studentaccount.php">Student Account Details</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uploadvideo.php">
                <span class="menu-title">Upload Video</span>
                <i class="mdi mdi-camcorder-box menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uploadnote.php">
                <span class="menu-title">Upload Notes</span>
                <i class="mdi mdi-book-multiple menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uploadpaper.php">
                <span class="menu-title">Upload Papers</span>
                <i class="mdi mdi-border-color menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uploadonlinelessons.php">
                <span class="menu-title">Publish Online Lessons</span>
                <i class="mdi mdi-cloud-upload menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="studentLevels.php">
                <span class="menu-title">Control Student Levels</span>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../phpModel/logout.php">
                <span class="menu-title">SignOut</span>
                <i class="mdi mdi-lock-open-outline menu-icon"></i>
              </a>
            </li>
            
            
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <p>Hello!!.. <?php echo "<b>".$name."</b>"; ?> Welcome to Admin Panel</p>
                  <!-- <a href="" target="_blank" class="btn download-button purchase-button ml-auto">Close</a> -->
                  <i class="mdi mdi-close ml-auto" id="bannerClose" ></i>
                </span>
              </div>
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span>Update Paper </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">Update Paper Details</h4>
                              <!-- <p class="card-description"> Horizontal form layout </p> -->
                              <br><br>
                              <form class="forms-sample" method="post" action="../php scripts/updatePaper.php" enctype="multipart/form-data">
                                    <?php  if($msg ==505):?>
                                        <div class="alert alert-success" role="alert">
                                              Paper Updated Successfully!.
                                        </div>
                                    <?php endif; ?> 
                                    
                                    <?php  if($msg ==507):?>
                                        <div class="alert alert-danger" role="alert">
                                              Unable to Update paper.
                                        </div>
                                    <?php endif; ?>  
                                    <input type="hidden" name="paper_id" value=<?php echo $p_id; ?>>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="Your note title" required  value=<?php echo $title; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                                          <div class="col-sm-9">
                                              <input type="text" name="description" class="form-control" id="exampleInputEmail2" placeholder="Your note Description" required value=<?php echo $description; ?>>
                                          </div>
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary mr-2" name="up_upload">Update</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                              </form>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                          <div class="card-body">
                                <table class="table">
                                      <tr>
                                            <th>Title</th>
                                            <th>Actions</th>
                                      </tr>

                                      <?php echo $table; ?>
                                </table>
                          </div>
                    </div>
                  </div>
            </div>
            
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("exampleInputPassword2");
            var y = document.getElementById("exampleInputConfirmPassword2");
            if (x.type === "password") {
                  x.type = "text";
            } else {
                  x.type = "password";
            }

            if (y.type === "password") {
                  y.type = "text";
            } else {
                  y.type = "password";
            }
        }
    </script>
  </body>
</html>