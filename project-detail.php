<?php
include 'db_con.php';

if (isset($_GET['page_url']))
{

    $page_url = mysqli_real_escape_string($con, $_GET['page_url']);

    $project_query = "SELECT * FROM add_project WHERE pro_url = '$page_url'";
    $project_result = mysqli_query($con, $project_query);

    if ($project_result && mysqli_num_rows($project_result) > 0)
    {
        $project = mysqli_fetch_assoc($project_result);

        // Fetch latest slider image (if available)
        $slider_image_query = "SELECT slider_image FROM slider_image WHERE project_id = '{$project['id']}' ORDER BY id DESC LIMIT 1";
        $slider_image_result = mysqli_query($con, $slider_image_query);
        $slider_image_row = mysqli_fetch_assoc($slider_image_result);
        $imageSlider = 'project_upload/' . htmlspecialchars($slider_image_row['slider_image']);

        $image_query = "SELECT * FROM project_image WHERE project_id = '{$project['id']}'";
        $image_result = mysqli_query($con, $image_query);

        $video_query = "SELECT * FROM banner_videos WHERE project_id = '{$project['id']}'";
        $video_result = mysqli_query($con, $video_query);

        $project_id = $project['id'];
        $client_feedback_query = "SELECT * FROM client_feedback WHERE company_name = '$project_id' AND status = '1'";
        $client_feedback = mysqli_query($con, $client_feedback_query);
        ?>


        <?php
    } else
    {

        echo "<p>Product not found.</p>";
    }
} else
{

    echo "<p>No product URL provided.</p>";
}
?>
<!DOCTYPE html>

