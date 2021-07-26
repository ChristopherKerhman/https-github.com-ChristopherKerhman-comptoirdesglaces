<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  var_dump($_POST);
  $idTypeProduits = filter($_POST['idTypeProduits']);
  $requetteSQL = "DELETE FROM `typePorduits` WHERE `idTypeProduits` = :idTypeProduits";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':idTypeProduits', $idTypeProduits);
  $data->execute();
  header ('location: ../../formType.php');
} else {
  header ('location: ../../formType.php');
}
 ?>
