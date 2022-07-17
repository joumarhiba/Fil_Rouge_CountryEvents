<template>
<navComponent />
  <div class="home">
    <section class="main-banner" id="top">
        <div class="container">
          <div class="f-part">
            <div class="col-lg-6 align-self-center">
              <div class="header-text">
                <h6>Explorez nos événements et participez à des moments uniques.</h6>
                <h2>Faites le plein <em>D'événements!</em></h2>
                <div class="main-button-gradient">
                  <div class="scroll-to-section">
                    <router-link to="/loginOrganisateur">Créer un événements</router-link>
                       <router-link class="connection" to="/loginVisiteur" >
                    Se connecter
                    </router-link>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image">
                <!-- <img src="../assets/banner-right-image.png" alt=""> -->
                <img src="../assets/banner-bg.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>
  </div>
   <!-- *** search display **** -->
   <!-- <input type="search" name="search" id="search" v-model="searchKey" placeholder="Rechercher ..." autocomplete="off" @keyup.enter="filteredList()"> -->
   <!-- *** Coming Events ***-->
   <div class="coming-events">
        <!-- panier section  -->
            <div v-if="eventInPanier.length > 0" class="shopping-cart" id="shopping-cart">
              <section class="panier-header">
                <h2>Vos réservations</h2>
              <router-link to="/validationR"><span><i class="fa-solid fa-check validate"></i>
              </span></router-link>
              </section>
              <div class="item-group" v-for="event in eventInPanier" :key="event.idV">
              <div class="item">
                <div class="img-container">
                  <img :src="event.img" alt="">
                </div>
                <div class="item-description">
                  <h5>{{ event.nomEvent }}</h5>
                  <p>{{event.tarif}} Dhs</p>
                  <h6 v-if="event.qte > 1">{{event.qte}} Tickets</h6>
                  <h6 v-else>{{event.qte}} Ticket</h6>
                </div>
                <div class="item-quantity">
                  <div class="cart-icons">
                    <button @click="plusOne(event.idPanier, event.qte, event.tarif)">
                      <i class="fa fa-plus"></i>
                    </button><span>&nbsp;&nbsp;</span>
                    <button @click="minusOne(event.idPanier, event.qte, event.tarif)">
                      <i class="fa fa-minus"></i>
                    </button><span>&nbsp;&nbsp;</span>
                    <button @click="deleteFromPanier(event.idPanier)">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                </div>
              </div>
              </div>
            </div>
            <div>
            </div>
            </div>
        <div class="container">
            <div class="events">
                <!-- <div class="event-item"> -->
                    <div class="event-item" v-for="event in getAllEvents" :key="event.idV">
                        <div class="thumb">
                            <img :src="event.img" alt="">
                        </div>
                        <div class="down-content">
                            <h4>{{event.nomEvent}}</h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> {{ event.dateDebut }}</li>
                                <li><i class="fa fa-map-marker"></i>{{event.villeEvent}}</li>
                                <li><i class="fa fa-money" aria-hidden="true"></i> {{event.tarif}} Dhs</li>
                                <!-- <button>Acheter</button> -->
                                <span  @click="addToPanier(event.idEvent, event.qte, event.tarif)" class="acheter"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                  <router-link :to="{ name:'Details' , params: { idEvent: event.idEvent } }">
                                  <span>
                                  <!-- <button type="submit"> -->
                                  <i class="fa fa-info-circle" aria-hidden="true"> </i>
                                  </span>
                                  </router-link>
                                  <!-- <router-link to="/Details"></router-link> -->
                            </ul>
                        </div>
                    </div>
                <!-- </div> -->
                <!-- <div class="col-lg-4">
                    <div class="event-item">
                        <div class="thumb">
                            <a href="event-details.html"><img src="../assets/event-02.jpg" alt=""></a>
                        </div>
                        <div class="down-content">
                            <a href="event-details.html"><h4>Title of event</h4></a>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> date & time</li>
                                <li><i class="fa fa-map-marker"></i>Ville......</li>
                                <li><i class="fa fa-money" aria-hidden="true"></i> Prix Dhs</li>
                                <button @click="addToPanier" class="acheter" href="#contact-section">Acheter</button>
                            </ul>
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
    <!-- process section -->
    <section>
      <div class="section-titles">
        <h2>Le process à suivre</h2>
        <h6>Pour garantir vos réservations</h6>
      </div>
      <div class="process-details">
        <div class="process-item">
          <lottie-player class="process-icon-1" src="https://assets9.lottiefiles.com/packages/lf20_aypatsuy.json"  background="transparent"  speed="0.8"  style="width: 70px; height: 70px;"  loop  autoplay></lottie-player>
        <h5>Créer un compte visiteur</h5>
      </div>
      <div class="process-item">
        <img class="process-icon" style="width: 70px; height: 70px;" src="../assets/anim.gif" alt="">
        <h5>Trouver l'événement que vous intéresse</h5>
      </div>
      <div class="process-item">
        <lottie-player class="addtobag" src="https://assets9.lottiefiles.com/datafiles/AIsM4esbWsv66pIoQY50D28AOAKo6uuinnQ7ZCqx/AE_JSON/44-AddToCart.json"  background="transparent"  speed="1"  style="width: 270px; height: 270px;"  loop  autoplay></lottie-player>
        <h5>Effectuer la réservation</h5>
      </div>
      <div class="process-item">
        <lottie-player class="process-icon" src="https://assets4.lottiefiles.com/private_files/lf30_2SAX1s.json"  background="transparent"  speed="1"  style="width: 70px; height: 70px;"  loop  autoplay></lottie-player>
        <h5>Valider la réservation</h5>
      </div>
      </div>
    </section>
