<?php
session_start();

$idclub= filter_input(INPUT_POST, "idclub");

require_once '../Php/config.php';

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
$r = $db->prepare("insert into lienutcl(IdCl, IdUt, StatutUt) values(:IdCl, :IdUt, 0)");

$r->bindParam(":IdCl",$idclub);
$r->bindParam(":IdUt",$_SESSION["id"]);


$r->execute();
//var_dump($intitule);
header('location: ../Php/RechercheGroupe.php');