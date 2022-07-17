<template>
<nav-component />
<div class="flex-box">
    <h1>Dashboard</h1>
    <div class="logout">
  <log-out-button />
  </div>
</div>
<div class="container">
    <div class="static">
        <div class="col-lg-4">
            <div class="item">
                <h5>Taux d'Achat</h5>
        <!-- <i class="fa fa-ticket" aria-hidden="true"></i> -->
        <div class="chart">
    <div class="bar"></div>
    <!-- Change the value below -->
    <span id="value1">58</span>
</div>
<div class="progress2">
    <h4>30%</h4>
    <p>La dernière semaine</p>
</div>
<div class="percentage">
    <h4>66%</h4>
    <p>Le dernier mois</p></div>
</div>
        </div>
        <div class="col-lg-4">
           <div class="item">
                <h5>Taux de visite</h5>
        <!-- <i class="fa fa-ticket" aria-hidden="true"></i> -->
        <div class="chart">
    <div class="bar second"></div>
    <!-- Change the value below -->
    <span id="value1">80%</span>
</div>
<div class="progress2">
    <h4>30%</h4>
    <p>La dernière semaine</p>
</div>
<div class="percentage">
    <h4>66%</h4>
    <p>Le dernier mois</p></div>
</div>
        </div>
    </div>
</div>
<db-org-component />
<footer-component />
</template>

<script>
import navComponent from '@/components/navComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
import DbOrgComponent from '@/components/DbOrgComponent.vue'
import logOutButton from '@/components/logOutButton.vue'

export default {
  name: 'DbOrganisateur',
  components: {
    navComponent, footerComponent, DbOrgComponent, logOutButton
  },
  props: ['isOrganisateur'],
  //   methods: {
  //     check () {
  //     }
  //   },
  mounted () {
    function increase () {
      const SPEED = 40
      const limit = parseInt(document.getElementById('value1').innerHTML, 10)

      for (let i = 0; i <= limit; i++) {
        setTimeout(function () {
          document.getElementById('value1').innerHTML = i + '%'
        }, SPEED * i)
      }
    }
    increase()
  }
}
</script>

<style lang="scss" scoped>
body{
    margin-top: 10%;
    box-sizing: border-box;
}
.static {
     display: flex;
     flex-wrap: wrap;
      justify-content: space-around;
}
.percentage {
    padding: 0 0% 0 20%;
}
.chart {
    background: rgba(174, 174, 174, 0.151);
    justify-content: flex-start;
    border-radius: 100px;
    align-items: center;
    position: relative;
    padding: 0 2px;
    display: flex;
    height: 20px;
    width: 200px;
}
    .chart span {
        margin-left: 5px;
        color: #dc8cdb;
        font-weight: bolder;
    }

.bar {
    animation: load 3s normal forwards;
    box-shadow: 0 10px 40px -10px #fff;
    border-radius: 100px;
    background: rgb(12, 18, 13);
    height: 16px;
    width: 0;
}
.second {
    animation: loader 3s normal forwards;
}

@keyframes load {
    0% {
        width: 0;
    }
    100% {
        width: 58%;
    }
}
@keyframes loader {
    0% {
        width: 0;
    }
    100% {
        width: 80%;
    }
}
.container {
  font: 1px;
  padding: 0 20px;
}

h1{
    text-align: center;
    font-weight: 700;
    margin-bottom: 4.5%;
    margin-top: 9%;
    letter-spacing: 3px;
    border-left: 10px solid #f6bf9f;
    padding-left: 9px;
}
.flex-box {
  display: flex;
  flex-direction:row;
  justify-content: space-evenly;
    align-content: flex-end;
    align-items: baseline;
}

