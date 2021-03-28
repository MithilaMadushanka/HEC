<?php 
        session_start();
        include_once('../../php scripts/dbConnection.php');

        $id=$_SESSION['user_id'];
        $full_name=$_SESSION['full_name'];
        $province=$_SESSION['province'];
        $district=$_SESSION['district'];
        $homecity=$_SESSION['home_city'];
        $email=$_SESSION['email'];
        $user_name=$_SESSION['user_name'];
        $target_dir="uploads/";

        $err=array();

        if (isset($_POST['update'])) {
            
            $password=$_POST['password'];
            $re_password=$_POST['re_password'];
            $file=$_FILES['file']['name'];


            if (!empty(trim($password)) && !empty(trim($re_password)) && $file!='') {
                
                if ($password==$re_password) {
                    
                    $pwd=sha1($password);
                    $target_file=$target_dir.basename($_FILES['propic']['name']);
                    $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $extensions_arr=array("jpg","jpeg","png","gif");

                    if (in_array($extension, $extensions_arr)) {
                  
                        $image_base64=base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                        $image="data::image/".$extension."base64,".$image_base64;

                        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                            
                                $query= "SELECT *FROM userprofile WHERE user_id=$id";
                                $result = mysqli_query($con,$query);

                                if (mysqli_num_rows($result) > 0) {
                                    $query="UPDATE userprofile SET image='$file' WHERE user_id=$id";
                                    $result=mysqli_query($con,$query);

                                    $query2="UPDATE account SET password='$pwd' WHERE id=$id";
                                    $result2=mysqli_query($con,$query2);

                                    if ($result && $result2) {
                                        header('Location:about.php');
                                    }
                                    else
                                        echo "Not upload";
                                }
                                else
                                {
                                    $query="INSERT INTO userprofile(user_id,image) VALUES($id,'$file')";
                                    $result=mysqli_query($con,$query);

                                    $query2="UPDATE account SET password='$pwd' WHERE id=$id";
                                    $result2=mysqli_query($con,$query2);

                                    if ($result && $result2) {
                                        header('Location:about.php');
                                    }
                                    else
                                        echo "Not upload";
                                }    
                        }
                        else
                            echo "not moved";
                   }
                }
                else
                        $err[]="Password does not match";
            }


            if (empty(trim($password)) && $file!='') {
                
                    $target_file=$target_dir.basename($_FILES['file']['name']);
                    $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $extensions_arr=array("jpg","jpeg","png","gif");

                    if (in_array($extension, $extensions_arr)) {
                  
                        $image_base64=base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                        $image="data::image/".$extension."base64,".$image_base64;

                        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                            
                                $query= "SELECT *FROM userprofile WHERE user_id=$id";
                                $result = mysqli_query($con,$query);

                                if (mysqli_num_rows($result) > 0) {
                                    $query="UPDATE userprofile SET image='$file' WHERE user_id=$id";
                                    $result=mysqli_query($con,$query);

                                    $query2="UPDATE account SET password='$pwd' WHERE id=$id";
                                    $result2=mysqli_query($con,$query2);

                                    if ($result && $result2) {
                                        header('Location:about.php');
                                    }
                                    else
                                        echo "Not upload";
                                }
                                else
                                {
                                    $query="INSERT INTO userprofile(user_id,image) VALUES($id,'$file')";
                                    $result=mysqli_query($con,$query);

                                    $query2="UPDATE account SET password='$pwd' WHERE id=$id";
                                    $result2=mysqli_query($con,$query2);

                                    if ($result && $result2) {
                                        header('Location:about.php');
                                    }
                                    else
                                        echo "Not upload";
                                }    
                        }
                        else
                            echo "not moved";
                   }
            }

            if (!empty(trim($password)) && !empty(trim($re_password)) && $file=='') {
                
                if ($password==$re_password) {
                    $pwd=sha1($password);

                    $query2="UPDATE account SET password='$pwd' WHERE id=$id";
                    $result2=mysqli_query($con,$query2);
                    if ($result2) {
                        header('Location:about.php');
                    }
                }
                else
                    $err[]="Password does not match";
            }
        }

        $query="SELECT *FROM userprofile WHERE user_id=$id";
        $result=mysqli_query($con,$query);
        if ($result) {
            $list=mysqli_fetch_assoc($result);
        }
 ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About Me</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.jpg">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
            <div class="header-area ">
                <div id="sticky-header" class="main-header-area" style="background-color: green;">
                    <div class="container-fluid p-0">
                        <div class="row align-items-center no-gutters">
                            <div class="col-xl-5 col-lg-5">
                                <div class="main-menu  d-flex d-lg-block">
                                    <br>
                                    <nav>
                                        <ul id="navigation">
                                            <li><a  href="user.php"><font color="white">home</font></a></li>
                                            
                                            <li><a class="active" href="about.php"><font color="white">About Me</font></a></li>
                                            <li><a href="#"><font color="white">Resoureses</font><i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="user.php">Video lessons</a></li>
                                                    <li><a href="note.php">Notes</a></li>
                                                    <li><a href="papers.php">Papers </a></li>
                                                </ul>
                                            </li>
                                            
                                            <li><a href="../../php scripts/logout.php"><font color="white">LogOut</font></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            
                        
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-end -->

  
<!-- about_area_start -->
<div class="about_area">
        <div class="container">
            <div class="row align-items-center">
                
                <div class=" col-md-12">
                    <center>
                    <div class="about_info">
                        <?php
                                    $image=$list['image'];
                                     echo "<img src='uploads/$image' width=200px height=200px style='border-radius:95px;'>"; 
                             ?>
                        <div class="section_title mb-20px">
                            <span>Profile</span>
                            
                        </div>
                        <?php echo $full_name; ?><br>
                        <?php echo $homecity; ?>
                        <?php echo $district; ?><br><br>
                        <?php echo "Conatct : ".$email; ?><br>
                        <?php echo $_SESSION['contact']; ?><br>
                        <br>
                        <br>
                        <font color="green">ඔබගේ ගිණුමෙහි පැතිකඩරුව හෝ මුරපදය වෙනස් කිරීමට අවශ්‍ය නම්</font>
                        <br>
                        <br>
                        <?php 
                                if (!empty($err)) {
                                    echo "<font color='red'>".$err[0]."</font>";
                                }
                         ?>
                         
                         <p>
                            <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded   ="false" aria-controls="collapseExample">
                                Edit Profile
                            </a>
  
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form action="about.php" method="post" enctype="multipart/form-data">
                                    <table>
                                        <tr><td></td></tr>
                                        <tr>
                                            <td><label>User name:</label></td>
                                            <td><?php echo $user_name; ?></td>
                                        </tr>
                            
                                        <tr>
                                            <td><label><br>Email:</label></td>
                                            <td><input type="text" name="email" class="form-control" value=<?php echo $email; ?>></td>
                                        </tr>
                                        <tr>
                                            <td><label><br>Password:</label></td>
                                            <td><input type="password" name="password" class="form-control"></td>
                                        </tr>
                                        <tr>
                                
                                            <td><label><br>Retype password :</label></td>
                                            <td><input type="password" name="re_password" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><label><br>Upload profile pic :</label></td>
                                            <td><input type="file" name="file" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><br><input type='submit' class='btn btn-finish btn-fill btn-success btn-wd btn-sm' name='update' value='Update' /></td>
                                
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    


