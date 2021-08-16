<article class="">
<h3>Les compositions déjà créer</h3>
<table>
  <tr>
    <td>Id Composition</td>
    <td>Nom</td>
    <td>Prix</td>
    <td>Images</td>
    <td>Modifier</td>
    <td>Créer Recette</td>
  </tr>
<?php
  include 'gestionDB/identifiantDB.php';
  $requetteSQL = "SELECT * FROM `composition`";
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  if (empty($dataTraiter)) {
    echo 'Aucune composition enregistrées.';
  } else {
    foreach ($dataTraiter as $key) {
      echo  '
      <tr>
        <td>'.$key['idComposition'].'</td>
        <td>'.$key['nomComposition'].'</td>
        <td>'.$key['prixComposition'].' €</td>
        <td><img src="compositionImages/'.$key['image'].'" alt="coupes '.$key['nomComposition'].'" width=80%></td>
        <td>
        <form class="" action="editComposition.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="image" value="'.$key['image'].'">
          <input type="hidden" name="idComposition" value="'.$key['idComposition'].'">
          <button class="edit" type="submit" name="button">Modifier</button>
        </form>
        </td>
        <td>
        <form class="" action="creationRecette.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="prixComposition" value="'.$key['prixComposition'].'">
          <input type="hidden" name="nomComposition" value="'.$key['nomComposition'].'">
          <input type="hidden" name="idComposition" value="'.$key['idComposition'].'">
          <input type="hidden" name="image" value="'.$key['image'].'">
          <button class="edit" type="submit" name="button">Créer</button>
        </form>
        </td>
      </tr>';
    }
  }
?>
</table>

</article>
