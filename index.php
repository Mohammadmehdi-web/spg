<?php
include('db_con.php');

// Fetch distinct property types from add_project
$cities = $con->query("SELECT DISTINCT city_name FROM add_project ORDER BY city_name ASC");
$properties = $con->query("SELECT DISTINCT property FROM add_project ORDER BY property ASC");
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

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/logo/favicon.png">

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

        .pagination-link {
            background: black;
            color: white !important;
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
            object-fit: cover;
            /* Ensures the image covers without cutting */
        }

        @media (min-width: 768px) {
            .image-container img {
                height: 400px;
            }

            .search-mob {
                display: none !important;
            }

            .card-product-wrapper {
                height: 280px;
                width: 100%;
                margin-bottom: 0px
            }
        }

        @media (max-width: 768px) {
            .image-container img {
                object-fit: contain;
                /* On small screens, image fits without cutting */
            }

            .grid-2 {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }


            .tf-dropdown-sort {

                padding: 8px 6px;
                min-width: 172px;
            }

            .tf-grid-layout.tf-col-2 {
                margin-top: 14px;
            }

            .card-product .card-product-info .title {
                font-size: 16px;
                line-height: 21.2px;
            }

            .tf-dropdown-sort .text-sort-value {
                font-size: 14px;
                font-weight: bold;
            }

            .tf-mini-search-frm input {
                font-size: 14px;
                font-weight: bold;
            }

            .search-desk {
                display: none !important;
            }

            .card-product .card-product-wrapper {
                aspect-ratio: auto !important;
            }

            .blog-article-item .article-label {
                top: 3px;
                left: 4px;
            }

            .blog-article-item .article-label a {
                padding: 0px 4px;
                height: 20px;
            }

            .card-product .card-product-info .title {
                font-size: 16px !important;
            }

            .article-btn {
                margin-top: 0px !important;
            }

            .tf-btn {
                font-size: 14px !important;
                margin-top: 8px;
            }
        }

        .card-product-wrapper {
            margin-bottom: 0px;
        }

        .float-sm .fa {
            padding: 8px 0 !important;
        }

        .widget-facet .facet-title {
            color: black;
            font-weight: 500;
        }

        .view-details {
            color: red;
        }

        @media (min-width: 1150px) {
            .d-xl-block {
                display: none !important;
                */
            }

            .tf-img-with-text .tf-content-wrap {
                place-self: start;
                */
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

        <!-- Slider -->
        <div class="tf-slideshow slider-effect-fade slider-skincare position-relative">
            <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1"
                data-centered="false" data-space="0" data-loop="true" data-auto-play="false" data-delay="0"
                data-speed="1000">
                <div class="swiper-wrapper">
                    <?php
                    include('db_con.php');
                    $result = $con->query("SELECT image_path, title FROM add_banner");

                    while ($row = $result->fetch_assoc()):
                        ?>
                        <div class="swiper-slide">
                            <div class="wrap-slider">
                                <img src="admin/<?php echo ($row['image_path']); ?>" alt="fashion-slideshow" height="300px">
                                <div class="box-content">
                                    <div class="container">
                                        <h1 class="fade-item fade-item-1 text-white"><?php echo ($row['title']); ?></h1>
                                        <a href="about.php"
                                            class="fade-item fade-item-3 tf-btn btn-light-icon animate-hover-btn btn-xl radius-3"><span>Read
                                                More</span><i class="icon icon-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="wrap-pagination sw-absolute-3">
                <div class="sw-dots style-2 dots-white sw-pagination-slider justify-content-center"></div>
            </div>
        </div>
        <!-- /Slider -->
        <section class="flat-spacing-15" style=" background: rgba(7, 17, 6, 0.03);">
            <div class="container">
                <div class="tf-grid-layout md-col-2 tf-img-with-text style-4">
                    <div class="grid-img-group">
                        <div class="tf-image-wrap box-img item-1">
                            <div class="img-style">
                                <img class="lazyload" src="images/collections/collection-71.jpg"
                                    data-src="images/collections/collection-71.jpg" alt="img-slider">
                            </div>
                        </div>
                        <div class="tf-image-wrap box-img item-2">
                            <div class="img-style">
                                <img class="lazyload" src="images/collections/collection-70.jpg"
                                    data-src="images/collections/collection-70.jpg" alt="img-slider">
                            </div>
                        </div>
                    </div>
                    <div class="tf-content-wrap px-0 d-flex justify-content-center w-100">
                        <div>
                            <div class="heading fw-bold">About Us</div>
                            <div class="text">
                                <p style="text-align: justify;line-height: 2;">Welcome to Truston Developers, your
                                    trusted partner in real estate. With a commitment
                                    to excellence and a vision to build vibrant communities, we offer premium
                                    residential and commercial properties designed to meet your aspirations. Our
                                    dedication to delivering high-quality infrastructure, maintaining transparency, and
                                    ensuring customer satisfaction has earned us the trust of thousands of homeowners
                                    and investors.</p>
                                <p style="text-align: justify;line-height: 2;" class="mt-2">
                                    At Truston Developers, is to create sustainable and modern living spaces
                                    that provide comfort, security, and convenience. We strive to deliver properties
                                    that not only offer exceptional value but also enhance the quality of life for our
                                    customers. Our goal is to contribute to urban development through innovative and
                                    eco-friendly construction practices.
                                </p>
                                <h6 class="mt-4 fw-bold">Our Offerings</h6>
                                <p class="mt-4"><img width="20" height="20"
                                        src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Residential
                                    Plots</p>
                                <p class="mt-2"><img width="20" height="20"
                                        src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Commercial
                                    Spaces</p>
                                <p class="mt-2"><img width="20" height="20"
                                        src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Gated
                                    Communities</p>
                                <p class="mt-2"><img width="20" height="20"
                                        src="https://img.icons8.com/sf-black-filled/64/1A1A1A/ok.png" /> Investment
                                    Opportunities</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /page-title -->
        <section class="flat-spacing-1">
            <div class="container">
                <div class="flat-title tf-content-wrap">
                    <span class="heading text_green-1 text-center">Our Projects</span>
                </div>
                <div class="tf-shop-control grid-3 align-items-center">
                    <!-- <div class="tf-control-filter">
                        <a href="#filterShop" data-bs-toggle="offcanvas" data-bs-target="#sidebarmobile"
                            aria-controls="offcanvasLeft" class="tf-btn-filter">
                            <span class="icon icon-filter"></span><span class="text">Filter</span>
                        </a>
                    </div> -->
                    <ul class="tf-control-layout d-flex justify-content-start search-desk">
                        <div class="tf-search-sticky" style="width:60%">
                            <form class="tf-mini-search-frm">
                                <fieldset class="text">
                                    <input type="text" placeholder="Search web" id="searchWeb" class="" name="text"
                                        tabindex="0" value="" aria-required="true" required="">
                                </fieldset>
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </form>
                        </div>
                    </ul>

                    <div class="tf-control-sorting d-flex justify-content-end">
                        <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                            <div class="btn-select">
                                <span class="text-sort-value city-value">City Name</span>
                                <span class="icon icon-arrow-down"></span>
                            </div>
                            <div class="dropdown-menu">
                                <?php while ($city = $cities->fetch_assoc()): ?>
                                    <div class="city-filter" data-filter="city_name"
                                        data-value="<?= htmlspecialchars($city['city_name']); ?>">
                                        <span class="text-value-item"><?= htmlspecialchars($city['city_name']); ?></span>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>

                    <div class="tf-control-sorting d-flex justify-content-end">
                        <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                            <div class="btn-select">
                                <span class="text-sort-value property-value">Property Type</span>
                                <span class="icon icon-arrow-down"></span>
                            </div>
                            <div class="dropdown-menu">
                                <?php while ($property = $properties->fetch_assoc()): ?>
                                    <div class="property-filter" data-filter="property"
                                        data-value="<?= htmlspecialchars($property['property']); ?>">
                                        <span class="text-value-item"><?= htmlspecialchars($property['property']); ?></span>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tf-search-sticky mb-4 search-mob" style="width:100%">
                    <form class="tf-mini-search-frm">
                        <fieldset class="text">
                            <input type="text" placeholder="Search mobile" id="searchMobile" class="" name="text"
                                tabindex="0" value="" aria-required="true" required="">
                        </fieldset>
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </form>
                </div>

                <div class="tf-row-flex">


                    <div class="wrapper-control-shop " style="width:100%;">


                        <?php
                        include('db_con.php');

                        // Fetch data from add_project and project_image tables using LEFT JOIN
                        $sql = "SELECT add_project.*, project_image.project_image AS image 
                        FROM add_project
                        LEFT JOIN project_image ON add_project.id = project_image.project_id
                        GROUP BY add_project.id";

                        $result = $con->query($sql);

                        $projects = [];
                        if ($result->num_rows > 0)
                        {
                            while ($row = $result->fetch_assoc())
                            {
                                $projects[] = $row;
                            }
                        } else
                        {
                            echo "No projects found.";
                        }
                        ?>

                        <div class="tf-grid-layout wrapper-shop tf-col-3" id="gridLayout">
                            <?php foreach ($projects as $row): ?>
                                <div class="card-product grid">

                                    <div class="card-product-wrapper">
                                        <a href="project/<?= $row['pro_url']; ?>" class="product-img">

                                            <img class="lazyload img-product"
                                                data-src="project/project_upload/<?= $row['image']; ?>"
                                                src="project/project_upload/<?= $row['image']; ?>" alt="image-product">
                                            <img class="lazyload img-hover"
                                                data-src="project/project_upload/<?= $row['image']; ?>"
                                                src="project/project_upload/<?= $row['image']; ?>" alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="project/<?= $row['pro_url']; ?>"
                                            class="title link"><?= $row['pro_tile']; ?></a>
                                    </div>
                                    <div class="article-btn mt-3">
                                        <a href="project/<?= $row['pro_url']; ?>" class="tf-btn btn-line fw-6">
                                            View Details<i class="icon icon-arrow1-top-left"></i>
                                        </a>
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

    <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item">
                        <a href="project.php" class="mb-menu-link">Project</a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="https://www.auctech.in/" class="mb-menu-link">About Us</a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="contact.php" class="mb-menu-link">Contact</a>
                    </li>
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
                    <div id="industry" class="collapse">
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
                    <div id="category" class="collapse ">
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
                    <div id="country" class="collapse ">
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
                    <div id="year" class="collapse ">
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


            <!-- Javascript -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/jquery.min.js"></script>
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

            <!-- <script src="js/sibforms.js" defer></script> -->
            <script>
                $(document).ready(function () {
                    let filters = {}; // Maintain independent filters for city and property

                    // Handle city filter
                    $('.city-filter').on('click', function () {
                        const cityName = $(this).data('value');
                        filters.city_name = cityName;

                        $('.city-value').text(cityName); // Update dropdown text
                        fetchProjects();
                    });

                    // Handle property filter
                    $('.property-filter').on('click', function () {
                        const propertyName = $(this).data('value');
                        filters.property = propertyName;

                        $('.property-value').text(propertyName); // Update dropdown text
                        fetchProjects();
                    });

                    // Fetch projects with filters
                    function fetchProjects() {
                        $.ajax({
                            url: 'filter_projects.php',
                            type: 'POST',
                            data: filters,
                            success: function (response) {
                                $('#gridLayout').html(response);
                            },
                            error: function () {
                                console.error('Error fetching data');
                            }
                        });
                    }
                });

            </script>

            <script>
                $(document).ready(function () {
                    // Global variables used across functions
                    let currentPage = 1;
                    let limit = 12;
                    let filters = {
                        status: 1
                    }; // Default: show active projects

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
                            success: function (response) {
                                let html = '';
                                if (response.projects.length > 0) {
                                    $.each(response.projects, function (index, row) {
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
                    $("#searchWeb, #searchMobile").on("input", function () {
                        currentPage = 1; // Reset to first page when searching
                        fetchProjects();
                    });

                    // Event listener for dropdown filters (select-item)
                    $(".select-item").on("click", function (e) {
                        e.preventDefault();
                        let filterType = $(this).data("filter");
                        let filterValue = $(this).data("value");
                        // Reset filters (keeping status active) and apply the selected filter
                        filters = {
                            status: 1
                        };
                        filters[filterType] = filterValue;
                        currentPage = 1; // Reset to first page when applying filter
                        fetchProjects();
                    });

                    // Event listener for category, industry, country, and year filters (filter-item)
                    $(".filter-item").on("click", function (e) {
                        e.preventDefault();
                        let filterType = $(this).data("filter");
                        let filterValue = $(this).data("value");
                        // Reset filters and apply the new filter
                        filters = {
                            status: 1
                        };
                        filters[filterType] = filterValue;
                        currentPage = 1;
                        fetchProjects();
                    });

                    // Event listener for pagination clicks (using .page-link class)
                    $(document).on("click", ".page-link", function (e) {
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


</body>

</html>