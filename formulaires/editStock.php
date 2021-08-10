<?php
// Tri des types de produits pour l'affichage dans le formulaire.
$requetteSQL = "SELECT `idTypeProduits`, `type` FROM `typePorduits`";
include 'gestionDB/readDB.php';
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$typage = $data->fetchAll();
// Tri du produit à modifier.
$requetteSQL = "SELECT `idProduits`, `nom`, `idTypeProduit`, `stock`, `prixUnitaire`, `composition` FROM `Produits` WHERE `idProduits` =".$idTri;
include 'gestionDB/readDB.php';
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataTraiter = $data->fetchAll();
 ?>
<article class="">
  <h3>Modification du produit <?php echo $dataTraiter[0]['nom']; ?></h3>
  <form class="conteneurFlexC" action="formulaires/edit/stock.php" method="post" enctype="multipart/form-data">
    <p>Produit : <?php echo $dataTraiter[0]['nom']; ?></p>
    <p>Type de produit : <?php
    foreach ($typage as $key) {
      if ($key['idTypeProduits'] == $dataTraiter[0]['idTypeProduit']) {
      echo $key['type'];
    }
  }
    ?> </p>
    <p>Prix unitaire (€ TTC) :<?php echo $dataTraiter[0]['prixUnitaire']; ?> €</p>
    <label for="dispo">En stock ?</label>
    <?php
    if ($dataTraiter[0]['stock'] == 1) {
      echo '<select class="sizeInpute" id="dispo" class="" name="stock">
          <option value="1" selected>Oui</option>
          <option value="0">Non</option>
        </select>';
    } else {
      echo '<select class="sizeInpute" id="dispo" class="" name="stock">
          <option value="1">Oui</option>
          <option value="0" selected>Non</option>
        </select>';
    }
     ?>
    <input type="hidden" name="idTri" value="<?php echo $dataTraiter[0]['idProduits']; ?>">
    <button class="edit" type="submit" name="button">Modifier</button>

  </form>
</article>
