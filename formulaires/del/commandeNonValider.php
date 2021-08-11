<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = filter($_POST['id']);
  $requetteSQL = "DELETE FROM `commandesClients` WHERE `commandesClients`.`id` = :id";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  header ('location: ../../index.php');
} else {
    header ('location: ../../index.php');
}
 ?>
