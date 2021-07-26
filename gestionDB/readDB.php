<?php
// Permet de créer une lecture de la DB.
try {

  $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $data = $conn->prepare($requetteSQL);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
} catch(PDOException $e) {
 echo "Error: " . $e->getMessage();
}
 ?>
