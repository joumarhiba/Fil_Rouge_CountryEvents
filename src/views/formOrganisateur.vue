<template>
<nav-component />
  <section class="flex-box" v-if="data.idOrganisateur !== null">
    <div class="titles">
           <h1 class="form-title">Créer un événement</h1>
           <h6 class="form-sub-title">Entrer les détails de votre événement</h6>
  </div>
  <div class="logout">
  <log-out-button />
  </div>
  </section>
  <div v-if="data.idOrganisateur == null" class="centrer text-center my-5">
    <lottie-player class="animation" src="https://assets8.lottiefiles.com/packages/lf20_ia8jpabk.json"  background="transparent"  speed="1"  loop  autoplay></lottie-player>
    <h4 class="mb-3">Désolé... Aucun compte n'est trouvé</h4>
    <h5>Veuillez vous s'incrire ou se connecter premièrement</h5>
    <h5>pour pouvoir ajouté vos événements </h5>
    <router-link to="/">
          <button>Retour</button>
      </router-link>
  </div>
 <div v-else class="add-form">
  <form x v-on:submit.prevent="create">

       <div class="row">
          <div class="col-lg-6">
          <input v-model="data.nomEvent" type="text" class="champs" name="nomEvent" placeholder="Nom d'événement" autocomplete="off">

           <input v-model="data.typeEvent" type="text" class="champs" name="typeEvent" placeholder="Type d'événement" autocomplete="off">
          </div>

          <div class="col-lg-6">
          <input v-model="data.villeEvent" type="text" class="champs"  name="villeEvent" placeholder="Ville d'événement" autocomplete="off">

           <input v-model="data.dateDebut" type="datetime-local"  class="champs" name="dateDebut" placeholder="date et heure d'événement">
          </div>

          <div class="col-lg-6 ">
          <input v-model="data.nbMax" type="number" class="champs"  name="nbMax" placeholder="Nombre maximum de personnes" autocomplete="off">
          </div>
          <div class="col-lg-6 ">
           <input v-model="data.tarif" type="number" name="tarif" placeholder="Tarif" class="champs" autocomplete="off">
          </div>
          <label
              for="dropzone-file"
              class="
              "
            >
              <span class="d-flex-inline align-self-center justify-content-center">
                <svg
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                  stroke="currentColor"
                  stroke-width="2"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="css-i6dzq1"
                >
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
               <!-- <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_CsBVeR.json"  background="transparent"  speed="1"  style="width: 60px; height: 60px;"  loop  autoplay></lottie-player> -->
              </span>
              <input
                name="Image"
                id="dropzone-file"
                @change="fileSelected"
                type="file"
                class="d-none"
              />
            </label>
           <!-- <input type="file" @change="fileSelected" > -->
       </div>
       <div>
         <button class="submit">Créer</button>
       </div>
   </form>
 </div>
<footer-component />
</template>

<script>
// import { ref } from 'vue'
// import popupComponent from '@/components/modals/popupComponent.vue'
import cookie from 'vue-cookies'
import router from '@/router/index'
import NavComponent from '@/components/navComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import logOutButton from '@/components/logOutButton.vue'

export default {
  name: 'formOrganisateurView',
  components: { footerComponent, NavComponent, logOutButton },
  data () {
    return {
      fileSlct: null,
      // nomEvent: '',
      // villeEvent: '',
      // typeEvent: '',
      // dateDebut: '',
      // nbMax: '',
      // tarif: '',
      // img: '',

      data: {
        nomEvent: '',
        villeEvent: '',
        typeEvent: '',
        dateDebut: '',
        nbMax: '',
        img: '',
        tarif: '',
        result: '',
        idOrganisateur: cookie.get('id')
      }
    }
  },
  methods: {
    async create () {
      if (this.data.nomEvent.length > 0 && this.data.typeEvent.length > 0) {
        await fetch('http://localhost:3000/event/add', {
          method: 'POST',
          headers: { 'content-Type': 'application/json' },
          body: JSON.stringify(this.data)
        })
          .then((res) => res.json())
        // const json = await res.json()
        // if (json) {
        await router.push('/')
        // }
      } else {
        console.log('no fetch')

        // const res = await fetch('http://localhost:3000/event/add', {
        //   method: 'POST',
        //   body: JSON.stringify(this.data)
        // })
        // const json = await res.json()
        // console.log(json)
      }
    },
    fileSelected (event) {
      this.data.img = event.target.files[0].name
    }
    // createImage (file) {
    //   // var image = new Image()
    //   var reader = new FileReader()
    //   var vm = this

    //   reader.onload = (e) => {
    //     vm.image = e.target.result
    //   }
    //   reader.readAsDataURL(file)
    // }
  }
}

