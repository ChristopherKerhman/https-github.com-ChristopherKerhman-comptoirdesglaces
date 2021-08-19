<?php
session_start();
var_dump($_SESSION);
if (empty($_SESSION)) {
  $_SESSION['role'] = 0;
  $_SESSION['identification'] = false;
}
if (($_SESSION['role'] == 0) && (!$_SESSION['identification'])) {
      $requetteSQL= "SELECT `idNavigator`, `lien`, `description`, `acreditation` FROM `navigator` WHERE acreditation = 0 ORDER BY `idNavigator` ASC";
}
if (($_SESSION['role'] == 1) && ($_SESSION['identification'])) {
   $requetteSQL = "SELECT `idNavigator`, `lien`, `description`, `acreditation` FROM `navigator` WHERE acreditation >= 0 AND acreditation <=1 ORDER BY `idNavigator` ASC";
 }

if (($_SESSION['role'] == 2) && ($_SESSION['identification'])) {
   $requetteSQL = "SELECT `idNavigator`, `lien`, `description`, `acreditation` FROM `navigator` WHERE acreditation >= 1 AND acreditation <=2 ORDER BY `idNavigator` ASC";
 }

header("refresh: 60;");
 ?>
