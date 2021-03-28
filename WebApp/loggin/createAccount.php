<?php 
        require_once('../php scripts/resouresFile.php');

        $err=array();
        $result="";
        $pwd="";
        $notify=array();
        $notification=array();

        $full_name="";
        $province="";
        $district="";
        $home_city="";
        $account_type="";
        $email="";
        $mobile_no="";
        $user_name="";
        $password="";

        if(isset($_POST['submit']))
        {
          
            $full_name=$_POST['full_name'];
            $province=$_POST['country'];
            $district=$_POST['district'];
            $home_city=$_POST['home_city'];

            if(isset($_POST['account_type']))
              $account_type=$_POST['account_type'];

            $email=$_POST['email'];
            $mobile_no=$_POST['mobile_no'];
            $user_name=$_POST['user_name'];
            $password=$_POST['password'];

            if(empty(trim($full_name)) || empty(trim($province)) || empty(trim($district)) || empty(trim($home_city))  || empty(trim($email)) || empty(trim($mobile_no)) || empty(trim($user_name)) || empty(trim($password)))
            {
                  $err[]="Erro";
            }
            else
            {
                //$result=createUser($full_name,$province,$district,$home_city,$account_type,$email,$mobile_no,$user_name,$password);
                $pwd=sha1($password);

                $query="INSERT INTO account(full_name,province,district,home_city,account_type,email,mobile_no,user_name,password,is_approved,is_deleted) VALUES('{$full_name}','{$province}','{$district}','{$home_city}','Student','{$email}','{$mobile_no}','{$user_name}','{$pwd}',0,0)";

                $result=mysqli_query($con,$query);

                if ($result) {
                    $to =$email;
                    $email_subject = "හදවතේ ඉංජිනේරූ පංතිය ";
                    $message = "ඔබගේ ගිණුම අනුමත කර email පණිවිඩයකින් අප ඉදිරියේදී දැනුම් දෙන්නෙමු. එතෙක් ඔබගේ email පිළිබද අවධානයෙන් සිටින්න.";

                    $notify[]="Data added Successfully!!";
                    $notification[]="ඔබගේ ගිණුම අනුමත කර email පණිවිඩයකින් අප ඉදිරියේදී දැනුම් දෙන්නෙමු. එතෙක් ඔබගේ email පිළිබද අවධානයෙන් සිටින්න.";

                    $header ="From: hadawate.ingineru.panthiya@gmail.com\r\nContent-Type:text/html;";

                    mail($to,$email_subject,$message,$header);
                }
                else
                    $notify[]="Unable to Add data!!";
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
	<title>Create New Account</title>

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

<body>
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

    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">


            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="green" id="wizard">
                <form action="createAccount.php" method="post">
                <!--        You can switch ' data-color="green" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                            <a href="../index.php"><img src="assets/img/home.png" style="margin-left: 20px;margin-top: 10px;" alt="Back to Home" title="Back to Home"></a>
                          <?php 
                              if(!empty($notification))
                              {
                                echo "<div class='alert alert-success'>";
                                echo "<center>".$notification[0]."</center>";
                                echo "</div>";
                              }
                          ?>
                        	<h3>
                        	   <b>Create</b> New Account <br>
                        	   <small>This information will let us know more about yourself.</small>
                        	</h3>

                    	</div>
                      <br>
						          <div class="wizard-navigation">
							           <ul>
	                            <li><a href="#location" data-toggle="tab">Basic Info</a></li>
	                            <li><a href="#type" data-toggle="tab">Account Type</a></li>
	                            <li><a href="#facilities" data-toggle="tab">Advance Info</a></li>
	                       </ul>
						          </div>

                        <div class="tab-content">
                            <div class="tab-pane" id="location">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <h4 class="info-text"> Let's start with the basic details</h4>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Your Full Name" name="full_name" >
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                       <div class="form-group">
                                            <label>Province</label><br>
                                             <select name="country" class="form-control">
                                                <option value="Western Province" selected="">- Western Province -</option>
                                                <option value="Northern Province"> Northern Province </option>
                                                <option value="Southern Province"> Southern Province </option>
                                                <option value="Eastern Province"> Eastern Province </option>
                                                <option value="Uva Province"> Uva Province </option>
                                                <option value="Sabaragamuwa Province"> Sabaragamuwa Province </option>
                                                <option value="Central Province"> Central Province </option>
                                                <option value="North Western Province"> North Western Province </option>
                                                <option value="North Central Province"> North Central Province </option>
                                                
                                            </select>
                                          </div>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>District</label>
                                          <select class="form-control" name="district">
                                            <option value="Ampara" selected="">- Ampara -</option>
                                            <option value="Anuradhapura">- Anuradhapura -</option>
                                            <option value="Badulla">- Badulla -</option>
                                            <option value="Batticaloa">- Batticaloa -</option>
                                            <option value="Colombo">- Colombo -</option>
                                            <option value="Galle">- Galle -</option>
                                            <option value="Gampaha">- Gampaha -</option>
                                            <option value="Hambantota">- Hambantota -</option>
                                            <option value="Jaffna">- Jaffna -</option>
                                            <option value="Kalutara">- Kalutara -</option>
                                            <option value="Kandy">- Kandy -</option>
                                            <option value="Kegalle">- Kegalle -</option>
                                            <option value="Kilinochchi">- Kilinochchi -</option>
                                            <option value="Kurunegala">- Kurunegala -</option>
                                            <option value="Mannar">- Mannar -</option>
                                            <option value="Matale">- Matale -</option>
                                            <option value="Matara">- Matara -</option>
                                            <option value="Monaragala">- Monaragala -</option>
                                            <option value="Mullaitivu">- Mullaitivu -</option>
                                            <option value="Nuwara Eliya">- Nuwara Eliya -</option>
                                            <option value="Polonnaruwa">- Polonnaruwa -</option>
                                            <option value="puttalam">- Puttalam -</option>
                                            <option value="Ratnapura">- Ratnapura -</option>
                                            <option value="Trincomalee">- Trincomalee -</option>
                                            <option value="Vavuniya">- Vavuniya -</option>
                                          </select>
                                          <br>
                                          <?php 
                                                    if(!empty($err))
                                                    {
                                                        echo "<font color=red >You must have to fill each blanks!</font>";
                                                    }

                                                    if(!empty($notify))
                                                    {
                                                        echo "<font color=green >".$notify[0]."</font>";
                                                    }
                                               ?>
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                      <div class="form-group">
                                          <label>Home City</label>
                                          <div class="input-group">
                                              <input type="text" class="form-control" placeholder="Type your Home City" name="home_city">
                                              
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="type">
                                <h4 class="info-text">What type of Account  do you want? </h4>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if you are Student.">
                                                <input type="radio" name="account_type" value="student">Student
                                                <div class="icon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="You don't have permission to become Admin">
                                                <input type="radio" name="account_type" value="admin">Admin
                                                <div class="icon">
                                                    <i class="fa fa-building"></i>
                                                </div>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="facilities">
                                <h4 class="info-text">Now We need Your Advance Details. </h4>
                                <div class="row">
                                    <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Email address</label>
                                          <div class="input-group">
                                              <input type="text" class="form-control" placeholder="Type your email address" name="email">
                                              
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-5">
                                      <div class="form-group">
                                          <label>Your mobile number</label>
                                          <div class="input-group">
                                              <input type="text" class="form-control" placeholder="Type your moblie number" name="mobile_no">
                                              
                                          </div>
                                      </div>
                                     </div>
                                     <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>User name</label>
                                          <div class="input-group">
                                              <input type="text" class="form-control" placeholder="Type your user name" name="user_name"><br><br>
                                              
                                          </div>
                                       </div>
                                      </div>
                                      <div class="col-sm-5">
                                       <div class="form-group">
                                          <label>Password</label>
                                          <div class="input-group">
                                              <input type="password" class="form-control" placeholder="****" name="password">

                                          </div>
                                       </div>
                                      </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="wizard-footer">
                              
                            	<div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Next' />
                                    <button  class='btn btn-finish btn-fill btn-success btn-wd btn-sm' name='submit'>Finish</button>
                                    <!-- <a href="../index.php"><input type='button' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='home' value='Home' /></a> -->
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
            <!--  If you have account<i class="fa fa-heart heart"></i> then <a href="log.php"><font color="yellow">Log here</font></a> --><br>
             
             
        </div>
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

</html>

