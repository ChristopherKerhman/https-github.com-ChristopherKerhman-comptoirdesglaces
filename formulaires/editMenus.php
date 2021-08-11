<?php
$requetteSQL = "SELECT `idNavigator`, `lien`, `description`, `acreditation`, `illustration` FROM `navigator` WHERE `acreditation` >= 3";
include 'gestionDB/readDB.php';
$data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataMenu = $data->fetchAll();
  foreach ($dataMenu as $key) {
    if ($key['acreditation'] == 3){

   echo '<form class="" action="formulaires/edit/menus.php" method="post">
       <label for="online">'.utf8_encode($key['description']).'</label>
       <select class="sizeInpute" name="accreditation">
         <option value="3" selected>En ligne</option>
         <option value="4">Hors ligne</option>
       </select>
       <input type="hidden" name="idNavigator" value="'.$key['idNavigator'].'">
     <button class="edit" type="submit" name="button">Modifier</button>
   </form>';
   } else {
     echo '<form class="" action="formulaires/edit/menus.php" method="post">
         <label for="online">'.$key['description'].'</label>
         <select class="sizeInpute" name="accreditation">
           <option value="3">En ligne</option>
           <option value="4" selected>Hors ligne</option>
         </select>
         <input type="hidden" name="idNavigator" value="'.$key['idNavigator'].'">
       <button class="edit" type="submit" name="button">Modifier</button>
     </form>';
        }
  }
 ?>
