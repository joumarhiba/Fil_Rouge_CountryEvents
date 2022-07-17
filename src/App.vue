<template>
  <router-view/>
</template>

<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;1,200&display=swap');
* {
    margin: 0;
    padding: 0;
    border: 0;
  scroll-behavior: smooth;
  box-sizing: border-box;
}
html, body, div, span, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, div
 a, em, font, img, header, nav, section {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
}
ul, li {
  padding: 0;
  margin: 0;
  list-style: none;
}

header, nav, section,footer {
  display: block;
}

* {
  box-sizing: border-box;
}

/* footer style */
.text-button a:hover {
  opacity: 0.75;
}

section {
  margin-top: 140px;
}

section.contact-us {
    background-image: url(../src/assets/cta-bg.png);
    // background-image: url(../assets/cta-bg.png);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 0px;
   }

  section.contact-us:after {
    position: absolute;
    content: '';
    // background-image: url(../src/assets/footer-left-dec.png);
    left: 0px;
    top: 60px;
    width: 267px;
    height: 396px;
    z-index: 1;
  }

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
