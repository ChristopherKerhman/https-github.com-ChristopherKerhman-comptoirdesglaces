<div class="conteneurFlexC">
  <h4>Les commandes ouvertes</h4>
<table>
  <tr>
    <td>N° commande</td>
    <td>token</td>
    <td>N° table</td>
    <td>Statut commande</td>
    <td>Effacer ?</td>
  </tr>
<?php
$requetteSQL = "SELECT `id`, `tokenCommande`, `totalPanier`, `nbrArticle`, `panier`, `numeroTable` FROM `commandesClients` WHERE `valide` = 1";
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  if(empty($dataTraiter)) {
    echo 'aucune commande ouverte';
  } else {
    foreach ($dataTraiter as $key) {
        $valide = 'Commande non rempli par le client.';
      echo '
      <tr>
        <td>'.$key['id'].'</td>
        <td>'.$key['tokenCommande'].'</td>
        <td>'.$key['numeroTable'].'</td>
        <td>'.$valide.'</td>
        <td>
        <form action="formulaires/del/commandeNonValider.php" method="post">
            <input type="hidden" name="id" value="'.$key['id'].'">
            <button class="del" type="submit" name="button">Effacer</button>
        </form>
        </td>
      </tr>
      ';
    }
  }
 ?>
</table>
</div>