<!-- description section -->
<section class="desc-bg row">
  <div >
        <img class="theatre" src="../assets/login-visiteur.jpg" alt="">
    </div>
    <div class="col-lg-6">
        <div class="desc">
          <h4>Qui Somme Nous ?</h4>
          <p>
          CountryEvents est  une plateforme de billetterie qui vous aide à gérer, organiser et faire la promotion de vos événements incroyable pour  le divertissement,et l'apprentissage. Créez une page d'événement et commencez à vendre des billets en 5 minutes. <br> <br>CountryEvents vous permet de réserver en quelques clics et en toute sécurité vos places aux concerts, spectacles, films, festivals et pièces de théâtre de votre choix. Il ne vous reste plus qu’à découvrir !</p> </div>
    </div>
</section>
<footerComponent />
</template>
<script>
// @ is an alias to /src
import { onMounted, ref } from 'vue'
// import { computed } from 'vue'
import cookie from 'vue-cookies'
import navComponent from '@/components/navComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import { reactive } from '@vue/reactivity'

export default {
  name: 'HomeView',
  components: {
    navComponent, footerComponent
  },
  // data () {
  //   return {
  //     // panier: [],
  //     AllEvents: [],
  //     data: {
  //       idVisiteur: cookie.get('id')
  //     }
  //   }
  // },

  setup () {
    const data = ref({
      idVisiteur: cookie.get('idV')
    })

    const searchKey = ref('')
    const dataPanier = ref({
      idEvent: cookie.get('idEvent')
    })
    const panier = reactive([])
    const idVisiteur = data.value.idVisiteur
    const getAllEvents = reactive([])

    const filteredList = async () => {
      // return getAllEvents.filter((event) => {
      //   return event.nomEvent.toLowerCase().includes(searchKey.value.toLowerCase())
      // })
      await fetch('http://localhost:3000/event/search', {
        method: 'POST',
        headers: { 'Content-type': 'application/json' },
        body: JSON.stringify(searchKey.value)
      })
      console.log(searchKey.value)
      getAllEvents.filter((element) => {
        console.log(element)
        const result = element.nomEvent.includes(searchKey.value)
        return result
      })
    }
    onMounted(() => {
      filteredList()
    })

    const AllEvents = async () => {
      await fetch('http://localhost:3000/event/all', {
        method: 'POST',
        headers: { 'Content-type': 'application/json' },
        body: JSON.stringify(data.value)
      })
        .then((res) => res.json())
        .then((result) => {
          if (result.data.length !== 0) {
            console.log(result.data)
            result.data.forEach((element) => {
              getAllEvents.push(element)
            })
          }
        })
    }
    onMounted(() => {
      AllEvents()
    })
    // get all events added to the cart
    const eventInPanier = reactive([])
    const AllEventsReserved = async () => {
      await fetch('http://localhost:3000/panier/all', {
        method: 'POST',
        headers: { 'Content-type': 'application/json' },
        body: JSON.stringify(data.value)
      })
        .then((res) => res.json())
        .then((result) => {
          if (result.data.length !== 0) {
            console.log(result.data)
            result.data.forEach((element) => {
              eventInPanier.push(element)
            })
          }
        })
    }
    onMounted(() => {
      AllEventsReserved()
    })

    const plusOne = async (idPanier, qte, tarif) => {
      await fetch('http://localhost:3000/panier/plusOne', {
        method: 'POST',
        headers: { 'content-type': 'application/json' },
        body: JSON.stringify({ idPanier: idPanier, qte: qte, tarif: tarif })
      })
        .then(res => res.json()).then(result => console.log(result))
      // if(res) {
      //   qte = qte++
      // }
    }

    const minusOne = async (idPanier, qte, tarif) => {
      await fetch('http://localhost:3000/panier/minusOne', {
        method: 'POST',
        headers: { 'content-type': 'application/json' },
        body: JSON.stringify({ idPanier: idPanier, qte: qte, tarif: tarif })
      })
        .then(res => res.json()).then(result => console.log(result))
    }
    const oneEvent = async (idEvent) => {
      console.log(idEvent)
    }

    const deleteFromPanier = async (idPanier) => {
      const res = await fetch('http://localhost:3000/panier/deleteEvent', {
        method: 'POST',
        headers: { 'content-type': 'appication/json' },
        body: JSON.stringify({ idPanier: idPanier })
      })
      const json = await res.json()
      console.log(json)

      for (let i = 0; i < eventInPanier.length; i++) {
        if (eventInPanier[i].idPanier === idPanier) {
          eventInPanier.splice(i, 1)
        }
      }
    }

    const addToPanier = async (idEvent, qte, tarif) => {
      await fetch('http://localhost:3000/panier/add', {
        method: 'POST',
        headers: { 'content-type': 'application/json' },
        body: JSON.stringify({ idEvent: idEvent, idVisiteur: idVisiteur, qte: qte, tarif: tarif })
      })
        .then((res) => res.json())
        // .then((result) => {
        //   if (result.data.length !== 0) {
        //     console.log(result.data)
        //     result.data.forEach((element) => {
        //       eventInPanier.push(element)
        //     })
        //   }
        // })
        .catch((err) => {
          alert('Veuillez vous créer un compte premièrement')
          console.log(err)
        })
    }
    return {
      getAllEvents, addToPanier, dataPanier, deleteFromPanier, eventInPanier, AllEventsReserved, panier, oneEvent, plusOne, minusOne, filteredList, searchKey
    }
  }
  // methods: {
  //   addToPanier () {
  //     // check if an event is already exist
  //     // for(let i=0; i>this.panier.length; i++){
  //     //   if(this.panier[i].id === event.id){
  //     //     return this.panier[i].qte++
  //     //   }
  //     // }
  //     this.panier.push({
  //       // id: event.id,
  //       // titre: event.titre,
  //       // tarif: event.tarif,
  //       qte: 1
  //     })
  //   },
  //   // ajouter un param event a la méthode
  //   plusOne () {
  //     // event.qte++
  //   },
  //   panierRemoveItem (id) {
  //   //   this.$delete(this.panier, id)
  //   },
  //   minusOne (event, id) {
  //     // if (event.qte == 1){
  //     //   this.panierRemoveItem(id)
  //     // }else{
  //     //   event.qte --
  //     // }
  //   }
  // }
}
</script>
<style lang="scss" scoped>
h4 { color: #ffffff;
 font-family: 'Droid serif', serif;
  font-size: 36px;
 font-weight: 400;
 font-style: italic;
line-height: 44px;
  text-align: center;
  margin-bottom: 6%;
 }

