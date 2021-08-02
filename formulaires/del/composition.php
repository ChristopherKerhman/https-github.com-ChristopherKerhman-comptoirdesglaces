<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
// Permet de supprimer un fichier sur le serveur
//unlink ("../../compositionImages/23amarena.jpg");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idComposition = filter($_POST['idComposition']);
  $image = filter($_POST['image']);
  $requetteSQL = "DELETE FROM `composition` WHERE `idComposition`= :idComposition";
    include '../../gestionDB/readDB.php';
    $data->bindParam(':idComposition', $idComposition);
    $data->execute();
    // Fonctionnalité non disponible online.
    //unlink ("../../compositionImages/$image");
    header('location:../../formComposition.php');
} else {
    header('location:../../formComposition.php');
}
?>
