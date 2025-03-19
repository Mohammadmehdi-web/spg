<link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
<style>
  .main-menu {
    -webkit-align-content: center;
    -ms-flex-line-pack: center;
    align-content: center;
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
    -ms-flex-pack: end;
    justify-content: flex-end;
  }

  .main-menu>li {
    margin-right: 75px;
    position: relative;
    font-size: 20px;
    font-weight: bolder;
  }

  .main-menu>li:last-child {
    margin-right: 0;
  }

  .main-menu>li>a {
    color: #fff !important;
    display: block;
    line-height: 1;
    letter-spacing: 1px;
    text-transform: uppercase;
    position: relative;
  }

  @media only screen and (min-width: 992px) and (max-width: 1199.98px) {
    .main-menu>li>a {
      font-size: 14px;
    }
  }

  .main-menu>li.has-submenu {
    margin-right: 37px;
    padding-right: 10px;
    position: relative;
  }

  .main-menu>li.has-submenu:after {
    color: #fff;
    content: "\f107";
    font-size: 16px;
    line-height: 1;
    font-family: FontAwesome;
    position: absolute;
    right: -5px;
    top: 0;
  }

  .main-menu>li.has-submenu .submenu-nav {
    background-color: #fff;
    -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    border-bottom: 2px solid #080b1a;
    position: absolute;
    left: -25px;
    top: 100%;
    -webkit-transform: translateY(50px);
    -ms-transform: translateY(50px);
    transform: translateY(50px);
    -webkit-transition: 0.4s;
    -o-transition: 0.4s;
    transition: 0.4s;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    min-width: 250px;
    margin-top: 40px;
    z-index: 99;
  }

  @media only screen and (min-width: 992px) and (max-width: 1199.98px) {
    .main-menu>li.has-submenu .submenu-nav {
      min-width: 220px;
      margin-top: 38px;
    }
  }

  .main-menu>li.has-submenu .submenu-nav:before {
    content: "";
    position: absolute;
    height: 40px;
    width: 100%;
    left: 0;
    bottom: 100%;
  }

  .main-menu>li.has-submenu .submenu-nav>li>a {
    color: #151515;
    display: block;
    font-size: 15px;
    letter-spacing: inherit;
    text-transform: capitalize;
    padding: 10px 20px;
  }

  .main-menu>li.has-submenu .submenu-nav>li:hover>a {
    background-color: #080b1a;
    color: #fff;
  }

  .main-menu>li.has-submenu .submenu-nav-mega {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    margin-left: -300px;
    padding: 0;
    width: 1080px;
  }

  @media only screen and (min-width: 992px) and (max-width: 1199.98px) {
    .main-menu>li.has-submenu .submenu-nav-mega {
      width: 960px;
      margin-left: -245px;
    }
  }

  .main-menu>li.has-submenu .submenu-nav-mega .mega-menu-item {
    border-right: 1px solid #eee;
    padding: 30px;
    -webkit-flex-basis: 25%;
    -ms-flex-preferred-size: 25%;
    flex-basis: 25%;
  }

  .main-menu>li.has-submenu .submenu-nav-mega .mega-menu-item:last-child {
    border-right: 0;
  }

  .main-menu>li.has-submenu .submenu-nav-mega .mega-menu-item>a {
    display: none;
  }

  .main-menu>li.has-submenu .submenu-nav-mega .mega-menu-item ul li {
    margin-bottom: 10px;
  }

  .main-menu>li.has-submenu .submenu-nav-mega .mega-menu-item ul li:last-child {
    margin-bottom: 0;
  }

  .main-menu>li.has-submenu .submenu-nav-mega .mega-menu-item ul li a {
    color: #151515;
    font-size: 15px;
    line-height: 1;
  }

  .main-menu>li.has-submenu .submenu-nav-mega .mega-menu-item ul li a:hover {
    color: #080b1a;
  }

  .main-menu>li.has-submenu:hover>.submenu-nav {
    -webkit-transform: none;
    -ms-transform: none;
    transform: none;
    opacity: 1;
    visibility: visible;
    pointer-events: visible;
  }

  .res-mobile-menu {
    margin: 0 -10px;
  }

  .res-mobile-menu .slicknav_btn {
    display: none;
  }

  .res-mobile-menu .slicknav_menu {
    padding: 0;
  }

  .res-mobile-menu .slicknav_nav {
    background-color: #000000;
    display: block !important;
    padding: 20px 30px;
  }

  .res-mobile-menu .slicknav_nav li {
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
  }

  .res-mobile-menu .slicknav_nav li:last-child {
    border-bottom: 0;
  }

  .res-mobile-menu .slicknav_nav li a {
    color: #fff;
    font-size: 16px;
    padding: 12px 0;
    margin: 0;
    text-transform: capitalize;
    position: relative;
  }

  .res-mobile-menu .slicknav_nav li a .slicknav_arrow {
    background-color: rgba(255, 255, 255, 0.1);
    color: #fff;
    font-size: 14px;
    display: block;
    text-align: center;
    margin: 0;
    position: absolute;
    right: 0;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    height: 35px;
    line-height: 35px;
    width: 35px;
  }

  .res-mobile-menu .slicknav_nav li a a {
    padding: 0;
  }

  .res-mobile-menu .slicknav_nav li a:hover {
    color: #fff;
    background-color: transparent;
  }

  .res-mobile-menu .slicknav_nav li img {
    display: none;
  }

  .res-mobile-menu .slicknav_nav li ul {
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    margin: 0;
    padding-left: 10px;
  }

  .res-mobile-menu .slicknav_nav li ul li a {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.7);
  }

  .res-mobile-menu .slicknav_nav .slicknav_open>.slicknav_item {
    position: relative;
  }

  .res-mobile-menu .slicknav_nav .slicknav_open>.slicknav_item .slicknav_arrow {
    background-color: #000000;
  }

  .sp-top {
    padding-top: 110px;
  }

  @media only screen and (min-width: 768px) and (max-width: 991.98px) {
    .sp-top {
      padding-top: 90px;
    }
  }

  @media only screen and (max-width: 767.98px) {
    .sp-top {
      padding-top: 60px;
    }
  }

  .sp-top-wt {
    padding-top: 105px;
  }

  @media only screen and (min-width: 768px) and (max-width: 991.98px) {
    .sp-top-wt {
      padding-top: 85px;
    }
  }

  @media only screen and (max-width: 767.98px) {
    .sp-top-wt {
      padding-top: 57px;
    }
  }

  .sp-y {
    padding: 110px 0;
  }

  @media only screen and (min-width: 768px) and (max-width: 991.98px) {
    .sp-y {
      padding: 90px 0;
    }
  }

  @media only screen and (max-width: 767.98px) {
    .sp-y {
      padding: 60px 0;
    }
  }

  .sm-top {
    margin-top: 110px;
  }

  @media only screen and (min-width: 768px) and (max-width: 991.98px) {
    .sm-top {
      margin-top: 90px;
    }
  }

  @media only screen and (max-width: 767.98px) {
    .sm-top {
      margin-top: 60px;
    }
  }

  .sm-top-wt {
    margin-top: 105px;
  }

  @media only screen and (min-width: 768px) and (max-width: 991.98px) {
    .sm-top-wt {
      margin-top: 85px;
    }
  }

  @media only screen and (max-width: 767.98px) {
    .sm-top-wt {
      margin-top: 57px;
    }
  }

  .sm-y {
    margin: 110px 0;
  }

  @media only screen and (min-width: 768px) and (max-width: 991.98px) {
    .sm-y {
      margin: 90px 0;
    }
  }

  @media only screen and (max-width: 767.98px) {
    .sm-y {
      margin: 60px 0;
    }
  }

  .header-area {
    background-color: #000000;
    padding: 10px 0;
    -webkit-transition: 0.4s;
    -o-transition: 0.4s;
    transition: 0.4s;
  }

  .header-area.sticky {
    -webkit-animation: slideInDown 0.6s forwards;
    animation: slideInDown 0.6s forwards;
    padding: 5px 0 15px;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    z-index: 99;
  }

  @media only screen and (max-width: 767.98px),
  only screen and (min-width: 768px) and (max-width: 991.98px) {
    .header-area.sticky {
      padding: 20px 0;
    }
  }

  .header-area.sticky .main-menu .submenu-nav {
    margin-top: 25px;
  }

  .header-area.sticky .main-menu .submenu-nav:before {
    height: 25px;
  }

  .header-action {
    color: #fff;
    font-size: 22px;
  }

  @media only screen and (min-width: 992px) and (max-width: 1199.98px),
  only screen and (max-width: 767.98px) {
    .header-action {
      font-size: 16px;
    }
  }

  .header-action a {
    color: #fff;
  }

  @media only screen and (max-width: 575.98px) {
    .header-action a.tel-no {
      display: none;
    }
  }

  .header-action [class*="btn-"] {
    color: #fff;
    margin-left: 20px;
  }

  .footer-area {
    background-color: #f8f9fc;
  }

  .widget-item {
    margin-top: 38px;
  }

  .widget-item .widget-title {
    color: #080b1a;
    font-size: 22px;
    font-weight: 600;
    line-height: 1;
    margin-top: -1px;
    margin-bottom: 22px;
  }

  @media only screen and (max-width: 767.98px) {
    .widget-item .widget-title {
      margin-bottom: 15px;
    }
  }

  .widget-item address {
    line-height: 2;
    margin-bottom: 0;
    font-weight: 500;
  }

  .widget-list li {
    line-height: 2;
  }

  .widget-list li a {
    color: #151515;
    font-weight: 500;
    -webkit-transition: 0.2s;
    -o-transition: 0.2s;
    transition: 0.2s;
  }

  .widget-list li a:hover {
    color: #080b1a;
    padding-left: 5px;
  }

  .about-widget img {
    max-width: 120px;
    margin-bottom: 20px;
  }

  .copyright-txt {
    font-weight: 500;
    background-color: black !important;
    color: #fff;
    padding: 20px;
  }

  @media only screen and (max-width: 767.98px) {
    .copyright-txt {
      margin-top: 15px;
    }
  }

  .off-canvas-wrapper {
    position: fixed;
    left: 0;
    top: 0;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    height: 100vh;
    width: 100vw;
    z-index: 9999;
  }

  .off-canvas-wrapper.active {
    opacity: 1;
    visibility: visible;
    pointer-events: visible;
  }

  .off-canvas-wrapper.active .off-canvas-inner {
    -webkit-transform: none;
    -ms-transform: none;
    transform: none;
  }

  .off-canvas-wrapper.active .btn-close {
    display: block;
  }

  .off-canvas-wrapper.active .off-canvas-overlay {
    opacity: 1;
    visibility: visible;
  }

  .off-canvas-wrapper .close-btn {
    color: #080b1a;
    font-size: 50px;
    line-height: 1;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 9;
    background: #fff;
    width: 100%;
    text-align: right;
    padding-right: 15px;
    padding-top: 10px;
  }

  .off-canvas-wrapper .close-btn .btn-close {
    margin-left: auto;
  }

  .off-canvas-wrapper .close-btn i {
    line-height: 1;
  }

  .off-canvas-wrapper .close-btn:hover {
    color: #080b1a;
  }

  .off-canvas-cog .off-canvas-content {
    padding-right: 30px;
    padding-left: 30px;
  }

  @media only screen and (max-width: 767.98px) {
    .off-canvas-cog .off-canvas-content {
      padding-right: 15px;
      padding-left: 15px;
    }
  }

  .off-canvas-overlay {
    background-color: rgba(0, 0, 0, 0.8);
    cursor: url(../img/icons/cancel-white.png), auto;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: 0.4s;
    -o-transition: 0.4s;
    transition: 0.4s;
    height: 100%;
    width: 100%;
    z-index: 2;
  }

  .off-canvas-inner {
    background-color: #fff;
    position: absolute;
    right: 0;
    top: 0;
    -webkit-transform: translateX(100%);
    -ms-transform: translateX(100%);
    transform: translateX(100%);
    -webkit-transition: 0.45s;
    -o-transition: 0.45s;
    transition: 0.45s;
    height: 100%;
    z-index: 3;
    overflow-y: auto;
  }

  .off-canvas-content {
    width: 380px;
    height: 100%;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 100px 0 80px;
    overflow-y: auto;
    overflow-x: hidden;
  }

  @media only screen and (max-width: 767.98px) {
    .off-canvas-content {
      padding: 65px 0 30px;
    }
  }

  @media only screen and (max-width: 575.98px) {
    .off-canvas-content {
      width: 280px;
    }
  }

  @media only screen and (min-width: 1080px) {
    .res-mob-hed {
      display: none;
    }

    .logo-area a img {
      height: 70px;
    }
  }

  /* Floating Social Media Bar Style Starts Here */

  .fl-fl {
    background: #e5c121;
    text-transform: uppercase;
    letter-spacing: 3px;
    padding: 4px;
    width: 190px;
    position: fixed;
    right: -147px;
    z-index: 1000;
    font: normal normal 10px Arial;
    -webkit-transition: all .25s ease;
    -moz-transition: all .25s ease;
    -ms-transition: all .25s ease;
    -o-transition: all .25s ease;
    transition: all .25s ease;
  }

  .float-sm .fa {
    font-size: 20px;
    color: #000;
    padding: 10px 0;
    width: 40px;
    margin-left: 8px;
  }

  .fl-fl:hover {
    right: 0;
  }

  .fl-fl a {
    color: #000 !important;
    text-decoration: none;
    text-align: center;
    line-height: 43px !important;
    vertical-align: top !important;
    font-weight: 700;
  }

  .float-fb {
    top: 160px;
  }

  .float-tw {
    top: 215px;
  }

  .float-gp {
    top: 270px;
  }

  .float-rs {
    top: 269px;
  }

  .float-ig {
    top: 323px;
  }

  .float-wh {
    top: 376px;
  }

  header.header-bg {
    background-color: #000000 !important;
  }

  .nav-ul-mb .nav-mb-item {
    padding: 10px 5px;
    font-size: 16px;
    color: #fff !important;
  }

  .nav-ul-mb .nav-mb-item .mb-menu-link {
    font-size: 16px !important;
    color: #fff !important;
    text-transform: uppercase;
  }

  .offcanvas {
    color: #ffffff;
    background-color: #000000;
  }

  .nav-mb-item a span {
    color: #ffffff !important;
    text-transform: uppercase;
  }

  .sub-nav-menu li a {
    color: #d1d1d1 !important;
    border-bottom: 1px solid #fff;
    padding: 10px;
  }

  .nav-ul-mb .btn-open-sub:after,
  .nav-ul-mb .btn-open-sub::before {
    background-color: #ffffff !important;
  }

  .canvas-mb .icon-close-popup {
    right: 15px !important;
    color: #ffffff !important;
    left: auto;
  }

  .nav-ul-mb .btn-open-sub {
    background: #2f2f2f !important;
  }

  .header-action a svg,
  .header-action a svg path {
    color: #fff !important;
  }

  .float-sm .fa {
    font-size: 20px;
    color: #000;
    padding: 0px 0;
    width: 25px;
    margin-left: 8px;
  }

  .main-menu>li.has-submenu .submenu-nav>li>a:hover {
    color: #fff !important;

  }

  .main-menu>li.has-submenu:after {
    color: #000 !important;

  }
