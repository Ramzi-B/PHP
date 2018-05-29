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

    <form action="minichat_post.php" method="post">
      <p>
				<label for="pseudo">Pseudo</label> :
        <!-- Retenir le pseudo du visiteur en utilisant un cookie -->
        <input type="text" name="pseudo" value="<?php
         if(isset($_COOKIE['pseudo'])){echo $_COOKIE['pseudo'];}?>" id="pseudo">
			</p>

			<p>
				<label for="message">Message</label> :
				<input type="text" name="message" id="message">
			</p>

			<input type="submit" value="Envoyer">
    </form>

    <?php
      // Connexion à la base de données
      include 'inc/db.php';

      // Récupération des 10 derniers messages
      $reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, \'%d/%m/%Y à %H:%i:%s \')
                              		AS date_message_fr
																FROM minichat
														ORDER BY date_message
													DESC LIMIT 0, 10');

      // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
      while ($donnees = $reponse->fetch()) {
        echo '<p>' . htmlspecialchars($donnees['date_message_fr']) . '
              <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
      }

      $reponse->closeCursor();
    ?>

  </body>
</html>
