<?php
if ($_GET) {
  if (isset($_GET['error'])) {
    $message = $_GET['error'];
  }
  if (isset($_GET['sucess'])) {
    $message = $_GET['sucess'];
  }
}
include 'gestionDB/identifiantDB.php';
$requetteSQL = "SELECT `idTypeProduits`, `type` FROM `typePorduits`";
include 'gestionDB/readDB.php';
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataTraiter = $data->fetchAll();
 ?>
<article class="">
  <h3>Enregistrement d'un nouveau produits</h3>
  <form class="conteneurFlexC" action="formulaires/record/produits.php" method="post" enctype="multipart/form-data">
    <label for="typeName">Produit :</label>
    <input class="sizeInpute"  id="typeName" type="text" name="nom" placeholder="Nouveau produit">
    <?php if (isset($_GET['error'])) {echo $message;} ?>
    <label for="type">Type de produit</label>
    <select class="sizeInpute" id="type" class="" name="idTypeProduits">
      <?php
      foreach ($dataTraiter as $key) {
        echo '<option value="'.$key['idTypeProduits'].'">'.$key['type'].'</option>';
      }
       ?>
    </select>
    <label for="prix">Prix unitaire (€ TTC) :</label>
    <input class="sizeInpute"  id="prix" type="number" step="0.01" name="prixUnitaire" placeholder="prix unitaire à la vente en €">
    <label for="dispo">En stock ?</label>
    <select class="sizeInpute" id="dispo" class="" name="stock">
      <option value="1" selected>Oui</option>
      <option value="0">Non</option>
    </select>
    <label for="description">Composition du produit :</label>
    <textarea id="description" class="sizeInpute" name="description" rows="3" cols="40" placeholder="La composition de votre produit si nécessaire."></textarea>
    <button class="rec" type="submit" name="button">Enregistrer</button>
  </form>
  <?php if (isset($_GET['sucess'])) {echo $message;} ?>
</article>
