<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $nom = filter($_POST['nom']);
  $idTypeProduits = filter($_POST['idTypeProduits']);
  $stock = filter($_POST['stock']);
  $prixUnitaire = filter($_POST['prixUnitaire']);
  $description = filter($_POST['description']);
  $requetteSQL = "INSERT INTO `Produits`(`nom`, `idTypeProduit`, `stock`, `prixUnitaire`, `composition`) VALUES (:nom, :idTypeProduits, :stock, :prixUnitaire, :composition)";
  include '../../gestionDB/readDB.php';
  $data->bindParam(':nom', $nom);
  $data->bindParam(':idTypeProduits', $idTypeProduits);
  $data->bindParam(':stock', $stock);
  $data->bindParam(':prixUnitaire', $prixUnitaire);
  $data->bindParam(':composition', $description);
  $data->execute();
  header ('location: ../../formProduits.php?success="donnée enregistrée"');
} else {
  header ('location: ../../formProduits.php?error="Pas de données"');
}

 ?>
