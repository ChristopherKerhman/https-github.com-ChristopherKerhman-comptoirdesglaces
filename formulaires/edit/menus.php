<?php
  include '../../restriction/session.php';
  include '../../gestionDB/identifiantDB.php';
  include '../functionsFormulaire.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = filter($_POST['idNavigator']);
  $accreditation = filter($_POST['accreditation']);
  $requetteSQL = "UPDATE `navigator` SET `acreditation`= :accreditation WHERE `idNavigator`= :id";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':id', $id);
  $data->bindParam(':accreditation', $accreditation);
  $data->execute();
  header('location:../../gestionMenu.php');
} else {
  header('location:../../gestionMenu.php');
}

 ?>
