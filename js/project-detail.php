<?php
include 'db_con.php'; // Include your DB connection

if (isset($_GET['page_url'])) {
	// Escape the URL parameter to prevent SQL injection
	$page_url = mysqli_real_escape_string($con, $_GET['page_url']);

	// Fetch product details using page_url
	$project_query = "SELECT * FROM add_project WHERE pro_url = '$page_url'";
	$project_result = mysqli_query($con, $project_query);

	if ($project_result && mysqli_num_rows($project_result) > 0) {
		// Fetch the product details
		$project = mysqli_fetch_assoc($project_result);

		// Fetch product images related to the product ID
		$image_query = "SELECT * FROM project_images WHERE project_id = '{$project['id']}'";
		$image_result = mysqli_query($con, $image_query);
?>


<?php
	} else {
		// If no product found, show a message
		echo "<p>Product not found.</p>";
	}
} else {
	// If page_url is not provided
	echo "<p>No product URL provided.</p>";
}
?>
<!DOCTYPE html>

<html xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title><?php echo $project['pro_url']  ?></title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="fonts/fonts.css">
    <!-- Icons -->
    <link rel="stylesheet" href="fonts/font-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/drift-basic.min.css">
    <link rel="stylesheet" href="css/photoswipe.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="../../../sibforms.com/forms/end-form/build/sib-styles.css">
    <link rel="stylesheet " type="text/css" href="css/styles.css" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/logo/favicon.png">

</head>