.item {
  width: 130%;
    display: grid;
    grid-template-columns: 166px 235px;
    grid-template-rows: 93% 40%;
    align-content: space-around;
    align-items: stretch;
    background-color: #FFF;
    padding: 15%;
    border-radius: 5px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.progress2 {
    border-right:1px solid #000;
    padding: 0 6px;
}
@media (max-width : 785px){
    h1{
        margin-top: 15%;
        font-size: 1.6em;
        letter-spacing: 3px;
    }
.container {
  padding: 0 61px;
}
.flex-box {
    margin-top: 20px;
}
}
@media (max-width : 1200px){
    .item {
    width: 140%;
    padding: 14%;
    border-radius: 5px;
    display: grid;
    grid-template-columns: 161px 208px;
    grid-template-rows: 84% 74%;
    }
    .static {
        margin-left: -10%;
    }
    h5 {
        font-size: 1.1rem;
    }
    h4 {
        font-size: 1.2rem;
    }
    span {
        font-size: .85rem;
    }
    .bar {
    height: 12.5px;
}
.chart {
    height: 14.8px;
}
}
@media (max-width: 1005px) {
    .flex-box {
    margin-top: 30px;
}
}
@media (max-width: 992px) {
    .flex-box {
    margin-top: 30px;
    }
    h1{
        margin-top: 13%;
        font-size: 1.9em;
        letter-spacing: 2px;
    }
    .item {
        width: 80%;
    padding: 10%;
    border-radius: 5px;
    display: grid;
    grid-template-columns: 194px 226px;
    grid-template-rows: 95% 74%;
    padding: 10%;
    border-radius: 5px;
}
.static {
        display: flex;
        justify-content: center;
        margin: 0;
        width: 100%;
    }
}
@media (max-width: 785px) {
   h1{
        margin-top: 14%;
        font-size: 1.6em;
        letter-spacing: 1.7px;
    }
    .item {
      width: 90%;
    padding: 9%;
    border-radius: 5px;
    display: grid;
    grid-template-columns: 194px 226px;
    grid-template-rows: 95% 74%;
    border-radius: 5px;
}
span {
        font-size: .8rem;
    }
.bar {
   height: 10px;
}
.chart {
    height: 12px;
}
h5 {
        font-size: 1rem;
    }
    h4 {
        font-size: 1.09rem;
    }
}
@media (max-width: 768px) {
   h1{
        margin-top: 14%;
        font-size: 1.6em;
        letter-spacing: 1.7px;
    }
    .item {
    width: 108%;
    padding: 10%;
    display: grid;
    grid-template-columns: 168px 226px;
    grid-template-rows: 95% 73%;
}
span {
        font-size: .75rem;
    }
.bar {
   height: 10px;
}
.chart {
    height: 12px;
    width: 170px;
}
h5 {
        font-size: .8rem;
    }
    h4 {
        font-size: 1rem;
    }
    p {
        font-size: .9rem;
        padding-top: 5px;
    }
}
@media (max-width: 507px) {
    .flex-box {
        margin-top: 13%;
    }
}

@media (max-width: 497px) {
    .item {
    display: grid;
    grid-template-columns: 149px 207px;
    grid-template-rows: 85% 70%;
}
}

@media (max-width: 465px) {
    .flex-box {
        margin: 13% 0 9%;
    }
    .item {
    width: 120%;
    display: grid;
    grid-template-columns: 143px 207px;
    grid-template-rows: 75% 70%;
}
}
@media (max-width: 420px) {
    .item {
    width: 100%;
    display: grid;
    grid-template-columns: 143px 249px;
    grid-template-rows: 72% 72%;
}
    .chart {
        width: 65%;
    }
    .percentage {
        padding: 0 0 0 8%;
    }
    .container {
  padding: 0 0px 0 2px;
}
}
@media (max-width: 350px) {
    .flex-box {
        margin-top: 40%;
    }
    .item {
    width: 105%;
    display: grid;
    grid-template-columns: 143px 269px;
}
    .chart {
        margin-left: -14%;
        width: 55%;
    }
    .container {
  padding: 0 0px 0 2px;
}
}
@media (max-width: 309px) {
    .flex-box {
        margin-top: 40%;
    }
    .item {
    width: 110%;
    display: grid;
    grid-template-columns: 143px 136px;
}
    .chart {
        margin-left: -14%;
        width: 95%;
    }
    .container {
  padding: 0 0px 0 2px;
}
}
@media (max-width: 280px) {
 .item {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
    justify-items: center;
 }
  .chart {
        margin-left: 0%;
        width: 95%;
    }
 .progress2 {
    border: none;
 }
}
</style>
