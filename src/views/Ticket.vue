<template>
<navComponent />
    <!-- <div class="ticket"> -->
        <!-- <div class="part1">
        <h3 class="mb-3">type - title</h3>
        <h4 class="mb-4">Organisé par</h4>
        <p>1111 dhs</p>
        </div>
        <div class="mr-4">
        <h5 class="mb-4">QR code à scanner</h5>
        <img src="../assets/QR-code.png" style="width:160px" alt="">
    </div>
    </div> -->
    <section ref="content" class="container ">
<h1>Events</h1>
<div class="logout">
  <log-out-button />
  </div>
  <div v-for="event in eventInPanier" :key="event.id">
    <article class="card fl-left">
      <!-- <button @click="eventsInTickets(event.idEvent)">test</button> -->
      <section class="date">
        <time datetime="23th feb">
          <span><img class="logo" src="../assets/desk-logo.png" alt=""></span>
          <!-- <span>23</span><span>feb</span> -->
        </time>
      </section>
      <section class="card-cont">
      <div>
          <small>dj khaled</small>
        <h3>{{event.NOM}}</h3>
        <div class="qrcode">
          <div class="even-date mr-5">
         <i class="fa fa-calendar">&nbsp;&nbsp;</i>
         <time>
           <span>{{event.DATE}}</span>
           <span>08:55pm to 12:00 am</span>
         </time>
         <h3 class="pt-5"><span><i class="fa fa-money my-5" aria-hidden="true">&nbsp;&nbsp;</i>{{event.TARIF}} Dhs</span></h3>
        </div>
      <div>
        <img src="../assets/QR-code.png" style="width:120px" alt="">
        </div>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker">&nbsp;&nbsp;</i>
          <p>
            {{event.VILLE}}
          </p>
        </div>
      </div>
        <a href="#">tickets</a>
      </section>
    </article>
    <!-- <article class="card fl-left">
      <section class="date">
        <time datetime="13th feb">
          <span>13</span><span>feb</span>
        </time>
      </section>
      <section class="card-cont">
        <small>dj khaled 22222</small>
        <h3>corner obsest program</h3>
        <div class="even-date">
         <i class="fa fa-calendar"></i>
         <time>
           <span>wednesday 28 december 2014</span>
           <span>08:55pm to 12:00 am</span>
         </time>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker"></i>
          <p>
            nexen square for people australia, sydney
          </p>
        </div>
        <a href="#">tickets</a>
      </section>
    </article> -->
  </div>
  <div class="row">
    <!-- <article class="card fl-left">
      <section class="date">
        <time datetime="23th feb">
          <span>23</span><span>feb</span>
        </time>
      </section>
      <section class="card-cont">
        <small>dj khaled</small>
        <h3>music kaboom festivel</h3>
        <div class="even-date">
         <i class="fa fa-calendar"></i>
         <time>
           <span>wednesday 28 december 2014</span>
           <span>08:55pm to 12:00 am</span>
         </time>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker"></i>
          <p>
            nexen square for people australia, sydney
          </p>
        </div>
        <a href="#">booked</a>
      </section>
    </article> -->
  </div>
    </section>
        <button @click="download">Télécharger PDF</button>
    <!-- <upload-pdf-ticket /> -->
<!-- </div> -->

<footerComponent />
</template>

<script>
import JsPDF from 'jspdf'
import navComponent from '@/components/navComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
// import logOutButton from '@/components/logOutButton.vue'
// import uploadPdfTicket from '@/components/uploadPdfTicket.vue'
import { onMounted, ref } from 'vue'
import cookie from 'vue-cookies'
import { reactive } from '@vue/reactivity'

