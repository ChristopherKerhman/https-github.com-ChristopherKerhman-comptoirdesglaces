<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $nomComposition = filter($_POST['nomComposition']);
  $idComposition = filter($_POST['idComposition']);
  $prixComposition = filter($_POST['prixComposition']);
  $requetteSQL = "UPDATE `composition` SET `nomComposition`=:nom, `prixComposition`=:prix WHERE `composition`.`idComposition` = :id;";
    include '../../gestionDB/readDB.php';
    $data->bindParam(':nom', $nomComposition);
    $data->bindParam(':prix', $prixComposition);
    $data->bindParam(':id', $idComposition);
    $data->execute();
    header ('location: ../../formComposition.php');
} else {
  header ('location: ../../formComposition.php');
}
 ?>
