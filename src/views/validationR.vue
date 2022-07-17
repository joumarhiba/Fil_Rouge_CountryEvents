<template>
<nav-component />
<section>
  <div class="flex-box">
    <h1>Les réservations validées</h1>
    <div class="logout">
  <log-out-button />
  </div>
</div>
  <div v-if="data.idVisiteur == null" class="centrer text-center mb-5">
    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_ia8jpabk.json"  background="transparent"  speed="1" class="animation"  loop  autoplay></lottie-player>
    <h4 class="mb-3">Désolé... Aucun compte n'est trouvé</h4>
    <h5>Veuillez vous s'incrire ou se connecter premièrement</h5>
    <h5>pour pouvoir l'accès à vos réservations </h5>
    <router-link to="/">
          <button>Retour</button>
      </router-link>
  </div>
  <div v-else class="all-items">
  <div class="item-validate" v-for="event in eventInPanier" :key="event.id">
    <img class="img-item" :src="event.img" alt="">
    <div class="item-infos">
        <div>
        <h3> {{event.nomEvent}} </h3>
        <p> {{event.dateDebut}} </p>
    </div>
    <div class="mr-5">
        <h3>Prix : {{event.tarif}} Dhs</h3>
        <p>Qte : {{event.qte}}</p>
    </div>
    </div>
</div>
<div class="item-validate">
<!-- <div class="item-infos" @load="montantTotal()"> -->
<div class="item-infos total-card" @load="mTotal">
    <h4>Total</h4>
    <h5>{{mTotal[0]}} Dhs</h5>
</div>
</div>
</div>
<router-link to="/Ticket">
          <button class="button">Voir les billets</button>
      </router-link>
</section>
<footer-component />
</template>

<script>
import { onMounted, ref } from 'vue'
import cookie from 'vue-cookies'
import { reactive } from '@vue/reactivity'
import navComponent from '@/components/navComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import logOutButton from '@/components/logOutButton.vue'

export default {
  name: 'validationR',
  components: {
    navComponent, footerComponent, logOutButton
  },
  setup () {
    const data = ref({
      idVisiteur: cookie.get('idV')
    })
    const dataPanier = ref({
      idEvent: cookie.get('idEvent')
    })
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
    // const id = data.value.idVisiteur
    const mTotal = reactive([])
    const montantTotal = async () => {
      await fetch('http://localhost:3000/panier/total', {
        method: 'POST',
        headers: { 'Content-type': 'application/json' },
        body: JSON.stringify(data.value)
        // body: JSON.stringify({ idVisiteur: idVisiteur })
      })
        .then((res) => res.json())
        .then((result) => {
          console.log(result)
          mTotal.push(result)
        })
      // console.log(id)
    }
    onMounted(() => {
      montantTotal()
    })

    return {
      dataPanier, eventInPanier, montantTotal, mTotal, data
    }
  }
}
</script>

<style lang="scss" scoped>
h4 {
  color : black
}
.flex-box {
  display: flex;
  flex-direction:row;
  justify-content: space-evenly;
    align-content: flex-end;
    align-items: baseline;
}
.all-items {
  margin-top: 10%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
button {
  margin-top: 40%;
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
.button {
  margin-top: 5%;
  font-size: 13px;
  transform: translateX(290%);
}
.centrer {
  display: flex;
    margin-left: auto;
    margin-right: auto;
    flex-direction: column;
    align-items: center;
}
section {
    display: flex;
    flex-direction: column;
    justify-items: center;
}
.total-card {
  padding: 1.4%;
  margin-top: 30px;
  height: 7%;
}
.item-validate {
    width: 70%;
    border: 1px solid #eee;
    align-self: center;
    display: flex;
    flex-direction: row;
    box-shadow: rgba(100, 100, 111, 0.1) 0px 7px 29px 0px;
}
.img-item {
    width: 20%;
    padding: 2%;
}
.item-infos {
    display: flex;
    flex-direction: row;
    width: 100%;
    justify-content: space-between;
    align-items: center;
}
@media (max-width: 758px) {
  h1 {
    font-size: 1.5rem;
  }
  .flex-box {
    margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
}
@media (max-width: 992px) {
    .flex-box {
    margin-top: 30px;
    }
}
@media (max-width: 1005px) {
    .flex-box {
    margin-top: 30px;
}
}
@media (max-width: 720px){
  .animation {
     width: 150px;
    height: 150px;
    margin-bottom: 50px;
    margin-top: 9%;
  }
  .centrer h4,.centrer h5 {
    font-size: .9rem;
  }
  button {
  font-size: 11px;
  padding: 8px 20px;
}
}
@media (max-width: 1025px) {
  h3 {
    font-size : 1.5rem;
  }
}
@media (max-width: 867px) {
  .item-infos {
    display: flex;
    flex-direction: column;
    width: 100%;
    justify-content: space-between;
    align-items: center;
}
}
@media (max-width: 500px) {
    .flex-box {
        margin-top: 13%;
    }

  h3 {
    font-size: 1rem;
  }
  p {
    font-size: .9rem;
    margin-bottom: .5rem;
  }
  h4 {
    font-size: 1.3rem;
  }
}
@media (max-width: 465px) {
    .flex-box {
        margin: 13% 0 9%;
    }
}
@media (max-width: 350px) {
    .flex-box {
        margin-top: 40%;
    }
}
@media (max-width: 309px) {
    .flex-box {
        margin-top: 40%;
    }
}
</style>
