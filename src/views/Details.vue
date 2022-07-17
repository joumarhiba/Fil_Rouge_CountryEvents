<template>
<navComponent />
  <section>
      <div class="item-details" v-for="event in getEvent" :key="event.id">
         <div class="event">
          <img :src="event.img" alt="">
      <router-link to="/">
          <button>Retour</button>
      </router-link>
      </div>
          <div>
            <h1>{{event.nomEvent}}</h1>
          <p>Après le succès de son premier {{event.typeEvent}}, <strong>{{event.nomEvent}}</strong> joue à guichet fermé à {{event.villeEvent}}<br/> il donne rdv à son public avec son nouveau événement, le {{event.dateDebut}} au Studio des arts Vivants, avec un nombre de personnes limitées {{event.nbMax}} places</p>
          <ul>
              <li><span><i class="fa fa-money" aria-hidden="true"></i><h4> {{event.tarif}} Dhs / place</h4></span></li>
          </ul>
          </div>
        </div>
        <!-- <div class="event">
          <img src="../assets/concert2.jpg" alt="">
      <router-link to="/">
          <button>Retour</button>
      </router-link>
      </div>
          <h1>{{event.nomEvent}}</h1>
          <p>Après le succès de son premier {{event.typeEvent}}, <strong>{{event.nomEvent}}</strong> joue à guichet fermé à {{event.villeEvent}}<br/> il donne rdv à son public avec son nouveau événement, le {{event.dateDebut}} au Studio des arts Vivants, avec un nombre de personnes limitées {{event.nbMax}} places</p>
          <ul>
              <li><span><i class="fa fa-money" aria-hidden="true"></i><h4> {{event.tarif}} Dhs / place</h4></span></li>
          </ul>
        </div> -->
    </section>
  <footer-component />
</template>

<script>
import navComponent from '@/components/navComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import { onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { reactive } from '@vue/reactivity'

export default {
  name: 'DetailsView',
  components: { navComponent, footerComponent },
  setup () {
    // const getAllEvents = reactive([])
    const getEvent = reactive([])
    const route = useRoute()
    const idEvent = route.params.idEvent
    const oneEvent = async () => {
      await fetch('http://localhost:3000/event/singleEvent/?idEvent=' + idEvent, {
        method: 'POST',
        headers: { 'Content-type': 'application/json' },
        body: JSON.stringify({ idEvent: idEvent })
      })
        .then((res) => res.json())
        .then((result) => {
          if (result.data.length !== 0) {
            console.log(result.data)
            result.data.forEach((element) => {
              getEvent.push(element)
            })
          }
        })
    // .then((res) => res.json())
    // .then((result) => {
    //   if (result.data.length !== 0) {
    //     console.log(result.data)
    //     result.data.forEach((element) => {
    //       getAllEvents.push(element)
    //     })
    //   }
    // })
    }
    onMounted(() => {
      oneEvent()
    })
    return {
      getEvent
    }
  }
}
</script>

<style scoped>
section {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}
button {
  font-size: 13px;
  color: #fff;
  justify-self: center;
  transform: translateX(70px);
  border: none;
  background: rgba(219, 138, 222, 0.715);
  padding: 10px 26px;
  display: inline-block;
  border-radius: 5px;
  font-weight: 500;
}

a{
  list-style: none;
}
button:focus{
  outline: none;
}
img {
  /* box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; */
    width: 80%;
    height: 80%;
}
.event {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 80%;
    justify-content: space-between;
}
.item-details {
    display: flex;
    flex-direction: row;
    justify-items: center;
}
li, h1 , p {
    padding-bottom: 2%;
}

</style>
