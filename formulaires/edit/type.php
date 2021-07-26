<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if(($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['type']))){
  $idTypeProduits = filter($_POST['idTypeProduits']);
  $type = filter($_POST['type']);
  $requetteSQL = "UPDATE `typePorduits` SET `type`=:type WHERE  `idTypeProduits`= :idTypeProduits";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':idTypeProduits', $idTypeProduits);
  $data->bindParam(':type', $type);
  $data->execute();
  header ('location: ../../formType.php');
} else {
  header ('location: ../../formType.php');
}
 ?>
