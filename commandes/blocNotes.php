<?php $token = $_SESSION['login']; ?>
<a class="lienNav" href="prendreCommande.php">Retour menu</a>
<div id="blocNote">
  <div v-if="panier.length > 0">
    <p>Nombre d'article enregistré : {{nbrArticle}} - Total {{totalPanier}} €</p>
      <button v-if="" class="recCreateur" type="button" name="button" v-on:click="del">Vider panier</button>
      <form action="../formulaires/record/recordCommande.php" method="post">
        <select class="sizeInpute" name="numeroTable">
          <option value="1">Table n°1</option>
          <option value="2">Table n°2</option>
          <option value="3">Table n°3</option>
          <option value="4">Table n°4</option>
          <option value="5">Table n°5</option>
          <option value="6">Table n°6</option>
          <option value="7">Table n°7</option>
          <option value="8">Table n°8</option>
        </select>
        <input type="hidden" name="tokenCommande" :value="token">
        <input type="hidden" name="totalPanier" :value="totalPanier">
        <input type="hidden" name="nbrArticle" :value="nbrArticle">
        <input type="hidden" name="panier" :value="panier">
        <button class="recCreateur" type="submit" name="button" v-on:click="del">Envoyer la commande</button>
      </form>
  </div>
</div>
<div id="LISTE">
  <ul v-if="panier.length > 0">
    <li v-for="article in panier" v-bind:key="article">{{article}} €</li>
    <li id="total">Total panier : {{total}} €</li>
  </ul>
</div>
<script type="text/javascript">
const blocNote = Vue.createApp(
{
  data() {
    return {
      panier: [],
      nbrArticle: 0,
      totalPanier: 0,
      token: '<?php echo $token ?>'
    }
  },
mounted () {
  this.nbrArticle = sessionStorage.length
  this.totalPanier = parseFloat(localStorage.getItem('prix'))
  this.totalPanier = this.totalPanier.toFixed(2)
  let sac
  for (var i = 0; i < sessionStorage.length; i++) {
   sac = sessionStorage.getItem(sessionStorage.key(i))
   this.panier.push(sac)
 }
},
methods: {
  del () {
    localStorage.clear()
    sessionStorage.clear()
    location.reload()
  }
  }
})
blocNote.mount('#blocNote');
const LISTE = Vue.createApp(
  {
  data() {
    return {
      panier: [],
      total: 0
    }
  },
  mounted () {
    let sac
    for (var i = 0; i < sessionStorage.length; i++) {
     sac = sessionStorage.getItem(sessionStorage.key(i))
     this.panier.push(sac)
   }
   this.total = parseFloat(localStorage.getItem('prix'))
   this.total = this.total.toFixed(2)
 }
})
LISTE.mount('#LISTE');
</script>
