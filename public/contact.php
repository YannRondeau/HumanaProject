<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../bootstrap.php';
include '../views/contact.phtml';

require '../services/PHPMailer/PHPMailer.php';
require '../services/PHPMailer/Exception.php';
require '../services/PHPMailer/SMTP.php';

$errors = array(); 


if (isset($_POST['message'])) {

	if (empty($_POST['name'])) {
		array_push($errors, "Add your Name !");
	} 
	else  if(empty($_POST['email'])) {
		array_push($errors, "Add your Email !");
	}
	else if(empty($_POST['message'])) {
		array_push($errors, "Add your message !");
	} else {

		$mail = new PHPMailer(true);
		
		try {
			//Server settings
			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host       = 'smtp.ionos.fr';
			$mail->SMTPAuth   = true;
			$mail->Username   = 'contact@humana-project.fr';
			$mail->Password   = 'Nhcgmzq6.';	//Password clear, maybe change it
			$mail->SMTPSecure = 'tls';
			$mail->Port       = 587;

			//Recipients
			$mail->setFrom($_POST['email'], $_POST['name']);
			$mail->addAddress('contact@humana-project.fr');  
			$mail->addReplyTo($_POST['email'], $_POST['name']);
			
			$message='
				<!DOCTYPE html>
				<html>
					<body>
						<div>
							<u>Nom de l\'expéditeur :</u>'.$_POST['name'].'<br />
							<u>Mail de l\'expéditeur :</u>'.$_POST['email'].'<br />
							<br />
								'.$_POST['message'].'
							<br />
						</div>
					</body>
				</html>';

			// Content
			$mail->isHTML(true);
			$mail->CharSet = 'UTF-8';
			$mail->Subject = 'CONTACT - HUMANA PROJECT';
			$mail->Body    = $message;
			$mail->AltBody = $_POST['message'];

			$mail->send();
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; //Add confirm/error message to user
		}
	}
}




?>