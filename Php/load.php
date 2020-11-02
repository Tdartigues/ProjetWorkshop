
<?php

require_once "../Action/Config.php";

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);

$data = array();

$query = "SELECT * FROM events ORDER BY id";

$statement = $db->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>