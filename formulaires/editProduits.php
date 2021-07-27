<?php
// Tri des types de produits pour l'affichage dans le formulaire.
$requetteSQL = "SELECT `idTypeProduits`, `type` FROM `typePorduits`";
include 'gestionDB/readDB.php';
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$typage = $data->fetchAll();
// Tri du produit à modifier.
$requetteSQL = "SELECT `idProduits`, `nom`, `idTypeProduit`, `stock`, `prixUnitaire` FROM `Produits` WHERE `idProduits` =".$idTri;
include 'gestionDB/readDB.php';
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataTraiter = $data->fetchAll();
 ?>
<article class="">
  <h3>Modification du produit <?php echo $dataTraiter[0]['nom']; ?></h3>
  <form class="" action="formulaires/edit/produits.php" method="post" enctype="multipart/form-data">
    <label for="typeName">Produit :</label>
    <input class="sizeInpute"  id="typeName" type="text" name="nom" value="<?php echo $dataTraiter[0]['nom']; ?>">
    <label for="type">Type de produit</label>
    <select id="type" class="" name="idTypeProduit">
      <?php
      foreach ($typage as $key) {
        if ($key['idTypeProduits'] == $dataTraiter[0]['idTypeProduit']) {
        echo '<option value="'.$key['idTypeProduits'].'" selected>'.$key['type'].'</option>';
      } else {
        echo '<option value="'.$key['idTypeProduits'].'">'.$key['type'].'</option>';
      }
      }
       ?>
    </select>
    <label for="prix">Prix unitaire (€ TTC) :<?php echo $dataTraiter[0]['prixUnitaire']; ?> €</label>
    <input class="sizeInpute"  id="prix" type="number" step="0.01" name="prixUnitaire" value="<?php echo $dataTraiter[0]['prixUnitaire']; ?>"> €
    <label for="dispo">En stock ?</label>
    <select id="dispo" class="" name="stock">
      <option value="1" selected>Oui</option>
      <option value="0">Non</option>
    </select>
    <input type="hidden" name="idTri" value="<?php echo $dataTraiter[0]['idProduits']; ?>">
    <button class="edit" type="submit" name="button">Modifier</button>
  </form>
</article>
