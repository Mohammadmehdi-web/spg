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
                font-size: 15px !important;
            }
            .article-btn{
                margin-top:0px !important;
            }
            .tf-btn{
                font-size:12px !important;
            }
        }
        .card-product-wrapper{
            margin-bottom:0px;
        }
        .float-sm .fa {
    padding: 8px 0 !important;
    }
    .widget-facet .facet-title {
    color: black;
    font-weight: 500;
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

      
</body>

</html>