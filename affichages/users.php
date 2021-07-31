<h3>Les utilisateurs de la carte des menus</h3>
<ul class="listeVerticale">
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
    echo '<li class="listeConteneur">

        <form class="" action="formulaires/edit/editUser.php" method="post">
            <select class="sizeInpute" name="autorisation">
              <option value="0">Sans rôle</option>
              <option value="1">Utilisateur</option>
              <option value="2">Administrateur</option>
            </select>
            <select class="sizeInpute" name="valide">
              <option value="0">Non valide</option>
              <option value="1">Valide</option>
            </select>
            <input type="hidden" name="idUser" value="'.$key['idUser'].'">
          <button class="edit" type="submit" name="button">Modifier</button>
          </form> &nbsp;
          <form class="" action="formulaires/del/user.php" method="post">
            <input type="hidden" name="idUser" value="'.$key['idUser'].'">
            <button class="del" type="submit" name="button">Supprimer</button>
          </form>
          '.$key['speudo'].' '.$valide.' '.$role.' </li>';
  }
}
 ?>
</ul>