<html xmlns="" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title><?php echo $project['pro_url'] ?></title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="fonts/fonts.css">
    <!-- Icons -->
    <link rel="stylesheet" href="fonts/font-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="../../../sibforms.com/forms/end-form/build/sib-styles.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/logo/favicon.png">
    <style>
        * {
            font-family: ui-sans-serif !important;
            line-height: 35px !important;
            margin: 0;
            padding: 0;
        }

        .sidebar-item {
            background-position: center;
            padding: 50px 35px;
            background: rgba(7, 17, 6, 0.03);
        }

        input {
            margin-bottom: 30px;
        }

        button {
            margin-top: 25px;
            padding: 10px;
            background: #6ba52e;
            color: white;
            font-size: 19px;
            font-weight: bold;
        }

        .tf-page-title .heading {
            font-size: 40px;
            line-height: 50px;
            margin-top: 101px;
            color: white;
            font-weight: bolder;
        }

        .tf-sw-collection .swiper-slide img {
            height: 363px;
        }

        .flat-spacing-14 {
            padding-top: 25px;
            padding-bottom: 60px;
        }

        .hover-sw-nav .nav-sw.swiper-button-disabled {
            background-color: rgb(0 0 0 / 50%);
            color: white;
        }

        @media (min-width: 1150px) {
            .flat-iconbox .wrap-iconbox {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (min-width: 1150px) {
            .flat-iconbox .aminities {
                grid-template-columns: repeat(2, 1fr) !important;
            }
        }

        .flat-spacing-27 {
            padding-top: 0px;
            padding-bottom: 90px;
        }

        .blog-sidebar-main .list-blog .blog-article-item .article-thumb {
            max-height: 500px;

        }

        .tf-icon-box.style-border-line {
            border: 1px solid #ececec;
            padding: 26px 20px;
            border-radius: 10px;
            background: rgba(7, 17, 6, 0.03);
        }

        .tf-icon-box .icon {
            margin-bottom: 15px;
            text-align: center;
        }

        .tf-icon-box .content .title {
            font-size: 18px;
            font-weight: 500;
            line-height: 22px;
            margin-bottom: 9px;
            text-align: center;
        }

        @media (min-width: 1150px) {
            .tf-content-wrap .description p {
                margin-top: 24px;
                font-size: 16px !important;
            }
        }

        .flat-spacing-14 {
            background: #b3b1b10d;
        }

        .tf-icon-box .content .title {
            font-size: 25px;
            font-weight: 500;
            line-height: 22px;
            margin-bottom: 15px;
            text-align: center;

        }

        p {
            font-size: 16px;
        }

        .tf-icon-box .content .our-amitites {
            text-align: left !important;
            font-weight: bold !important;
            font-size: 20px;
            margin-bottom: 20px;

        }

        .tf-icon-box .content .our-amitites p {
            margin-left: 20px !important;

        }

        .widget-tabs.style-has-border {
            border: 1px solid var(--line);
            */
        }

        .blog-sidebar-main {
            padding: 64px 0 0px;
        }

        .play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.8);
            width: 70px;
            height: 70px;
            background: rgba(255, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.6);
            opacity: 1;
        }

        .play-btn i {
            color: #fff !important;
            font-size: 30px;
            animation: pulse 1.5s infinite;
        }

        @media (max-width: 768px) {
            .tf-sw-collection .swiper-slide img {
                height: 100%;
            }
        }

        @media only screen and (max-width: 767px) {
            .flat-spacing-11 {
                padding-top: 35px;
                padding-bottom: 22px;
            }
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
        <!-- header -->
        <?php
        include('header.php');
        ?>

        <!-- /header -->
        <!-- page-title -->
        <div class="tf-page-title" style="background-image: url(../images/banner1.jpg);height:400px">
            <div class="container-full">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumbs d-flex align-items-center justify-content-center heading">
                            <li>
                                <a href="index.php" class="text-white">Home</a>
                            </li>
                            <li>
                                <i class="icon-arrow-right text-white"></i>
                            </li>
                            <li class="text-white">
                                Project Details
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- blog-grid-main -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-sidebar-main">
                        <div class="tf-section-sidebar wrap-sidebar-mobile">
                            <div class="sidebar-item sidebar-post">
                                <div class="sidebar-title fs-2">Contact Us</div>
                                <div class="sidebar-content">
                                    <form method="POST" action="save_contact.php" id="enquiryForm">
                                        <input type="text" name="name" placeholder="Enter Name" required="">
                                        <input type="number" name="phone" placeholder="Phone" required="">
                                        <input type="email" name="email" placeholder="Email" required="">
                                        <textarea name="message" placeholder="Write Message" spellcheck="false"
                                            required=""></textarea>
                                        <input type="hidden" name="page_url"
                                            value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
                                        <button type="submit" name="submit"
                                            class="ht-btn border-0 mt-20 w-100">Submit</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                        <div class="list-blog">
                            <div class="blog-article-item">
                                <div class="article-thumb">
                                    <img class="lazyload" data-src="<?= $imageSlider ?>" src="<?= $imageSlider ?>"
                                        alt="" height="400px">
                                </div>
                                <div class="article-content mt-2">
                                    <div class="article-title fs-3 fw-bold mb-3">
                                        <?php echo $project['pro_tile']; ?>
                                    </div>
                                </div>

                                <div class="article-title">
                                    <p class="mb_30" style="font-size:16px !important;">
                                        <?php echo $project['highlight_text']; ?>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section class="flat-spacing-27 flat-iconbox wow fadeInUp" data-wow-delay="0s"
            style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
            <div class="container">
                <div class="wrap-carousel wrap-mobile">
                    <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                        <div class="swiper-wrapper wrap-iconbox">
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <img width="30" height="30"
                                            src="https://img.icons8.com/ios-filled/50/94d82d/place-marker--v1.png" />
                                    </div>
                                    <div class="content">
                                        <div class="title">Location</div>
                                        <p> <?php echo $project['address']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <img width="30" height="30"
                                            src="https://img.icons8.com/ios-filled/50/94d82d/map-marker--v1.png"
                                            alt="map-marker--v1" />
                                    </div>
                                    <div class="content">
                                        <div class="title">Area</div>
                                        <p class="text-center"> <?php echo $project['totalarea']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <img width="30" height="30"
                                            src="https://img.icons8.com/external-tal-revivo-bold-tal-revivo/24/94d82d/external-dollar-label-sticker-at-shopping-mall-promotion-money-bold-tal-revivo.png" />
                                    </div>
                                    <div class="content">
                                        <div class="title">Price</div>
                                        <p class="text-center"> <?php echo $project['totalamount']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
                </div>
            </div>
        </section>

        <section class="flat-spacing-14">
            <div class="container">
                <div class="flat-title tf-content-wrap" style="align-items: start;">
                    <span class="heading text_green-1">Project Gallery</span>
                </div>
                <div class="hover-sw-nav hover-sw-2">
                    <div dir="ltr" class="swiper tf-sw-collection wrap-sw-over" data-preview="4" data-tablet="2"
                        data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false"
                        data-auto-play="false">
                        <div class="swiper-wrapper">
                            <?php

                            mysqli_data_seek($image_result, 0);
                            while ($logo_row = mysqli_fetch_assoc($image_result))
                            {
                                if (!empty($logo_row['project_image']))
                                {
                                    $imageSrc = 'project_upload/' . htmlspecialchars($logo_row['project_image']);
                                    ?>
                                    <div class="swiper-slide" lazy="true">
                                        <div class="collection-item style-2 hover-img">
                                            <div class="collection-inner">
                                                <a class="collection-image img-style rounded-0" style="cursor:pointer;">
                                                    <img class="lazyload" data-src="<?php echo $imageSrc; ?>"
                                                        src="<?php echo $imageSrc; ?>" alt="collection-img">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="nav-sw nav-next-slider nav-next-collection box-icon w_46 round">
                        <span class="icon icon-arrow-left"></span>
                    </div>
                    <div class="nav-sw nav-prev-slider nav-prev-collection box-icon w_46 round">
                        <span class="icon icon-arrow-right"></span>
                    </div>
                    <div class="sw-dots style-2 sw-pagination-collection justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /blog-grid-main -->
        <section class="flat-spacing-17 ">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-tabs style-has-border">
                            <ul class="widget-menu-tab">
                                <li class="item-title active">
                                    <span class="inner">Description</span>
                                </li>
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <div class="">
                                        <p class="mb_30">
                                            <?php echo $project['project_brief']; ?>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flat-spacing-27 flat-iconbox wow fadeInUp" data-wow-delay="0s"
            style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
            <div class="container">
                <div class="wrap-carousel wrap-mobile">
                    <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                        <div class="swiper-wrapper wrap-iconbox aminities">
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="content">
                                        <div class="title our-amitites"><img width="40" height="40"
                                                src="https://img.icons8.com/external-flatart-icons-solid-flatarticons/64/6ba52e/external-home-real-estate-flatart-icons-solid-flatarticons-1.png" />
                                            Our Amenities</div>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Gated
                                            Community</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Parks
                                            and Green Spaces</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Roads -
                                            30ft, 35ft, and 40ft</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Street
                                            Lights</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" />
                                            Drainage System</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> CCTV
                                            Surveillance</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" />
                                            Security Guards</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" />
                                            Underground Wiring</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" />
                                            Ready-to-Move Plots</p>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="content">
                                        <div class="title our-amitites"><img width="40" height="40"
                                                src="https://img.icons8.com/ios-glyphs/30/6ba52e/development.png"
                                                alt="development" /> Features</div>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> 3 Rooms
                                        </p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> 1
                                            Toilet</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Kitchen
                                        </p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Drawing
                                            Area</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Garden
                                        </p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Car
                                            Parking</p>
                                        <p><img width="20" height="20"
                                                src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Mumty
                                            Area</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- Icon box -->
        <section class="flat-spacing-11 pb_0 flat-iconbox wow fadeInUp" data-wow-delay="0s">
            <div class="container">
                <div class="wrap-carousel wrap-mobile">
                    <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                        <div class="swiper-wrapper wrap-iconbox">
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <i class="icon-shipping"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title">Free Shipping</div>
                                        <p>Free shipping over order $120</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <i class="icon-payment fs-22"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title">Flexible Payment</div>
                                        <p>Pay with Multiple Credit Cards</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <i class="icon-return fs-22"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title">14 Day Returns</div>
                                        <p>Within 30 days for an exchange</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <i class="icon-suport"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title">Premium Support</div>
                                        <p>Outstanding premium support</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /Icon box -->
        <section class="flat-spacing-14">
            <div class="container">
                <div class="flat-title tf-content-wrap" style="align-items: start;">
                    <span class="heading text_green-1">Project Videos</span>
                </div>
                <div class="hover-sw-nav">
                    <div dir="ltr"
                        class="swiper tf-sw-collection swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden"
                        data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="30"
                        data-space="15" data-loop="false" data-auto-play="false">
                        <div class="swiper-wrapper" id="swiper-wrapper-ee210e44b8b7ba669" aria-live="polite"
                            style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">


                            <?php
                            // Assuming $image_result contains data from the database
                            mysqli_data_seek($video_result, 0);
                            while ($logo_row = mysqli_fetch_assoc($video_result))
                            {
                                if (!empty($logo_row['thumbnail']))
                                {
                                    $imageSrc = '../project/thumbnails/' . htmlspecialchars($logo_row['thumbnail']);
                                    ?>
                                    <div class="swiper-slide swiper-slide-active" lazy="true"
                                        style="width: 518.5px; margin-right: 30px;" role="group" aria-label="1 / 5">
                                        <div class="collection-item style-2 hover-img">
                                            <div class="collection-inner position-relative">
                                                <a href="<?php echo $logo_row['url']; ?>" target="_blank"
                                                    class="collection-image img-style rounded-0 video-link">
                                                    <img class="ls-is-cached lazyloaded" data-src="<?php echo $imageSrc; ?>"
                                                        src="<?php echo $imageSrc; ?>" alt="collection-img">
                                                    <div class="play-btn">
                                                        <i class="icon icon-play"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>




                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <div class="nav-sw nav-next-slider nav-next-collection box-icon w_46 round swiper-button-disabled"
                        tabindex="-1" role="button" aria-label="Previous slide"
                        aria-controls="swiper-wrapper-ee210e44b8b7ba669" aria-disabled="true"><span
                            class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-prev-slider nav-prev-collection box-icon w_46 round" tabindex="0"
                        role="button" aria-label="Next slide" aria-controls="swiper-wrapper-ee210e44b8b7ba669"
                        aria-disabled="false"><span class="icon icon-arrow-right"></span></div>
                    <div
                        class="sw-dots style-2 sw-pagination-collection justify-content-center swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                        <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                            role="button" aria-label="Go to slide 1" aria-current="true"></span><span
                            class="swiper-pagination-bullet" tabindex="0" role="button"
                            aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0"
                            role="button" aria-label="Go to slide 3"></span>
                    </div>
                </div>
            </div>
        </section>

        <?php
        include('footer.php');
        ?>

    </div>



    <!-- Javascript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/carousel.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/lazysize.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/count-down.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/multiple-modal.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <script src="js/sibforms.js" defer></script>

    <script>
        window.REQUIRED_CODE_ERROR_MESSAGE = 'Please choose a country code';
        window.LOCALE = 'en';
        window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE =
            "The information provided is invalid. Please review the field format and try again.";

        window.REQUIRED_ERROR_MESSAGE = "This field cannot be left blank. ";

        window.GENERIC_INVALID_MESSAGE =
            "The information provided is invalid. Please review the field format and try again.";

        window.translation = {
            common: {
                selectedList: '{quantity} list selected',
                selectedLists: '{quantity} lists selected'
            }
        };

        var AUTOHIDE = Boolean(0);
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#enquiryForm').submit(function (e) {
                e.preventDefault();

                var formData = $(this).serialize();

                console.log('Form Data:', formData);

                $.ajax({
                    url: 'save_contact.php', // Adjust this path if needed
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        console.log('Response:', response);

                        if ($.trim(response) === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Message Sent!',
                                text: 'Your message has been sent successfully.',
                            }).then(function () {
                                $('#enquiryForm')[0].reset();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please fill in all fields correctly.',
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'There was an error submitting your message.',
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>