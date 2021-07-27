<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';

if(($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['type']))){
  $type = filter($_POST['type']);
  $requetteSQL = "INSERT INTO `typePorduits` (`type`) VALUES (:type)";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':type', $type);
  $data->execute();
  header ('location: ../../formType.php?success="donnée enregistrée"');
} else {
  header ('location: ../../formType.php?error="Pas de données"');
}

 ?>
