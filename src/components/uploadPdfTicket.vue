<template>
  <div>
<section ref="content" class="container">
<h1 >Events</h1>
  <div>
    <article class="card fl-left">
      <!-- <button @click="eventsInTickets(event.idEvent)">test</button> -->
      <section class="date">
        <time datetime="23th feb">
          <span>23</span><span>feb</span>
        </time>
      </section>
      <section class="card-cont">
      <div>
          <small>dj khaled</small>
        <h3>event.nomEvent</h3>
        <div class="qrcode">
          <div class="even-date mr-5">
         <i class="fa fa-calendar">&nbsp;&nbsp;</i>
         <time>
           <span>event.dateDebut</span>
           <span>08:55pm to 12:00 am</span>
         </time>
        </div>
      <div>
        <img src="../assets/QR-code.png" style="width:120px" alt="">
        </div>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker">&nbsp;&nbsp;</i>
          <p>
            {{event.villeEvent}}
          </p>
        </div>
      </div>
        <a href="#">tickets</a>
      </section>
    </article>
  </div>
  <div class="row">
  </div>
    </section>
    <!-- <button @click="download">Télécharger PDF</button> -->
  </div>
</template>

<script>
import JsPDF from 'jspdf'
import cookie from 'vue-cookies'
// import { computed } from '@vue/runtime-core'
export default {
  name: 'uploadPdfTicket',
  data () {
    return {
      idVisiteur: '',
      eventInPanier: [],
      AllEventsReserved: []
    }
  },
  methods: {
    download () {
      const doc = new JsPDF()
      const htmt = this.$refs.content.innerHTML
      // console.log(htmt)
      doc.text(htmt, 10, 10)
      //  {
      //   x: 1,
      //   y: 1,
      //   width: 450
      // elementHandlers: htmt
      // }
      // )
      doc.save('CountryEventTickets.pdf')
    }
  },
  mounted () {
    async function AllEventsReserved () {
      const idVisiteur = cookie.get('id')
      this.eventInPanier = await fetch('http://localhost:3000/panier/all', {
        method: 'POST',
        headers: { 'Content-type': 'application/json' },
        body: JSON.stringify(idVisiteur)
      })
      // console.log(idVisiteur.data)
        .then((res) => res.json())
      // .then((result) => {
      //   console.log('the result' + result)
      //   if (result !== 0) {
      //     result.forEach((element) => {
      //       this.eventInPanier.push(element)
      //     })
      //   }
      // })
    }
    AllEventsReserved()
  }
}
</script>

<style>

</style>
