<?php 
        session_start();
        require_once('../php scripts/dbConnection.php');
        require '../email/mail/PHPMailerAutoload.php';
        $credential = include('../email/mail/credential.php');   //credentials import
        $email_body="";

        if (isset($_GET['err_code'])) {
            $student_id=$_GET['err_code'];
        }
        else
          $student_id=0;


        $query="";
        $result;
        $student_list;
        $table="";
        $selected_id;

        $student="";
        $full_name="";
        $email="";
        $mobile="";
        $is_approved="";
        $id;
        $err=array();

        $query="SELECT *FROM account WHERE is_approved=0";
        $result=mysqli_query($con,$query);

        if ($result) {
            while ($student_list=mysqli_fetch_assoc($result))
            {
            	$selected_id=$student_list['id'];
                $table.="<tr>";
                $table.="<td>".$student_list['full_name']."</td>";
                //$table.="<td>".$student_list['email']."</td>";
                
                if ($student_list['is_approved'] == 0) {
                    $table.="<td>"."Not approved"."</td>";
                    $table.="<td>"."<a href=\"approvel.php?err_code={$student_list['id']}\">"."<input type='submit' class='btn btn-warning' value='Show'>"."</a>"."</td>";
                }
                else
                {
                    $table.="<td>"."Approved"."</td>";
                    $table.="<td>"."<input type='submit' class='btn btn-success' value='Show'>"."</td>";   
                }  
                $table.="</tr>";
            }
        }

        //functions
        $find_query;
        $find_result;
        $find_list;

        function find_student($find)
        {
        	$find_query="SELECT *FROM account WHERE id=$find";
        	$find_result=mysqli_query($con,$find_query);

        	if ($find_result) {
        		$find_list=mysqli_fetch_assoc($find_result);
        		$full_name=$find_list['full_name'];
        		$email=$find_list['email'];
        		$mobile=$find_list['mobile_no'];
        		$is_approved=$find_list['is_approved'];
        	}
        }

        $query="SELECT *FROM account WHERE id=$student_id";
        $result=mysqli_query($con,$query);

        if ($result) {
            
            $student=mysqli_fetch_assoc($result);
            $full_name=$student['full_name'];
            $email=$student['email'];
            $mobile=$student['mobile_no'];
            if($student['is_approved']==0)
                 $is_approved='False';
            else
                 $is_approved='True';   
        }

        if (isset($_POST['give_approve'])) {
        	//echo "ok";
        	$id=$_POST['id'];
        	$is_approved=$_POST['is_approved'];
            $to = $_POST['email'];



        	if (empty(trim($id)) || empty(trim($is_approved))) {
        		$err[]="User not found";
        	}
        	else
        	{
        	  if ($is_approved=="True" || $is_approved=="true" || $is_approved=="TRUE")
              {
                  $query="UPDATE account SET is_approved=1 WHERE id=$id";
                  $result=mysqli_query($con,$query);
                  if ($result)
                  {
                      $mail = new PHPMailer;
                      $mail->isSMTP();
                      $mail->Host = 'smtp.gmail.com';
                      $mail->SMTPAuth = true;
                      $mail->Username = $credential['user']  ;
                      $mail->Password = $credential['pass']  ;
                      $mail->SMTPSecure = 'tls';
                      $mail->Port = 587;
                      $mail->setFrom("hadawate.ingineru.panthiya@gmail.com");
                      $mail->addAddress($to);
                      $mail->addReplyTo('Message from Website');
                      $mail->addAttachment('../loggin/assets/img/logo.jpg');
                      $mail->isHTML(true);

                      $email_subject = "Account Approvel ";
                      $message="Dear Student,<br>";
                      $message.= "ඔබව හදවතේ ඉංජිනේරූ පංතිය සදහා සාදරයෙන් පිළිගන්නමු. හදවතේ ඉංජිනේරූ පංතිය මගින් කරගෙන යනු ලබන සෑම පාඩම් මාළාවන්ට ඔබට සහාභාගි විය හැකිය.<br>";
                      $message.="www.slteca.lk<br>";
                      $message.="<br><br>Thank you<br>";
                      $message.="හදවතේ ඉංජීනේරූ පංතිය.<br>";
                      $message.="<img src='../img/logo.jpg'>";

                      $mail->Subject = $email_subject;
                      $mail->Body    = "$message";
                      $mail->AltBody = 'If you see this mail. please reload the page.';
                      if(!$mail->send()) {
                          header('Location:admin.php?msg=405');
                      } else {
                          header('Location:admin.php?msg=505');
                      }

                  }
              }

              else if ($is_approved=="False" || $is_approved=="false" || $is_approved=="FALSE") 
              {
                  $query="UPDATE account SET is_approved=0 WHERE id=$id";
                  $result=mysqli_query($con,$query);
                  if ($result)
                  {
                      header('Location:admin.php');
                  }
              }

              else
                  $err[]="If you want to give approvel then you have to type 'True' or 'False'.";

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

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          

          <!-- Content Row -->
          <div class="row">
                       
            <!-- Pending Requests Card Example -->
            <div class="col-md-6 mb-4">
                <h3 style="color: blue">Give Approvel</h3>
                <br>
                <font color="green">So you can see selected student details. And also you can give approvel.</font>
                <br>
                <form action="approvel.php" method="post">
                <table class="table table-white">
                	<tr><td><input type="text" name="id" style="display: none;" value=<?php echo $student_id; ?>></td></tr>
                    <tr>
                        <td>Full name</td>
                    </tr>
                    <tr>
                        <td><?php echo $full_name; ?>></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" class="form-control" readonly value=<?php echo $email; ?>></td>
                    </tr>
                    <tr>
                        <td>Mobile no</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="" class="form-control" value=<?php echo $mobile; ?>></td>
                    </tr>
                    <tr>
                        <td>Is approvel</td>
                    </tr>
                    <tr><td><input type="text" name="is_approved" class="form-control" value=<?php echo $is_approved; ?>></td></tr>
                </table>
            	
                <br>
                <input type="submit" name="give_approve" class="btn btn-success" value="Approve">
                </form>
                <br>
                <?php 
                        if (!empty($err)) {
                            echo "<font color='red'>".$err[0]."</font>";
                        }
                ?>
                <br><br>
                <font color="blue">පහත ඇති table එකෙන් Approvel නැති සියලුම  පිරිස දැක ගත හැක.</font>
                <br><br>


                <table class="table table-white" >
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Is Approved</b></th>
                        <th><b>View</b></th>
                    </tr>
                    <?php echo $table; ?>
                </table>
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
