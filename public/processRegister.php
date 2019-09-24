<?php
include '../bootstrap.php';

if ($_POST && !empty($_POST['username']) && !empty($_POST['password']) && !empty(['email'])) {
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$email = stripslashes(htmlentities($_POST['email']));

	
	$nbr = existUsername($username);
	
		if ($nbr) {
			echo '<span style="color:#00aa00;">Le pseudo <strong>'.$username.'</strong> est déja pris.</span>';
		} 

		
		elseif (!preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',str_replace('&amp;','&',$email))) {
	               echo '<span style="color:#00aa00;">L\'email <strong>'.$email.'</strong> est invalide.</span>';
	    }
	    
		
		else {
			Register($username, $password, $email);

			header('Location: home.php');
		}
} else {
	echo 'remplissez';
}
