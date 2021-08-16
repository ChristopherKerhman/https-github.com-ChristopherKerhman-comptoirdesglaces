<?php
$autorisation = 2;
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idTypeProduits = filter($_POST['idTypeProduits']);
  $requetteSQL = "UPDATE `typePorduits` SET `lock`= 0 WHERE `idTypeProduits` = :idTypeProduits";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':idTypeProduits', $idTypeProduits);
  $data->execute();
   header ('location: ../../formType.php');
} else {
   header ('location: ../../formType.php');
}
 ?>
