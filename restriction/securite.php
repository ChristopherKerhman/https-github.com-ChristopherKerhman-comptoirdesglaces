<?php
if ($autoristation >= $_SESSION['role']) {
  header('location: index.php');
}

 ?>
