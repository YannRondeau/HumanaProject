<?php
include '../bootstrap.php';

if ($_POST && !empty($_POST['username']) && !empty($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	$user = getUser($username, $password);
	


	if ($user == null) {
		echo "L'utilisateur n'existe pas";

	} else {

	
		if (password_verify($password, $user['password'])) {

			$_SESSION['iduser'] = $user['id'];

			header('Location: home.php');
			exit;
		} else {

		echo "Mot de passe incorrect";
	}
}
} else {
	echo "remplissez";
}



