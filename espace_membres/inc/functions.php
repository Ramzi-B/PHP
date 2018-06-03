<?php

function debug($var) {
  echo '<pre>' . print_r($var, true) . '</pre>';
}

function str_random($length) {
  $alphabet = "0123456789azertyuiopmlkjhgfdsqwxcvbnAZERTYUIOPMLKJHGFDSQWXCVBN";
  return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

function ifNotConnected() {
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if (!isset($_SESSION['auth'])) {
		$_SESSION['flash']['danger'] = 'Vous n\'avez pas le droit d\'accéder à cette page';
		header('Location: login.php');
		exit();
	}
}


function reconnect_from_cookie() {
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if (isset($_COOKIE['linkage'])) {
		require_once 'inc/db.php';
		if (!isset($pdo)) {
			global $pdo;
		}
		$linkage_token = $_COOKIE['linkage'];
		$parts = explode('==', $linkage_token);
		$user_id = $parts[0];

		$req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
		$req->execute([$user_id]);
		$user = $req->fetch();

		if ($user) {
			$expected = $user_id . '==' . $user->linkage_token . sha1($user_id . 'sudobrainwork');

			if ($expected == $linkage_token) {
				session_start();
				$_SESSION['auth'] = $user;
				setcookie('linkage', $linkage_token, time() + 60 * 60 * 24 * 7);
			} else {
				setcookie('linkage', null, -1);
			}
		} else {
			setcookie('linkage', null, -1);
		}
	}
}
