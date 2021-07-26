<?php
if ($_GET) {
  if (isset($_GET['error'])) {
    $message = $_GET['error'];
  }
  if (isset($_GET['sucess'])) {
    $message = $_GET['sucess'];
  }
}
 ?>
<article class="">
  <h3>Enregistrement d'un nouveau type de produits</h3>
  <form class="" action="formulaires/record/type.php" method="post" enctype="multipart/form-data">
    <label for="typeName">Type de produit :</label>
    <input  id="typeName" type="text" name="type" placeholder="Nouveau type de produit">
    <?php if (isset($_GET['error'])) {echo $message;} ?>
    <button type="submit" name="button">Enregistrer</button>
  </form>
  <?php if (isset($_GET['sucess'])) {echo $message;} ?>
</article>
