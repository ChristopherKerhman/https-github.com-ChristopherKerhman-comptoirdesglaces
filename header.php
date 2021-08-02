<?php
include 'restriction/session.php';
$titre = 'Back-Office du site Le comptoire des glaces';
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/master.css">
    <script src="https://unpkg.com/vue@next"></script>
    <title><?php echo $titre; ?> </title>
  </head>
  <body>
<header>
  <h1><?php echo $titre ?></h1>
  <?php
   include 'gestionDB/identifiantDB.php';
   // Menu disponible en fonction du niveau d'accréditation
   if (empty($_SESSION)) {
    $requetteSQL= "SELECT `idNavigator`, `lien`, `description`, `acreditation` FROM `navigator` WHERE acreditation = 1 ORDER BY `idNavigator` ASC";
   } else {
     if ($_SESSION['identification'] && $_SESSION['role'] == 2) {
       $requetteSQL = "SELECT `idNavigator`, `lien`, `description`, `acreditation` FROM `navigator` WHERE acreditation >= 1 ORDER BY `idNavigator` ASC";
     } else {
       $requetteSQL = "SELECT `idNavigator`, `lien`, `description`, `acreditation` FROM `navigator` WHERE acreditation = 1 ORDER BY `idNavigator` ASC";
     }
   }


   // Fin des menus
   include 'gestionDB/readDB.php';
   $data->execute();
   $data->setFetchMode(PDO::FETCH_ASSOC);
   $dataTraiter = $data->fetchAll();
   ?>
    <nav>
      <ul class="listNavigation">
        <?php
        foreach ($dataTraiter as $key) {
          echo '<li><a class="lienNav" href="'.utf8_encode($key['lien']).'">'.utf8_encode($key['description']).'</a></li>';
        }
      ?>
      </ul>
    </nav>
</header>
