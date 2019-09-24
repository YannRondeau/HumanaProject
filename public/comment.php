<?php

include "../bootstrap.php";
include "../views/header.phtml";


$id = $_GET['id'];
$article = getArticleId($id);

?>

<div id="comment">
	<h2 class="container"> Article</h2>

	<div id="comment_article" class="container">

	<p style="font-weight: bold"><i class="fa fa-user" aria-hidden="true"></i> <?= $article['username'] ?>  <small><?= $article['created_at'] ?></small></p>
	<p> <?= $article['title'] ?> </p>
	<p> <?= $article['content'] ?> </p>

	<?php

	if ($_POST && !empty($_POST['username']) && !empty($_POST['comment'])) {
		$commentUsername = $_POST['username'];
		$commentContent = $_POST['comment'];
		
		createComment($commentUsername, $commentContent, $id);
	}

	?>

	</div>


	<div class="margin">
		<h2>Comments</h2>
		<?php $comments = getComment($id) ?>
		<?php foreach ($comments as $comment): ?>
			<div id="comments">
				<p><i class="fa fa-user" aria-hidden="true"></i>  <?= $comment['username'] ?> <br> <small><?= $comment['created_at'] ?></small></p>
				<p><?= $comment['content'] ?></p>
			</div>
		<?php endforeach; ?>
	</div>

	<form method="POST" action="comment.php?id=<?= $article['article_id'] ?>">
		<fieldset>
			<legend><i class="fa fa-check-circle" aria-hidden="true"></i> New comment</legend>

			<label for="username">Username :</label>
			<input type="text" name="username"><br>

			<label for="comment">Comment :</label>
			<textarea name="comment"></textarea><br>

			<button id="add" type="submit">Post</button>
			<button type="submit">Cancel</button>
		</fieldset>
	</form>
</div>
