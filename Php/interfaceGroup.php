
<?php include_once '../Php/header.php' ?>
<?php require_once '../Action/config.php';

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
$r = $db->prepare("SELECT COUNT(DISTINCT idUt) FROM lienutcl l join club cl on l.idCl = cl.identifiant WHERE cl.identifiant = :id");

$id= filter_input(INPUT_GET,"id");
$r->bindParam(":id", $id);
$entreprise=$r->execute();

$r->execute();

$variableDeId = $r->fetch();
//var_dump($variableDeId[0]);
?>



<?php include_once '../Php/menu_gauche.php'?>

<link rel="stylesheet" href="../Css/interfaceCss.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<link rel="stylesheet" href="../Css/cssClassique.css">
<link rel="stylesheet" href="../Css/calendar.css">
<div class='conteneurDesRecherches'>
   <div class="listeP">

   </div>
    <div class="nom">
        <div id="bloc1Interface">
            <p>
                <?php
                    $db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
                   // $u = $db->prepare("SELECT intitule FROM club cl join lienutcl l on l.idCl = cl.identifiant WHERE cl.identifiant = :id");
                    $u = $db->prepare("select intitule from club where identifiant=:id");
                    $idd= filter_input(INPUT_GET,"id");
                    $u->bindParam(":id", $idd);
                    $test=$u->execute();

                    $u->execute();

                    $variableDuNom = $u->fetch();
                  //  var_dump($variableDuNom);
                    echo 'Nom du Club : ' . $variableDuNom[0];
                ?>
                
            </p>
        </div>
        <div id="bloc2Interface">
            <p>
                <?php 
                    $db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
                    $f = $db->prepare("SELECT DISTINCT nom, prenom FROM utilisateur u join lienutcl l on u.id=l.idUt join club c on c.identifiant=l.IdCl where c.identifiant=:id ");
                    $iddd = filter_input(INPUT_GET,'id');

                    $f->bindParam(':id', $iddd);

                    $testt=$f->execute();
                    
                    $f->execute();

                    $listes = $f->fetchAll();
                    //var_dump($listes['nom']);
                    ?>
                    <table class="tableDesParticipants">
                        <thead>
                            <tr>
                            <th class="th-sm">Liste des membres :</th>
                            </tr>
                        </thead>
                    <?php
                    foreach($listes as $liste){
                        ?><tbody>
                            <tr>
                                <td>
                                    <?php echo $liste["nom"] . " " . $liste["prenom"]; ?>
                                </td>
                            </tr>
                        </tbody>
                    
                    <?php }
                ?>
            </p>
        </div>
        <div id="bloc3Interface">
            <p>Nombre de participants : </p>  <?php echo $variableDeId[0] ?>
        </div>
    </div>
    <div class="calendrier">
        <?php include_once "../Php/calendrier.php"; ?>
    </div>

</div>
