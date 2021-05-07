<?php
      $msg=0;
      if (isset($_GET['msg'])) {
          $msg = $_GET['msg'];
       } 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>heart Engineering Class
  </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

 
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Heart Engineering Class</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="loggin/log.php">SignIn</a></li>
          <li><a href="#team">Teachers</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><div id="google_translate_element"></div></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="img/intro-carousel/theme3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>We are professional</h2>
                <p>Our primary objective is to provide you with successful and relevant information studying engineering technology using the latest technology available.
                    .Also, our aim is to give university opportunities by obtaining high marks in the GCE Advanced Level Examination.</p>
                <a href="#services" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/intro-carousel/theme4.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Our Services</h2>
                <p>You can easily get all the courses related to the Advanced Level Engineering Technology subject.
                    Video files as well as Note and Question papers are available.</p>
                <a href="#services" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item ">
            <div class="carousel-background"><img src="img/intro-carousel/theme2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>We are professional</h2>
                <p>Our primary objective is to provide you with successful and relevant information studying engineering technology using the latest technology available.
                    .Also, our aim is to give university opportunities by obtaining high marks in the GCE Advanced Level Examination.</p>
                <a href="#services" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/intro-carousel/theme8.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Our Services</h2>
                <p>You can easily get all the courses related to the Advanced Level Engineering Technology subject.
                    Video files as well as Note and Question papers are available.</p>
                <a href="#services" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

  
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
          <p>Our primary objective is to provide you with successful and relevant information studying engineering technology using the latest technology available.
              .Also, our aim is to give university opportunities by obtaining high marks in the GCE Advanced Level Examination.</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Mission</a></h2>
              <p>
                  To contribute a group of technologists with engineering technology and values to the country and to create innovative innovations in the country to uplift the level of education in the country.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Plan</a></h2>
              <p>
                  Our goal is to organize and conduct Practical Lessons online and with Viva (Short Quzes)
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Vision</a></h2>
              <p>
                  Donating a group of scholars with universal heart knowledge and universal technological knowledge to the nation.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Services</h3>
          <p>You can easily get all the courses related to the Advanced Level Engineering Technology subject. And those lessons are dead
              Video files as well as Note and Question papers are available.</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
            <h4 class="title"><a href="loggin/log.php">Introduction</a></h4>
            <p class="description">Introduction to Technology Curriculum.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
            <h4 class="title"><a href="loggin/log.php">Lessons</a></h4>
            <p class="description">Includes all Advanced Level Engineering Technology subjects as well as other related subjects.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-paper-outline"></i></div>
            <h4 class="title"><a href="loggin/log.php">Notes</a></h4>
            <p class="description">Includes all subject matters relevant to the Advanced Level Engineering Technology subject.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            <h4 class="title"><a href="loggin/log.php">Papers</a></h4>
            <p class="description">Contains PAPERS related to Advanced Level Engineering Technology subject.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
            <h4 class="title"><a href="loggin/log.php">Video Lesson</a></h4>
            <p class="description">Includes video tutorials on Advanced Level Engineering Technology.</p>
          </div>
         

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
        <h3>Call To Action</h3>
        <p> Send us your questions and we will answer those questions.</p>
        <a class="cta-btn" href="#contact">Call To Action</a>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Skills Section
    ============================-->
    

    <!--==========================
      Facts Section
    ============================-->
    <!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        
   
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Teacher</h3>
<!--          <p>In below you can see solution devolop teachers.</p>-->
        </div>

        <div class="row">
          
          <div class="col-lg-12 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/teacher2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Piumanga Edirisinghe </h4>
                  <span>Head Teacher</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
                 

        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>Send us your valuable ideas and questions and we will answer those questions ready.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Homagama, Colombo.</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+071-400-8399</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:Navodpiumanga24@gmail.com">Navodpiumanga24@gmail.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
            <center><h3><b>Send Message</b></h3></center><br>
            <?php if($msg == 504): ?>
                <div class="alert alert-success"><p>Message send Successfully!</p></div>
            <?php elseif($msg == 404): ?>  
                <div class="alert alert-danger"><p>Sorry! Unable to Send Message!</p></div> 
            <?php else: ?>
                <div class=""></div>     
            <?php endif; ?>     
            <form action="php scripts/contact_message.php" method="post">
                <input type="text" name="name" class="form-control" placeholder="Your name" required>
                <input type="email" name="email" class="form-control mt-2" placeholder="Your email address" required>
                <input type="text" name="subject" class="form-control mt-2" placeholder="Email Subject" required>
                <textarea rows="4" cols=10 class="form-control mt-2" name="message" placeholder="Type your Message" required></textarea>
                <center><input type="submit" name="submit" class="btn btn-success mt-3" value="Send Message"><center>
            </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h4>Heart Engineering Class</h4>
            <p>In this website provide so many benefits for you. And using above links you can get lessons and question papers.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#about">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#services">Services</a></li>
            
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
                Homagama <br>
                Colombo<br>
              
                <strong>Phone:</strong> 071-400-8399<br>
                <strong>Email:</strong> Navodpiumanga24@gmail.com<br>
            </p>

<!--            <div class="social-links">-->
<!--              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>-->
<!--              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>-->
<!--              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>-->
<!--              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>-->
<!--              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>-->
<!--            </div>-->

          </div>

         

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Heart Engineering Class</strong>. All Rights Reserved
      </div>
      <div class="credits">
      
        Designed by <a href="http://mithilamadushanka.tk/">Mithila Madushanka</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script type="text/javascript">
      function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
      }
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>
