<?php

include '../bootstrap.php';
include "../views/header.phtml";

?>

<div id="forum" class="container">
	<h2><i class="fa fa-home" aria-hidden="true"></i> Forum</h2>

	<a href="article.php">Rédiger un nouvel article</a>



	<?php $articles = getArticles(); ?>

	<?php foreach($articles as $article): ?>
		<div id="forum_article" class="margin">

			
			<a href="comment.php?id=<?= $article['article_id'] ?>"><p><i class="fa fa-play" aria-hidden="true"></i> <strong><?= $article['title'] ?></strong></p></a>
			<p><?= $article['content'] ?></p>
			<p></p>
			<p style="font-weight: bold"><i class="fa fa-user" aria-hidden="true"></i> <?= $article['username'] ?> <?= $article['created_at'] ?></p>

			
		</div>

	<?php endforeach; ?>

</div>