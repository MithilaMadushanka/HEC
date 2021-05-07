<?php
		require_once('dbConnection.php');

		if (isset($_POST['o_upload'])) {
		 		
		 		$lesson_name = $_POST['lesson_name'];
		 		$description = $_POST['description'];
		 		$date = $_POST['d_date'];
		 		$time = $_POST['d_time'];
		 		$lesson_link = $_POST['lesson_link'];


		 		$query = "INSERT INTO online_lessons(l_name,description,l_date,l_time,l_link) VALUES('$lesson_name','$description','$date','$time','$lesson_link')";

		 		$result = mysqli_query($con,$query);

		 		if ($result) {
		 			
		 			header("Location:../admin_new/uploadonlinelessons.php?msg=505");
		 		}
		 		else
		 			header("Location:../admin_new/uploadonlinelessons.php?msg=507");
		 } 
 ?>
