<?php
include '../restriction/session.php';
include '../gestionDB/identifiantDB.php';

if(($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['type']))){
  echo 'coucou';
  var_dump($_POST);
} else {
  header ('location: ../formType.php?error="Pas de données"');
}

 ?>
