<?php
include '../../restriction/session.php';
include '../../gestionDB/identifiantDB.php';
include '../functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD']  == 'POST') {
if(empty($_POST['speudo'])) {
  header ('location: ../../index.php?error="speudo vide."');
} else {
 $speudo = filter($_POST['speudo']);
 $moria = filter($_POST['motDePasse']);
 $autorisation = filter($_POST['autorisation']);
 $motDePasse = haschage($moria);
 if(!doublon($speudo)) {
   header ('location: ../../index.php?error="speudo existant."');
 } else {
   $requetteSQL = "INSERT INTO `users`(`speudo`, `motDePasse`, `autorisation`) VALUES (:speudo, :motDePasse, :autorisation)";
   include '../../gestionDB/readDB.php';
   $data->bindParam(':speudo', $speudo);
   $data->bindParam(':motDePasse', $motDePasse);
   $data->bindParam(':autorisation', $autorisation);
   $data->execute();
   header ('location: ../../index.php');
 }
}
} else {
  header ('location: ../../../index.php?error="soucis lors de l\'enregistrement.""');
}
 ?>
