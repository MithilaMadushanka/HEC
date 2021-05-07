<?php
require_once('../php scripts/dbConnection.php');
require '../email/mail/PHPMailerAutoload.php';
$credential = include('../email/mail/credential.php');   //credentials import
$email_body="";

session_start();

$name ="";
$id;
$n_id=0;
$email="";
$contact;
$user_name;
$password;
$msgs=0;
$msg=0;

$stu_id=0;
$stu_name="";
$stu_email="";
$stu_contact="";
$homecity="";

$d_stu_id=0;
$d_stu_name="";
$d_stu_email="";
$d_stu_contact="";
$d_homecity="";

if (isset($_GET['msg'])) {
    $msg= $_GET['msg'];
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



if(isset($_POST['un_approve']))
{
    $stu_id = $_POST['stu_id'];
    $stu_name = $_POST['name'];
    $stu_email = $_POST['email'];

    $query="UPDATE account SET is_approved=1 WHERE id=$stu_id";
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
        $mail->addAddress($stu_email);
        $mail->addReplyTo('Message from Website');
        $mail->addAttachment('../loggin/assets/img/logo.jpg');
        $mail->isHTML(true);

        $email_subject = "Account Approvel ";
        $message="Dear Student ".$stu_name.",<br>";
        $message.= "ඔබව හදවතේ ඉංජිනේරූ පංතිය සදහා සාදරයෙන් පිළිගන්නමු. හදවතේ ඉංජිනේරූ පංතිය මගින් කරගෙන යනු ලබන සෑම පාඩම් මාළාවන්ට ඔබට සහාභාගි විය හැකිය.<br>";
        $message.="www.slteca.lk<br>";
        $message.="<br><br>Thank you<br>";
        $message.="හදවතේ ඉංජීනේරූ පංතිය.<br>";
        $message.="<img src='../img/logo.jpg'>";

        $mail->Subject = $email_subject;
        $mail->Body    = "$message";
        $mail->AltBody = 'If you see this mail. please reload the page.';
        if(!$mail->send()) {
            header('Location:approvels.php?msg=405');
        } else {
            header('Location:approvels.php?msg=505');
        }

    }
}

if(isset($_POST['un_search']))
{
    $email = $_POST['s_email'];
    $query = "SELECT *FROM account WHERE email='$email' AND is_approved=0 AND account_type='Student' AND is_deleted=0";
    $result = mysqli_query($con,$query);
    if($result)
    {
        $row = mysqli_fetch_assoc($result);
        $stu_id = $row['id'];
        $stu_name = $row['full_name'];
        $stu_email = $row['email'];
        $stu_contact = $row['mobile_no'];
        $homecity = $row['home_city'];
    }
}

if(isset($_POST['ud_search']))
{
    $email = $_POST['s_email'];
    $query = "SELECT *FROM account WHERE email='$email' AND is_approved=1 AND account_type='Student' AND is_deleted=0";
    $result = mysqli_query($con,$query);
    if($result)
    {
        $row = mysqli_fetch_assoc($result);
        $d_stu_id = $row['id'];
        $d_stu_name = $row['full_name'];
        $d_stu_email = $row['email'];
        $d_stu_contact = $row['mobile_no'];
        $d_homecity = $row['home_city'];
    }
}

if(isset($_POST['un_deapprove']))
{
    $d_stu_id = $_POST['d_stu_id'];
    $d_stu_name = $_POST['d_name'];
    $d_stu_email = $_POST['d_email'];

    $query="UPDATE account SET is_approved=0 WHERE id=$d_stu_id";
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
        $mail->addAddress($d_stu_email);
        $mail->addReplyTo('Message from Website');
        $mail->addAttachment('../loggin/assets/img/logo.jpg');
        $mail->isHTML(true);

        $email_subject = "Account Approvel ";
        $message="Dear Student ".$d_stu_name.",<br>";
        $message.= "කණගාටුයි!. ඔබගේ ගිණුම තාවකාලිකව අත්හිටුවා ඇත. කරුණාකර අපගේ කාර්යය මණ්ඩල සමාජීකයෙකු වෙත ඔබගේ ගැටලුව ඉදිරිපත් කරන්න.<br>";
        $message.="www.slteca.lk<br>";
        $message.="<br><br>Thank you<br>";
        $message.="හදවතේ ඉංජීනේරූ පංතිය.<br>";
        $message.="<img src='../img/logo.jpg'>";

        $mail->Subject = $email_subject;
        $mail->Body    = "$message";
        $mail->AltBody = 'If you see this mail. please reload the page.';
        if(!$mail->send()) {
            header('Location:approvels.php?msg=407');
        } else {
            header('Location:approvels.php?msg=507');
        }

    }
}

