<?php
$autorisation = 1;
  include 'header.php';
  $requetteSQL = "SELECT `idProduits`, `nom` FROM `Produits` WHERE `idTypeProduit`= 29 AND `stock`= 1";
  include '../gestionDB/readDB.php';
  $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataTraiter = $data->fetchAll();
    $creme = json_encode($dataTraiter);
  $requetteSQL = "SELECT `idProduits`, `nom` FROM `Produits` WHERE `idTypeProduit`= 30 AND `stock`= 1";
  include '../gestionDB/readDB.php';
  $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataTraiter = $data->fetchAll();
    $sorbet = json_encode($dataTraiter);
  $requetteSQL = "SELECT `idProduits`, `nom` FROM `Produits` WHERE `idTypeProduit`= 33 AND `stock`= 1";
  include '../gestionDB/readDB.php';
  $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataTraiter = $data->fetchAll();
    $sup = json_encode($dataTraiter);
 ?>
 <article>

  <h3>Créateur de coupe</h3>
<div id="boule1" >
  <h4 class="center">Liste de votre coupe :</h4>
    <ul class="ulFooter">
    <li class="liCoupe" v-for="compo in coupe" v-bind:key="compo">{{compo}}</li>
    <li class="liCoupe">prix de la coupe {{totalBoules}} boules <strong> {{prix}} €</strong></li>
  </ul>
  <strong v-if="coupe.length > 0" v-on:click="supprimer(compo)">Supprimer la coupe ?</strong>
  <article id="selectionBoule">
      <button class="choixCreateur" v-if="coupe.length === 1" type="button" name="button" v-for="choix in nBoules" v-bind:key="choix" v-on:click="choixNBoules(choix.nBoule)">{{choix.nBoule}} boules - {{choix.prix}} €</button>
    <div v-if="coupe.length < totalBoules" class="flexRows">
      <div>
        <h3>Crème glacée</h3>
          <button class="creme" type="button" name="button" v-for="boule in creme" v-bind:key="boule" v-on:click="creationCreme(boule.nom)">{{boule.nom}}</button>
      </div>
      <div>
        <h3>Sorbet</h3>
    <button  class="sorbet" type="button" name="button" v-for="boule in sorbet" v-bind:key="boule" v-on:click="creationSorbet(boule.nom)">{{boule.nom}}</button>
      </div>
    </div>
    <div class="flexCol">
      <div v-if="coupe.length > 0">
        <h3>Supplément</h3>
    <button  class="sup" type="button" name="button" v-for="boule in sup" v-bind:key="boule" v-on:click="supplements(boule.nom)">{{boule.nom}}</button>
      </div>
      <div class="center">
        <button v-if="coupe.length >= totalBoules && choixCoupe" class="recCreateur" type="button" name="button" v-on:click="rec">Ajouter</button>
      </div>
    </div>
  </article>
</div>
</article>
 <?php
 include 'footer.php';
  ?>
  <script type="text/javascript">
      const boule1 = Vue.createApp({
        data () {
          return {
            nBoules: [
              {id: 1, nBoule: 1, prix: 2.90 },
              {id: 2, nBoule: 2, prix: 4.30 },
              {id: 3, nBoule: 3, prix: 5.60 },
              {id: 4, nBoule: 4, prix: 7.00 },
              {id: 5, nBoule: 5, prix: 8.50 }
             ],
            totalBoules: 0,
            choixCoupe: false,
            coupe: ['Coupe createur'],
            prix: 0,
            panier: [],
            total: 0,
            selection: '',
            creme: <?php echo $creme; ?>,
            sorbet: <?php echo $sorbet; ?>,
            sup: <?php echo $sup; ?>

          }
        },
        methods: {
          supprimer () {
            location.reload(true)
          },
          choixNBoules (choixCreateur) {
            this.totalBoules = choixCreateur
            let param = this.nBoules[choixCreateur - 1]
            this.prix = param['prix']
            this.totalBoules = param['nBoule']
            this.choixCoupe = true
          },
          creationSorbet (nom) {
            this.coupe.push('Sorbet '+nom)
        },
          creationCreme (nom) {
            this.coupe.push('Crème Glacée '+nom)
          },
          supplements (nom) {
            this.coupe.push('Supplément '+nom)
            this.prix +=1
          },
          rec () {
            const KEY = Math.floor(Math.random() * (10000000 - 1 + 1 )) + 1
            this.coupe.push(this.prix)
            sessionStorage.setItem(KEY, this.coupe)
            // Mise à jour du prix du panier
            if (localStorage.getItem('prix') == null) {
              localStorage.setItem('prix', this.prix)
            } else {
              this.total = parseFloat(localStorage.getItem('prix'))
              this.total = this.prix + this.total
              localStorage.setItem('prix', this.total)
            }
            location.reload()
          }
        }
      })

      boule1.mount('#boule1');
  </script>