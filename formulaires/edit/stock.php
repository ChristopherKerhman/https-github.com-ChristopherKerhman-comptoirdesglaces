<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $stock = filter($_POST['stock']);
  $idTri = filter($_POST['idTri']);
  $requetteSQL = "UPDATE `Produits` SET `stock`=:stock WHERE `idProduits`= :idTri";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':stock', $stock);
  $data->bindParam(':idTri', $idTri);
  $data->execute();
    header ('location: ../../gestionStock.php');
} else {
    header ('location: ../../gestionStock.php');
}
 ?>
