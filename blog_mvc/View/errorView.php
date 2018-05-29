<?php $title = 'ERROR'; ?>
<?php	ob_start(); ?>

<p><strong><?= $errorMessage ?></strong></p>
<p><a href="index.php?action=post&amp;id=<?= $_GET['id'] ?>">Retour</a></p>

<?php	$content = ob_get_clean(); ?>
<?php	require 'frontend/template.php'; ?>
