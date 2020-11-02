<?php
session_start();
require_once '../Action/Config.php';
$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);

$statement = $db->prepare("SELECT * FROM club WHERE identifiant = :id");

$id= filter_input(INPUT_GET,"id");

$statement->bindParam(":id", $id);

$entreprise=$statement->execute();

$newnom=$entreprise['description'];
$newaddr=$entreprise['intitule'];



        $r=$db->prepare("SELECT * FROM club WHERE identifiant=?");
        $r->execute(array($id));
        $entreprise=$r->fetch();

        $newnom=$entreprise['description'];
        $newaddr=$entreprise['intitule'];

        if(isset($_POST['modify']))
        {
            $newnom=htmlspecialchars($_POST['description']);
            $newaddr=htmlspecialchars($_POST['intitule']);


            $r = $db->prepare("UPDATE club SET description=?,intitule=? WHERE identifiant=?");
            $r->execute(array($newnom,$newaddr,$id));

            header("Location: mesClubs.php");

        }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Css/form2.css" rel="stylesheet">

</head>
<body>

    <form action="modifier.php?id=<?php echo $id ?>" method="post">
            <div>
                <br>
                <div>
                <div>
                <input type="text" name="intitule" id="intitule" class="validate" maxlength="500" required value="<?php echo $newaddr ?>">
                    <label for="intitule">Nom du Groupe</label>
                </div>
                <br>
                <input type="text" name="description" id="description" class="validate" maxlength="100" required value="<?php echo $newnom ?>">
                    <label for="description">Description</label>
                </div>
                <br>
                <a><input type="submit" name="modify" id="modify" class="validate" value="Modifier Club" ></a>
            </div>
    </form>

</body>
</html>