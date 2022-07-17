<template>
  <nav-component />
<section class="ftco-section img bg-hero" >
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
    <h2 class="heading-section">Contactez-nous</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-lg-11">
    <div class="wrapper">
        <div class="row no-gutters justify-content-between">
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="info-wrap w-100 p-5">
                    <h3 class="mb-4">Nos Cordonnées</h3>
            <div class="coordonnees">
                <div class="dbox w-100 d-flex align-items-start">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="fa fa-phone"></span>
                </div>
                <div class="text pl-4">
                <p> <a href="tel://1234567920">+212512345600</a></p>
                </div>
            </div>
            <div class="dbox w-100 d-flex align-items-start">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="fa fa-paper-plane"></span>
                </div>
                <div class="text pl-4">
                <p><a href="www.gmail.com">countryevent@gmail.com</a></p>
                </div>
            </div>
            <div class="dbox w-100 d-flex align-items-start">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="fa fa-globe"></span>
                </div>
                <div class="text pl-4">
                <p> <a href="#">CountryEvent.ma</a></p>
                </div>
            </div>
            </div>
        </div>
            </div>
            <div class="col-lg-5">
                <div class="contact-wrap w-100 p-md-5 p-4 text-white">
                    <h3 class="mb-4">Get in touch</h3>
                    <div id="form-message-warning" class="mb-4"></div>
            <div id="form-message-success" class="mb-4">
            N'hésitez pas à nous envoyer vos questions et vos suggestions
            </div>
                    <form method="POST" id="contactForm" name="contactForm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Send Message" class="btn btn-primary">
                                    <div class="submitting"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>

<footer-component />
</template>

<script>
import NavComponent from '@/components/navComponent.vue'
import footerComponent from '@/components/footerComponent.vue'
export default {
  name: 'ContactUsView',
  components: {
    NavComponent,
    footerComponent
  }
}
</script>

<style scoped >
/* section {
    background-color: #f3bcf2a7;
} */

.info-wrap .dbox p span {
    font-weight: 350;
    color: rgb(8, 8, 8);
    font-size: 20px;
    display: block;
    text-transform: uppercase;
}
.info-wrap .dbox p {
    margin-bottom: 0;
}
.info-wrap .dbox p a{
    color: rgba(75, 75, 75, 0.7);
    text-decoration: none;
}
.info-wrap .dbox p a:hover{
    color: rgba(75, 75, 75, 0.9);
}
.contact-wrap {
    /* background: #000; */
    background-image: url('../assets/contactus.jpg');
    background-size: cover;
    border-radius: 10px;
    margin-bottom: 8%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
.btn {
    margin-top: 2%;
    background: #fff;
    border: #db8adb;
    padding: 9px;
    color: #000;
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
}
.btn:hover,
.btn:focus {
    background:#db8adbdf;
}
.dbox {
    margin-bottom: 6%;
}
@media (max-width: 769px) {
.info-wrap {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 0;
}
h2 ,h3 {
    font-size: 1.4rem;
    margin-bottom: .5rem;
}

}

</style>
