<?php
		require_once('dbConnection.php');

		if (isset($_POST['sl_upload'])) {
		 		
		 		$title = $_POST['title'];
		 		//$description = $_POST['description'];
		 		$is_deleted = 0;

		 		$query = "INSERT INTO student_level(title,is_deleted) VALUES('$title',$is_deleted)";
		 		$result = mysqli_query($con,$query);

		 		if ($result) {
		 			
		 			header("Location:../admin_new/studentLevels.php?msg=505");
		 		}
		 		else
		 			header("Location:../admin_new/studentLevels.php?msg=507");

		 } 
 ?>