  <?php require_once '../Action/Config.php';

  $db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
  $r = $db->prepare("select intitule, description, identifiant, Actif, Prive from club");

  $r->execute();

  $clubs = $r->fetchAll();

  //var_dump($clubs)?>

<?php include_once '../Php/header.php' ?>

<?php include_once '../Php/menu_gauche.php'?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<link rel="stylesheet" href="../Css/cssClassique.css">
<div class='conteneurDesRecherches'>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-bordered table-striped mb-0" width="60%">
          <thead>
            <tr>
              <th class="th-sm">VOIR</th>
              <th class="th-sm">NOM DU GROUPE</th>
              <th class="th-sm">DESCRIPTION</th>
              <th class="th-sm"></th>
              <th class="th-sm">TYPE</th>
              <th class="th-sm">REJOINDRE</th>
            </tr>
          </thead>
          <?php
          foreach ($clubs as $club){
            $db = new PDO("mysql:host=" . config::SERVEUR . ";dbname=" . config::BASE, config::USER, config::MDP);
            $t = $db->prepare("select idUt from lienutcl join utilisateur u on idUt=u.id join club c on idCl=c.identifiant where u.id=:uid and c.identifiant=:cidentifiant");

            $t->bindParam(":uid",$_SESSION['id']);
            $t->bindParam(":cidentifiant",$club['identifiant']);

            $t->execute();
          
            $liens = $t->fetchAll();
          
                  /*$i = $club["identifiant"]*/;?>
                  <?php
                    /*var_dump($club[$i])*/;
                    if($club["Actif"]==1){?>
                        <div class="blocRecherche">
                            <tbody>
                            <tr>
                                <th>
                                  <a href="InterfaceGroup.php?id=<?php echo $club["identifiant"]?>" class="btn blue"><i class="fas fa-eye"></i></a>
                                </th>
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
                                <td>
                                   
                                    <?php if($t->rowCount()==0){ ?>
                                      <form action="../Php/LienUserClub.php" method=POST>
                                          <div>
                                            <input type="hidden" name="idclub" id="idclub" class="validate" maxlength="30" value="<?php echo $club["identifiant"] ?>">
                                            <label for="idclub"></label>
                                            <a><input type="submit" name="Rejoindre" id="Rejoindre" class="btn blue" value="Rejoindre"></a>
                                          </div>
                                      </form></td>
                                    <?php } 
                                    else{ ?>
                                      <form action="../Action/QuitterGroupe.php" method=POST>
                                          <div>
                                            <input type="hidden" name="idclub" id="idclub" class="validate" maxlength="30" value="<?php echo $club["identifiant"] ?>">
                                            <label for="idclub"></label>
                                            <a><input type="submit" name="Rejoindre" id="Rejoindre" class="btn red" value="Quitter"></a>
                                          </div>
                                      </form></td>
                                    <?php } ?>
                                
                            </tr>
                          </tbody>
                        </div>
                  <?php }
                  elseif($clubs[$i]["Actif"]==0){

                  }?>

           <?php } ?>
        </table>

      </div>

</div>
