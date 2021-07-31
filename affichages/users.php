<h3>Les utilisateurs de la carte des menus</h3>
<ul>


<?php
$requetteSQL = "SELECT `idUser`, `speudo`, `motDePasse`, `autorisation`, `dateCreation`, `valide` FROM `users`";
include 'gestionDB/readDB.php';
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataTraiter = $data->fetchAll();
if (empty($dataTraiter)) {
  echo "Pas d'utilisateurs dans la table de données.";
} else {
  foreach ($dataTraiter as $key) {
    if ($key['valide']) {
      $valide = 'Valide';
    } else {
      $valide = 'Non valide';
    }
    if ($key['autorisation'] > 1) {
      $role = 'Administrateur';
    } elseif ($key['autorisation'] > 0) {
      $role = 'Utilisateur';
    } else {
      $role = 'Sans rôle';
    }
    echo '<li>'.$key['speudo'].' '.$valide.' '.$role.' </li>';
  }
}
 ?>
</ul>
