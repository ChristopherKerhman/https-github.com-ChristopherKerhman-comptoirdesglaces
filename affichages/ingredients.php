<?php
$requetteSQL = "SELECT * FROM `recette` INNER JOIN `Produits` INNER JOIN `typePorduits` WHERE `recette`.`idProduitRecette` = `Produits`.`idProduits` AND `typePorduits`.`idTypeProduits` = `Produits`.`idTypeProduit` AND `recette`.`idCompositionRecette` = :id";
include 'gestionDB/readDB.php';
$data->bindParam(':id', $idComposition);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataTraiter = $data->fetchAll();
 ?>
<ul>
  <?php
    if (!$dataTraiter) {
      echo '<li>Pas d\'ingrédient dans cette recette.</li>';
    } else {
      foreach ($dataTraiter as $key) {
        echo '<li class="listeConteneur"><form class="" action="formulaires/del/ingredient.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idRecette" value="'.$key['idRecette'].'">
            <button class="del" type="submit" name="button">Effacer</button>
        </form> '.$key['nombre'].' '.utf8_encode($key['type']).' '.utf8_encode($key['nom']).'</li>';
      }
    }
   ?>
</ul>
