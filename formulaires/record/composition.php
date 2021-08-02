<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Traitement de l'image d'une composition
  $image = rand(0,124).filter($_FILES['image']['name']);
  if($_FILES['image']['size'] >= 1000000) {
    $sizeMo = $_FILES['image']['size']/10000;
    echo 'Trop volumineux';
    header('location:../../formComposition.php?Error="trop volumineurx'.$sizeMo.'"');
  } else {
  if (($_FILES['image']['type'] == 'image/png') || ($_FILES['image']['type'] == 'image/jpeg')) {
    move_uploaded_file($_FILES['image']['tmp_name'],$f = '../../compositionImages/'.$image);
      //chmod($f, 0777);
  } else {
      header('location:../../formComposition.php?Error2="png ou jpeg seulement."');
  }
}
// Traitement du formulaire d'enregistrement d'une composition
$nomComposition = filter($_POST['nomComposition']);
$prixComposition = filter($_POST['prixComposition']);
$requetteSQL = "INSERT INTO `composition`(`nomComposition`, `prixComposition`, `image`) VALUES (:nomComposition, :prixComposition, :image)";
include '../../gestionDB/readDB.php';
$data->bindParam(':nomComposition', $nomComposition);
$data->bindParam(':prixComposition', $prixComposition);
$data->bindParam(':image', $image);
$data->execute();
  header('location:../../formComposition.php');
} else {
  header('location:../../formComposition.php');
}
 ?>
