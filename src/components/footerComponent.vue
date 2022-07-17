<template>
    <section class="contact-us" id="contact-section">
        <!-- <img src="assetsW/images/cta-bg.png" alt="" srcset=""> -->
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div id="map">
              </div>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-12">
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-12">
              <p class="copyright">Copyright © 2022 CityEvent, All Rights Reserved.</p>
            </div>
          </div>
        </div>
      </section>
</template>

<script>
export default {
}
</script>

<style lang="scss" scoped>
ul {
  margin-bottom: 0px;
}

p {
  font-size: 14px;
  line-height: 25px;
  color: #4a4a4a;
}

html,
body {
  background: #fff;
  font-family: 'Open Sans', sans-serif;
}
/* footer style */
.text-button a:hover {
  opacity: 0.75;
}

section {
  margin-top: 140px;
}

section.contact-us {
    background-image: url(../assets/cta-bg.png);
    // background-image: url(../assets/cta-bg.png);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 0px;
   }

  // section.contact-us:after {
  //   position: absolute;
  //   content: '';
  //   left: 0px;
  //   top: 60px;
  //   width: 267px;
  //   height: 396px;
  //   z-index: 1;
  // }

  section.contact-us ul.social-icons li {
    display: inline-block;
    margin: 0px 5px;
  }

  section.contact-us ul.social-icons {
    text-align: center;
    margin-top: 70px;
  }
  section.contact-us ul.social-icons li a {
    width: 44px;
    height: 44px;
    display: inline-block;
    text-align: center;
    line-height: 44px;
    background-color: #fff;
    color: #dc8cda;
    border-radius: 50%;
    transition: all .5s;
  }
  section.contact-us ul.social-icons li a:hover {
    background-color: #dc8cdb;
    color: #fff;
  }
  p.copyright {
    text-align: center;
    color: #fff;
    margin: 40px 0px;
  }
</style>
