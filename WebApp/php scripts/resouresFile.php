<?php 
		include_once('dbConnection.php');

		$con;
		//create new account function
		function createUser($full_name,$province,$district,$home_city,$account_type,$email,$mobile_no,$user_name,$password)
		{
			$pwd=sha1($password);
			$con=getDBConnection();

			$query="INSERT INTO account(full_name,province,district,home_city,account_type,email,mobile_no,user_name,password,is_approved,is_deleted) VALUES('{$full_name}','{$province}','{$district}','{$home_city}','{$account_type}','{$email}','{$mobile_no}','{$user_name}','{$pwd}',1,0)";

			$result=mysqli_query($con,$query);

			if ($result) {
				return "Data added Successfully!!";
			}
			else
				return "Unable to Add data!!";
		}

		//loggin account
		function logginAccount($user_name,$password,$account_type)
		{

		}
 ?>