<?php
include 'gestionDB/identifiantDB.php';
$requetteSQL = "SELECT `adresse`, `phone`, `siret`, `ouvert` FROM `inc` WHERE 1";
include 'gestionDB/readDB.php';
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataTraiter = $data->fetchAll();
 ?>
<form class="conteneurFlexC size30" action="formulaires/edit/entreprise.php" method="post">
  <label for="adresse">Adresse de l'entreprise :</label>
  <input id="adresse" class="sizeInpute" type="text" name="adresse" value="<?php echo $dataTraiter[0]['adresse']; ?>">
  <label for="phone">Telephone :</label>
  <input id="phone" class="sizeInpute" type="text" name="phone" value="<?php echo $dataTraiter[0]['phone']; ?>">
  <label for="siret">Numero de siret :</label>
  <input id="siret" class="sizeInpute" type="text" name="siret" value="<?php echo $dataTraiter[0]['siret']; ?>">
  <label for="ouvert">Horraire d'ouverture :</label>
  <input id="ouvert" class="sizeInpute" type="text" name="ouvert" value="<?php echo $dataTraiter[0]['ouvert']; ?>">
  <button class="edit" type="submit" name="button">Modifier</button>
</form>
