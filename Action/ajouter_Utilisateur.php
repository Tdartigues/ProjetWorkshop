<?php

session_start();

$intitule= filter_input(INPUT_POST, "intitule");
$description= filter_input(INPUT_POST, "description");
$Prive= filter_input(INPUT_POST, "Prive");

$StatutUt = filter_input(INPUT_POST, "StatutUt");


require_once '../Action/config.php';

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
$r = $db->prepare("insert into club(intitule, description, Prive) values(:intitule, :description, :Prive)");

$r->bindParam(":intitule",$intitule);
$r->bindParam(":description",$description);
$r->bindParam(":Prive",$Prive);


$r->execute();

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
$u = $db->prepare("select max(identifiant) from club");


$u->execute();

$lemaxid = $u->fetch();

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
$s = $db->prepare("insert into lienutcl (StatutUt, IdUt, IdCl) values (1, :IdUt, :IdCl)");

var_dump($_SESSION["id"]);

echo "test";
var_dump($lemaxid);

$s->bindParam(":IdUt",$_SESSION["id"]);
$s->bindParam(":IdCl",$lemaxid[0]);

$s -> execute();

header('location: ../Php/acceuilusers.php');
?>