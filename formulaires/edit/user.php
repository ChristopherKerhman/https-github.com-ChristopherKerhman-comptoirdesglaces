<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $autorisation = filter($_POST['autorisation']);
  $valide = filter($_POST['valide']);
  $id = filter($_POST['idUser']);
  $requetteSQL = "UPDATE `users` SET `autorisation`= :autorisation,`valide`=:valide WHERE `idUser`= :id";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':autorisation', $autorisation);
  $data->bindParam(':valide', $valide);
  $data->bindParam(':id', $id);
  $data->execute();
  header('location: ../../index.php');
} else {
  header('location: ../../index.php');
}

 ?>
