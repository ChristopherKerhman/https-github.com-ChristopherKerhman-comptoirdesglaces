<?php
$autorisation = 0;
include 'header.php'; ?>
<section class="deconnexion">
    <?php   if ((isset($_SESSION['identification'])) && (isset($_SESSION['valide']))) {
        include 'restriction/deconnexion.php';
      } else {
        include 'restriction/connexion.php';
      }
  ?>
</section>
<section class="conteneurFlex">
  <div class="page">
<article class="">
    <p>
      <?php
      if ((isset($_SESSION['role'])) && ($_SESSION['role'] == 1)) {
        include 'gestionCommandes/commandeClient.php';
        echo '<h3>Commande à préparer</h3>';
        include 'affichages/CommandeOuverte.php';
      }
       ?>
    </p>
</article>
        <?php
  if ((isset($_SESSION['role'])) && ($_SESSION['role'] == 2) ) {
    include 'affichages/users.php' ;
  }
  ?>
</div>
  <div class="page">
    <?php
  if ((isset($_SESSION['role'])) && ($_SESSION['role'] == 2) ) {
      include 'formulaires/creationUsers.php';
  }

  ?>
<div class="">
  <?php
  if ((isset($_SESSION['role'])) && ($_SESSION['role'] == 1) ) {
    include 'affichages/CommandePreparation.php';
    include 'affichages/CommandeServir.php';
  }
   ?>
</div>
</div>

</section>

<?php include 'footer.php'; ?>
