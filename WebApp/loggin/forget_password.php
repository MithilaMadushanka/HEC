<?php 
      session_start();
      require_once('../php scripts/dbConnection.php');
      require '../email/mail/PHPMailerAutoload.php';
      $credential = include('../email/mail/credential.php');   //credentials import
      $email_body="";

      $email="";
      $full_name="";
      $user_name = "";
      $msg=0;
      $sender="mithilabandara97@gmail.com";

      if (isset($_GET['msg']))
      {
          $msg = $_GET['msg'];
      }

      if(isset($_POST['submit']))
      {
          $email=mysqli_real_escape_string($con,$_POST['email']);
          $query = "SELECT *FROM account WHERE email='$email' LIMIT 1";
          $result = mysqli_query($con,$query);
          if(mysqli_num_rows($result) > 0)
          {
               $row = mysqli_fetch_assoc($result);
               $id = $row['id'];
               $full_name = $row['full_name'];
               $user_name = $row['user_name'];
               $email=$row['email'];
               $default_pass = "345".$id."427";

              $mail = new PHPMailer;
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              $mail->Username = $credential['user']  ;
              $mail->Password = $credential['pass']  ;
              $mail->SMTPSecure = 'tls';
              $mail->Port = 587;

              $mail->setFrom("hadawate.ingineru.panthiya@gmail.com");
              $mail->addAddress($email);
              echo $email;
              $mail->addReplyTo('Reset your account password');
              $mail->addAttachment('assets/img/logo.jpg');
              $mail->isHTML(true);                                  // Set email format to HTML

              $email_body.="Dear {$full_name},<br><br>";
              $email_body.= "Your account password has been reset!. And your new login details as follow, <br>";
              $email_body.="<b>From:</b> හදවතේ ඉංජිනේරූ පංතිය  <br>";
              $email_body.="<b>Username :</b>{$user_name} <br>";
              $email_body.="<b>New Password :</b><br>".nl2br(strip_tags($default_pass));
              $email_body.="<br><br>Thank you<br>";
              $email_body.="හදවතේ ඉංජිනේරූ පංතිය<br>";
              $email_body.="<img src='assets/img/logo.jpg'>";

              $mail->Subject = "Reset your account password";
              $mail->Body    = "$email_body";
              $mail->AltBody = 'If you see this mail. please reload the page.';
//               $to = $email;
//               $email_subject = "Reset your account password";
//               $email_body = "Hello {$full_name} Your account password has been reset!. And your new login details as follow, <br>";
//               $email_body.="<b>From:</b> හදවතේ ඉංජිනේරූ පංතිය  <br>";
//               $email_body.="<b>Username :</b>{$user_name} <br>";
//               $email_body.="<b>New Password :</b><br>".nl2br(strip_tags($default_pass));
//
//               $header ="From: {$sender}\r\nContent-Type: text/html;";
//
//               $result_mail = mail($to, $email_subject, $email_body, $header);
              if(!$mail->send()) {
                  header("Location:forget_password.php?msg=404");
              } else {
                  $pwd=sha1($default_pass);
                  $query = "UPDATE account SET password='$pwd' WHERE id=$id ";
                  $re= mysqli_query($con,$query);
                  if ($re)
                      header("Location:forget_password.php?msg=504");
                  else
                      header("Location:forget_password.php?msg=406");
              }


          }
          else
              header("Location:forget_password.php?msg=400");
      }  
 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo.jpg">
	<link rel="icon" type="image/png" href="assets/img/logo.jpg">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Heart Engineering Class</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body >
<div class="image-container set-full-height" style="background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('assets/img/theme3.jpg');">
    <!--   Creative Tim Branding   -->
    <a href="http://creative-tim.com">
         <div class="logo-container">
            <div class="logo">
                
            </div>
            <div class="brand">
                
            </div>
        </div>
    </a>

	<!--  Made With Get Shit Done Kit  -->
  <!--
		<a href="http://demos.creative-tim.com/get-shit-done/index.html?ref=get-shit-done-bootstrap-wizard" class="made-with-mk">
			<div class="brand">GK</div>
			<div class="made-with">Made with <strong>GSDK</strong></div>
		</a>
  -->

    <!--   Big container   -->
    <div class="container">
        <div class="row" id="log">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form action="forget_password.php" method="post">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                            <a href="../index.php"><img src="assets/img/home.png" style="margin-left: 20px;margin-top: 10px;" alt="Back to Home" title="Back to Home"></a>
                            <div id="google_translate_element" style="float: right"></div>
                        <h3>
                              Reset password In Here <br>
<!--                             <small>This information will let us know more about you.</small>-->
                        </h3>

                        	
                    	</div>
                        <br>
                        <div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">Reset</a></li>
	                            <!-- <li><a href="#account" data-toggle="tab">Account Type</a></li> -->
	                            <!-- <li><a href="#address" data-toggle="tab">Address</a></li> -->
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
<!--                                  <h4 class="info-text"> Let's start with the Log information</h4>-->
                                  <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                              
                                          </div>
                                          <h6></h6>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <?php
                                            if($msg ==400)
                                            {
                                                echo "<div class='alert alert-danger' role='alert'>
                                                 Sorry email address is not valid!
                                                </div>";
                                            }
                                            if($msg ==404)
                                            {
                                              echo "<div class='alert alert-danger' role='alert'>
                                                     Sorry unable to send email to your account!
                                                    </div>";
                                            }
                                            if($msg ==504)
                                            {
                                                echo "<div class='alert alert-success' role='alert'>
                                                    Password reset success! check your email details!.
                                                </div>";
                                                //header("Location:log.php");
                                            }
                                            if($msg ==406)
                                            {
                                               echo "<div class='alert alert-warning' role='alert'>
                                                        Timeout please try again!.
                                                    </div>";
                                           }
                                      ?>
                                      <div class="form-group" style="margin-top: 20px;">
                                        <label>Email address  <small>(required)</small></label>
                                        <input  type="email" class="form-control" placeholder="sample@gmail.com..." name="email" id="user" required>
                                      </div>

                                  </div>
                                  
                              </div>
                            </div>
                            
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                <button  class='btn btn-finish btn-fill btn-success btn-wd btn-sm' name='submit'>Send</button>
                                <a href="../index.php"><input type='button' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='home' value='Cancel' /></a><br><br>                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <br>
                    </form>
                </div>

            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
        
    </div> <!--  big container -->

    <div class="footer">
        <!-- <div class="container">
              <i class="fa fa-heart heart"></i> If you don't have account <a href="createAccount.php"><i><font color="yellow">Create new Account</font></i></a> 
        </div> -->
    </div>

</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>
