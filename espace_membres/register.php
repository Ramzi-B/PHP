<?php

	require_once 'inc/functions.php';
	session_start();

	if (!empty($_POST)) {
		$errors = [];
		require_once 'inc/db.php';

		if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
			$errors['username'] = 'Vous n\'avez pas entré un pseudo valide';
			$_SESSION['flash']['danger'] = 'Vous n\'avez pas entré un pseudo valide';
		} else {
			$req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
			$req->execute([$_POST['username']]);
			$user = $req->fetch();

			if ($user) {
				$errors['username'] = 'Ce pseudo est déjà pris vous devez en choisir un autre !';
			}
		}

		if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Votre email n'est pas valide";
		} else {
			$req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
			$req->execute([$_POST['email']]);
			$user = $req->fetch();

			if ($user) {
				$errors['email'] = 'Cet email est déjà pris vous devez en choisir un autre !';
			}
		}

		if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
			$errors['password'] = "Vous n'avez pas enter un mot de passe valide";
		}

		if (empty($errors)) {
			$req = $pdo->prepare('INSERT INTO users SET username = ?, password = ?, email = ?, date_creation = NOW(), confirmation_token = ?');
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$token = str_random(60);
			$req->execute([$_POST['username'], $password, $_POST['email'], $token]);
			$user_id = $pdo->lastInsertId();

			mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost:8000/confirm.php?id=$user_id&token=$token");
			$_SESSION['flash']['success'] = 'Un email de confirmation a été envoyé pour valider votre compte';
			header('Location: login.php');
			exit();
		}
	}

?>

<?php require_once 'inc/header.php'; ?>

<h1>S'inscrire</h1>

<?php if (!empty($errors)): ?>

	<div class="alert alert-danger">
		<p>Vous n'avez pas rempli le formulaire correctement</p>
		<ul>
			<?php foreach($errors as $error): ?>
				<li><?= $error; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>

<?php endif; ?>

<form action="" method="POST">
	<div class="form-group">
		<label for="username">Pseudo</label>
		<input id="username" type="text" name="username" class="form-control">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input id="email" type="text" name="email" class="form-control">
	</div>

	<div class="form-group">
		<label for="password">Mot de passe</label>
		<input id="password" type="password" name="password" class="form-control">
	</div>

	<div class="form-group">
		<label for="password_confirm">Confirmer le mot de passe</label>
		<input id="password_confirm" type="password" name="password_confirm" class="form-control">
	</div>

	<button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

<?php require_once  'inc/footer.php'; ?>
