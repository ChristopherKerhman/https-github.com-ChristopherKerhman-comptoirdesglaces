<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $nom = filter($_POST['nom']);
  $idTypeProduit = filter($_POST['idTypeProduit']);
  $prixUnitaire = filter($_POST['prixUnitaire']);
  $stock = filter($_POST['stock']);
  $idTri = filter($_POST['idTri']);
  $composition = filter($_POST['description']);
  $requetteSQL = "UPDATE `Produits` SET `nom`=:nom,`idTypeProduit`=:idTypeProduit,`stock`=:stock,`prixUnitaire`=:prixUnitaire, `composition`=:composition WHERE `idProduits`= :idTri";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':nom', $nom);
  $data->bindParam(':idTypeProduit', $idTypeProduit);
  $data->bindParam(':prixUnitaire', $prixUnitaire);
  $data->bindParam(':stock', $stock);
  $data->bindParam(':idTri', $idTri);
  $data->bindParam(':composition', $composition);
  $data->execute();
    header ('location: ../../formProduits.php');
} else {
    header ('location: ../../formProduits.php');
}
 ?>
