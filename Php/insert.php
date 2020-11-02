<?php
require_once "../Action/Config.php";

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);

if(isset($_POST["title"]))
{
 $query = "INSERT INTO events (title, start_event, end_event) VALUES (:title, :start_event, :end_event)";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}
header('Content-Type: application/json');

echo json_encode($statement, JSON_PRETTY_PRINT);
?>
