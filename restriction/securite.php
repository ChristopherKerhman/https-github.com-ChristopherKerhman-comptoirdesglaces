<?php
if ($autorisation > intval($_SESSION['role'])) {
  header('location: index.php');
}
 ?>
