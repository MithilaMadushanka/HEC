<?php
        include_once('../../php scripts/dbConnection.php');

        $query;
        $result;
        $list;
        $show="";

        $query="SELECT *FROM notes";
        $result=mysqli_query($con,$query);

        if ($result) {

            while($list=mysqli_fetch_assoc($result))
            {
                $link=$list['tubmail'];
                $image=$list['tubmail'];
                $show.="<div class='col-md-6 col-lg-6'>";
                    $show.="<div class='single_delicious d-flex align-items-center'>";
                        $show.="<div class='thumb'>";
                            $show.="<img src='../../admin/uploadNotes/pdf.png' width=150px height=150px >";
                        $show.="</div>";
                        $show.="<div class='info'>";
                            $show.="<h3>".$list['header']."</h3>";
                            $show.="<p>".$list['description']."</p>";
                            $show.="<a href=\"views.php?v_code={$list['id']}\">"."<input type='submit' class='btn btn-success' value='Download' name='download'>"."</a>";
                        $show.="</div>";
                    $show.="</div>";
                $show.="</div>";
            }    
        } 
 ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>හදවතේ ඉංජිනේරූ පංතිය </title>
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
                                        <li><a class="active" href="user.php"><font color="white">home</font></a></li>
                                        
                                        <li><a href="about.php"><font color="white">About Me</font></a></li>
                                        <li><a href="#"><font color="white">Resoureses</font><i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="user.php">Video lessons</a></li>
                                                <li><a href="note.php">Notes </a></li>
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

    <!-- slider_area_start -->
    <!--
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-9 col-md-9 col-md-12">
                            <div class="slider_text text-center">
                                <div class="deal_text">
                                    <span>Big Deal</span>
                                </div>
                                <h3>Burger <br>
                                    Bachelor</h3>
                                <h4>Maxican</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-9 col-md-9 col-md-12">
                            <div class="slider_text text-center">
                                <div class="deal_text">
                                    <span>Big Deal</span>
                                </div>
                                <h3>Burger <br>
                                    Bachelor</h3>
                                <h4>Maxican</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
    <!-- slider_area_end -->

    <div class="best_burgers_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <span>Note Lessons</span>
                        <h2>දිවයිනේ ඇති හොදම පාඩම් සටහන් අන්තර්ගතය</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                    <?php echo $show; ?>
            </div>
            
        </div>
    </div>
    
    <div class="about_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="about_thumb2">
                            <div class="img_1">
                                <img src="img/about/headteacher.jpg" alt="">
                            </div>
                            <div class="img_2">
                                <img src="img/about/teacher.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 offset-lg-1 col-md-6">
                        <div class="about_info">
                            <div class="section_title mb-20px">
                                <span>About Us</span>
                                <h3>Best Teacher <br>
                                        in your City</h3>
                            </div>
                            <p>මම නවෝද් පියුමංග එදිරිසිංහ මේ වන විට රුහුණ විශ්ව විද්‍යාලයේ තෙවන වසර උපාධිය හදරන අතර මා දැන් ඉංජිනේරූ තාක්ෂණවේදී විෂය සම්බන්ධ උපාධිය හදාරන බැවින් මේ විෂය සම්බන්ධව කටයුතු කරනු ලබයී. ඉදිරියට මෙම වෙබ් අඩවිය හරහා විෂය කරුණු මෙන්ම, Questions Papers ද සාකච්චා කිරීමද මාගේ අරමුණ වේ.</p>
                            <div class="img_thumb">
                                <img src="img/signature.png" alt="">
                            </div>
                        </div>
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
                    <div class="">
                        <img src="img/instragram/1.jpg" alt="" width="100%" height="100%">
                        <div class="">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="">
                        <img src="img/instragram/2.jpg" alt="" width="100%" height="100%">
                        <div class="">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="">
                        <img src="img/instragram/4.jpg" alt="" width="100%" height="100%">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="">
                        <img src="img/instragram/3.jpg" alt="" width="100%" height="100%">
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
                                <p>Homagama <br>Colombo </p>
                                
    
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
                                
                                Copyright &copy; All rights reserved | හදවතේ ඉංජිනේරූ පංතිය 

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