<?php 
session_start();
require_once '../Action/Config.php';

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
$r = $db->prepare("select id, nom, prenom from utilisateur where id=:id");
$r->bindParam(":id", $_SESSION['id']);
$r->execute();

$lignes = $r->fetchAll();

//var_dump($lignes);

?>


<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="../Css/cssHeader.css" rel="stylesheet" type="text/css"/>
</head>

<header class="header">

    <div id="bloc1">
        <img src="../Image/jamoa2.jpg">
    </div>
    <div id="bloc2">
        <p>             </p>
    </div>
    <div id="bloc3">
        <p><?php echo $lignes[0]['nom'] . " " . $lignes[0]['prenom']; ?></p>
    </div>



</header>






