<?php
	$title = 'ERROR';
	ob_start();
?>

<p><?= $errorMessage ?></p>

<?php
	$content = ob_get_clean();
	require 'frontend/template.php';
?>
