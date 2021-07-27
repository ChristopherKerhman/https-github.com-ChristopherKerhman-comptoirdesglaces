<?php include 'header.php' ?>
<section>
<?php
include 'formulaires/functionsFormulaire.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idTri = filter($_POST['idProduits']);
  include 'formulaires/editProduits.php';
} else {
  header('location: index.php');
}
?>
</section>
<?php include 'footer.php' ?>
