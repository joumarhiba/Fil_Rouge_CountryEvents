<template>
  <div class="coming-events">
        <!-- panier section  -->
            <div v-if="panier.length > 0" class="shopping-cart" id="shopping-cart">
              <h2>Panier</h2>
              <div class="item-group">
                <!-- ajouter un boucle v-for dans le div item : "event in panier" -->
              <div class="item">
                <div class="img-container">
                  <img src="../assets/event-01.jpg" alt="">
                </div>
                <div class="item-description">
                  <h4>description</h4>
                  <p>tarif</p>
                </div>
                <div class="item-quantity">
                  <h6></h6>
                  <div class="cart-icons">
                    <!-- ajouter un param event a la méthode plusOne et minusOne / id à panierRemoveItem -->
                    <button @click="plusOne">
                      <i class="fa fa-plus"></i>
                    </button><span>&nbsp;&nbsp;</span>
                    <button @click="minusOne">
                      <i class="fa fa-minus"></i>
                    </button><span>&nbsp;&nbsp;</span>
                    <button @click="panierRemoveItem">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                </div>
              </div>
              </div>
            </div>
            </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="event-item">
                        <div class="thumb">
                            <a href="event-details.html"><img src="../assets/event-01.jpg" alt=""></a>
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
                </div>
                <div class="col-lg-4">
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
                </div>
                <div class="col-lg-4">
                    <div class="event-item">
                        <div class="thumb">
                            <a href="event-details.html"><img src="../assets/event-03.jpg" alt=""></a>
                        </div>
                        <div class="down-content">
                            <a href="event-details.html"><h4>Title of event</h4></a>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> date & time</li>
                                <li><i class="fa fa-map-marker"></i>Ville......</li>
                                <li><i class="fa fa-money" aria-hidden="true"></i> Prix Dhs</li>
                                <!-- ajouter un paramètre au fonction addToPanier : (event) -->
                                <button @click="addToPanier" class="acheter" href="#contact-section">Acheter</button>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
export default {
}
</script>

<style>

</style>
