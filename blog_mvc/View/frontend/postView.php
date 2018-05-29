<?php $title = htmlspecialchars($post['title']); ?>
<?php ob_start(); ?>

	<h3 class="pb-3 mb-4 font-italic border-bottom">
		<a href="index.php">Retour à la liste des billets</a>
	</h3>

<?php while ($data = $comments->fetch()): ?>

	<div class="blog-post">
		<h1 class="blog-post-title"><?= htmlspecialchars($post['title']) ?></h1>
		<p class="blog-post-meta">le <?= $post['created_at_fr'] ?> <em>By</em> <?= $post['post_author'] ?></p>
		<p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
	</div>

	<h2 class="font-italic">Commentaires</h2>

	<p>
		<strong><?= htmlspecialchars($data['author']) ?></strong> le <?= $data['comment_date_fr'] ?>
	</p>

	<p><?= nl2br(htmlspecialchars($data['comment'])) ?></p>

<?php endwhile ?>

	<h3 class="font-italic">Laisser un commentaire</h3>
	<hr>

	<form class="form-group" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="POST">
		<div class="form-group">
			<label for="author">Name</label>
			<input class="form-control" id="author" type="text" name="author">
		</div>

		<div class="form-group">
			<label for="comment">Commentaire</label>
			<textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
		</div>

		<button type="submit" class="btn btn-outline-primary">Envoyer</button>
	</form>

<?php $content = ob_get_clean(); ?>
<?php	require 'template.php'; ?>
