<?php

	if (isset($_GET['id']) && isset($_GET['token'])) {
		require_once 'inc/db.php';
		require_once 'inc/functions.php';

		$req = $pdo->prepare('SELECT * FROM users WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
		$req->execute([$_GET['id'], $_GET['token']]);
		$user = $req->fetch();

		if ($user) {
			if (!empty($_POST)) {
				if (!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']) {
					$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
					$pdo->prepare('UPDATE users SET password = ?, reset_at = NULL, reset_token = NULL')->execute([$password]);
					session_start();
					$_SESSION['flash']['success'] = 'Votre mot de passe a bien été modifié';
					$_SESSION['auth'] = $user;
					header('Location: account.php');
					exit();
				}
			}
		} else {
			session_start();
			$_SESSION['flash']['danger'] = 'Ce token n\'est pas valide';
			header('Location: login.php');
			exit();
		}
	}

?>

<?php require_once 'inc/header.php'; ?>

<h1>Réinitialiser mon mot de passe</h1>

<form action="" method="POST">

	<div class="form-group">
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password" class="form-control">
	</div>

	<div class="form-group">
		<label for="password_confirm">Confirmation du mot passe</label>
		<input type="password" name="password_confirm" id="password_confirm" class="form-control">
	</div>

	<button type="submit" class="btn btn-primary">Réinitialiser votre mot de passe</button>
</form>
