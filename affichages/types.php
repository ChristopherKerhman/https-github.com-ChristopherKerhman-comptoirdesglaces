<article class="">
<h3>Les types déjà enregisté ?</h3>
<table>
  <tr>
    <td>ID type</td>
    <td>Description</td>
    <td>Verrouiller</td>
    <td>Modifier</td>
    <td>Supprimer</td>
    <td>Déverouiller</td>
  </tr>
  <?php
  // Lecture de la table Types afin de créer un rappel des types de produits existant.
  include 'gestionDB/identifiantDB.php';
  $requetteSQL = "SELECT `idTypeProduits`, `type`, `lock` FROM `typePorduits`";
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  // Affichage des éléments de la liste.
  if (empty($dataTraiter)) {
    echo 'Aucun type enregistré.';
  } else {
    foreach ($dataTraiter as $key) {
      if ($key['lock'] == 1) {
        echo '<tr>
            <td>'.$key['idTypeProduits'].'</td>
            <td>'.$key['type'].'</td>
            <td>Oui</td>
            <td>
                <button class="desactiver" type="submit" name="button" title="Modifier '.$key['type'].' peut entrainer des soucis sur le menu.">Locker</button>
            </td>
            <td>
                <button class="desactiver" type="submit" name="button" title="supprimer '.$key['type'].' peut entrainer une panne sur le menu.">Locker</button>
            </td>
            <td>
            <form class="" action="formulaires/edit/deLocktype.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="idTypeProduits" value="'.$key['idTypeProduits'].'">
              <button class="edit" type="submit" name="button" title="Modifier '.$key['type'].' peut entrainer des soucis sur le menu.">Déverouiller</button>
            </form>
            </td>
          </tr>';
      } else {
        echo '<tr>
            <td>'.$key['idTypeProduits'].'</td>
            <td>'.$key['type'].'</td>
            <td>Non</td>
            <td>
              <form class="" action="formulaires/edit/type.php" method="post" enctype="multipart/form-data">
                <input class="sizeInpute" type="text" name="type" value="'.$key['type'].'">
                <input type="hidden" name="idTypeProduits" value="'.$key['idTypeProduits'].'">
                <button class="edit" type="submit" name="button" title="Modifier '.$key['type'].' peut entrainer des soucis sur le menu.">Modifier</button>
              </form>
            </td>
            <td>
              <form class="" action="formulaires/del/type.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idTypeProduits" value="'.$key['idTypeProduits'].'">
                <button class="del" type="submit" name="button" title="supprimer '.$key['type'].' peut entrainer une panne sur le menu.">Effacer</button>
              </form>
            </td>
            <td>
            <form class="" action="formulaires/edit/Locktype.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="idTypeProduits" value="'.$key['idTypeProduits'].'">
              <button class="edit" type="submit" name="button" title="Modifier '.$key['type'].' peut entrainer des soucis sur le menu.">Verouiller</button>
            </form>
            </td>
            </td>
          </tr>';

      }
    }
  }
   ?>
</table>
</article>
