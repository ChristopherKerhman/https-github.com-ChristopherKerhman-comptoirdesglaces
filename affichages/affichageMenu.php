<?php
$requetteSQL = "SELECT `lien`, `description` FROM `navigator` WHERE `acreditation` = 3";
include '../gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
 ?>
<ul>
  <?php
  foreach ($dataTraiter as $key) {
    // Mise en ligne ajouter l'utf8_encode sur $key['description']
    echo '<li><a class="lienNav" href="'.$key['lien'].'">'.$key['description'].'</a></li>';
  }

   ?>

</ul>