<!-- instragram_area_start -->
<div class="instragram_area">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="single_instagram">
                <img src="img/instragram/1.jpg" alt="">
                <div class="ovrelay">
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="single_instagram">
                <img src="img/instragram/2.jpg" alt="">
                <div class="ovrelay">
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="single_instagram">
                <img src="img/instragram/4.jpg" alt="">
                <div class="ovrelay">
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="single_instagram">
                <img src="img/instragram/3.jpg" alt="">
                <div class="ovrelay">
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- instragram_area_end -->

<footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget text-center ">
                            <h3 class="footer_title pos_margin">
                                    Address
                            </h3>
                            <p>Homagama <br>Colombo</p>
                            

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget text-center ">
                            <h3 class="footer_title pos_margin">
                                Contact
                            </h3>
                            <p>Navodpiumanga24@gmail.com<br> Head Teacher <br></p>
                            <a class="number" href="#">+071-400-8399</a>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-lg-4">
                            <div class="footer_widget">
                                    <h3 class="footer_title">
                                            Stay Connected
                                    </h3>
                                    <form action="#" class="newsletter_form">
                                        <input type="text" placeholder="Enter your mail">
                                        <button type="submit">Send mail</button>
                                    </form>
                                    <p class="newsletter_text">Stay connect with us to get exclusive offer!</p>
                                </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="socail_links text-center">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            
                            Copyright &copy;All rights reserved | හදවතේ ඉංජිනේරූ පංතිය

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>

</body>

</html>