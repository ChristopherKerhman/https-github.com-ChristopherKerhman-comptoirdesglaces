<div id="TOKEN">
<h3>Générer un token de commande pour le client</h3>

  <form class="" action="formulaires/record/newCommande.php" method="post">
    <input class="sizeInpute" type="hidden" name="tokenCommande" :value="jeton">
    <label for="ntable">Numéro de table ?</label>
    <select class="sizeInpute" id="ntable" name="numeroTable">
      <option value="1">Table n°1</option>
      <option value="2">Table n°2</option>
      <option value="3">Table n°3</option>
      <option value="4">Table n°4</option>
      <option value="5">Table n°5</option>
      <option value="6">Table n°6</option>
      <option value="7">Table n°7</option>
      <option value="8">Table n°8</option>
    </select>
    <button type="button" name="button" v-on:click="generateurToken">Token</button>
      {{jeton}}
    <button v-if="jeton != ''" class="record" type="submit" name="button">Ouvrir la commande</button>
  </form>
</div>

<script type="text/javascript">
const TOKEN = Vue.createApp({
  data () {
    return {
      jeton: ''
    }
  },
  methods: {
    generateurToken () {
      //Chaine de caractère pour créer le token
    const ALPHA = '@abcdefghijklmnopqrstuvwxyz0123456789'
    const NUM = '0123456789abcdefghijklmnopqrstuvwxyz@'
    let rand = '0'
    let code = []
    let a = 0
    // Création du token de 6 caractères max.
    for (let i = 0; i < 3; i++) {
      rand =  Math.floor(Math.random()* ALPHA.length)
      code.push(ALPHA[rand])
      rand =  Math.floor(Math.random()* NUM.length)
      code.push(NUM[rand])
    }
    this.jeton = code.join('')
    }
  }
})
TOKEN.mount('#TOKEN')
</script>
