<?php 

include('db_con.php');

$industries = [];
$categories = [];
$countries = [];
$years = [];
$industry_counts = [];

$industry_result = $con->query("SELECT industry_name, COUNT(*) as project_count FROM add_project WHERE status = 1 GROUP BY industry_name");
while ($row = $industry_result->fetch_assoc()) {
    $industries[] = $row['industry_name'];
    $industry_counts[$row['industry_name']] = $row['project_count'];
}

$category_result = $con->query("SELECT DISTINCT pro_category FROM add_project WHERE status = 1");
while ($row = $category_result->fetch_assoc()) {
    $categories[] = $row['pro_category'];
}

$country_result = $con->query("SELECT DISTINCT country_name FROM add_project WHERE status = 1");
while ($row = $country_result->fetch_assoc()) {
    $countries[] = $row['country_name'];
}

$year_result = $con->query("SELECT DISTINCT year FROM add_project WHERE status = 1");
while ($row = $year_result->fetch_assoc()) {
    $years[] = $row['year'];
}
?>



<!DOCTYPE html>

<html xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Auctech Portfolio</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="fonts/fonts.css">
    <!-- Icons -->
    <link rel="stylesheet" href="fonts/font-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="../../../sibforms.com/forms/end-form/build/sib-styles.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/logo/favicon.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--== All FontAwesome CSS ==-->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet"/>





    <style>
        a.filter-item.active {
        //background-color: red;
        color: red;
        }
        @media only screen and (max-width: 767px) {

            .logo-header img {
                width: 110px;
                margin-left: 160%;
                margin-top: 18px;
            }
        }
        .pagination-link{
            background:black;
            color: white !important;
        }
        }
        .tf-grid-layout .wg-pagination {
            grid-column: 3 / -1 !important;
            width: 100%;
        }
                .tf-grid-layout .filters {
            grid-column: 1 / -3;
            width: 60%;
        }
            
        .filters {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        .filters-container {
            display: flex;
            align-items: center;
        }

        .entries-box {
            margin-right: 20px;
            display: flex;
            align-items: center;
        }

        .entries-dropdown {
            padding: 8px 20px;
            font-size: 18px;
            margin-left: 7px;
        }


        .display-count {
            font-size: 14px;
            color: #555;
        }

        .wg-pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }


        .tf-pagination-list li {
            margin: 0 5px;
        }


        .pagination-link {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .pagination-link:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination-link.active {
            background-color: #007bff;
            color: white;
        }

        .pagination-prev.disabled,
        .pagination-next.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }


        .pagination-prev a,
        .pagination-next a {
            padding: 8px 12px;
            font-size: 14px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .pagination-prev a:hover,
        .pagination-next a:hover {
            background-color: #007bff;
            color: white;
        }
        
        .pagination-container {
            display: flex;
            justify-content: center;
            padding: 10px;
            list-style: none;
        }
        
        .pagination-container .page-item {
            margin: 0 5px;
        }
        
        .pagination-container .page-link {
            display: block;
            padding: 8px 12px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
            color: #007bff;
            text-decoration: none;
            border-radius: 4px;
        }
        
        .pagination-container .page-item.active .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        
        .pagination-container .page-item.disabled .page-link {
            color: #ccc;
            pointer-events: none;
            background-color: #f8f9fa;
        }
        .image-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers without cutting */
        }
         @media (min-width: 768px) {
            .image-container img {
               height:400px;
            }
            .search-mob{
                display: none !important;
            }
             .card-product-wrapper{
                height: 280px; width: 100%; margin-bottom:0px
            }
        }
        @media (max-width: 768px) {
            .image-container img {
                object-fit: contain; /* On small screens, image fits without cutting */
            }
            .search-desk{
                display: none !important;
            }
           
        }
        .card-product-wrapper{
            margin-bottom:0px;
        }
        
        .main-menu {
          -webkit-align-content: center;
          -ms-flex-line-pack: center;
          align-content: center;
          -webkit-box-pack: end;
          -webkit-justify-content: flex-end;
          -ms-flex-pack: end;
          justify-content: flex-end;
        }
        .main-menu > li {
          margin-right: 20px;
          position: relative;
        }
        .main-menu > li:last-child {
          margin-right: 0;
        }
        .main-menu > li > a {
          color: #fff;
          display: block;
          line-height: 1;
          letter-spacing: 1px;
          text-transform: uppercase;
          position: relative;
        }
        @media only screen and (min-width: 992px) and (max-width: 1199.98px) {
          .main-menu > li > a {
            font-size: 14px;
          }
        }
        .main-menu > li.has-submenu {
          margin-right: 37px;
          padding-right: 10px;
          position: relative;
        }
        .main-menu > li.has-submenu:after {
          color: #fff;
          content: "\f107";
          font-size: 16px;
          line-height: 1;
          font-family: FontAwesome;
          position: absolute;
          right: -5px;
          top: 0;
        }
        .main-menu > li.has-submenu .submenu-nav {
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
          .main-menu > li.has-submenu .submenu-nav {
            min-width: 220px;
            margin-top: 38px;
          }
        }
        .main-menu > li.has-submenu .submenu-nav:before {
          content: "";
          position: absolute;
          height: 40px;
          width: 100%;
          left: 0;
          bottom: 100%;
        }
        .main-menu > li.has-submenu .submenu-nav > li > a {
          color: #151515;
          display: block;
          font-size: 15px;
          letter-spacing: inherit;
          text-transform: capitalize;
          padding: 10px 20px;
        }
        .main-menu > li.has-submenu .submenu-nav > li:hover > a {
          background-color: #080b1a;
          color: #fff;
        }
        .main-menu > li.has-submenu .submenu-nav-mega {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex;
          margin-left: -300px;
          padding: 0;
          width: 1080px;
        }
        @media only screen and (min-width: 992px) and (max-width: 1199.98px) {
          .main-menu > li.has-submenu .submenu-nav-mega {
            width: 960px;
            margin-left: -245px;
          }
        }
        .main-menu > li.has-submenu .submenu-nav-mega .mega-menu-item {
          border-right: 1px solid #eee;
          padding: 30px;
          -webkit-flex-basis: 25%;
          -ms-flex-preferred-size: 25%;
          flex-basis: 25%;
        }
        .main-menu > li.has-submenu .submenu-nav-mega .mega-menu-item:last-child {
          border-right: 0;
        }
        .main-menu > li.has-submenu .submenu-nav-mega .mega-menu-item > a {
          display: none;
        }
        .main-menu > li.has-submenu .submenu-nav-mega .mega-menu-item ul li {
          margin-bottom: 10px;
        }
        .main-menu > li.has-submenu .submenu-nav-mega .mega-menu-item ul li:last-child {
          margin-bottom: 0;
        }
        .main-menu > li.has-submenu .submenu-nav-mega .mega-menu-item ul li a {
          color: #151515;
          font-size: 15px;
          line-height: 1;
        }
        .main-menu > li.has-submenu .submenu-nav-mega .mega-menu-item ul li a:hover {
          color: #080b1a;
        }
        .main-menu > li.has-submenu:hover > .submenu-nav {
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
        .res-mobile-menu .slicknav_nav .slicknav_open > .slicknav_item {
          position: relative;
        }
        .res-mobile-menu .slicknav_nav .slicknav_open > .slicknav_item .slicknav_arrow {
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
          .logo-area a img{
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
          line-height: 43px!important;
          vertical-align: top!important;
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
    </style>
    
    
    
</head>

<body class="preload-wrapper">
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">
        <!--Social Media-->
<div class="float-sm">
  <div class="fl-fl float-fb">
    <i class="fa fa-facebook"></i>
    <a href="https://www.facebook.com/auctechmarketing" target="_blank"> Like us!</a>
  </div>
  <div class="fl-fl float-tw">
    <i class="fa fa-twitter"></i>
    <a href="https://twitter.com/" target="_blank">Follow us!</a>
  </div>
 
  <div class="fl-fl float-rs">
    <i class="fa fa-linkedin"></i>
    <a href="https://www.linkedin.com/" target="_blank">Follow us !</a>
  </div>
  <div class="fl-fl float-ig">
    <i class="fa fa-instagram"></i>
    <a href="https://www.instagram.com/auctechmarketing/" target="_blank">Follow us!</a>
  </div>
  <div class="fl-fl float-wh">
    <i class="fa fa-whatsapp"></i>
    <a href="https://wa.me/916386452123" target="_blank">Follow us!</a>
  </div>
</div>	
        <!-- header -->
    <!--== Start Header Area Wrapper ==-->
    <header class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-5 col-lg-2">
                    <!-- Start Logo Area -->
                    <div class="logo-area">
                        <a href="index.php"><img src="../assets/img/logo2.png" alt="Auctech-Logo"></a>
                    </div>
                    <!-- End Logo Area -->
                </div>
                <div class="col-lg-10 d-none d-lg-block">
                    <!-- Start Navigation Area -->
                    <div class="navigation-area">
                        <ul class="main-menu nav">
                            <li><a href="marcom-lab.php">MarCom Lab</a></li>
                            <li class="has-submenu"><a href="javascript:void(0)">Department</a>
                              <ul class="submenu-nav">
                                <li><a href="https://www.auctech.in/creative-production.php">Creative Production</a></li>
                                <li><a href="https://www.auctech.in/marcom-consulting.php">MarCom Consulting</a></li>
                                <li><a href="https://www.auctech.in/tech-consulting.php">Tech Consulting</a></li>
                                <li><a href="https://www.auctech.in/system-integration.php">System Integration</a></li>
                              </ul>
                            </li>
                            <li><a href="https://www.auctech.in/partners.php">PARTNERS</a></li>
                            <li><a href="#">Experts & Scientist</a></li>
                            <li><a href="https://www.auctech.in/portfolio">Inventions</a></li>
                            <li><a href="https://www.auctech.in/whitepapers.php">Whitepapers</a></li>
                            <li><a href="https://www.auctech.in/contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <!-- End Navigation Area -->
                </div>
                <div class="col-7  res-mob-hed">
                    <!-- Start Header Action Area -->
                    <div class="header-action text-right">
                     
                        <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" style="float:right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                                <path d="M2.00056 2.28571H16.8577C17.1608 2.28571 17.4515 2.16531 17.6658 1.95098C17.8802 1.73665 18.0006 1.44596 18.0006 1.14286C18.0006 0.839753 17.8802 0.549063 17.6658 0.334735C17.4515 0.120408 17.1608 0 16.8577 0H2.00056C1.69745 0 1.40676 0.120408 1.19244 0.334735C0.978109 0.549063 0.857702 0.839753 0.857702 1.14286C0.857702 1.44596 0.978109 1.73665 1.19244 1.95098C1.40676 2.16531 1.69745 2.28571 2.00056 2.28571ZM0.857702 8C0.857702 7.6969 0.978109 7.40621 1.19244 7.19188C1.40676 6.97755 1.69745 6.85714 2.00056 6.85714H22.572C22.8751 6.85714 23.1658 6.97755 23.3801 7.19188C23.5944 7.40621 23.7148 7.6969 23.7148 8C23.7148 8.30311 23.5944 8.59379 23.3801 8.80812C23.1658 9.02245 22.8751 9.14286 22.572 9.14286H2.00056C1.69745 9.14286 1.40676 9.02245 1.19244 8.80812C0.978109 8.59379 0.857702 8.30311 0.857702 8ZM0.857702 14.8571C0.857702 14.554 0.978109 14.2633 1.19244 14.049C1.40676 13.8347 1.69745 13.7143 2.00056 13.7143H12.2863C12.5894 13.7143 12.8801 13.8347 13.0944 14.049C13.3087 14.2633 13.4291 14.554 13.4291 14.8571C13.4291 15.1602 13.3087 15.4509 13.0944 15.6653C12.8801 15.8796 12.5894 16 12.2863 16H2.00056C1.69745 16 1.40676 15.8796 1.19244 15.6653C0.978109 15.4509 0.857702 15.1602 0.857702 14.8571Z" fill="currentColor"></path>
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
                    <li class="nav-mb-item"><a href="#"> <span>Home</span> </a></li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-five" class="collapsed mb-menu-link current" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-five">
                            <span>Blog</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-five" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="blog-grid.html" class="sub-nav-link">Grid layout</a></li>
                                <li><a href="blog-sidebar-left.html" class="sub-nav-link">Left sidebar</a></li>
                                <li><a href="blog-sidebar-right.html" class="sub-nav-link">Right sidebar</a></li>
                                <li><a href="blog-list.html" class="sub-nav-link">Blog list</a></li>
                                <li><a href="blog-detail.html" class="sub-nav-link">Single Post</a></li>
                            </ul>
                        </div>
                        
                    </li>
                    <li class="nav-mb-item"><a href="#"> <span>Home</span> </a></li>
                    <li class="nav-mb-item"><a href="#"> <span>Home</span> </a></li>
                    <li class="nav-mb-item"><a href="#"> <span>Home</span> </a></li>
                    <li class="nav-mb-item"><a href="#"> <span>Home</span> </a></li>
                    <li class="nav-mb-item"><a href="#"> <span>Home</span> </a></li>
                </ul>
                <div class="mb-other-content">
                    <ul class="mb-info">
                        <li>Address: Flat 101, Shaligram Building,
                            New Jiamau, 1090 Chauraha,
                            <br> Lucknow, Uttar Pradesh 226001.
                        </li>
                        <li>Email: <b>info@auctech.in</b></li>
                        <li>Phone: <b>+91 6386452123, 9838075490</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /mobile menu -->
    
    
    <!--== End Header Area Wrapper ==-->
        <!-- /header -->


        <!-- page-title -->
        <!--<div class="tf-page-title bg_bannerz_home" style="background-image: url(images/portfolio-banner.jpg);width:100%; ">-->
        <!--    <div class="container-full">-->
        <!--        <div class="row">-->
        <!--            <div class="col-12">-->
                        <!--<div class="heading text-center">Our Projects</div>-->
        <!--                <p class="text-center text-2 text_black-2 mt_5"></p>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- /page-title -->
        <section class="flat-spacing-1">
            <div class="container">
                <div class="tf-shop-control grid-3 align-items-center">
                    <div class="tf-control-filter">
                        <a href="#filterShop" data-bs-toggle="offcanvas" data-bs-target="#sidebarmobile"
                            aria-controls="offcanvasLeft" class="tf-btn-filter">
                            <span class="icon icon-filter"></span><span class="text">Filter</span>
                        </a>
                    </div>
                    <ul class="tf-control-layout d-flex justify-content-center search-desk">
                        <div class="tf-search-sticky" style="width:100%">
                            <form class="tf-mini-search-frm">
                                <fieldset class="text">
                                    <input type="text" placeholder="Search web" id="searchWeb" class="" name="text" tabindex="0" value="" aria-required="true" required="">
                                </fieldset>
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </form>
                        </div>
                    </ul>
                    <div class="tf-control-sorting d-flex justify-content-end">
                        <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                            <div class="btn-select">
                                <span class="text-sort-value">Project Type</span>
                                <span class="icon icon-arrow-down"></span>
                            </div>
                            <div class="dropdown-menu">
                                <div class="select-item active" data-filter="status" data-value="1">
                                    <span class="text-value-item">All</span>
                                </div>
                                <div class="select-item" data-filter="feature_status" data-value="1">
                                    <span class="text-value-item">Featured Project</span>
                                </div>
                                <div class="select-item" data-filter="king_status" data-value="1">
                                    <span class="text-value-item">King Project</span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tf-search-sticky mb-4 search-mob" style="width:100%">
                    <form class="tf-mini-search-frm">
                        <fieldset class="text">
                            <input type="text" placeholder="Search mobile" id="searchMobile" class="" name="text" tabindex="0" value="" aria-required="true" required="">
                        </fieldset>
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </form>
                </div>
                
                <div class="tf-row-flex">
                   

                    <div class="wrapper-control-shop " style="width:100%;">
                     

                  <div class="tf-grid-layout wrapper-shop tf-col-3" id="gridLayout">
                            <?php foreach ($projects as $row): ?>
                                <div class="card-product grid">
                        
                                    <div class="card-product-wrapper">
                                        <?php if ($row['king_status'] == 1): ?>
                                            <div class="king-crown-icon" style="position: absolute; right: 5px; z-index: 10;">
                                                <img width="40" height="40" src="https://img.icons8.com/color/48/fairytale.png" alt="King Crown">
                                            </div>
                                        <?php endif; ?>
                        
                                        <a href="project/<?= $row['pro_url']; ?>" class="product-img">
                                            <?php if ($row['feature_status'] == 1): ?>
                                                <div class="king-crown-icon" style="position: absolute; top: 10px; right: 10px; z-index: 10;">
                                                    <span class="badge rounded-pill bg-danger">Feature</span>
                                                </div>
                                            <?php endif; ?>
                        
                                            <img class="lazyload img-product"
                                                data-src="project/project_upload/<?= $row['image']; ?>"
                                                src="project/project_upload/<?= $row['image']; ?>" alt="image-product">
                                            <img class="lazyload img-hover" data-src="project/project_upload/<?= $row['image']; ?>"
                                                src="project/project_upload/<?= $row['image']; ?>" alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="project/<?= $row['pro_url']; ?>" class="title link"><?= $row['pro_tile']; ?></a>
                                    </div>
                                    
                                </div>
                            <?php endforeach; ?>
                        </div>

                      
                      <ul id="pagination" class="pagination-container"></ul>
                       
                    </div>
                </div>
            </div>
        </section>


        <!-- footer -->
        <?php
        include('footer.php');
       ?>
        <!-- /footer -->

    </div>

    <!-- gotop -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;">
            </path>
        </svg>
    </div>
    <!-- /gotop -->



    <!-- Filter -->
    <div class="offcanvas offcanvas-start canvas-filter">
        <div class="canvas-wrapper">
            <header class="canvas-header">
                <div class="filter-icon">
                    <span class="icon icon-filter"></span>
                    <span>Filter</span>
                </div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </header>
            <div class="canvas-body">
                <div class="widget-facet wd-categories">
                    <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true"
                        aria-controls="categories">
                        <span>Project categories</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="categories" class="collapse show">

                    </div>
                </div>
                <form action="#" id="facet-filter-form" class="facet-filter-form">
                    <div class="widget-facet">
                        <div class="facet-title" data-bs-target="#availability" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="availability">

                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div id="availability" class="collapse show">

                        </div>
                    </div>
                    <div class="widget-facet">
                        <div class="facet-title" data-bs-target="#price" data-bs-toggle="collapse" aria-expanded="true"
                            aria-controls="price">
                            <span>Price</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div id="price" class="collapse show">
                            <div class="widget-price filter-price">
                                <div class="price-val-range" id="price-value-range" data-min="0" data-max="500"></div>
                                <div class="box-title-price">
                                    <span class="title-price">Price :</span>
                                    <div class="caption-price">
                                        <div class="price-val" id="price-min-value" data-currency="$"></div>
                                        <span>-</span>
                                        <div class="price-val" id="price-max-value" data-currency="$"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Filter -->


    <!-- Filter sidebar-->
    <div class="offcanvas offcanvas-start canvas-filter canvas-sidebar" id="sidebarmobile">
        <div class="canvas-wrapper">
            <header class="canvas-header">
                <span class="title">PROJECT FILTER</span>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </header>
            <div class="canvas-body sidebar-mobile-append">
                <!-- Industry Filter -->
                <div class="widget-facet wd-categories">
                    <div class="facet-title" data-bs-target="#industry" data-bs-toggle="collapse">
                        <span>All Industries</span><span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="industry" class="collapse show">
                        <ul class="list-categoris current-scrollbar mb_36">
                            <?php foreach ($industries as $industry): ?>
                            <li class="cate-item">
                                <a href="#" class="filter-item" data-filter="industry"
                                    data-value="<?php echo $industry; ?>">
                                    <span><?php echo $industry; ?></span>&nbsp;<span>(<?php echo $industry_counts[$industry]; ?>)</span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#category" data-bs-toggle="collapse">
                        <span>Project Category</span><span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="category" class="collapse show">
                        <ul class="widget-iconbox-list mb_36">
                            <?php foreach ($categories as $category): ?>
                            <li><a href="#" class="filter-item" data-filter="category"
                                    data-value="<?php echo $category; ?>">
                                    <span><?php echo $category; ?></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Country Filter -->
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#country" data-bs-toggle="collapse">
                        <span>Country Wise</span><span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="country" class="collapse show">
                        <ul class="widget-iconbox-list mb_36">
                            <?php foreach ($countries as $country): ?>
                            <li><a href="#" class="filter-item" data-filter="country"
                                    data-value="<?php echo $country; ?>">
                                    <span><?php echo $country; ?></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Year Filter -->
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#year" data-bs-toggle="collapse">
                        <span>Year Wise</span><span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="year" class="collapse show">
                        <ul class="widget-iconbox-list mb_36">
                            <?php foreach ($years as $year): ?>
                            <li><a href="#" class="filter-item" data-filter="year" data-value="<?php echo $year; ?>">
                                    <span><?php echo $year; ?></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Filter sidebar -->
<script>
$(document).ready(function() {
    // Global variables used across functions
    let currentPage = 1;
    let limit = 12;
    let filters = { status: 1 }; // Default: show active projects

    // Function to fetch projects based on current filters, search, and pagination
    function fetchProjects() {
        filters.page = currentPage;
        filters.limit = limit;
        
        // Get search query from either search input
        let searchQuery = $("#searchWeb").val() || $("#searchMobile").val();
        if (searchQuery.trim() !== "") {
            filters.search = searchQuery;
        } else {
            delete filters.search;
        }
        
        $.ajax({
            url: 'fetch_projects.php',
            type: 'GET',
            data: filters,
            dataType: 'json',
            success: function(response) {
                let html = '';
                if (response.projects.length > 0) {
                    $.each(response.projects, function(index, row) {
                        html += `
                        <div class="card-product grid">
                            <div class="card-product-wrapper blog-article-item">
                                <a href="project/${row.pro_url}" class="product-img">
                                    <img class="lazyload img-product" data-src="project/project_upload/${row.image}"
                                         src="project/project_upload/${row.image}" alt="image-product">
                                    <img class="lazyload img-hover" data-src="project/project_upload/${row.image}"
                                         src="project/project_upload/${row.image}" alt="image-product">
                                </a>
                                ${row.king_status == 1 ? `
                                <div class="article-label" style="z-index:1" title="King Project">
                                    <a class="tf-btn btn-sm radius-3 btn-fill animate-hover-btn">
                                        <img src="https://img.icons8.com/3d-fluency/94/crown.png" alt="King Crown">
                                    </a>
                                </div>` : ''}
                                ${row.feature_status == 1 ? `
                                <div class="article-label" style="z-index:1" title="Featured Project">
                                    <a class="tf-btn btn-sm radius-3 btn-fill animate-hover-btn text-danger">
                                        FEATURE
                                    </a>
                                </div>` : ''}
                            </div>
                            <div class="card-product-info">
                                <a href="project/${row.pro_url}" class="title link" style="font-size:20px">
                                    ${row.pro_tile}
                                </a>
                            </div>
                            <div class="article-btn mt-3">
                                <a href="project/${row.pro_url}" class="tf-btn btn-line fw-6">
                                    View Details<i class="icon icon-arrow1-top-left"></i>
                                </a>
                            </div>
                        </div>`;
                    });
                } else {
                    html = '<p>No projects found.</p>';
                }
                $("#gridLayout").html(html);
                generatePagination(response.totalPages);
            }
        });
    }

    // Function to generate pagination links
    function generatePagination(totalPages) {
        let paginationHtml = '';
        if (totalPages > 1) {
            // Previous button
            paginationHtml += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a href="#" class="page-link" data-page="${currentPage - 1}">«</a>
            </li>`;
            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                paginationHtml += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a href="#" class="page-link" data-page="${i}">${i}</a>
                </li>`;
            }
            // Next button
            paginationHtml += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                <a href="#" class="page-link" data-page="${currentPage + 1}">»</a>
            </li>`;
        }
        $("#pagination").html(paginationHtml);
    }

    // search inputs (both web and mobile)
    $("#searchWeb, #searchMobile").on("input", function() {
        currentPage = 1; // Reset to first page when searching
        fetchProjects();
    });

    // Event listener for dropdown filters (select-item)
    $(".select-item").on("click", function(e) {
        e.preventDefault();
        let filterType = $(this).data("filter");
        let filterValue = $(this).data("value");
        // Reset filters (keeping status active) and apply the selected filter
        filters = { status: 1 };
        filters[filterType] = filterValue;
        currentPage = 1; // Reset to first page when applying filter
        fetchProjects();
    });

    // Event listener for category, industry, country, and year filters (filter-item)
    $(".filter-item").on("click", function(e) {
        e.preventDefault();
        let filterType = $(this).data("filter");
        let filterValue = $(this).data("value");
        // Reset filters and apply the new filter
        filters = { status: 1 };
        filters[filterType] = filterValue;
        currentPage = 1;
        fetchProjects();
    });

    // Event listener for pagination clicks (using .page-link class)
    $(document).on("click", ".page-link", function(e) {
        e.preventDefault();
        let page = parseInt($(this).data("page"));
        if (!$(this).parent().hasClass("disabled") && page !== currentPage) {
            currentPage = page;
            fetchProjects();
        }
    });

    // Initial projects fetch on page load
    fetchProjects();
});
</script> 

            <!-- Javascript -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/swiper-bundle.min.js"></script>
            <script type="text/javascript" src="js/carousel.js"></script>
            <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
            <script type="text/javascript" src="js/lazysize.min.js"></script>
            <script type="text/javascript" src="js/count-down.js"></script>
            <script type="text/javascript" src="js/wow.min.js"></script>
            <script type="text/javascript" src="js/multiple-modal.js"></script>
            <script type="text/javascript" src="js/nouislider.min.js"></script>
            <script type="text/javascript" src="js/shop.js"></script>
            <script type="text/javascript" src="js/main.js"></script>
      
</body>

</html>