<template>
    <navComponent />
    <div class="container" id="container">
<div class="form-container sign-up-container">
    <form id="f1"  v-on:submit.prevent="signup">
        <h1>Créer Un Compte</h1>
        <span>Veuillez entrer vos informations</span>
        <input v-model="username" type="text" placeholder="Username" />
        <input v-model="email" type="email" placeholder="Email" />
        <input v-model="mdp" type="password" placeholder="Mot de passe" />
        <button class="signup">S'inscrire</button>
    </form>
</div>
<div class="form-container sign-in-container">
    <form id="f2" v-on:submit.prevent="login" action="#">
        <h1 class="connection">Se Connecter</h1>
        <span>Veuillez entrer vos informations</span>
        <input v-model="email" type="email" placeholder="Email" />
        <input v-model="mdp" type="password" placeholder="Mot de passe" />

        <button>Se Connecter</button>
    </form>
</div>
<div class="overlay-container">
    <div class="overlay">
        <div class="overlay-panel overlay-left">
            <h1>Bonjour organisateur</h1>
            <p>Vous avez déja un compte ? </p>
            <button @click="showModal = false" class="ghost" id="signIn">Se Connecter</button>
        </div>
        <div class="overlay-panel overlay-right">
            <h1>Rebonjour, organisateur!</h1>
            <p>Vous n’ avez pas  un compte ?</p>
            <button class="ghost" id="signUp">S'inscrire</button>
        </div>
    </div>
</div>
</div>
    <footer-component />
</template>
<script>
// import { router } from 'vue-router'
import router from '@/router/index'
import cookie from 'vue-cookies'
import footerComponent from '@/components/footerComponent.vue'
import navComponent from '@/components/navComponent.vue'

export default {
  name: 'loginView',
  data () {
    return {
      email: '',
      mdp: '',
      username: ''
    }
  },
  components: {
    footerComponent, navComponent
  },
  methods: {
    async signup () {
      const data = {
        username: this.username,
        email: this.email,
        mdp: this.mdp
      }
      if (data.username.length && data.email.length && data.mdp.length) {
        const res = await fetch('http://localhost:3000/organisateur/register', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data)
        })
        const json = await res.json()
        if (json) {
          await router.push('/DbOrganisateur')
        }
      }
    },
    async login () {
      const data = {
        email: this.email,
        mdp: this.mdp
      }
      if (data.email.length && data.mdp.length) {
        const res = await fetch('http://localhost:3000/organisateur/login', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data)
        })
        const id = await res.json()
        if (typeof (id) === 'number') {
          cookie.set('id', id)
          await router.push('/formOrganisateur')
        } else {
          console.log('sorry, something WRONG with this user :(')
        }
      }
    }
  },

  mounted () {
    const signUpButton = document.getElementById('signUp')
    const signInButton = document.getElementById('signIn')
    const container = document.getElementById('container')

    signUpButton.addEventListener('click', () => {
      container.classList.add('right-panel-active')
    })

    signInButton.addEventListener('click', () => {
      container.classList.remove('right-panel-active')
    })
  }
}
</script>

<style lang="scss" scoped>
body {
/* background: url('../assets/lo');
background-size: cover;
background-repeat: no-repeat; */
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
height: 100vh;
margin: 0;
}
h1 {
font-weight: bold;
margin: 0;
}

h2 {
text-align: center;
}

p {
font-size: 14px;
font-weight: 100;
line-height: 20px;
letter-spacing: 0.5px;
margin: 20px 0 30px;
}

span {
font-size: 12px;
margin-bottom: 15%;
}

a {
color: #333;
font-size: 14px;
text-decoration: none;
margin: 15px 0;
}

button {
border-radius: 5px;
border: 1px solid #db8ade;
background-color:#db8ade;
color: #FFFFFF;
font-size: 12px;
font-weight: bold;
padding: 12px 45px;
letter-spacing: 1px;
text-transform: uppercase;
transition: transform 80ms ease-in;
margin-top: 9%;
}
.signup{
border-radius: 5px;
border: 1px solid #F1B8A2;
background-color:#F1B8A2;
color: #FFFFFF;
font-size: 12px;
margin-top: 5%;
font-weight: bold;
padding: 12px 45px;
letter-spacing: 1px;
text-transform: uppercase;
transition: transform 80ms ease-in;
}

button:active {
transform: scale(0.95);
}

button:focus , input:focus {
outline: none;
}

button.ghost {
background-color: transparent;
border-color: #FFFFFF;
}

