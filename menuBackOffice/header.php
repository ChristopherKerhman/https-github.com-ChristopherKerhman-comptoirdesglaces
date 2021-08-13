<?php
include '../restriction/session.php';
$titre = 'Back-Office du site Le comptoire des glaces';
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/master.css">
    <script src="https://unpkg.com/vue@next"></script>
    <title><?php echo $titre; ?> </title>
  </head>
  <body>
<header>
  <h1><?php echo $titre ?></h1>
  <?php
   include '../gestionDB/identifiantDB.php';
   // Menu disponible en fonction du niveau d'accréditation
   if (empty($_SESSION)) {
     header('location: ../index.php');
   } else {
     if ($_SESSION['identification'] && $_SESSION['role'] == 1) {
       $requetteSQL = "SELECT `idNavigator`, `lien`, `description`, `acreditation` FROM `navigator` WHERE acreditation = 1 AND idNavigator = 3 ";
     } else {
       header('location: ../index.php');
     }
   }
   // Fin des menus
   include '../gestionDB/readDB.php';
   $data->execute();
   $data->setFetchMode(PDO::FETCH_ASSOC);
   $dataTraiter = $data->fetchAll();
   ?>
    <nav>
      <ul class="listNavigation">
        <?php
          echo '<li><a class="lienNav" href="../'.$dataTraiter[0]['lien'].'">'.utf8_encode($dataTraiter[0]['description']).'</a></li>';
      ?>
      </ul>
    </nav>
</header>
<section class="conteneurFlex">
<article >
  <?php include '../commandes/blocNotes.php';  ?>
</article>
