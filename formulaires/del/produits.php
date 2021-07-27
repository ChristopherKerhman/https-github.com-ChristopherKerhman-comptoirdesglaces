<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  var_dump($_POST);
  $idTri = filter($_POST['idTri']);
  $requetteSQL = "DELETE FROM `Produits` WHERE `idProduits` = :idTri";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':idTri', $idTri);
  $data->execute();
  header ('location: ../../formProduits.php');
} else {
  header ('location: ../../formProduits.php');
}
 ?>
