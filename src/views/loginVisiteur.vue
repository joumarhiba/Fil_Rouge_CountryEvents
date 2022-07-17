<template>
    <navComponent />
    <section class="forms-section">
  <h1 class="section-title">Espace de Visiteur</h1>
  <i>Veuillez entrer vos informations </i>
  <div class="main-section">
      <div class="left-img">
    <img border="0" src="../assets/animation.gif" alt="">
    <!-- <img src="../assets/login-visiteur.jpg" alt=""> -->
  </div>
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        Login
        <span class="underline"></span>
      </button>
      <form @submit.prevent="login" class="form form-login">
        <fieldset>
          <legend>Please, enter your email and password for login.</legend>
          <div class="input-block">
            <label for="login-email">E-mail</label>
            <input id="login-email" v-model="email" type="email" required>
          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
            <input id="login-password" v-model="mdp" type="password" required>
          </div>
        </fieldset>
        <button type="submit" class="btn-login">Login</button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">
        Sign Up
        <span class="underline"></span>
      </button>
      <form class="form form-signup" v-on:submit.prevent="signup" action="#">
        <fieldset>
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <label for="signup-email">Nom d'utilisateur</label>
            <input id="signup-email" v-model="username" type="text" required>
          </div>
          <div class="input-block">
            <label for="signup-password">Email</label>
            <input id="signup-password" type="email" v-model="email" required>
          </div>
          <div class="input-block">
            <label for="signup-password-confirm"> Mot de passe</label>
            <input id="signup-password-confirm" type="password" v-model="mdp" required>
          </div>
        </fieldset>
        <button type="submit" class="btn-signup">S'inscrire</button>
      </form>
    </div>
  </div>
  </div>
</section>
<footerComponent />
</template>

<script>
import router from '@/router/index'
import cookie from 'vue-cookies'
import navComponent from '@/components/navComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
export default {
  name: 'loginVisiteur',
  data () {
    return {
      username: '',
      mdp: '',
      email: ''
    }
  },
  components: { navComponent, footerComponent },
  methods: {
    async signup () {
      const data = {
        username: this.username,
        email: this.email,
        mdp: this.mdp
      }
      if (data.username.length && data.email.length && data.mdp.length) {
        await fetch('http://localhost:3000/visiteur/register', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
            // 'Accept': 'application/json'
          },
          body: JSON.stringify(data)
        })
        await router.push('/')
      }
    },
    async login () {
      const data = {
        email: this.email,
        mdp: this.mdp
      }
      if (data.email.length && data.mdp.length) {
        const response = await fetch('http://localhost:3000/visiteur/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        })
        const idV = await response.json()
        if (typeof (idV) === 'number') {
          cookie.set('idV', idV)
          console.log(idV)
          await router.push('/')
        } else {
          console.log('sorry, something WRONG with this user :(')
        }
      } else {
        console.log('elseeeeeeeee')
      }
    }
  },
  mounted () {
    const switchers = [...document.querySelectorAll('.switcher')]
    switchers.forEach(item => {
      item.addEventListener('click', function () {
        switchers.forEach(item => item.parentElement.classList.remove('is-active'))
        this.parentElement.classList.add('is-active')
      })
    })
  }
}
</script>

<style scoped>
input {
    outline : none
}
.forms-section {
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
}
.left-img {
  margin-top: 110px;
}
.section-title {
font-size: 32px;
letter-spacing: 1px;
margin-bottom: 1%;
color: rgb(0, 0, 0);
}

