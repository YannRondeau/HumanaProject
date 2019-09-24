<?php
include '../bootstrap.php';
include '../views/contact.phtml';

$errors = array(); 


if (isset($_POST['submit'])) {

	if (empty($_POST['name'])) {
		array_push($errors, "Add your Name !");
	} 
	if(empty($_POST['mail'])) {
		array_push($errors, "Add your Email !");
	}
	if(empty($_POST['message'])) {
		array_push($errors, "Add your message !");
		
	} else {
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"HumanaProject.com"<contact@humanaproject.com>'."\n";
		$header.='Content-Type:text/html; charset="utf-8"'."\n";
		$header.='Content-Transfert-Encoding: 8bit';

		$message='
			<!DOCTYPE html>
			<html>
				<body>
					<div>
						<u>Nom de l\'expéditeur :</u>'.$_POST['name'].'<br />
						<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
						<br />
							'.l2br($_POST['message']).'
						<br />
					</div>
				</body>
			</html>';

			mail("rondeau.yann@gmx.fr", "CONTACT - HUMANA PROJECT", $message, $header);
			$msg="Votre message a bien été envoyé !";
	}
}




?>