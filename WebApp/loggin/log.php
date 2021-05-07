<?php 
      session_start();
      require_once('../php scripts/dbConnection.php');

      $user_name="";
      $password="";
      $pwd="";
      $account_type="";
      $result="";

      $err=array();
      $query="";
      $notify=array();
      $log_query="";
      $user="";
      $user_id;

      if(isset($_POST['submit']))
      {
          $user_name=mysqli_real_escape_string($con,$_POST['user_name']);
          $password=mysqli_real_escape_string($con,$_POST['password']);
          $account_type=$_POST['account_type'];

          if(empty(trim($user_name)) || empty(trim($password)))
              $err[]="You have to fill all fields!!";
          else
          {
            $pwd=sha1($password);

            //Student Log
            if($account_type == "Student")
            {
                  $query="SELECT *FROM account WHERE user_name='{$user_name}' and password='{$pwd}' and account_type='Student' and is_approved=1 and is_deleted=0";
                  $result=mysqli_query($con,$query);

                  if (mysqli_num_rows($result) >= 1) {
                        
                        $user=mysqli_fetch_assoc($result);
                        $_SESSION['user_id']=$user['id'];
                        $_SESSION['full_name']=$user['full_name'];
                        $_SESSION['province']=$user['province'];
                        $_SESSION['district']=$user['district'];
                        $_SESSION['home_city']=$user['home_city'];
                        $_SESSION['email']=$user['email'];
                        $_SESSION['user_name']=$user['user_name'];
                        $_SESSION['contact']=$user['mobile_no'];

                        $user_id=$_SESSION['user_id'];
                        
                        $log_query="INSERT INTO logginlist(user_id) VALUES($user_id)";
                        mysqli_query($con,$log_query);

                        header('Location:../User/user/user.php');
                  }
                  else
                      $notify[]="Sorry!! You not Registered.";

              }
              //Admin Log
              
              if($account_type == "Admin")
              {
                  $query="SELECT *FROM account WHERE user_name='{$user_name}' and password='{$pwd}' and account_type='Admin' and is_approved=1 and is_deleted=0";
                    $result=mysqli_query($con,$query);

                    if (mysqli_num_rows($result) >= 1) {
                
                            //$notify[]="you can log";
                            $user=mysqli_fetch_assoc($result);

                            $_SESSION['user_id']=$user['id'];
                            $_SESSION['full_name']=$user['full_name'];
                            $_SESSION['province']=$user['province'];
                            $_SESSION['district']=$user['district'];
                            $_SESSION['home_city']=$user['home_city'];

                            $user_id=$_SESSION['user_id'];
                                                        
                            $log_query="INSERT INTO logginlist(user_id) VALUES($user_id)";
                            mysqli_query($con,$log_query);

                            header('Location: ../admin_new/admin.php');
                    }
                    else
                            $notify[]="Sorry!! You not Registered.";  
              }
                  
        }
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
                    <form action="log.php" method="post">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                            <a href="../index.php"><img src="assets/img/home.png" style="margin-left: 20px;margin-top: 10px;" alt="Back to Home" title="Back to Home"></a>
                            <div id="google_translate_element" style="float: right"></div>
                        <h3>
                              Sign In Here <br>
<!--                             <small>This information will let us know more about you.</small>-->
                        </h3>

                        	
                    	</div>
                        <br>
                        <div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">SignIn</a></li>
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
                                            if(!empty($notify)){
                                                  echo "<div class='alert alert-danger'>";
                                                  echo "<font>".$notify[0]."</font>";
                                                  echo "</div>";
                                            }      
                                       ?>
                                      <?php
                                      if(!empty($err))
                                          echo "<div class='alert alert-danger'>".$err[0]."</div>";


                                      ?>
                                      <div class="form-group">
                                        <label>User Name  <small>(required)</small></label>
                                        <input  type="text" class="form-control" placeholder="Andrew..." name="user_name" id="user">
                                      </div>
                                      <div class="form-group">
                                        <label>Password <small>(required)</small></label>
                                        <input  type="Password" class="form-control" placeholder="****" name="password">
                                      </div>
                                      <div class="form-group">
                                          <label>Account Type :</label>
                                          <select name="account_type" class="form-control">
                                                <option value="Student" selected>Student</option>
                                                <option value="Admin">Admin</option>
                                          </select>
                                      </div>

                                  </div>
                                  
                              </div>
                            </div>
                            
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                <button  class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='submit'>SignIn</button>
                                <a href="createAccount.php"><input type='button' class='btn btn-finish btn-fill btn-success btn-wd btn-sm' name='home' value='SignUp' /></a><br><br>
                                <a href="forget_password.php" style="color: red;text-decoration: none;" ><input type="checkbox" name="" style="color: red;" > Forget Password?</a><br>
                            </div>

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
