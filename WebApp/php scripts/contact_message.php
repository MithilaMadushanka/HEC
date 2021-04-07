<?php
        require '../email/mail/PHPMailerAutoload.php';
        $credential = include('../email/mail/credential.php');   //credentials import
        $email_body="";
		if (isset($_POST['submit'])) {
		 	
		 	$name = $_POST['name'];
		 	$email = $_POST['email'];
		 	$subject = $_POST['subject'];
		 	$message = $_POST['message'];

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $credential['user']  ;
            $mail->Password = $credential['pass']  ;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom($email);
            $mail->addAddress("mithilabandara97@gmail.com");
            $mail->addReplyTo('Message from Website');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            $mail->addAttachment('../loggin/assets/img/logo.jpg');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            $mail->isHTML(true);                                  // Set email format to HTML

            $email_body.="<b>From:</b> {$name} <br>";
	 	    $email_body.="<b>subject :</b>{$subject} <br>";
	 	    $email_body.="<b>Message :</b><br>".nl2br(strip_tags($message));
            $email_body.="<br><br>Thank you";
            $email_body.="<img src='../img/logo.jpg'>";

            $mail->Subject = "Message from Contact Us Page of the Website";
            $mail->Body    = "$email_body";
            $mail->AltBody = 'If you see this mail. please reload the page.';

            if(!$mail->send()) {
                header("Location:../index.php?msg=404");
            } else {
                header("Location:../index.php?msg=504");
            }
//		 	$to = "Navodpiumanga24@gmail.com";
//		 	$email_subject = "Message from Website";
//		 	$email_body = "Message from Contact Us Page of the Website: <br>";
//		 	$email_body.="<b>From:</b> {$name} <br>";
//		 	$email_body.="<b>subject :</b>{$subject} <br>";
//		 	$email_body.="<b>Message :</b><br>".nl2br(strip_tags($message));
//
//		 	$header ="From: {$email}\r\nContent-Type: text/html;";
//
//		 	$result = mail($to, $email_subject, $email_body, $header);

//		 	if ($result) {
//		 		header("Location:../index.php?msg=504");
//		 	}
//		 	else
//		 		header("Location:../index.php?msg=404");
		 } 
 ?>