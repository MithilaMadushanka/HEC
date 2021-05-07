<?php
		require_once('dbConnection.php');

		if (isset($_POST['un_upload'])) {
		 	
		 	$id = $_POST['note_id'];
		 	$title = $_POST['title'];
		 	$description = $_POST['description'];

		 	$query = "UPDATE notes SET header='$title',description='$description' WHERE id=$id";
		 	$result = mysqli_query($con,$query);

		 	if($result) {
		 		header("Location:../admin_new/edituploadnote.php?msg=505");
		 	}
		 	else
		 		header("Location:../admin_new/edituploadnote.php?msg=507");
		 } 
 ?>