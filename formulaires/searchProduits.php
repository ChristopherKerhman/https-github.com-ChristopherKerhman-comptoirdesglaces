<?php
include 'gestionDB/identifiantDB.php';
include 'functionsFormulaire.php';
 ?>
<h3>Recherche</h3>
<p>Recherche d'un produit par son nom, pour modification, suppression ou changement d'état du stock :</p>
<form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
 <input class="sizeInpute" type="text" name="search" size="30" placeholder="Recherche d'un produits par son nom">
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
  $requetteSQL = "SELECT `idProduits`, `nom`, `idTypeProduit`, `stock`, `prixUnitaire`, `typePorduits`.`type` FROM `Produits` INNER JOIN typePorduits WHERE `nom` LIKE :search AND `Produits`.`idTypeProduit` = `typePorduits`.`idTypeProduits`";
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
        <td>'.$key['nom'].'</td>
        <td>'.$key['type'].'</td>
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
