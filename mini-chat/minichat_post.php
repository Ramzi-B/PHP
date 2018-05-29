<?php

  // Connexion à la base de données
  include 'inc/db.php';

  if(isset($_POST['pseudo'])){
    setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
  }
  // Verifier si les champs sont vides
  if (isset($_POST['pseudo']) && isset($_POST['message']) && !empty($_POST['pseudo']) && !empty($_POST['message'])) {
    // Sécuriser les données
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);

    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_message) VALUES(?, ?, NOW())');
    $req->execute([$pseudo, $message]);

    // Redirection du visiteur vers la page du minichat
    header('Location: minichat.php');
  }
  else {
    // Message d'erreur
    echo '<p><strong>Vous devez entrer un pseudo et un message</strong></p><br>
          <p><a href="minichat.php">Retour</p>';
  }

?>
