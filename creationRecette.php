<?php
$autorisation = 2;
  include 'header.php';
  include 'gestionDB/identifiantDB.php';
  include 'formulaires/functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $image = filter($_POST['image']);
  $idComposition = filter($_POST['idComposition']);
  $_SESSION['idComposition'] = $idComposition;
  $nomComposition = filter($_POST['nomComposition']);
  $_SESSION['nomComposition'] = $nomComposition;
  $prixComposition = filter($_POST['prixComposition']);
  $_SESSION['prixComposition'] = $prixComposition;
} else {
     $idComposition = $_SESSION['idComposition'];
     $nomComposition = $_SESSION['nomComposition'];
     $prixComposition = $_SESSION['prixComposition'];
}
 ?>
<section>
<?php
echo '<h3>'.$nomComposition.' '.$prixComposition.' €</h3>'
 ?>
 <h3>Liste ingrédient :</h3>
 <?php
  include 'affichages/ingredients.php';
  ?>
 <article>
   <h3>Recherche Produits</h3>
 <p>Recherche d'un produit par son nom (utiliser %lettre% pour filtrer) :
 </p>
 <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
   <input class="sizeInpute" type="text" name="search" size="30" placeholder="Recherche d'un produits par son nom">
   <input type="hidden" name="prixComposition" value="<?php echo $prixComposition; ?>">
   <input type="hidden" name="nomComposition" value="<?php echo $nomComposition; ?>">
   <input type="hidden" name="idComposition" value="<?php echo $idComposition; ?>">
    <button class="search" type="submit" name="button">Rechercher</button>
 </form>
 <table>
  <tr>
    <td>ID produit</td>
    <td>nom du produits</td>
    <td>Type</td>
    <td>Nombre</td>
    <td>Ajouter</td>
  </tr>
 <?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!isset($_POST['search'])) {
    echo 'Pas de données à rechercher.';
  } else {
  $search = filter($_POST['search']);
  }
  $requetteSQL = "SELECT `idProduits`, `nom`, `idTypeProduit`, `stock`, `prixUnitaire`, `typePorduits`.`type` FROM `Produits` INNER JOIN typePorduits WHERE `nom` LIKE :search AND `Produits`.`idTypeProduit` = `typePorduits`.`idTypeProduits`";
  include 'gestionDB/readDB.php';
  $data->bindParam(':search', $search);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();

  foreach ($dataTraiter as $key) {
    if ($key['stock'] == 1) {
      $stockage = 'En stock';
    } else {
      $stockage = 'En rupture';
    }
    echo   '<tr>
        <td>'.$key['idProduits'].'</td>
        <td>'.$key['nom'].'</td>
        <td>'.$key['type'].'</td>
        <form class="" action="formulaires/record/addIngredientRecette.php" method="post" enctype="multipart/form-data">
        <td>
        <select class="sizeInpute" name="nombre">
           <option value="1" selected>Une</option>
           <option value="2">Deux</option>
           <option value="3">Trois</option>
         </select>
         </td>
        <td>
          <input type="hidden" name="idProduits" value="'.$key['idProduits'].'">
          <input type="hidden" name="idComposition" value="'.$idComposition.'">
          <button class="edit" type="submit" name="button">Ajouter</button>
        </td>
        </form>
      </tr>';
  }
 } else {
  echo 'Pas encore de données à rechercher.';
 }
 ?>
 </table>
 </article>
</section>
<?php include 'footer.php'; ?>
