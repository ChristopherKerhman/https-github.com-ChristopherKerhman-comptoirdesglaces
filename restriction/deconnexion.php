<form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
  <input type="hidden" name="dc" value="true">
  <button type="submit" name="button">Deconnexion</button>
</form>

<?php
if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['dc']) ) {
  session_destroy();
}
 ?>
