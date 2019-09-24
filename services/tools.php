<?php

function pre($thing) {
	echo "<pre>";
	print_r($thing);
	echo "</pre>";
} 


function Register($username, $password, $email) {
	include "connexion.php";

	$sql = $db->prepare('INSERT INTO user (username, password, email) VALUES (:username, :password, :email)');

	$sql->execute(array(
		'username' => $username,
		'password' => $password,
		'email' => $email
	));
}

function existUsername($username) {
	include "connexion.php";

	$sql = "SELECT * FROM user WHERE username = :username";

	$statement = $db->prepare($sql);
	$statement->execute(array('username' => $username));
	$nbr = $statement->fetch(\PDO::FETCH_ASSOC);

	return $nbr;
}

function getUser($username, $password) {
	include "connexion.php";

	$sql = "SELECT * FROM user WHERE username LIKE '$username'";


	$statement = $db->prepare($sql);
	$statement->execute();
	$user = $statement->fetch(\PDO::FETCH_ASSOC);

	return $user;
}


function getArticles() {
	include "connexion.php";

	$sql = "SELECT * FROM `articles`";

	$statement = $db->prepare($sql);
	$statement->execute();
	$articles = $statement->fetchAll(\PDO::FETCH_ASSOC);

	return $articles;
}

function createArticle($articleUsername, $articleTitle, $articleContent) {
	include "connexion.php";


	$req = $db->prepare('INSERT INTO articles (username, title, content, created_at) VALUES (:username, :title, :content, NOW())');

	$req->execute(array(
		'username' => $articleUsername,
		'title' => $articleTitle,
		'content' => $articleContent
		));
}

function getArticleId($id) {
	include "connexion.php";

	$sql = "SELECT * FROM `articles` WHERE article_id = $id";

	$statement = $db->prepare($sql);
	$statement->execute();
	$article = $statement->fetch(\PDO::FETCH_ASSOC);

	return $article;
}

function createComment($commentUsername, $commentContent, $id) {
	include "connexion.php";


	$req = $db->prepare('INSERT INTO comment (username, content, created_at, article_id) VALUES (:username, :content, NOW(), :article_id)');

	$req->execute(array(
		'username' => $commentUsername,
		'content' => $commentContent,
		'article_id' => $id
		));
}

function getComment($id) {
	include "connexion.php";

	$sql = "SELECT * FROM `comment` WHERE article_id = $id";

	$statement = $db->prepare($sql);
	$statement->execute();
	$comments = $statement->fetchAll(\PDO::FETCH_ASSOC);

	return $comments;
}