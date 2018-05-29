<?php $title = 'Le blog'; ?>
<?php	ob_start(); ?>

<?php while ($data = $posts->fetch()): ?>

	<h3 class="pb-3 mb-4 font-italic border-bottom">From the Firehose</h3>

	<div class="blog-post">
		<h2 class="blog-post-title">
			<a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
		</h2>

		<p class="blog-post-meta"><?= $data['created_at_fr'] ?> <em>By</em> <?= $data['post_author'] ?></p>
		<hr>

		<p><?= nl2br(htmlspecialchars($data['content'])) ?></p>
	</div><!-- /.blog-post -->

<?php endwhile; ?>

<nav class="blog-pagination">
	<a class="btn btn-outline-primary" href="#">Older</a>
	<a class="btn btn-outline-secondary disabled" href="#">Newer</a>
</nav>

<?php	$content = ob_get_clean(); ?>
<?php	require 'template.php'; ?>
