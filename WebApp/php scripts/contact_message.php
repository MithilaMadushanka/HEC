<?php

		if (isset($_POST['submit'])) {
		 	
		 	$name = $_POST['name'];
		 	$email = $_POST['email'];
		 	$subject = $_POST['subject'];
		 	$message = $_POST['message'];

		 	$to = "hadawate.ingineru.panthiya@gmail.com";
		 	$email_subject = "Message from Website";
		 	$email_body = "Message from Contact Us Page of the Website: <br>";
		 	$email_body.="<b>From:</b> {$name} <br>";
		 	$email_body.="<b>subject :</b>{$subject} <br>";
		 	$email_body.="<b>Message :</b><br>".nl2br(strip_tags($message));

		 	$header ="From: {$email}\r\nContent-Type: text/html;";

		 	$result = mail($to, $email_subject, $email_body, $header);

		 	if ($result) {
		 		header("Location:../index.php?msg=504");
		 	}
		 	else
		 		header("Location:../index.php?msg=404");
		 } 
 ?>