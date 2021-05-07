<?php 
		require_once('dbConnection.php');

		if (isset($_POST['v_upload'])) {
			
			$title = $_POST['title'];
			$description = $_POST['description'];
			$thubmail = $_FILES['thubmail']['name'];
			$video_link = $_POST['video_link'];
			$target_dir ="../admin_new/uploads/video/";

			if ($thubmail !='') {
				
				$target_file = $target_dir.basename($_FILES['thubmail']['name']);
				$extention = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$extention_arr =array("jpg","jpeg","png","gif");

				if (in_array($extention, $extention_arr)) {
					
					$image_base64 = base64_encode(file_get_contents($_FILES['thubmail']['tmp_name']));
					$image = "data::image/".$extention."base64,".$image_base64;

					if (move_uploaded_file($_FILES['thubmail']['tmp_name'], $target_file)) {
						
						$query = "INSERT INTO images(header,description,tubmail,link) VALUES('$title','$description','$thubmail','$video_link')";
						$result = mysqli_query($con,$query);

						if ($result) {
							header("Location:../admin_new/uploadvideo.php?msg=505");
						}
						else
							header("Location:../admin_new/uploadvideo.php?msg=507");
					}
					else
						echo "Location";
				}
				else
					echo "no";
			}
			else
				echo "no000";
		}
 ?>
