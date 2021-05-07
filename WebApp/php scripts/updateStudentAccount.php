<?php
		require_once('dbConnection.php');

		if (isset($_POST['update'])) {
		 	
		 	$id=$_POST['user_id'];
		 	$full_name =$_POST['full_name'];
            $email=$_POST['email'];
            $contact=$_POST['contact'];
            $district=$_POST['district'];
            $province=$_POST['province'];
            $account_type=$_POST['account_type'];
            $home_city=$_POST['home_city'];
            $user_name=$_POST['user_name'];
            $password = $_POST['password'];
            $con_password = $_POST['con_password'];

            if (empty(trim($password)) && empty(trim($con_password))) {
            	
            	$query = "UPDATE account SET full_name='$full_name',mobile_no='$contact',district='$district',province='$province',account_type='$account_type',home_city='$home_city',user_name='$user_name' WHERE id=$id";
            	$result = mysqli_query($con,$query);
            	if ($result) {
            		header("Location:../admin_new/studentaccount.php?msg=505");
            	}
            }
            else
            {
            	if ($password == $con_password) {
            		$pwd = sha1($password);
            		$query = "UPDATE account SET full_name='$full_name',mobile_no'$contact',district='$district',province='$province',account_type='$account_type',home_city='$home_city',user_name='$user_name',password='$pwd' WHERE id=$id";
            		$result = mysqli_query($con,$query);
            		if ($result) {
            			header("Location:../admin_new/studentaccount.php?msg=508");
            		}
            	}
            	else
            	{
            		header("Location:../admin_new/studentaccount.php?msg=507");
            	}	
            }			
		 } 
 ?>
