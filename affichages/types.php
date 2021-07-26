<article class="">
<h3>Les produits déjà enregisté ?</h3>
<table>
  <tr>
    <td>ID type</td>
    <td>Description</td>
    <td>Modifier</td>
    <td>Supprimer</td>
  </tr>
  <?php

  // Lecture de la table Produits afin de créer un rappel des types de produits existant.
  include 'gestionDB/identifiantDB.php';
  $requetteSQL = "SELECT `idTypeProduits`, `type` FROM `typePorduits`";
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  // Affichage des éléments de la liste.
  if (empty($dataTraiter)) {
    echo 'Aucun produit enregistré dans la table type de produit';
  } else {
    foreach ($dataTraiter as $key) {
      echo '<tr>
          <td>'.$key['idTypeProduits'].'</td>
          <td>'.$key['type'].'</td>
          <td>
            <form class="" action="formulaires/edit/type.php" method="post" enctype="multipart/form-data">
              <input type="text" name="type" value="'.$key['type'].'">
              <input type="hidden" name="idTypeProduits" value="'.$key['idTypeProduits'].'">
              <button type="submit" name="button">Modifier</button>
            </form>
          </td>
          <td>
            <form class="" action="formulaires/del/type.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="idTypeProduits" value="'.$key['idTypeProduits'].'">
              <button type="submit" name="button">Effacer</button>
            </form>
          </td>
        </tr>';
    }
  }
   ?>
</table>
</article>
