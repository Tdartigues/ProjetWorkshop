<?php 
?>

<html><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Css/form.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="htpps://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<?php
    require_once "../Action/Config.php";
    $db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);

    $r = $db->prepare("select Id, Prenom, montant from premierdevoir");

    $r->execute();
    $categories = $r->fetchAll();
?>

<div class="container">  
  <form id="contact" action="../Action/ActionForm.php" method="post">
    <h3>Inscription</h3>
    <h4>Nouveau Compte</h4>
    <fieldset>
      <input placeholder="Nom" name="nom" id="nom"type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Prenom" name="prenom" id="prenom"type="prenom" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Adresse e-mail" name="identifiant" id="identifiant"type="identifiant" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input type="password" placeholder="Mot de Passe" name="mdp" id="mdp" tabindex="4" required>
    </fieldset>
    <fieldset>
      <input type="password" placeholder="Confirmer le Mot de Passe" name="mdp2" id="mdp2"tabindex="5" required>
    </fieldset>
    <fieldset>
      <input placeholder="Numéro de Téléphone" name="telephone" id="telephone"type="telephone"tabindex="5" required>
    </fieldset>
    <fieldset>
      <input placeholder="Ville" name="ville" id="ville"type="ville"tabindex="5" required>
    </fieldset>
    <fieldset>
      <input placeholder=" Code Postal" name="codePostal" id="codePostal"type="codePostal"tabindex="5" required>
    </fieldset>
    <fieldset>
    <input placeholder="Date de Naissance" type="date" name="date" id="date"tabindex="5" required>
    </fieldset>
    <fieldset>
    <input type="checkbox" name="charte" id="charte" value="1">J'accepte les règles de confidentialité<br>
    </fieldset>
    <div class="boutonval">
    <input type="submit"type "inline-block" name="login" id="login" class="fadeIn fourth" value="valider">
    </div>
    <p class="copyright">Designed by <a href="JAMOA.fr" target="_blank" title="JAMOA">JAMOA</a></p>
  </form>
</div>

</body>
</html>

