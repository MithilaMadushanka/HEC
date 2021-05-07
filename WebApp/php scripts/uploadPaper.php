<?php
		require_once('dbConnection.php');

		if (isset($_POST['p_upload'])) {
		 	
		 	$title = $_POST['title'];
		 	$description = $_POST['description'];
		 	$paper_file = $_FILES['paper_file']['name'];
		 	$target_dir = "../admin_new/uploads/papers/";

		 	if ($paper_file != '') {
		 		
		 		$target_file = $target_dir.basename($_FILES['paper_file']['name']);
				$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$extension_arr = array("jpg","doc","png","pdf");

				if (in_array($extension, $extension_arr)) {
					
					$image_base64 = base64_encode(file_get_contents($_FILES['paper_file']['tmp_name']));
					$image = "data::image/".$extention."base64,".$image_base64;

					if (move_uploaded_file($_FILES['paper_file']['tmp_name'], $target_file)) {
						
						$query = "INSERT INTO papers(header,description,tubmail) VALUES('$title','$description','$paper_file')";
						$result = mysqli_query($con,$query);

						if ($result) {
							header("Location:../admin_new/uploadpaper.php?msg=505");
						}
						else
							header("Location:../admin_new/uploadpaper.php?msg=507");
					}
				}
		 	}
		 } 
 ?>