.main-section {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.forms {
/* background-image: url(../assets/blurry2.svg); */
/* width: 70%; */
/* background-repeat: no-repeat; */
padding: 2%;
display: flex;
margin-top: 50px;
justify-content: flex-end;
float: right;
}

.form-wrapper {
animation: hideLayer .3s ease-out forwards;
}

.form-wrapper.is-active {
animation: showLayer .3s ease-in forwards;
}

@keyframes showLayer {
50% {
    z-index: 1;
}
100% {
    z-index: 1;
}
}

@keyframes hideLayer {
0% {
    z-index: 1;
}
49.999% {
    z-index: 1;
}
}

.switcher {
position: relative;
cursor: pointer;
display: block;
margin-right: auto;
margin-left: auto;
padding: 0;
text-transform: uppercase;
font-family: inherit;
font-size: 16px;
letter-spacing: .5px;
color: #000;
background-color: transparent;
border: none;
outline: none;
transform: translateX(0);
transition: all .3s ease-out;
}

.form-wrapper.is-active .switcher-login {
color: rgb(0, 0, 0);
transform: translateX(90px);
}

.form-wrapper.is-active .switcher-signup {
color: rgb(0, 0, 0);
transform: translateX(-90px);
}

.underline {
position: absolute;
bottom: -5px;
left: 0;
overflow: hidden;
pointer-events: none;
width: 100%;
height: 2px;
}

.underline::before {
content: '';
position: absolute;
top: 0;
left: inherit;
display: block;
width: inherit;
height: inherit;
background-color: currentColor;
transition: transform .2s ease-out;
}

.switcher-login .underline::before {
transform: translateX(101%);
}

.switcher-signup .underline::before {
transform: translateX(-101%);
}

.form-wrapper.is-active .underline::before {
transform: translateX(0);
}

.form {
overflow: hidden;
min-width: 180%;
margin: 0;
margin-top: 70px;
height: 420px;
padding: 30px 25px;
border-radius: 5px;
transform-origin: top;
box-shadow: #63636e33 0px 7px 29px 0px;
}

.form-login {
animation: hideLogin .3s ease-out forwards;
}

.form-wrapper.is-active .form-login {
  border: 1px solid #63636e6c;
animation: showLogin .3s ease-in forwards;
}

@keyframes showLogin {
0% {
    background: #ffffff;
    transform: translate(40%, 10px);
}
50% {
    transform: translate(0, 0);
}
100% {
    background-color: #fff;
    transform: translate(35%, -20px);
}
}

@keyframes hideLogin {
0% {
    background-color: #fff;
    transform: translate(35%, -20px);
}
50% {
    transform: translate(0, 0);
}
100% {
    background: #010101;
    transform: translate(30%, 10px);
}
}

.form-signup {
animation: hideSignup .3s ease-out forwards;
}

.form-wrapper.is-active .form-signup {
    border: 1px solid #63636e6c;
animation: showSignup .3s ease-in forwards;
}

@keyframes showSignup {
0% {
    background: #F1B8A2;
    transform: translate(-40%, 10px) scaleY(.8);
}
50% {
    transform: translate(0, 0) scaleY(.8);
}
100% {
    background-color: #fff;
    transform: translate(-35%, -27px) scaleY(1);
}
}

@keyframes hideSignup {
0% {
    background-color: #fff;
    transform: translate(-35%, -20px) scaleY(1);
}
50% {
    transform: translate(0, 0) scaleY(.8);
}
100% {
    background: #000000;
    transform: translate(-32%, 28px) scaleY(1);
}
}

.form fieldset {
position: relative;
opacity: 0;
margin: 0;
padding: 0;
border: 0;
transition: all .3s ease-out;
}

.form-login fieldset {
transform: translateX(-50%);
}

.form-signup fieldset {
transform: translateX(50%);
}

.form-wrapper.is-active fieldset {
opacity: 1;
transform: translateX(0);
transition: opacity .4s ease-in, transform .35s ease-in;
}

.form legend {
position: absolute;
overflow: hidden;
width: 1px;
height: 1px;
clip: rect(0 0 0 0);
}

.input-block {
margin-bottom: 20px;
}

.input-block label {
font-size: 14px;
color: rgba(0, 0, 0, 0.678);
}

.input-block input {
display: block;
width: 100%;
margin-top: 8px;
padding-right: 15px;
padding-left: 15px;
font-size: 16px;
line-height: 40px;
color: #000000;
background: transparent;
border: 1px solid #db8ade59;
border-radius: 2px;
}

.form [type='submit'] {
opacity: 0;
display: block;
min-width: 100px;
margin: 10px auto 10px;
font-size: 18px;
line-height: 40px;
border-radius: 5px;
transition: all .3s ease-out;
}

.form-wrapper.is-active .form [type='submit'] {
opacity: 1;
transform: translateX(0);
transition: all .4s ease-in;
}

.btn-login {
color: #db8ade;
border: 1px solid #db8ade;
background: transparent;
transform: translateX(-30%);
}

.btn-signup {
color: #db8ade;
background: transparent;
border: 1px solid #db8ade;
box-shadow: none;
}
@media (max-width: 1025px) {
  .main-section {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.forms {
  margin-left: -190px;
}
img {
  width: 70%;
}
}
@media screen and (max-width : 790px) {
  img {
    display: none;
  }

}
</style>
