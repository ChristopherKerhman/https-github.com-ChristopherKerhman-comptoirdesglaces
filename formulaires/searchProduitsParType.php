<?php
include 'gestionDB/identifiantDB.php';
include 'functionsFormulaire.php';
 ?>
<h3>Tri par type de Produits</h3>
<form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  <label for="type">Type de produit</label>
  <select class="sizeInpute" id="type" class="" name="search">
    <option value="0" selected>-</option>
    <?php
    $requetteSQL = "SELECT `idTypeProduits`, `type` FROM `typePorduits`";
    include 'gestionDB/readDB.php';
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataTraiter = $data->fetchAll();
    foreach ($dataTraiter as $key) {
      echo '<option value="'.$key['idTypeProduits'].'">'.utf8_encode($key['type']).'</option>';
    }
     ?>
  </select>
 <button class="search" type="submit" name="button">Rechercher</button>
</form>
<table>
  <tr>
    <td>ID produit</td>
    <td>nom du produits</td>
    <td>Type</td>
    <td>Prix unitaire</td>
    <td>stock</td>
    <td>Modifier</td>
    <td>Supprimer</td>
  </tr>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $search = filter($_POST['search']);
  $_SESSION['search'] = $search;
  $requetteSQL = "SELECT `idProduits`, `nom`, `idTypeProduit`, `stock`, `prixUnitaire`, `typePorduits`.`type` FROM `Produits` INNER JOIN typePorduits WHERE `typePorduits`.`idTypeProduits` = :search AND `Produits`.`idTypeProduit` = `typePorduits`.`idTypeProduits`";
  include 'gestionDB/readDB.php';
  $data->bindParam(':search', $search);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();

  foreach ($dataTraiter as $key) {
    if ($key['stock'] == 1) {
      $stockage = 'En stock';
    } else {
      $stockage = 'En rupture';
    }
    echo   '<tr>
        <td>'.$key['idProduits'].'</td>
        <td>'.utf8_encode($key['nom']).'</td>
        <td>'.utf8_encode($key['type']).'</td>
        <td>'.$key['prixUnitaire'].' €</td>
        <td>'.$stockage.'</td>
        <td>
          <form class="" action="editProduits.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="idProduits" value="'.$key['idProduits'].'">
          <button class="edit" type="submit" name="button">Modifier</button>
          </form>
        </td>
        <td>
        <form class="" action="formulaires/del/produits.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="idTri" value="'.$key['idProduits'].'">
          <button class="del" type="submit" name="button">Effacer</button>
        </form>
        </td>
      </tr>';
  }
} else {
  echo 'Pas encore de données à rechercher.';
}
 ?>
</table>
</article>
