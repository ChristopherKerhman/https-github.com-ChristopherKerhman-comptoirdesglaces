<?php
  include 'gestionDB/identifiantDB.php';
  include 'functionsFormulaire.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idComposition = filter($_POST['idComposition']);
    $image = filter($_POST['image']);
    $requetteSQL = "SELECT * FROM `composition` WHERE `idComposition` = :idComposition";
    include 'gestionDB/readDB.php';
    $data->bindParam(':idComposition', $idComposition);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataTraiter = $data->fetchAll();
  } else {
      header('location: formComposition.php');
  }
  echo '
  <h3>Coupe '.utf8_encode($dataTraiter[0]['nomComposition']).' / prix de vente : '.$dataTraiter[0]['prixComposition'].' € </h3>
<img class="affichageImage" src="compositionImages/'.$dataTraiter[0]['image'].'" alt="coupes '.utf8_encode($dataTraiter[0]['nomComposition']).'" title="Si la photo n\'est pas conforme, supprimer la composition." width=80%>
  <form class="conteneurFlex" action="formulaires/edit/composition.php" method="post" enctype="multipart/form-data">
    <label for="nomC">Nom de votre composition :</label>
    <input id="nomC" class="sizeInpute" type="text" name="nomComposition" value="'.utf8_encode($dataTraiter[0]['nomComposition']).'">
    <label for="prixC">Prix de votre composition :</label>
    <input class="sizeInpute" id="prixC" type="number" step="0.01" name="prixComposition" value="'.$dataTraiter[0]['prixComposition'].'">
    <input type="hidden" name="idComposition" value="'.$dataTraiter[0]['idComposition'].'">
    <button class="edit" type="submit" name="button">Modifier</button>
  </form>
  ';
 ?>