</script>

<style lang="scss" scoped>

h4 {
  color: black;
}
body {
display: flex;
justify-content: center;
align-items: stretch;
flex-direction: column;
height: 40vh;
margin: 0!important;
align-self: center;
}
.add-form {
  display:  flex;
  justify-content: center;
}
h1 {
  text-align: center;
    font-weight: 700;
    margin-bottom: 4.5%;
    margin-top: 9%;
    letter-spacing: 3px;
    border-left: 10px solid #f6bf9f;
    padding-left: 9px;
}
button {
  margin-top: 35%;
  font-size: 13px;
  color: #fff;
  justify-self: center;
  border: none;
  background: rgba(219, 138, 222, 0.715);
  padding: 10px 26px;
  display: inline-block;
  border-radius: 5px;
  font-weight: 500;
}
.animation {
  width: 200px;
  height: 200px;
  margin-bottom: 50px;
  margin-top: 8%;
}
.centrer {
  display: flex;
    margin-left: auto;
    margin-right: auto;
    flex-direction: column;
    align-items: center;
}

.titles{
margin-top: 10%;
display: flex;
align-content: space-around;
flex-direction: column;
align-items: center;
}

.form-title {
font-size: 28px;
font-weight: 500;
text-transform: capitalize;
color: #0c0c0c;;
}

.form-sub-title {
margin-top: 0;
font-size: 16px;
color: #111111;
font-weight: 400;
line-height: 40px;
margin-bottom: 2 0px;
}
.flex-box {
  display: flex;
  flex-direction:row;
  justify-content: space-evenly;
    align-content: flex-end;
    align-items: baseline;
    margin-top: 1px;
}
form {
// background-image: url(../assets/blurry2.svg);
// background-image: url(../assets/morestars.svg);
z-index: 0;
background-position-x: center;
background-size: cover;
background-repeat: no-repeat;
padding: 0%;
width:75%;
display: flex;
justify-content: center;
flex-direction: column;
justify-self: center;
height: 70vh;
margin: 0;
}
.champs{
position: relative;
z-index: 2;
opacity: .9;
width: 100%;
outline: none;
margin-right: 3%;
border: none;
padding: 2%;
border-radius: 5px;
margin-bottom: 3%;
background: #eee;
}
.champs:focus{
border: 1px solid #dc8cdb;
}
.submit{
  margin-top: 5%;
  border :1px solid rgb(219, 138, 222);
  background-color: transparent;
  color: rgb(219, 138, 222);
  padding: 1.5%;
  color: #fff;
  margin-left: 3%;
  background: rgba(219, 138, 222, 0.715);
}
.submit:hover {
  background: linear-gradient(-145deg, rgba(219,138,222,1) 0%, rgba(246,191,159,1) 100%);
  opacity: 0.88;
}
@media (max-width: 720px){
  .animation {
     width: 150px;
    height: 150px;
    margin-bottom: 50px;
    margin-top: 9%;
  }
  h4, h5 {
    font-size: 1rem;
  }
  button {
  font-size: 11px;
  padding: 8px 20px;
}
.flex-box {
  margin-top: 30px;
}
.submit {
  padding:2%;
  font-size: 1rem;
  margin-left: 3%;
}
}
@media (max-width: 520px) {
  .flex-box {
  margin-top: 80px;
  flex-direction: column;
  align-items: center;
}
}
</style>
