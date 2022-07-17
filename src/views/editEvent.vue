<template>
    <nav-component />
    <div class="flex-box">
    <div class="titles">
           <h2 class="form-title"></h2>
           <h6 class="form-title">Modifier un événement</h6>
  </div>
  <div class="logout">
  <log-out-button />
  </div>
  </div>
     <form v-on:submit.prevent="edit">

       <div class="row">
          <div class="col-lg-6">
          <input type="text" class="champs" name="nomEvent" placeholder="Nom d'événement" autocomplete="off" v-model="nomEvent">

           <input v-model="typeEvent" type="text" class="champs" name="typeEvent" placeholder="Type d'événement" autocomplete="off">
          </div>

          <div class="col-lg-6">
          <input type="text" v-model="villeEvent" class="champs"  name="villeEvent" placeholder="Ville d'événement" autocomplete="off">

           <input type="datetime-local" v-model="dateDebut" class="champs" name="dateDebut" placeholder="date et heure d'événement">
          </div>

          <div class="col-lg-6 ">
          <input type="number" v-model="nbMax" class="champs"  name="nbMax" placeholder="Nombre maximum de personnes" autocomplete="off">
          </div>
          <div class="col-lg-6 ">
           <input type="number" v-model="tarif" name="tarif" placeholder="Tarif" class="champs" autocomplete="off">
          </div>
          <!-- <input type="file" @change="fileSelected" > -->
       </div>
       <div>
         <button class="submit" >Modifier</button>
       </div>
   </form>
   <h1 class="text-lg font-semibold mb-3">l'evenement</h1>
            <div v-for="event in eventToUpdate" :key="event.idEvent" class="border p-5">
                <p><span>Nom : </span>{{event.nomEvent}}</p>
                <p><span>type : </span>{{event.typeEvent}}</p>
                <p><span>ville : </span>{{event.villeEvent}}</p>
                <p><span>prix: </span>{{event.tarif}}</p>
                <p><span>nbMax: </span>{{event.nbMax}}</p>
            </div>
   <footer-component />
</template>

<script>
// import cookie from 'vue-cookies'
import { useRoute } from 'vue-router'
import router from '@/router/index'
import NavComponent from '@/components/navComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import logOutButton from '@/components/logOutButton.vue'
import { reactive, ref } from '@vue/reactivity'
import { onMounted } from 'vue'

export default {
  name: 'editEvent',
  components: { NavComponent, footerComponent, logOutButton },
  setup () {
    const nomEvent = ref('')
    const typeEvent = ref('')
    const villeEvent = ref('')
    const dateDebut = ref('')
    const tarif = ref('')
    const nbMax = ref('')
    const img = ref('')
    const route = useRoute()
    const idEvent = route.params.idEvent
    const eventToUpdate = reactive([])
    const singleEvent = async () => {
      const res = await fetch('http://localhost:3000/event/singleEvent/?idEvent=' + idEvent)
      console.log(idEvent)
      const json = await res.json()
      const data = json.data[0]
      console.log(data)
      return data
    }
    onMounted(() => {
      singleEvent().then(result => {
        eventToUpdate.push(result)
        nomEvent.value = result.nomEvent
        typeEvent.value = result.typeEvent
        villeEvent.value = result.villeEvent
        dateDebut.value = result.dateDebut
        tarif.value = result.tarif
        img.value = result.img
        nbMax.value = result.nbMax
      })
    })
    const fileSelected = (event) => {
      img.value = event.target.files[0].name
    }
    const dataUpdated = ref({
      nomEvent: '',
      typeEvent: '',
      villeEvent: '',
      dateDebut: '',
      nbMax: '',
      tarif: '',
      img: '',
      idEvent: idEvent
    })

    const edit = async () => {
      dataUpdated.value.nomEvent = nomEvent.value
      dataUpdated.value.villeEvent = villeEvent.value
      dataUpdated.value.typeEvent = typeEvent.value
      dataUpdated.value.dateDebut = dateDebut.value
      dataUpdated.value.nbMax = nbMax.value
      dataUpdated.value.tarif = tarif.value
      dataUpdated.value.img = img.value
      console.log(dataUpdated.value)

      await fetch('http://localhost:3000/event/UpdateEvent', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(dataUpdated.value)
      })
        .then(res => res.json()).then(result => console.log(result))
      await router.push('/dbOrganisateur')
    }

    return { eventToUpdate, edit, idEvent, singleEvent, nomEvent, villeEvent, typeEvent, dateDebut, tarif, nbMax, fileSelected }
  }
}
</script>

<style>
/* @import url("https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900"); */

* {
font-family: 'Open Sans', sans-serif;
box-sizing: border-box;
}

body {
display: flex;
justify-content: center;
align-items: stretch;
flex-direction: column;
height: 99vh;
margin: 0!important;
align-self: center;
}

/*
form{
margin-top: 20%;
} */

.titles{
margin-top: 15%;
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
margin-top: 5px;
font-size: 16px;
color: #111111;
font-weight: 700;
line-height: 70px;
margin-bottom: 40px;
}
.flex-box {
  display: flex;
  flex-direction:row;
  justify-content: space-evenly;
    align-content: flex-end;
    align-items: baseline;
}
form {
background-position-x: center;
background-size: cover;
background-repeat: no-repeat;
padding: 5%;
width:65%;
display: flex;
justify-content: center;
flex-direction: column;
justify-self: center;
height: 70vh;
margin: 50px 0 0 0;
}
.champs{
position: relative;
z-index: 2;
opacity: .9;
width: 100%;
outline: none;
margin-right: 3%;
border: 1px solid #000;
padding: 2%;
border-radius: 5px;
margin-bottom: 3%;
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

</style>
