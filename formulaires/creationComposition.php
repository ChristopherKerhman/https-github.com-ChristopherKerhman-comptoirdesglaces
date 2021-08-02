<?php
if ($_GET) {
  if (isset($_GET['error'])) {
    $message1 = $_GET['error'];
  }
  if (isset($_GET['error2'])) {
    $message2 = $_GET['error2'];
  }
}

 ?>

<article class="">
  <p> <?php if (isset($message1)) { echo $message1; } if(isset($message2)) { echo $message2; }   ?> </p>
  <form class="" action="formulaires/record/composition.php" method="post" enctype="multipart/form-data">
    <label for="nomC">Nom de votre composition :</label>
    <input id="nomC" class="sizeInpute" type="text" name="nomComposition" placeholder="Nom de votre composition">
    <label for="prixC">Prix de votre composition :</label>
    <input class="sizeInpute" id="prixC" type="number" step="0.01" name="prixComposition" placeholder="Prix de votre composition en €">
    <label for="imageC">Image de votre composition :</label>
    <input class="sizeInpute" id="imageC" type="file" name="image" accept="image/png, image/jpeg">
    <button class="rec" type="submit" name="button">Enregistrer</button>
  </form>
</article>
