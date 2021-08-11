<div class="conteneurFlexC">
<table>
  <tr>
    <td>N° commande</td>
    <td>token</td>
    <td>N° table</td>
    <td>Commande</td>
    <td>Total à payer</td>
    <td>Statut commande</td>
    <td>Date et heure</td>
    <td>Effacer</td>
    <td>Preparer</td>
  </tr>
<?php
//Paramètre de brassage du panier
$number = array("0", "2", "3", "4", "5", "6", "7", "8", "9");
$requetteSQL = "SELECT `id`, `tokenCommande`, `totalPanier`, `nbrArticle`, `panier`, `numeroTable`, `dateHeure` FROM `commandesClients` WHERE `valide` = 3";
  include 'gestionDB/readDB.php';
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  if(empty($dataTraiter)) {
    echo 'Aucune commande a preparer.';
  } else {
    foreach ($dataTraiter as $key) {
    // Permet de brasser la date dans le bon sens.
      $date = $key['dateHeure'];
      $year = substr($date,0,4);
      $month = substr($date,5,2);
      $day = substr($date,8,2);
      $hour = substr($date,11,2);
      $minute = substr($date,14,2);
      $dateHour = $day.'/'.$month.'/'.$year.' - '.$hour.' h '.$minute;
    // Fin du brassage.
        $valide = 'Commande en cours de préparation.';
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
        <td>'.$dateHour.'</td>
        <td>
        <form action="formulaires/del/commandeNonValider.php" method="post">
            <input type="hidden" name="id" value="'.$key['id'].'">
            <button class="del" type="submit" name="button">Effacer</button>
        </form>
        </td>
        <td>
        <form action="formulaires/edit/commandeLivrer.php" method="post">
            <input type="hidden" name="id" value="'.$key['id'].'">
            <button class="edit" type="submit" name="button">Commande préparé</button>
        </form>
        </td>
      </tr>
      ';
    }
  }
 ?>
</table>
</div>
