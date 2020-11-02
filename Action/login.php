 <?php
session_start();

require_once'../Action/Config.php';

$identifiant=filter_input(INPUT_POST,'identifiant');
$mdp=filter_input(INPUT_POST,'mdp');

var_dump($identifiant);
var_dump($mdp);

if (empty(trim($identifiant && $mdp))){
    ?>
<script>
    alert("Identifiant incorrect.");
</script>
<?php

}
else{
    $db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
    $r=$db->prepare("select id, identifiant, mdp from utilisateur where identifiant=:identifiant and mdp=:mdp");
    $r->bindParam(':identifiant', $identifiant);
    $r->bindParam(':mdp',$mdp);
    $r->execute();
    $lignes = $r->fetchAll();


    if($r->rowCount()==0){
        ?>
        <script>
            alert("Cet identifiant ou ce mot de passe n'est pas valide. Veuillez réessayer..");
            window.location = "../Php/Connexion.php";
         
        </script>
        <?php
    }
    else {
        $_SESSION['identifiant'] = $identifiant;
        $_SESSION['id'] = $lignes[0]['id'];
        /*$_SESSION['nom'] = $lignes[0]["nom"];
        $_SESSION['prenom'] = $lignes[0]["prenom"];*/
        header('location: ../Php/Acceuilusers.php');
    }
 
}?>

