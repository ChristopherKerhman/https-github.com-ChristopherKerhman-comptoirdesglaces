<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = filter($_POST['id']);
  $requetteSQL = "UPDATE `commandesClients` SET `valide`= 3 WHERE `id`= :id";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  header ('location: ../../index.php');
} else {
    header ('location: ../../index.php');
}
 ?>
