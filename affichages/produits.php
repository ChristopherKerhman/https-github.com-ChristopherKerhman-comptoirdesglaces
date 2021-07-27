<article class="">
<h3>Les produits déjà enregisté ?</h3>
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

  // Lecture de la table Produits afin de créer un rappel des produits existant.
  include 'gestionDB/identifiantDB.php';
  $requetteSQL = "SELECT * FROM `Produits` INNER JOIN `typePorduits` WHERE `Produits`.`idTypeProduit` = `typePorduits`.`idTypeProduits` ORDER BY `Produits`.`idTypeProduit` DESC, `Produits`.`idProduits`ASC";
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  // Lecture de la table typePorduits
    $requetteSQL = "SELECT `idTypeProduits`, `type` FROM `typePorduits`";
    include 'gestionDB/readDB.php';
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $typage = $data->fetchAll();
  //Fin de lecture
  // Affichage des éléments de la liste.
  if (empty($dataTraiter)) {
    echo 'Aucun produit enregistré dans la table type de produit';
  } else {
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
  }
   ?>
</table>
</article>