export default {
  name: 'TicketView',
  components: {
    navComponent, footerComponent
    // , uploadPdfTicket
  },

  setup () {
    const dataVisiteur = ref({
      idVisiteur: cookie.get('idV')
    })
    const dataEvent = ref({
      idEvent: cookie.get('idEvent')
    })
    const eventInPanier = reactive([])
    const AllEventsReserved = async () => {
      await fetch('http://localhost:3000/panier/all', {
        method: 'POST',
        headers: { 'Content-type': 'application/json' },
        body: JSON.stringify(dataVisiteur.value)
      })
        .then((res) => res.json())
        .then((result) => {
          if (result.data.length !== 0) {
            // console.log('the result' + result.data)
            result.data.forEach((element) => {
              eventInPanier.push({ NOM: element.nomEvent, DATE: element.dateDebut, VILLE: element.villeEvent, TARIF: element.tarif })
              // eventInPanier.push(element)
              console.log(element)
              console.log(element.nomEvent, element.dateDebut, element.villeEvent, element.tarif)
            })
          }
        })
    }
    onMounted(() => {
      AllEventsReserved()
    })
    const content = ref(null)
    const download = () => {
      require('jspdf-autotable')
      const columns = [
        { title: 'Nom d\'événement', dataKey: 'NOM' },
        { title: 'La date', dataKey: 'DATE' },
        { title: 'Ville d\'événement', dataKey: 'VILLE' },
        { title: 'Prix', dataKey: 'TARIF' }
      ]
      const doc = new JsPDF({
        orientation: 'portrait',
        unit: 'in',
        format: 'letter'
      })
      doc.autoTable({
        columns,
        body: eventInPanier,
        margin: { left: 0.5, top: 1.25 }
      })
      doc.save('file.pdf')
    }
    return {
      dataVisiteur, dataEvent, eventInPanier, content, download
    }
  }
}
</script>
<style>
* {
    box-sizing: border-box
}

body {
    background: #fff;
    /* background: #e4e3e380; */
}

.fl-left {
    float: left
}
.logo {
  width: 420px;
  transform: translateX(13%);
}
.fl-right {
    float: right
}

h1 {
    text-transform: uppercase;
    font-weight: 900;
    border-left: 10px solid #f6bf9f;
    padding-left: 10px;
    margin-bottom: 40px
}

.row {
    overflow: hidden
}
button {
  padding: 5px;
  background-color:#000;
  color: #fff;
  margin-left: 20%;
  margin-top: 3%;
}
.qrcode {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.card {
    display: table-row;
    width: 49%;
    background-color: rgb(0, 0, 0);
    color: #b7b5b5;
    margin-bottom: 10px;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    border-radius: 4px;
    position: relative;
    margin-right: 10px;
}

/* .card+.card {
    margin-left: 2%
} */

.date {
    display: table-cell;
    width: 30%;
    position: relative;
    text-align: center;
    border-right: 2px dashed #fff;
}

.date:before,
.date:after {
    content: "";
    display: block;
    width: 30px;
    height: 30px;
    background-color: #fff;
    position: absolute;
    top: -15px;
    right: -15px;
    z-index: 1;
    border-radius: 50%;
}

.date:after {
    top: auto;
    bottom: -15px
}

.date time {
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%)
}

.date time span {
    display: block
}

.date time span:first-child {
    color: #ffffff;
    font-weight: 600;
    font-size: 250%
}

.date time span:last-child {
    text-transform: uppercase;
    font-weight: 600;
    margin-top: -10px
}

.card-cont {
    display: table-cell;
    width: 85%;
    font-size: 85%;
    padding: 10px 10px 23px 60px
}

.card-cont h3 {
    color: #fcf8f8;
    font-size: 130%
}

.row:last-child .card:last-of-type .card-cont h3 {
    text-decoration: line-through
}

.card-cont>div {
    display: table-row
}

.card-cont .even-date i,
.card-cont .even-info i,
.card-cont .even-date time,
.card-cont .even-info p {
    display: table-cell
}

.card-cont .even-date i,
.card-cont .even-info i {
    padding: 5% 5% 0 0
}

.card-cont .even-info p {
    padding: 9px 50px 0 0
}

.card-cont .even-date time span {
    display: inline-table;
}

.card-cont a {
    display: block;
    text-decoration: none;
    width: 80px;
    height: 30px;
    background-color: #D8DDE0;
    color: rgb(8, 8, 8);
    text-align: center;
    line-height: 30px;
    border-radius: 2px;
    position: absolute;
    right: 40px;
    bottom: 13px;
}

@media screen and (max-width: 860px) {
    .card {
        display: block;
        float: none;
        width: 100%;
        margin-bottom: 10px
    }
    .card+.card {
        margin-left: 0
    }
    .card-cont .even-date,
    .card-cont .even-info {
        font-size: 75%
    }
}
@media screen and (max-width: 1200px) {
.container {
  z-index: 0;
}
.card {
    display: table-row;
    width: 78%;
}
}

</style>
