<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codes d'accès au serveur central de la NASA</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <?php
      // Si le mot de  passe est bon
      if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] == "kangourou") {
        // On affiche les codes
        ?>

        <h1>Voici les codes d'accès : </h1>

        <p>
          <strong>gprogjpore-pojhsp_654564}]åâ€±}~å#çfpozlef</strong>
          <strong>#~{]þæ±ø¶ÊÔÎ¿®aầ)"çz'(vqpkfje gvoaizjầç)"}</strong>
        </p>

        <p>
          Cette page est réservée au personnel de la NASA.<br>
          N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br>
          La NASA vous remercie de votre visite.<br>
          <strong><a href="formulaire.php">Retour au formulaire</a></strong>
        </p>

        <?php
      }
      else {
        echo '<p>Mot de passe incorect<br>
                <strong>
                  <a href="formulaire.php">Retour au formulaire</a>
                </strong>
              </p>';
      }

    ?>
  </body>
</html>