</style>


<!-- <div class="float-sm">
  <div class="fl-fl float-fb">
    <img class="fa fa-facebook" src="https://img.icons8.com/ios-filled/1A1A1A/facebook-f.png" alt="facebook-f" />
    <a href="#" target="_blank"> Like us!</a>
  </div>

  <div class="fl-fl float-tw">
    <img class="fa fa-twitter" src="https://img.icons8.com/ios-filled/1A1A1A/twitterx--v2.png" alt="twitterx--v2" />
    <a href="#" target="_blank">Follow us!</a>
  </div>

  <div class="fl-fl float-rs">
    <img class="fa fa-linkedin" src="https://img.icons8.com/ios-glyphs/1A1A1A/linkedin-2--v1.png"
      alt="linkedin-2--v1" />
    <a href="#" target="_blank">Follow us !</a>
  </div>
  <div class="fl-fl float-ig">
    <img class="fa fa-instagram"
      src="https://img.icons8.com/external-tal-revivo-bold-tal-revivo/1A1A1A/external-instagram-photo-and-video-sharing-social-networking-service-owned-by-facebook-logo-bold-tal-revivo.png"
      alt="instagram-new--v1" />

    <a href="#" target="_blank">Follow us!</a>
  </div>
  <div class="fl-fl float-wh">
    <img class="fa fa-whatsapp" src="https://img.icons8.com/ios-filled/50/1A1A1A/whatsapp--v1.png" alt="whatsapp--v1" />
    <a href="#" target="_blank">Follow us!</a>
  </div>