form {
background-color: #FFFFFF;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
padding: 0 50px;
height: 100%;
text-align: center;
}

input {
background-color: transparent;
border: none;
border-bottom: 1px solid rgb(0, 0, 0);
padding: 12px 15px;
margin: 8px 0;
width: 90%;
}

.container {
margin-top: 10%;
background-color: #fff;
border-radius: 10px;
box-shadow: 0 14px 28px rgba(0,0,0,0.25),
        0 10px 10px rgba(0,0,0,0.22);
position: relative;
overflow: hidden;
width: 768px;
width: 90%;
height: 500px;
}

.form-container {
position: absolute;
top: 0;
height: 100%;
transition: all 0.6s ease-in-out;
}

.sign-in-container {
left: 0;
width: 50%;
z-index: 2;
}

.container.right-panel-active .sign-in-container {
transform: translateX(100%);
}

.sign-up-container {
left: 0;
width: 50%;
opacity: 0;
z-index: 1;
}

.container.right-panel-active .sign-up-container {
transform: translateX(100%);
opacity: 1;
z-index: 5;
animation: show 0.6s;
}

@keyframes show {
0%, 49.99% {
    opacity: 0;
    z-index: 1;
}

50%, 100% {
    opacity: 1;
    z-index: 5;
}
}

.overlay-container {
position: absolute;
top: 0;
left: 50%;
width: 50%;
height: 100%;
overflow: hidden;
transition: transform 0.6s ease-in-out;
z-index: 100;
}

.container.right-panel-active .overlay-container{
transform: translateX(-100%);
}

.overlay {
background: #FF416C;
background: linear-gradient(to left, #db8ade, #F1B8A2);
background-repeat: no-repeat;
background-size: cover;
background-position: 0 0;
color: #FFFFFF;
position: relative;
left: -100%;
height: 100%;
width: 200%;
transform: translateX(0);
transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
transform: translateX(50%);
}

.overlay-panel {
position: absolute;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
padding: 0 40px;
text-align: center;
top: 0;
height: 100%;
width: 50%;
transform: translateX(0);
transition: transform 0.6s ease-in-out;
}

.overlay-left {
transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
transform: translateX(0);
}

.overlay-right {
right: 0;
transform: translateX(0);
}

.container.right-panel-active .overlay-right {
transform: translateX(20%);
}

.social-container {
margin: 20px 0;
}

.social-container a {
border: 1px solid #DDDDDD;
border-radius: 50%;
display: inline-flex;
justify-content: center;
align-items: center;
margin: 0 5px;
height: 40px;
width: 40px;
}

footer {
background-color: #222;
color: #fff;
font-size: 14px;
bottom: 0;
position: fixed;
left: 0;
right: 0;
text-align: center;
z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}
@media (max-width : 768px){
  .container {
    margin-top: 15%;
    height: 90vh;
  }
  h1 {
    // font-weight:normal;
    font-size:1.3em;
  }
p{
  margin-top: 12px;
}
button {
    padding: 12px 17px;
    font-weight: 500;
    font-size: 10px;
}
input {
  font-size: 12px;
}
.signup {
    padding: 12px 17px;
}
}
@media (max-width : 600px) {
  .container {
    margin-top: 20%;
    height: 90vh;
  }
  span{
    margin-bottom: 7%;
  }
  .sign-up-container {
    top:0;
    height: 100%;
  }
.overlay-container{top: 1px;
left: 50%;
overflow: visible;
height: 100%;
width: 58%;
}
.overlay-panel{
  position: absolute;
  top: 0;
  height: 100%;
  width: 50%;
}
.overlay-left{
  display: block;
  transform: translateX(-80%);
}
.overlay-right{
  top:0%;
  height: 100%;
  width: 100%;
}
.overlay{
  left: -100%;
  height: 46%;
  width: 200%;
}
form {
  margin-top: 60%;
  padding: 0;
  justify-self: center;
  width: 190%;
}
.container.right-panel-active .overlay-right {
transform: translateX(80%);
}
.container.right-panel-active .overlay-left {
  // display: block;
  margin-top: 4%;
  width: 55%;
transform: translateX(40%);
}
.container.right-panel-active .sign-in-container {
transform: translateX(210%);
}
.container.right-panel-active .sign-up-container {
transform: translateX(0%);
}

// .container.right-panel-active2 #f2{
//   display: none;
// }
// .container.right-panel-active2 #f2{
//   display: flex;
// }
}
</style>
