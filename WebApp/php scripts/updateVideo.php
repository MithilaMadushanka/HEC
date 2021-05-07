<?php
		require_once('dbConnection.php');

		if (isset($_POST['update_video'])) {
		 	
		 	$id = $_POST['video_id'];
		 	$title = $_POST['title'];
		 	$description = $_POST['description'];
		 	$video_link = $_POST['video_link'];


		 	if (!empty(trim($title)) && !empty(trim($description)) && !empty(trim($video_link)) ) {
		 		
		 		$query = "UPDATE images SET header='$title',description='$description',link='$video_link' WHERE id='$id'";
		 		$result = mysqli_query($con,$query);

		 		if ($result) {
		 			header("Location:../admin_new/edituploadvideo.php?msg=505");
		 		}
		 		else
		 			header("Location:../admin_new/edituploadvideo.php?msg=507");
		 	}
		 } 
 ?>
