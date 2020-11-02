<?php include_once '../Php/header.php'?>
<?php include_once '../Php/menu_gauche.php' ?>
<?php


require_once '../Action/Config.php';

$db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);

$query = "SELECT cl.identifiant, intitule, description, Actif, Prive FROM club cl join lienutcl l on cl.identifiant=l.idCl join utilisateur  u on l.idUt = u.id WHERE idUt = :id and StatutUt = 1";

$statement = $db->prepare($query);

$statement->bindParam(":id", $_SESSION["id"]);

$statement->execute();

$clubs = $statement->fetchAll();
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="../Css/cssClassique.css">
<div class='conteneurDesRecherches'>

<div class=boutonCreation>
    <a href="../Php/AjoutUtlisateur.php" class="btn blue">CREER</a>
</div>

<div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-bordered table-striped mb-0" width="60%">
          <thead>
            <tr>
              <th class="th-sm">VOIR</th>
              <th class="th-sm">MODIFIER</th>
              <th class="th-sm">NOM DU GROUPE</th>
              <th class="th-sm">DESCRIPTION</th>
              <th class="th-sm"></th>
              <th class="th-sm">TYPE</th>
            </tr>
          </thead>
            <?php
            foreach ($clubs as $club){
                /*$i = $club["identifiant"]*/;?>
                <?php
                /*var_dump($club[$i])*/;
                if($club["Actif"]==1){?>
                    <div class="blocRecherche">
                        <tbody>
                        <tr>
                            <th>
                                <a href="interfaceGroup.php?id=<?php echo $club["identifiant"]?>" class="btn blue"><i class="fas fa-eye"></i></a>
                            </th>
                            <td>
                                <a href="modifier.php?id=<?php echo $club["identifiant"]?>" class="btn blue"><i class="fas">Modifier</i></a>
                            </td>
                            <td><?php echo $club["intitule"]?></td>
                            <td><?php echo $club["description"]?></td>
                            <td></td>
                            <td><?php
                                if($club["Prive"]==0){
                                    echo "Groupe public";
                                }
                                elseif($club["Prive"]==1){
                                    echo "Groupe prive";
                                }
                                ?></td>
                        </tr>
                        </tbody>
                    </div>
                <?php }
                elseif($clubs["Actif"]==0){

                }?>

            <?php } ?>
        </table>

      </div>


</div>