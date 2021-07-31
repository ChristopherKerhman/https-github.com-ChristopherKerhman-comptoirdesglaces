<?php
if(isset($_GET['error'])) {
  $message = $_GET['error'];
}
 ?>



<h3>Enregistrer un nouvelle utilisateurs du back-office ?</h3>
<?php if(!empty($message)) {echo "<strong>{$message}</strong>";} ?>
<form class="pageCol" action="formulaires/record/user.php" method="post" enctype="multipart/form-data">
<div class="pageRow">
  <label for="speudoU">Speudonynme utilisateur :</label>
  <input id="speudoU" class="sizeInpute size30" type="text" name="speudo" placeholder="speudonyme">
</div>
<div class="pageRow" id="app1">
  <label for="mdp">Mot de passe :</label>
    <input class="sizeInpute" type="txt" name="motDePasse" value="construct" v-model="construct"><a class="boxe" v-on:click="randomPS">Rand</a>
</div>
<div class="pageRow">
  <label for="role">Role de l'utilisateur  :</label>
  <select class="sizeInpute" name="autorisation">
    <option value="0">Sans rôle</option>
    <option value="1">Utilisateur</option>
    <option value="2">Administrateur</option>
  </select>
</div>
<button class="rec" type="submit" name="button">Enregistrer</button>
</form>
<script>
// Application MDP en vueJS
  const app1 = Vue.createApp({
    data () {
      return {
         ALPHAUp: ['A', 'B', 'C', 'D','E','F','G','H','I', 'J','K', 'L', 'M','N','O', 'P', 'Q', 'R', 'S', 'T','U','V','W','X','Y','Z'],
         ALPHAmin: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'w', 'x', 'y', 'z'],
         NUM: ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
         CP:['@', '&', '!', '?', '$'],
        construct: ''
      }
    },
    methods: {
      randomPS () {
        this.construct = ''
    for (let i = 0; i < 8; i++) {
    const K = Math.random()
    if (K < 0.25) {
     this.construct = this.ALPHAUp[Math.floor(Math.random()* this.ALPHAUp.length)] + this.construct;
    }
      if (K < 0.5) {
      this.construct = this.ALPHAmin[Math.floor(Math.random()* this.ALPHAmin.length)] + this.construct
        }
       if (K < 0.75) {
        this.construct = this.NUM[Math.floor(Math.random()* this.NUM.length)] + this.construct
       }
        if (K > 0.75) {
         this.construct = this.CP[Math.floor(Math.random()* this.CP.length)] + this.construct
      }
    }
  }
}
})
  app1.mount('#app1');
</script>
