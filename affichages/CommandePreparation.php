<div class="conteneurFlexC">
<table>
  <tr>
    <td>N° commande</td>
    <td>token</td>
    <td>N° table</td>
    <td>Commande</td>
    <td>Total à payer</td>
    <td>Statut commande</td>
    <td>Effacer ?</td>
  </tr>
<?php
//Paramètre de brassage du panier
$number = array("0", "2", "3", "4", "5", "6", "7", "8", "9");
$requetteSQL = "SELECT `id`, `tokenCommande`, `totalPanier`, `nbrArticle`, `panier`, `numeroTable` FROM `commandesClients` WHERE `valide` = 2";
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  if(empty($dataTraiter)) {
    echo 'aucune commande ouverte';
  } else {
    foreach ($dataTraiter as $key) {
        $valide = 'Commande rempli par le client.';
        $panier = $key['panier'];
        $panierStage1 = str_replace($number, "<br />", $panier);
        $panierStage2 = str_replace (".", "", $panierStage1);
        $panier = str_replace(",", "", $panierStage2);
      echo '
      <tr>
        <td>'.$key['id'].'</td>
        <td>'.$key['tokenCommande'].'</td>
        <td>'.$key['numeroTable'].'</td>
        <td>'.$panier.'</td>
        <td>'.$key['totalPanier'].' €</td>
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
