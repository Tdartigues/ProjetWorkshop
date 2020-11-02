<?php
    if(isset($_POST["id"]))
{
include_once('../Action/Config.php');

require_once "../Action/Config.php";

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
 $query = "DELETE from events WHERE id=:id";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>
?>