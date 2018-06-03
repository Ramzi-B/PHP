<?php

	require_once 'inc/db.php';
	require_once 'inc/functions.php';

	reconnect_from_cookie();

	if (isset($_SESSION['auth'])) {
		header('Location: account.php');
		exit();
	}

	if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {

		$req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL');
		$req->execute(['username' => $_POST['username']]);
		$user = $req->fetch();

		if (password_verify($_POST['password'], $user->password)) {
			$_SESSION['auth'] = $user;
			$_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';

			if ($_POST['linkage']) {
				$linkage_token = str_random(250);
				$pdo->prepare('UPDATE users SET linkage_token = ? WHERE id = ?')->execute([$linkage_token, $user->id]);
				setcookie('linkage', $user->id . '==' . $linkage_token . sha1($user->id . 'sudobrainwork'), time()  + 60 * 60 * 24 * 7);
			}

			header('Location: account.php');
			exit();
		} else {
			$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
		}
	}

?>

<?php require_once 'inc/header.php'; ?>

<h1>Se connecter</h1>

<form action="" method="POST">
	<div class="form-group">
		<label for="username">Pseudo ou Email</label>
		<input type="text" name="username" id="username" class="form-control">
	</div>

	<div class="form-group">
		<label for="password">Mot de passe  <a href="remember.php">(mot de passe oublié)</a></label>
		<input type="password" name="password" id="password" class="form-control">
	</div>

	<div class="form-group">
		<label for="linkage">
			<input type="checkbox" name="linkage" value="1" id="linkage">
			Connexion automatique
		</label>
	</div>

	<button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require_once  'inc/footer.php'; ?>