<body class="preload-wrapper">
    <!-- RTL -->
    <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-hover-btn btn-fill">RTL</a>
    <!-- /RTL  -->
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">

        <!-- Header -->
        <?php
            include('header.php');
        ?>
        <!-- /Header -->
        <!-- breadcrumb -->
        <div class="tf-breadcrumb">
            <div class="container">
                <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
                    <div class="tf-breadcrumb-list">
                        <a href="index.html" class="text">Home</a>
                        <i class="icon icon-arrow-right"></i>
                        <a href="#" class="text">project</a>
                        <i class="icon icon-arrow-right"></i>
                        <span class="text"><?php echo $project['pro_category']  ?></span>
                    </div>
                    <div class="tf-breadcrumb-prev-next">
                        <a href="#" class="tf-breadcrumb-prev hover-tooltip center">
                            <i class="icon icon-arrow-left"></i>
                            <!-- <span class="tooltip">Cotton jersey top</span> -->
                        </a>
                        <a href="#" class="tf-breadcrumb-back hover-tooltip center">
                            <i class="icon icon-shop"></i>
                            <!-- <span class="tooltip">Back to Women</span> -->
                        </a>
                        <a href="#" class="tf-breadcrumb-next hover-tooltip center">
                            <i class="icon icon-arrow-right"></i>
                            <!-- <span class="tooltip">Cotton jersey top</span> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /breadcrumb -->
        <!-- default -->
        <section class="flat-spacing-4 pt_0">
            <div class="tf-main-product section-image-zoom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tf-product-media-wrap sticky-top">
                                <div class="thumbs-slider">
                                    <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom"
                                        data-direction="vertical">
                                        <div class="swiper-wrapper stagger-wrap">
                                            <!-- beige -->
                                            <?php
                                                while ($logo_row = mysqli_fetch_assoc($image_result)) {
                                                
                                                    if ($logo_row['photo_gallery']) {
                                                        echo '<div class="swiper-slide stagger-item" data-color="beige">
                                                                <div class="item">
                                                                    <img class="lazyload" src="project_upload/' . $logo_row['photo_gallery'] . '" alt="img-product">
                                                                </div>
                                                            </div>';
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                                        <div class="swiper-wrapper">
                                            <!-- beige -->
                                            <?php
                                                
                                                mysqli_data_seek($image_result, 0); 

                                                while ($logo_row = mysqli_fetch_assoc($image_result)) {
                                                    if (!empty($logo_row['two_photos'])) {
                                                        echo '<div class="swiper-slide" data-color="beige">';
                                                        echo '<a href="project_upload/' . htmlspecialchars(trim($logo_row['two_photos'])) . '" target="_blank" class="item"
                                                                    data-pswp-width="770px" data-pswp-height="1075px">';
                                                        echo '<img data-zoom="project_upload/' . htmlspecialchars(trim($logo_row['two_photos'])) . '"
                                                        data-src="project_upload/' . htmlspecialchars(trim($logo_row['two_photos'])) . '" src="project_upload/' . htmlspecialchars(trim($logo_row['two_photos'])) . '" alt="Logo" class="cover-bg-img" >'; // Display logo
                                                        echo '</a></div>';
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <div class="swiper-button-next button-style-arrow thumbs-next"></div>
                                        <div class="swiper-button-prev button-style-arrow thumbs-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tf-product-info-wrap position-relative">
                                <div class="tf-zoom-main"></div>
                                <div class="tf-product-info-list other-image-zoom">
                                    <div class="tf-product-info-title">
                                        <h5 class="fw-bold mt-3"><?php echo $project['pro_tile']  ?></h5>
                                    </div>
                                    <div class="tf-product-info-variant-picker">
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                             <strong class="fs-6">Type :</strong> <span class="fw-6 fs-6 variant-picker-label-value value-currentColor"><?php echo $project['pro_category']  ?></span>
                                            </div>   
                                        </div>   
                                    </div>
                                    
                                    <div class="tf-product-info-variant-picker">
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                             <strong class="fs-6">Industry Name :</strong> <span class="fw-6 fs-6 variant-picker-label-value value-currentColor"><?php echo $project['industry_name']  ?></span>
                                            </div>   
                                        </div>   
                                    </div>
                                    <div class="tf-product-info-variant-picker">
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                             <strong class="fs-6">Country Name :</strong> <span class="fw-6 fs-6 variant-picker-label-value value-currentColor"><?php echo $project['country_name']  ?></span>
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                    <div class="tf-product-info-variant-picker">
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                             <strong class="fs-6">Year :</strong> <span class="fw-6 fs-6 variant-picker-label-value value-currentColor"><?php echo $project['year']  ?></span>
                                            </div>
                                            
                                        </div>  
                                    </div>
                                    <div class="tf-product-info-variant-picker">
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                             <strong class="fs-6">Client Name :</strong> <span class="fw-6 fs-6 variant-picker-label-value value-currentColor"><?php echo $project['client_name']  ?></span>
                                            </div>
                                            
                                        </div>  
                                    </div>
                                    <div class="tf-product-info-variant-picker">
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                             <strong class="fs-6">Website Link :</strong> <a href="<?php echo $project['website_urls']  ?>"><span class="fw-6 fs-6 variant-picker-label-value value-currentColor"><?php echo $project['website_urls']  ?></span></a>
                                            </div>
                                            
                                        </div>  
                                    </div>
                                    <div class="tf-product-info-liveview"> 
                                        <p class="" style="font-size:18px;"><?php echo $project['highlight_text']  ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /default -->
        <!-- tabs -->
        <section class="flat-spacing-17 pt_0">
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
                                           <?php echo $project['project_brief'] ;?>
                                        </p>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /tabs -->

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

    <!-- toolbar-bottom -->
    <div class="tf-toolbar-bottom type-1150">
        <div class="toolbar-item">
            <a href="#" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                <div class="toolbar-icon">
                    <i class="icon-shop"></i>
                </div>
                <div class="toolbar-label">Shop</div>
            </a>
        </div>

        <div class="toolbar-item">
            <a href="#" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                <div class="toolbar-icon">
                    <i class="icon-search"></i>
                </div>
                <div class="toolbar-label">Search</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#" data-bs-toggle="modal">
                <div class="toolbar-icon">
                    <i class="icon-account"></i>
                </div>
                <div class="toolbar-label">Account</div>
            </a>
        </div>
       
        <div class="toolbar-item">
            <a href="#" data-bs-toggle="modal">
                <div class="toolbar-icon">
                    <i class="icon-bag"></i>
                    <div class="toolbar-count"></div>
                </div>
                <div class="toolbar-label">Cart</div>
            </a>
        </div>
    </div>
    <!-- /toolbar-bottom -->

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



    <!-- Filter sidebar-->
    <div class="offcanvas offcanvas-start canvas-filter canvas-sidebar" id="sidebarmobile">
        <div class="canvas-wrapper">
            <header class="canvas-header">
                <span class="title">SIDEBAR PROJECT</span>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </header>
            <div class="canvas-body sidebar-mobile-append">

            </div>

        </div>
    </div>
    <!-- End Filter sidebar -->

    <!-- Javascript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/carousel.js"></script>
    <script type="text/javascript" src="js/count-down.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/lazysize.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/drift.min.js"></script>
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
    <script type="module" src="js/model-viewer.min.js"></script>
    <script type="module" src="js/zoom.js"></script>

</body>


<!-- Mirrored from themesflat.co/html/ecomus/product-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Jan 2025 09:39:01 GMT -->

</html>