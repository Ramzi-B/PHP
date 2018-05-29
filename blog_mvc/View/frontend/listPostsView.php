<?php $title = 'Le blog'; ?>
<?php	ob_start(); ?>

<?php while ($data = $posts->fetch()): ?>

	<h3 class="pb-3 mb-4 font-italic border-bottom">From the Firehose</h3>

	<div class="blog-post">
		<h2 class="blog-post-title">
			<a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
		</h2>

		<p class="blog-post-meta"><?= $data['created_at_fr'] ?></p>
		<hr>

		<p><?= nl2br(htmlspecialchars($data['content'])) ?></p>
	</div><!-- /.blog-post -->

<?php endWhile; ?>

<?php $posts->closeCursor(); ?>

<?php	$content = ob_get_clean(); ?>
<?php	require 'template.php'; ?>
