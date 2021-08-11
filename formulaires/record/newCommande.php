<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$token = filter($_POST['tokenCommande']);
if ($token === '') {
  header ('location:../../index.php');
} else {
$ntable = filter($_POST['numeroTable']);
$valide = 1;
$requetteSQL = "INSERT INTO `commandesClients`(`tokenCommande`, `numeroTable`, `valide`) VALUES (:tokenCommande, :numeroTable, 1)";
include '../../gestionDB/readDB.php';
$data->bindParam(':tokenCommande', $token);
$data->bindParam(':numeroTable', $ntable);
$data->execute();
  header ('location:../../index.php');
  }
} else {
  header ('location:../../index.php');
}
 ?>
