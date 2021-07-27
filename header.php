<?php
include 'restriction/session.php';
$titre = 'Back-Office du site Le comptoire des glaces';
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/master.css">
    <title><?php echo $titre; ?> </title>
  </head>
  <body>
<header>
  <h1><?php echo $titre ?></h1>
  <?php
   include 'gestionDB/identifiantDB.php';
   $requetteSQL = "SELECT `idNavigator`, `lien`, `description`, `acreditation` FROM `navigator` WHERE acreditation >= 1 ORDER BY `idNavigator` ASC";
   include 'gestionDB/readDB.php';
   $data->execute();
   $data->setFetchMode(PDO::FETCH_ASSOC);
   $dataTraiter = $data->fetchAll();
   ?>
    <nav>
        <h3>Menu de navigation</h3>
      <ul class="listNavigation">:
        <?php
        foreach ($dataTraiter as $key) {
          echo '<li><a class="lienNav" href="'.$key['lien'].'">'.$key['description'].'</a>:</li>';
        }
         ?>
      </ul>
    </nav>
</header>
