<?php $title = 'ERROR'; ?>
<?php ob_start(); ?>

<p><?= $errorMessage ?></p>

<?php $content = ob_get_clean(); ?>
<?php	require 'frontend/template.php'; ?>