.home {
  display: flex;
  justify-content: center;
}
.section-titles {
  font-family: 'Droid serif', serif;
  font-size: 36px;
 font-weight: 400;
 font-style: italic;
line-height: 44px;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.process-details {
  // width: 100%;
  margin: 4% 0;
  display: grid;
  grid-template-columns: repeat(auto-fill, 370px);
  grid-gap: 15px;
  justify-content: center;
}
.process-item {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  }

.process-icon {
  margin-bottom: 16px;
}

.process-icon-1 {
  margin-top: 45%;
  margin-bottom: 70px;
}
.addtobag {
  margin: 0;
  margin-top: 19%;
}
.f-part {
  display: flex;
  flex-direction: row;
}
.events {
  display: inline-flex;
      flex-wrap: wrap;
      width: 110%;
      row-gap: 10px;
}
.panier-header {
  display: flex;
  flex-wrap: nowrap;
    justify-content: space-around;
    align-items: center;
    margin: 2% 0;
}
.validate {
  color: black;
  border-radius: 50%;
  border: 1px solid #000;
  padding: 47%;
  &:hover{
     border: 1px solid #fff;
     background-color: #fff;
     transition: all .4s;
     transform: scale(1.1);
   }
}
.shopping-cart {
    transition: 0.4s ease;
    background: #eee;
    // background: linear-gradient(to left, #db8aDe,#f6bf9f);
    color: white;
    padding: 1.4rem;
    border-radius: 4px;
    width: 60%;
    box-shadow: 0 1px 6px rgba(51, 51, 51, 0.25);
    height: 100%;
    align-self: center;
    margin: 2.7rem 0 ;
}
 h2 {
      margin-bottom: 1rem;
      color: #333;
      text-align: center;
    }
.item-group {
  max-height: 400px;
  overflow-y: scroll;
  overflow-x: hidden;
  padding-right: 6px;
    width: 100%;
}
.event-row {
  display: grid;
    grid-template-columns: repeat(4, 490px);
  grid-gap: 10px;
  grid-auto-rows: minmax(100px, auto);
  }
.test {
  display: flex;
  flex-direction: row;
}

.item {
    margin-bottom: 2.4rem;
    position: relative;
    display: grid;
    grid-template-columns: 64px 1fr;
    grid-template-rows: 79% 49%;
}
.item::after{
      content: "";
      position: absolute;
      height: 1px;
      width: 100%;
      background: rgba(85, 85, 85, 0.2);
      left: 50%;
      bottom: -22px;
      transform: translateX(-50%);
    }
.item-description {
  color: #000;
      display: flex;
      align-items: flex-start;
      margin-left: 10px;
      flex-direction: column;
}
.img-container {
      display: flex;
      align-items: flex-start;
    }
      .img-container img {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        transform: scale(1);
      }
.item-quantity {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: 10px;
    align-content: flex-end;
    justify-content: center;
    align-items: flex-start;

          h6 {
            color: #333;
          }
          .cart-icons {
            display: flex;
            justify-content: space-between;
            width: 30%;
            margin-left: 10px;
            }
    }
 .item-quantity button {
   margin-top: 3%;
   padding: 31%;
   border: 1px solid black;
   background-color: transparent;
   border-radius: 50%;
   height: auto;
   &:hover{
     border: 1px solid #fff;
     background-color: #fff;
     transition: all .4s;
     transform: scale(1.1);
   }
  }
a{
  list-style: none;
}
button:focus{
  outline: none;
}
.main-button-gradient a {
  font-size: 13px;
  color: #fff;
  margin-left: 3%;
  background: rgba(219, 138, 222, 0.715);
  /* background: linear-gradient(-145deg, rgba(219,138,222,1) 0%, rgba(246,191,159,1) 100%); */
  padding: 12px 30px;
  display: inline-block;
  border-radius: 5px;
  font-weight: 500;
  text-transform: uppercase;
  transition: all .3s;
}
.main-button-gradient .connection{
  border :1px solid rgb(219, 138, 222);
  background-color: transparent;
  color: rgb(219, 138, 222);
}

.main-button-gradient a:hover {
  background: linear-gradient(-145deg, rgba(219,138,222,1) 0%, #f6bf9f 100%);
  opacity: 0.9;
    text-decoration: none;
}

.main-button-gradient .connection:hover {
  color: #fff;
  background: linear-gradient(-145deg, rgba(219,138,222,1) 0%, rgba(246,191,159,1) 100%);
  opacity: 0.9;
  text-decoration: none;
}

.text-button a {
  font-size: 14px;
  font-weight: 500;
  color: #dc8cdb;
  text-decoration: underline !important;
  transition: all .3s;
}

.text-button a:hover {
  opacity: 0.75;
}

section {
  margin-top: 100px;
}

section.main-banner {
  margin-top: 0px;
}

.main-banner {
  padding-top: 180px;
}

.main-banner .right-image {
  margin-left: 120px;
  position: relative;
  z-index: 2;
}

.main-banner .right-image img {
  position: relative;
  z-index: 2;
  width: 100%;
}

.main-banner .header-text h6 {
  position: relative;
  z-index: 2;
  font-size: 17px;
  font-weight: 500;
  text-transform: capitalize;
  color: #777777;;
}

.main-banner .header-text h2 {
  position: relative;
  z-index: 2;
  margin-top: 20px;
  font-size: 64px;
  color: #111111;
  font-weight: 900;
  line-height: 74px;
  margin-bottom: 40px;
}

.main-banner .header-text h2 em {
  font-style: normal;
  color: #dc8cdb;
}

.main-banner .main-button-gradient {
  position: relative;
  z-index: 2;
}
/*
----------------------------------
description
----------------------------------
 */
section .theatre{
  width: 21%;
  z-index: 1;
  position: absolute;
  margin-top: -4%;
  margin-left: -10%;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
  border-radius: 7%;
  transition: 0.3s all ease-in-out;
  &:hover {
    margin-top: -7px;
  }
}
// section .col-lg-6{
//   display: flex;
//   flex-direction: column;
//   justify-self:center;
//   justify-content: space-around;
// }
section .desc{
  color: #fff;
  padding:3% 3% 3% 27%;
  font-size:1.15em;
  line-height: 1.7em;
  background: #111111;
  border-radius: 25px;
  box-shadow: rgba(0, 0, 0, 0.15) 2.4px 2.4px 3.2px;
}

.desc-bg{
  display: flex;
  flex-direction: row;
    justify-content: center;
margin: 0;
margin-top: 100px;
}
/*
---------------------------------------------
Coming Events
---------------------------------------------
*/
.coming-events {
  display: flex;
  justify-content: center;
  padding: 20px 0px;
  width: 100%;
  position: relative;
}

.event-item{
  margin-right: 1%;
  transition:0.5s;
  &:hover {
  transform:scale(1.032, 1.032);}
}
.event-item .thumb img {
  width: 368px;
  overflow: hidden;
}

.event-item .down-content {
  background-color: #fff;
  padding: 30px;
}

.event-item .down-content h4 {
  font-size: 22px;
  font-weight: 700;
  color: #2a2a2a;
  margin-bottom: 25px;;
}

.event-item .down-content ul li {
  font-size: 14px;
  color: #2a2a2a;
  font-weight: 300;
  margin-bottom: 15px;;
}

.event-item .down-content ul span{
font-size: 20px;
  color: rgb(0, 0, 0);
  justify-self: center;
  transform: translateX(70px);
  border: none;
  padding: 14px;
  display: inline-block;
  border-radius: 50%;
  font-weight: 500;
  transition: all .3s;
}

.event-item .down-content ul li:last-child {
  margin-bottom: 0px;
}

.event-item .down-content ul li i {
  width: 20px;
  text-align: center;
  font-size: 18px;
  color: #858b93;
  display: inline-block;
}
/*
responsive
*/

body {
  overflow-x: hidden;
}

@media (max-width: 1205px) {
  section .desc {
  padding:4% 3% 3% 27%;
  width: 120%;
}
  .main-banner .right-image {
    margin-left: 60px;
  }
  .main-banner .header-text h2 {
    font-size: 62px;
  }

  section .theatre {
    width: 21%;
}
}

@media (max-width: 992px) {
  .events {
    display: inline-flex;
    flex-wrap: wrap;
    width: 110%;
}
  .main-banner .header-text h2 {
    font-size: 44px;
  }
  .main-banner .header-text {
    text-align: center;
    margin-bottom: 60px;
  }
  .main-banner .right-image {
    margin-left: 0px;
  }
  section  .theatre{
    width: 33%;
  margin-top: -5%;
  margin-left: 5%;
  }
  section .col-lg-6 .desc {
    width: 80%;
    margin-left: 10%;
  padding:3% 3% 3% 30%;
}
}

@media (max-width: 767px) {
  .f-part {
  display: flex;
  flex-direction: column;
}
  .events {
    display: inline-flex;
    flex-wrap: wrap;
    width: 100%;
}
  img {
    width: 50px;
    // margin-top: 4.4%;
    // margin-right: 40%;
  }
  .scroll-to-section
  .main-banner .header-text h2 {
    font-size: 37px;
  }
  .main-banner .header-text .main-button-gradient .scroll-to-section {
    display: flex;
    flex-direction: column;
    justify-items: center;
    align-items: center;
   }
   .main-banner .header-text .main-button-gradient .scroll-to-section a{
     margin-bottom: 9px;
     padding:13.5px;
   }
  .header-area .main-nav .nav li.has-sub ul.sub-menu {
    display: none;
  }

  /*
----------------------------------
description
----------------------------------
 */
section .theatre{
  width: 39%;
}
section .col-lg-6{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
}
section .desc{
  color: #fff;
  padding:20px;
  font-size:1em;
  line-height: 1.5em;
}

.desc-bg{
  margin: 0;
  // background-color: #db8ade;
  background-size: cover;
  width: 100%;
}
}

@media (max-width: 340px) {
  .main-banner .header-text h2 {
    font-size: 27px;
    line-height: 30px;
  }
  .main-banner .header-text h6 {
    font-size: 13px;
    width: 94%;
    text-align: center;
  }
}
</style>
