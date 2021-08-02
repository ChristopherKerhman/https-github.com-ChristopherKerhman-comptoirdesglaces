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
  <h3>Commande en cours :</h3>
    <p>
      Section à venir.
    </p>
</article>
        <?php
  if ((isset($_SESSION['role'])) && ($_SESSION['role'] == 2) ) {
    include 'affichages/users.php' ;
  }
  ?>
</div>
  <div class="page">
    <h3>Commande à préparer</h3>
    <p>
      Section à venir.
    </p>
    <?php
  if ((isset($_SESSION['role'])) && ($_SESSION['role'] == 2) ) {
      include 'formulaires/creationUsers.php';
  }
  ?></div>
</section>

<?php include 'footer.php'; ?>
