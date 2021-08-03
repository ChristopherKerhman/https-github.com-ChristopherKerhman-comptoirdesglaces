<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $adresse = filter($_POST['adresse']);
  $phone = filter($_POST['phone']);
  $siret = filter($_POST['siret']);
  $ouverture = filter($_POST['ouvert']);
  $requetteSQL = "UPDATE `inc` SET `adresse`=:adresse,`phone`=:phone,`siret`=:siret,`ouvert`=:ouvert";
    include '../../gestionDB/readDB.php';
    $data->bindParam(':adresse', $adresse);
    $data->bindParam(':phone', $phone);
    $data->bindParam(':siret', $siret);
    $data->bindParam(':ouvert', $ouverture);
    $data->execute();
    header ('location: ../../entreprise.php');
} else {
  header ('location: ../../entreprise.php');
}
 ?>
