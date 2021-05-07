<?php
		require_once('dbConnection.php');

		if (isset($_POST['up_upload'])) {
		 	
		 	$id = $_POST['paper_id'];
		 	$title = $_POST['title'];
		 	$description = $_POST['description'];

		 	$query = "UPDATE papers SET header='$title',description='$description' WHERE id=$id";
		 	$result = mysqli_query($con,$query);

		 	if($result) {
		 		header("Location:../admin_new/edituploadpaper.php?msg=505");
		 	}
		 	else
		 		header("Location:../admin_new/edituploadpaper.php?msg=507");
		 } 
 ?>