if(isset($_POST['deapprove_all']))
{
    $query = "UPDATE account SET is_approved=0 WHERE account_type='Student'";
    $result = mysqli_query($con,$query);
    if($result)
    {
        header('Location:approvels.php?msg=509');
    }
    else
    {
        header('Location:approvels.php?msg=407');
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
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="uploadonlinelessons.php">-->
<!--                    <span class="menu-title">Publish Online Lessons</span>-->
<!--                    <i class="mdi mdi-cloud-upload menu-icon"></i>-->
<!--                </a>-->
<!--            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="approvels.php">
                    <span class="menu-title">Student Approvels</span>
                    <i class="mdi mdi-account menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../php scripts/logout.php">
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
                </span>Student Approvel</h3>
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
                            <h4 class="card-title">Student Details</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form action="approvels.php" method="post">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Find email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="s_email" class="form-control" id="exampleInputUsername2" placeholder="Type student email...." required>
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary mr-2" name="un_search">Search</button>
                                </div>
                            </form>
                            <br><br>
                            <form class="forms-sample" method="post" action="approvels.php" enctype="multipart/form-data">
                                <?php  if($msg ==505):?>
                                    <div class="alert alert-success" role="alert">
                                        Approvel Updated Successfully!.
                                    </div>
                                <?php endif; ?>

                                <?php  if($msg ==405):?>
                                    <div class="alert alert-danger" role="alert">
                                        Unable to Update approvel.
                                    </div>
                                <?php endif; ?>
                                <input type="hidden" name="stu_id" value=<?php echo $stu_id; ?>>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="exampleInputUsername2" placeholder="Full name of the student" required  value=<?php echo $stu_name; ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Your note Description" required value=<?php echo $stu_email; ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Contact</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="contact" class="form-control" id="exampleInputEmail2" placeholder="Your note Description" required value=<?php echo $stu_contact; ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Home City</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="home_city" class="form-control" id="exampleInputEmail2" placeholder="Your note Description" required value=<?php echo $homecity; ?>>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-gradient-primary mr-2" name="un_approve">Approve</button>
                                <button type="reset" class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Deactivate Student Account</h4>
                            <form action="approvels.php" method="post">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Find email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="s_email" class="form-control" id="exampleInputUsername2" placeholder="Type student email...." required>
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary mr-2" name="ud_search">Search</button>
                                </div>
                            </form>
                            <br><br>
                            <form class="forms-sample" method="post" action="approvels.php" enctype="multipart/form-data">
                                <?php  if($msg ==507):?>
                                    <div class="alert alert-success" role="alert">
                                        Account Deactivated Successfully!.
                                    </div>
                                <?php endif; ?>
                                <?php  if($msg ==509):?>
                                    <div class="alert alert-success" role="alert">
                                        All Account Deactivated Successfully!.
                                    </div>
                                <?php endif; ?>
                                <?php  if($msg ==407):?>
                                    <div class="alert alert-danger" role="alert">
                                        Unable to Update approvel.
                                    </div>
                                <?php endif; ?>
                                <input type="hidden" name="d_stu_id" value=<?php echo $d_stu_id; ?>>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="d_name" class="form-control" id="exampleInputUsername2" placeholder="Full name of the student" required  value=<?php echo $d_stu_name; ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="d_email" class="form-control" id="exampleInputEmail2" placeholder="Your note Description" required value=<?php echo $d_stu_email; ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Contact</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="d_contact" class="form-control" id="exampleInputEmail2" placeholder="Your note Description" required value=<?php echo $d_stu_contact; ?>>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Home City</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="d_home_city" class="form-control" id="exampleInputEmail2" placeholder="Your note Description" required value=<?php echo $d_homecity; ?>>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-gradient-primary mr-2" name="un_deapprove">Deactivate</button>
                                <button type="reset" class="btn btn-light">Cancel</button>
                            </form>
                            <form action="approvels.php" method="post">
                                <button type="submit" class="btn btn-gradient-primary mr-2 mt-2" name="deapprove_all">Deactivate All</button>
                            </form>
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

