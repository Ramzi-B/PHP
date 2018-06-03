<?php

	session_start();
	setcookie('linkage', NULL, -1);
	unset($_SESSION['auth']);

	$_SESSION['flash']['success'] = 'Vous êtes déconnecté';

	header('Location: login.php');
