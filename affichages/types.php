<article class="">
<h3>Les produits déjà enregisté ?</h3>
<ul>
  <?php
  // Lecture de la table Produits afin de créer un rappel des types de produits existant.
  include 'gestionDB/identifiantDB.php';
  $requetteSQL = "SELECT `idTypeProduits`, `type` FROM `typePorduits`";
  include 'gestionDB/readDB.php';
  // Affichage des éléments de la liste.
  if (empty($dataTraiter)) {
    echo 'Aucun produit enregistré dans la table type de produit';
  } else {
    foreach ($dataTraiter as $key) {
      echo '<li>'.$key['type'].'</li>';
    }
  }
   ?>
</ul>
</article>
