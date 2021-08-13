<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$token = filter($_POST['tokenCommande']);
$totalPanier = filter($_POST['totalPanier']);
$nbrArticle = filter($_POST['nbrArticle']);
$panier = filter($_POST['panier']);
$numeroTable = filter($_POST['numeroTable']);
$requetteSQL = "INSERT INTO `commandesClients`(`tokenCommande`, `totalPanier`, `nbrArticle`, `panier`, `numeroTable`, `valide`) VALUES (:token, :totalPanier,:nbrArticle,:panier,:numeroTable, 3)";
  include '../../gestionDB/readDB.php';
    $data->bindParam(':token', $token);
    $data->bindParam(':totalPanier', $totalPanier);
    $data->bindParam(':nbrArticle', $nbrArticle);
    $data->bindParam(':panier', $panier);
    $data->bindParam('numeroTable', $numeroTable);
    $data->execute();
      header('location:../../menuBackOffice/prendreCommande.php');
  } else {
    header('location:../../index.php');
  }
 ?>
