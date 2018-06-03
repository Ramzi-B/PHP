<?php

<<<<<<< HEAD
  // Connexion à la base de données
  include 'inc/db.php';

  // Récupération des 10 derniers messages
  $responce = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, \'%d/%m/%Y à %H:%i:%s\')
														 	 AS date_message_fr
													 	 FROM minichat
											 	 ORDER BY date_message
										 	 DESC LIMIT 0, 10');
=======
    // Connexion à la base de données
    include 'inc/db.php';

    // Récupération des 10 derniers messages
    $responce = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, \'%d/%m/%Y à %H:%i:%s\')
								 AS date_message_fr
							   FROM minichat
						   ORDER BY date_message
						 DESC LIMIT 0, 10');
>>>>>>> 920a1f99302f96b4485377d5ad466f43c16c22c3
?>

<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minichat</title>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
<<<<<<< HEAD
		<header>
			<h1>le minichat</h1>
		</header>

		<main class="container">

			<h2>Let's Chat</h2>

			<!-- Affichage de chaque message (toutes les données sont protégées par htmlspecialchars) -->
			<section class="wrap">
				<?php while ($data = $responce->fetch()): ?>

					<div class="meta-data">
						<span><?= htmlspecialchars($data['pseudo']) ?></span>
						<span><?= htmlspecialchars($data['message']) ?></span>
						<span><?= htmlspecialchars($data['date_message_fr']) ?></span>
					</div>

				<?php endwhile ?>
			</section>

			<form class="form-group" action="minichat_post.php" method="POST">
				<div class="form-control">
					<label for="pseudo">Pseudo</label>
					<!-- Retenir le pseudo du visiteur en utilisant un cookie -->
					<input type="text" name="pseudo" value="<?php if (isset($_COOKIE['pseudo'])) { echo $_COOKIE['pseudo'];}?>" id="pseudo">
				</div>

				<div class="form-control">
					<label for="message">Message</label>
					<textarea name="message" rows="1" id="message"></textarea>
				</div>

				<div class="form-control">
					<input class="btn" type="submit" value="Envoyer">
					<a class="btn" href="minichat.php">Refresh</a>
				</div>
			</form>

		</main>

		<footer>
			<p>&copy MiniChat</p>
		</footer>

=======
	  <header>
		  <h1>le minichat</h1>
	  </header>
	  
	  <main class="container">
		  
		  <h2>Let's Chat</h2>
		  
		  <!-- Affichage de chaque message (toutes les données sont protégées par htmlspecialchars) -->
		  <section class="wrap">
			  <?php while ($data = $responce->fetch()): ?>
			  
			  <div class="meta-data">
				  <?= htmlspecialchars($data['date_message_fr']) ?>
				  <?= htmlspecialchars($data['pseudo']) ?>
				  <?= htmlspecialchars($data['message']) ?>
			  </div>
			  
			  <?php endwhile ?>
		  </section>
		  
		  <form class="form-group" action="minichat_post.php" method="POST">			  
			  <div class="form-control">
				  <label for="pseudo">Pseudo</label>
				  <!-- Retenir le pseudo du visiteur en utilisant un cookie -->
				  <input type="text" name="pseudo" value="<?php if (isset($_COOKIE['pseudo'])) { echo $_COOKIE['pseudo'];}?>" id="pseudo">
			  </div>
			  
			  <div class="form-control">
				  <label for="message">Message</label>
				  <textarea name="message" rows="1" id="message"></textarea>
			  </div>
			  
			  <div class="form-control">
				  <input class="btn" type="submit" value="Envoyer">
				  <a class="btn" href="minichat.php">Refresh</a>
			  </div>
		  </form>
		  
	  </main>
	  
	  <footer>
		  <p>&copy MiniChat</p>
	  </footer>
	
>>>>>>> 920a1f99302f96b4485377d5ad466f43c16c22c3
	</body>
</html>
