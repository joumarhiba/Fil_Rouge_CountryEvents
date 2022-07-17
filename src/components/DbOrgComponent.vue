<template>
  <section class="u-clearfix u-section-1">
<div class="row">
<div class="col-md-12">
  <div  v-if="data.idOrganisateur == null" class="text-center centrer">
    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_ia8jpabk.json"  background="transparent"  speed="1" class="animation"  loop  autoplay></lottie-player>
    <h4 class="mb-3">Désolé... Aucun compte n'est trouvé</h4>
    <h5>Veuillez vous s'incrire ou se connecter premièrement</h5>
    <h5>pour pouvoir personnaliser vos événements </h5>
    <router-link to="/">
          <button class="retour">Retour</button>
      </router-link>
  </div>
<div class="table-wrap" v-else>
<table class="table">
<thead class="thead-primary">
<tr>
<th>N ° d'événement</th>
<th>Image</th>
<th>Titre d'événement</th>
<th>Quand et Où</th>
<th>Tarif</th>
<th>Option</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<tr class="alert" role="alert" v-for="event in getAllEvents" :key="event.id">
<td>
{{event.idEvent}}
</td>
<td>
<img class="" :src="event.img" alt="" >
</td>
<td>
<div class="email">
<span>{{event.nomEvent}} </span>
<span></span>
</div>
</td>
<td>{{event.villeEvent}} à {{event.dateDebut}}</td>
<td class="quantity">
{{event.tarif}} Dhs
</td>
<td>
    <button type="submit" class="edit">
      <!-- <router-link :to="{ name:'editEvent' , params: { idEvent: event.idEvent } }">Modifier</router-link></button> -->
      <router-link :to="{ name:'editEvent' , params: { idEvent: event.idEvent } }"><lottie-player src="https://assets5.lottiefiles.com/private_files/lf30_9y6kbqqv.json"  background="transparent"  speed="0.1"  style="width: 40px; height: 40px;" loop autoplay></lottie-player></router-link></button>
</td>
<td>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<lottie-player @click="removeEvent(event.idEvent)" src="https://assets2.lottiefiles.com/private_files/lf30_wjvq6vbt.json"  background="transparent"  speed="1"  style="width: 36px; height: 36px;"  loop  autoplay></lottie-player>
</button>
</td>
</tr>
<!-- second row -->
<!-- <tr class="alert" role="alert">
<td>
#id
</td>
<td>
<img class="" src="../assets/event-01.jpg" alt="" >
</td>
<td>
<div class="email">
<span>Lorem ipsum dolor sit amet. </span>
<span></span>
</div>
</td>
<td>kech à 20:00 h</td>
<td class="quantity">
100 Dhs
</td>
<td>
    <button type="submit" class="edit">Modifier</button>
</td>
<td>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true"><i class="fa fa-close"></i></span>
</button>
</td>
</tr> -->
</tbody>
</table>
</div>
</div>
</div>
    </section>
</template>

<script>
import { onMounted, ref } from 'vue'
import cookie from 'vue-cookies'
import { reactive } from '@vue/reactivity'

export default {
  name: 'DbOrgComponent',
  data () {
    return {
      AllEvents: [],
      data: {
        idOrganisateur: cookie.get('id')
      }
    }
  },
  setup () {
    // const nomEvent = ref('')
    // const typeEvent = ref('')
    // const villeEvent = ref('')
    // const dateDebut = ref('')
    // const tarif = ref('')
    // const nbMax = ref('')
    // const img = ref('')
    const data = ref({
      idOrganisateur: cookie.get('id')
    })
    const getAllEvents = reactive([])

    const AllEvents = async () => {
      await fetch('http://localhost:3000/event/eventsById', {
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

    // const dataUpdated = ref({
    //   nomEvent: '',
    //   typeEvent: '',
    //   villeEvent: '',
    //   dateDebut: '',
    //   tarif: '',
    //   img: '',
    //   nbMax: ''
    //   // idEvent: idEvent
    // })
    // const goToEdit = async () => {
    //   dataUpdated.value.nomEvent = nomEvent.value
    //   dataUpdated.value.villeEvent = villeEvent.value
    //   dataUpdated.value.typeEvent = typeEvent.value
    //   dataUpdated.value.dateDebut = dateDebut.value
    //   dataUpdated.value.nbMax = nbMax.value
    //   dataUpdated.value.tarif = tarif.value
    //   dataUpdated.value.img = img.value
    //   // dataUpdated.value.idEvent =idEvent.value
    // }

    const removeEvent = async (idEvent) => {
      const res = await fetch('http://localhost:3000/event/removeEvent', {
        method: 'POST',
        body: JSON.stringify({ idEvent: idEvent })
      })
      const json = await res.json()
      console.log(json)

      for (let i = 0; i < getAllEvents.length; i++) {
        if (getAllEvents[i].idEvent === idEvent) {
          getAllEvents.splice(i, 1)
        }
      }
    }
    return {
      getAllEvents,
      removeEvent
      // dataUpdated:,
      // goToEdit
    }
  }
}
</script>

<style lang="scss" scoped>
.animation {
     width: 230px;
    height: 230px;
    margin-bottom: 50px;
    margin-top: 0;
  }
  button {
  font-size: 13px;
  padding: 11px 26px;
}
 a{
  text-decoration: none;
  color: #db8adb;
 }
.retour {
  margin-top: 36%;
  font-size: 13px;
  color: #fff;
  justify-self: center;
  // transform: translateX(70px);
  border: none;
  background: rgba(219, 138, 222, 0.715);
  padding: 10px 26px;
  display: inline-block;
  border-radius: 5px;
  font-weight: 500;
}
.centrer {
  display: flex;
    margin-left: auto;
    margin-right: auto;
    flex-direction: column;
    align-items: center;
}
img {
    width: 100px;
}
.edit{
    background: transparent;
    border : none;
    color: #db8adb;
    border-radius: 5px;
    padding: 7%;
}

*,
*::before,
*::after {
  box-sizing: border-box; }

html {
  font-family: sans-serif;
  line-height: 1.15;
  }

body {
  margin: 0;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  text-align: left;
  background-color: #fff; }

p {
  margin-top: 0;
  margin-bottom: 1rem; }

@media (max-width: 1024px){
  .animation {
     width: 200px;
    height: 200px;
    margin-bottom: 50px;
    margin-top: 1%;
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

.img {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center; }

.table-wrap {
  overflow-x: scroll; }

.table {
  min-width: 1000px !important;
  width: 100%;
  background: #fff;
  box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29); }
  .table thead.thead-primary {
    background: linear-gradient(to left , #db8adb , #f3bda3);
     }
  .table thead th {
    border: none;
    padding: 30px;
    font-size: 13px;
    font-weight: 500;
    color: white; }
  .table tbody tr {
    margin-bottom: 10px; }
  .table tbody th, .table tbody td {
    border: none;
    padding: 30px;
    font-size: 14px;
    background: #fff;
    border-bottom: 4px solid #f8f9fd;
    vertical-align: middle; }
  .table tbody td.quantity {
    width: 10%; }
  .table tbody td .img {
    width: 100px;
    height: 80px; }
  .table tbody td .email span {
    display: block; }
    .table tbody td .email span:last-child {
      font-size: 12px;
      color: rgba(0, 0, 0, 0.3); }
  .table tbody td .close span {
    font-size: 12px;
    color: #dc3545; }

</style>
