<?php include_once 'header.php'?>
<?php include_once 'menu_gauche.php'?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Css/form2.css" rel="stylesheet">

</head>
<body>



<div class="container">
    <form id="contact" action="../Action/ajouter_Utilisateur.php" method="post">
        <h3>Ajouter un nouveau club</h3>

        <fieldset>
            <input placeholder="Intitule" name="intitule" id="intitule"type="text" >
            <input placeholder="Description" name="description" id="description"type="text" >
            <!--<input placeholder="Prive (1) ou Public (0) ?" name="Prive" id="Prive" type="text" >-->
        </fieldset>

        <label for="utilise">Si oui, les utilisez-vous plutôt : </label>
        <select  class="control-label" id="Prive" name="Prive" size="1">
            <option value="1">Privé</option>
            <option value="0">Public</option>
        </select >




        <div>
            <input type="submit" name="login" id="login" class="fadeIn fourth" value="valider">
        </div>

        <p class="copyright">Designed by <a href="JAMOA.fr" target="_blank" title="JAMOA">JAMOA</a></p>
    </form>
</div>

</body>
</html>