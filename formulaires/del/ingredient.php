<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = filter($_POST['idRecette']);
  $requetteSQL = "DELETE FROM `recette` WHERE `idRecette` = :id";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  header ('location: ../../creationRecette.php');
} else {
  header ('location: ../../creationRecette.php');
}
 ?>
