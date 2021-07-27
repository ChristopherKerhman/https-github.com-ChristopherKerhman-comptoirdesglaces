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
var_dump($_POST);
  $requetteSQL = "UPDATE `Produits` SET `nom`=:nom,`idTypeProduit`=:idTypeProduit,`stock`=:stock,`prixUnitaire`=:prixUnitaire WHERE `idProduits`= :idTri";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':nom', $nom);
  $data->bindParam(':idTypeProduit', $idTypeProduit);
  $data->bindParam(':prixUnitaire', $prixUnitaire);
  $data->bindParam(':stock', $stock);
  $data->bindParam(':idTri', $idTri);
  $data->execute();
  header ('location: ../../formProduits.php');
} else {
  echo 'coucou';
    header ('location: ../../formProduits.php');
}
 ?>
