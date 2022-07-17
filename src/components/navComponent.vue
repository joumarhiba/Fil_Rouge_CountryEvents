<template>
<nav>
      <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="#" class="logo">
                            <img src="../assets/desk-logo.png" alt="logo du site CountryEvents">
                        </a>
                        <input type="checkbox" name="check" id="check">
                        <label for="check" class="checkbtn">
                          <i class="fas fa-bars"></i>
                        </label>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/" class="active">Home</a></li>
                            <li v-if="isOrganisateur" class="scroll-to-section"><a href="/DbOrganisateur">Dashboard</a></li>
                            <li class="scroll-to-section"><a href="/formOrganisateur">événement</a></li>
                            <li class="scroll-to-section"><a href="/validationR">reservations</a></li>
                            <li class="scroll-to-section"><a href="/contactUsView">Contact Us</a></li>
                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </header>
  </nav>
</template>

<script>

export default {
  name: 'navComponent',
  data () {
    return {
      isOrganisateur: true
    }
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #fff;
}
html, body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 400;
  background-color: #fff;
  font-size: 16px;
  -ms-text-size-adjust: 100%;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

a {
  text-decoration: none !important;
}

h1, h2, h3, h4, h5, h6 {
  margin-top: 0px;
  margin-bottom: 0px;
}

ul {
  margin-bottom: 0px;
}

p {
  font-size: 14px;
  line-height: 25px;
  color: #4a4a4a;
}

img {
      width: 31%;
    margin-top: -18px;
    overflow: hidden;
}
html,
body {
  background: #fff;
  font-family: 'Open Sans', sans-serif;
}

::selection {
  background: #dc8cdb;
  color: #fff;
}
.header-area {
  background-image:linear-gradient(to left,rgba(219,138,222,1), rgba(246,191,159,1));
  // background-color:#db8ade;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  position: absolute;
  height: 100px;
  top: 0;
  left: 0;
  right: 0;
  z-index: 100;
  transition: all .5s ease 0s;

  .main-nav {
    min-height: 70px;
    background: transparent;
  }
}

.background-header .nav {
  align-items: center;
}

.header-area .main-nav .nav {
  margin-top: 20px !important;
  float:right;
  // margin-top: 30px;
  margin-right: 0px;
  background-color: transparent;
  transition: all 0.3s ease 0s;
  position: relative;
  z-index: 999;

  li {
    padding-left: 30px;
    padding-right: 30px;

    &:last-child {
      padding-right: 0px;
    }

    a {
      display: block;
      font-weight: 400;
      font-size: 14px;
      text-transform: capitalize;
      color: #FFF;
      transition: all 0.3s ease 0s;
      height: 40px;
      line-height: 40px;
      border: transparent;
      letter-spacing: 1px;
    }

    &:hover a {
      color: #fff !important;
      opacity: 0.7;
      transition: .5s;
    }
  }
}

.background-header .main-nav .nav li {
  &:hover a, a.active {
    color: #fff !important;
    opacity: 1;
  }
}

.header-area .main-nav .menu-trigger {
  cursor: pointer;
  display: block;
  position: absolute;
  top: 33px;
  width: 32px;
  height: 40px;
  text-indent: -9999em;
  z-index: 99;
  right: 40px;
  // display: none;
}

.background-header .main-nav .menu-trigger.active span:after {
  background-color: #fff;
}

.header-area {
  &.header-sticky {
    min-height: 80px;
  }

  // .nav {
  //   margin-top:2%;
  // }

  &.header-sticky .nav li a.active {
    // color: #dc8cdb;
    color: #fff;
  }
}
.checkbtn {
  font-size: 30px;
  color: white;
  float: left;
  line-height: 80px;
  margin-right: 40px;
  display: none;
}
#check {
  display: none;
}
@media (max-width: 1200px) {
  .header-area .main-nav {
    .nav li {
      padding-left: 7px;
      padding-right: 7px;
    }

    &:before {
      display: none;
    }
  }
  img {
        width: 34%;
    margin-top: -8px;
  }
}
@media (max-width: 995px) {

.header-area .main-nav .nav {
  margin-top: -65px !important;
}
}
@media (max-width: 767px) {
  img {
    width: 50%
  }
  .header-area .main-nav .nav {
  background-color: #fff;
    position: absolute;
    left: -100%;
    transition:  all .5s;
    margin-top: 26px !important;
  }
  .header-area {
    &.header-sticky .nav li {
      a {
        &:hover, &.active {
          color: #dc8cdb !important;
          opacity: 1;
        }
      }

      &.search-icon a {
        width: 100%;
      }
    }

    background-color: #db8ade;
    color: #111;
    padding: 0px 15px;
    height: 100px;
    box-shadow: none;
    text-align: center;

    .container {
      padding: 0px;
    }

    .main-nav {
      overflow: hidden;

      .nav {
        width: 100%;
        // display: none;
        margin:0 ;
        transition: all 0.4s ease 0s;

        li:first-child {
          border-top: 1px solid #eee;
        }
      }
    }

    .main-nav .nav li {
      width: 100%;
      background: #fff;
      border-bottom: 1px solid #eee;
      padding-left: 0px !important;
      padding-right: 0px !important;

      a {
        height: 50px !important;
        line-height: 50px !important;
        padding: 0px !important;
        border: none !important;
        background: #f7f7f7 !important;
        color: #191a20 !important;
        width: 100% !important;

        &:hover {
          background: #eee !important;
          color: #dc8cdb !important;
        }
      }
    }
  }
  .checkbtn {
    display: block;
    margin: 0;
  }
  #check:checked ~ .nav {
    left: 0;
  }
}
@media (max-width:645px) {
  .header-area .main-nav .nav {
    margin-top: -23px !important;
  }
}
@media (max-width:375px) {
  .header-area .main-nav .nav {
    margin-top: -17px !important;
  }
}
@media (max-width:325px) {
  .header-area .main-nav .nav {
    margin-top: -14px !important;
  }
}
@media (max-width:288px) {
  .header-area .main-nav .nav {
    margin-top: 0px !important;
  }
}

@media (min-width: 767px) {
  // .header-area .main-nav .nav {
  //   margin-top: -19px !important;
  // }

  .main-banner .header-text h2 {
    font-size: 22px;
  }
}
</style>
