<?php 
		include_once('../../php scripts/dbConnection.php');

		if (isset($_GET['v_code'])) {
			
			$id=$_GET['v_code'];

			$query="SELECT *FROM papers WHERE id=$id";
			$result=mysqli_query($con,$query);

			if ($result) {
				$list=mysqli_fetch_assoc($result);
				$file="../../admin_new/uploads/papers/".$list['tubmail'];
				header("Content-type:application/pdf");
				header('Content-Disposition:attachment;filename=downloaded.pdf');
				readfile($file);

				
			}
		}
 ?>