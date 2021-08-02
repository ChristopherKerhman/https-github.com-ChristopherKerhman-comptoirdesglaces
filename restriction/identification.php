<?php
session_start();
include '../gestionDB/identifiantDB.php';
include '../formulaires/functionsFormulaire.php';
if (($_SERVER['REQUEST_METHOD'] === 'POST') && ((!empty($_POST['login']) && (!empty($_POST['mdp']))))) {
  $login = filter($_POST['login']);
  $moria = $_POST['mdp'];
  $requetteSQL = "SELECT `idUser`, `speudo`, `motDePasse`, `autorisation`, `dateCreation`, `valide` FROM `users` WHERE `speudo`= :login";
  include '../gestionDB/readDB.php';
  $data->bindParam(':login', $login);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  // Vérification du mot de passe qui a été haché
  if(password_verify($moria, $dataTraiter[0]['motDePasse']) && $dataTraiter[0]['valide'] == 1) {
    $_SESSION['login'] = $dataTraiter[0]['speudo'];
    $_SESSION['role'] = $dataTraiter[0]['autorisation'];
    $_SESSION['valide'] = $dataTraiter[0]['valide'];
    $_SESSION['identification'] = true;
      header('location:../index.php');
  } else {
    header('location:../index.php');
  }
} else {
  header('location:../index.php');
}
 ?>
