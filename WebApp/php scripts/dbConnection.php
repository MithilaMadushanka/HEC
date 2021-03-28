<?php
		$host="localhost";
		$user_name="root";
		$password="";
		$database="hecdb"; 

		$con=mysqli_connect($host,$user_name,$password,$database);

		if (!$con) {
			die("database load fail!!");
		}

		
		

 ?>