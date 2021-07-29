<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $idProduits = filter($_POST['idProduits']);
  $idComposition = filter($_POST['idComposition']);
  $nombre = filter($_POST['nombre']);
 $requetteSQL = "INSERT INTO `recette` (`idCompositionRecette`, `idProduitRecette`, `nombre`) VALUES (:idC, :idP, :N)";
    include '../../gestionDB/readDB.php';
    $data->bindParam(':idP', $idProduits);
    $data->bindParam(':idC', $idComposition);
    $data->bindParam(':N', $nombre);
    $data->execute();
  header('location:../../creationRecette.php');
} else {
  header('location:../../creationRecette.php');
}

  ?>
