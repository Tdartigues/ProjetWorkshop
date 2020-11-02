<?php
require_once "Config.php";
$identifiant=filter_input(INPUT_POST,"identifiant");
$mdp=filter_input(INPUT_POST,"mdp");
$mdp2=filter_input(INPUT_POST,"mdp2");
$nom=filter_input(INPUT_POST,"nom");
$prenom=filter_input(INPUT_POST,"prenom");
$telephone=filter_input(INPUT_POST,"telephone");
$ville=filter_input(INPUT_POST,"ville");
$codePostal=filter_input(INPUT_POST,"codePostal");
$date=filter_input(INPUT_POST,"date");
$charte=filter_input(INPUT_POST,"charte");

/*var_dump($identifiant);
var_dump($mdp);
var_dump($mdp2);
var_dump($nom);
var_dump($prenom);
var_dump($telephone);
var_dump($ville);
var_dump($codePostal);
var_dump($date);
var_dump($charte);*/

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);

$r = $db->prepare("select * from utilisateur where identifiant=?");

$r->execute(array($identifiant));

$rep=$r->fetchall();


$ok=1;
if($mdp2!=$mdp)
{
    $errmessage="Veuillez entrer le même mot de passe.";
    $ok=0;
}
if($charte==0)
{
    $errmessage="Veuillez accepter les termes d'utilisation.";
    $ok=0;
}

if($ok==1)
{
    
//    echo $id." ".$mdp." ".$nom." ".$prenom." ".$tel." ".$ville." ".$codepostal." ".$datenaissance." ".$charte;
    $r = $db->prepare("insert into utilisateur(identifiant, mdp, nom, prenom, telephone, ville, codePostal, date, charte) values(:identifiant, :mdp, :nom, :prenom, :telephone, :ville, :codePostal, :date, :charte)");
    $r->bindParam(":identifiant", $identifiant);
    $r->bindParam(":mdp", $mdp);
    $r->bindParam(":nom", $nom);
    $r->bindParam(":prenom", $prenom);
    $r->bindParam(":telephone", $telephone);
    $r->bindParam(":ville", $ville);
    $r->bindParam(":codePostal", $codePostal);
    $r->bindParam(":date", $date);
    $r->bindParam(":charte", $charte);
    $r->execute();
    $errmessage="Compte créé avec succès.";
}


/*echo '$errmessage';*/
?>
<script>
    alert("Compte crée avec sucèss !")
    window.location = "../Php/Connexion.php";
</script>
<?php

?>