</div> -->

<!--== Start Header Area Wrapper ==-->
<header class="header-area">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-5 col-lg-2">
        <!-- Start Logo Area -->
        <div class="logo-area">
          <a href="index.php"><img src="images/logo/logo-white.png" alt="Auctech-Logo"></a>
        </div>
        <!-- End Logo Area -->
      </div>
      <div class="col-lg-10 d-none d-lg-block">
        <!-- Start Navigation Area -->
        <div class="navigation-area">
          <ul class="main-menu nav">
            <li><a href="index.php">Projects</a></li>

            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
        <!-- End Navigation Area -->
      </div>
      <div class="col-7  res-mob-hed">
        <!-- Start Header Action Area -->
        <div class="header-action text-right">

          <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" style="float:right">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
              <path
                d="M2.00056 2.28571H16.8577C17.1608 2.28571 17.4515 2.16531 17.6658 1.95098C17.8802 1.73665 18.0006 1.44596 18.0006 1.14286C18.0006 0.839753 17.8802 0.549063 17.6658 0.334735C17.4515 0.120408 17.1608 0 16.8577 0H2.00056C1.69745 0 1.40676 0.120408 1.19244 0.334735C0.978109 0.549063 0.857702 0.839753 0.857702 1.14286C0.857702 1.44596 0.978109 1.73665 1.19244 1.95098C1.40676 2.16531 1.69745 2.28571 2.00056 2.28571ZM0.857702 8C0.857702 7.6969 0.978109 7.40621 1.19244 7.19188C1.40676 6.97755 1.69745 6.85714 2.00056 6.85714H22.572C22.8751 6.85714 23.1658 6.97755 23.3801 7.19188C23.5944 7.40621 23.7148 7.6969 23.7148 8C23.7148 8.30311 23.5944 8.59379 23.3801 8.80812C23.1658 9.02245 22.8751 9.14286 22.572 9.14286H2.00056C1.69745 9.14286 1.40676 9.02245 1.19244 8.80812C0.978109 8.59379 0.857702 8.30311 0.857702 8ZM0.857702 14.8571C0.857702 14.554 0.978109 14.2633 1.19244 14.049C1.40676 13.8347 1.69745 13.7143 2.00056 13.7143H12.2863C12.5894 13.7143 12.8801 13.8347 13.0944 14.049C13.3087 14.2633 13.4291 14.554 13.4291 14.8571C13.4291 15.1602 13.3087 15.4509 13.0944 15.6653C12.8801 15.8796 12.5894 16 12.2863 16H2.00056C1.69745 16 1.40676 15.8796 1.19244 15.6653C0.978109 15.4509 0.857702 15.1602 0.857702 14.8571Z"
                fill="currentColor"></path>
            </svg>
          </a>

        </div>
        <!-- End Header Action Area -->
      </div>
    </div>
  </div>
</header>


<!-- mobile menu -->
<div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
  <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
  <div class="mb-canvas-content">
    <div class="mb-body">
      <ul class="nav-ul-mb" id="wrapper-menu-navigation">
        <li class="nav-mb-item"><a href="#"> <span>Home</span> </a></li>
        <li class="nav-mb-item"><a href="#"> <span>Projects</span> </a></li>
        <li class="nav-mb-item"><a href="#"> <span>Contact</span> </a></li>
      </ul>
    </div>
  </div>
</div>