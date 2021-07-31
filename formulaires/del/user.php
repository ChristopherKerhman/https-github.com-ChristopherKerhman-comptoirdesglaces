<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$idUser = filter($_POST['idUser']);
$requetteSQL = "DELETE FROM `users` WHERE `idUser` = :idUser";
include '../../gestionDB/readDB.php';
$data->bindParam(':idUser', $idUser);
$data->execute();
header ('location: ../../index.php');
} else {
  header ('location: ../../index.php');
}
 ?>
