<?php

include "../bootstrap.php";
include "../views/header.phtml";


if ($_POST) {
	$articleUsername = $_POST['username'];
	$articleTitle = $_POST['title'];
	$articleContent = $_POST['article'];

	createArticle($articleUsername, $articleTitle, $articleContent);

	header('Location: forum.php');
}

?>

<h2 class="container" style="padding: 20px;"><i class="fa fa-pencil-square" aria-hidden="true"></i> Rédiger un nouvel article</h2>

<form method="POST" action="article.php">
	<fieldset id="new_article" class="container">
		<legend><i class="fa fa-pencil-square" aria-hidden="true"></i> Nouvel article</legend>

		<label for="username">Username :</label>
		<input type="text" name="username"><br>

		<label for="title">Titre :</label>
		<input type="text" name="title" id="title"><br>

		<label for="article">Article :</label>
		<textarea name="article" id="article"></textarea><br>

		<button id="save" type="submit">Enregistrer</button>
		<button type="submit">Annuler</button>
	</fieldset>
</form>
