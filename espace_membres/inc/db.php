<?php

	try {
		$pdo = new PDO('mysql:host=localhost;dbname=tp_espace_membres;charset=utf8', 'root', 'rboxer',
		[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
		]);
	} catch (Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
