<?php
include 'db_con.php';

if (isset($_GET['page_url'])) {
	
	$page_url = mysqli_real_escape_string($con, $_GET['page_url']);

	$project_query = "SELECT * FROM add_project WHERE pro_url = '$page_url'";
	$project_result = mysqli_query($con, $project_query);

	if ($project_result && mysqli_num_rows($project_result) > 0) {
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
	} else {
		
		echo "<p>Product not found.</p>";
	}
} else {
	
	echo "<p>No product URL provided.</p>";
}
?>
<!DOCTYPE html>

<html xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title><?php echo $project['pro_url']  ?></title>

    <meta name="author" content="Auctech Marcom">
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
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/logo/favicon.png">
    
    
    <style>
      * {
        font-family: "Albert Sans", sans-serif !important;
        line-height: 35px !important;
        margin: 0;
        padding: 0;
        color: black !important;
      }
    
      .lightbox .lb-image {
        height: 500px !important;
        width: 550px !important;
      }
    
      .tf-product-media-main1 .item,
      .tf-product-media-main2 .item,
      .tf-product-media-main3 .item,
      .tf-product-media-main4 .item,
      .tf-product-media-main .item {
        max-height: 500px;
      }
    
      .variant-picker-item .variant-picker-label {
        margin-bottom: 0px;
      }
    
      .tf-product-info-list > div:not(:last-child) {
        margin-bottom: 15px;
      }
    
      .heading {
        text-align: -webkit-auto;
      }

    
      @media (min-width: 1150px) {
        .tf-content-wrap .heading {
          font-size: 52px;
          line-height: 62.4px !important;
        }
      }
    
      @media only screen and (max-width: 767px) {
        .swiper-vertical > .swiper-wrapper {
          flex-direction: row;
        }
    
        .logo-header img {
          width: 110px;
          margin-left: 160%;
          margin-top: 18px;
        }
        .close-btn {
        top: 10px;
        right: 10px;
        z-index: 999;
        }
    }
        .tf-img-with-text .tf-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: contain;
          
        }
        .sticky-btn-wrapper {
          position: fixed;
          right: 0%;
          bottom: 20px;
          transform: translateX(-50%);
          background: white;
          border: 1px solid #ddd;
          padding: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
          display: flex;
          align-items: center;
          gap: 10px;
          border-radius: 10px;
          animation: slideUp 0.6s ease-in-out;
          z-index: 99;
        }
        
        .sticky-content span {
          font-weight: 600;
        }
        
        .sticky-content button {
          padding: 6px 12px;
        }
        
        .img-close-btn{
          cursor: pointer;
        }
        .res-stick-btn{
            margin-left:10px ;
        }
        @keyframes slideUp {
          from {
            opacity: 0;
            transform: translateY(50px);
          }
          to {
            opacity: 1;
            transform: translateY(0);
          }
        }
          .sticky-content{
             display: flex;
             justify-content: spaceBetween;
          }
            .tf-sw-collection .swiper-slide img {
                height: 300px;
            }
        @media (max-width: 768px) {
          .sticky-btn-wrapper {
            position: sticky;
            width: auto;
            left: 50%;
            transform: initial;
            text-align: center;
            flex-direction: column;
            margin: 15px;
          }
          .tf-sw-collection .swiper-slide img {
                height: 100%;
            }
         
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
        
        .collection-image:hover .play-btn {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
            100% {
                transform: scale(1);
                opacity: 1;
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
                        <a href="https://www.auctech.in/portfolio/" class="text">Home</a>
                        <i class="icon icon-arrow-right"></i>
                        <a href="https://www.auctech.in/portfolio/" class="text">Project</a>
                        <i class="icon icon-arrow-right"></i>
                        <span class="text"><?php echo $project['pro_category']  ?></span>
                    </div>

                </div>
            </div>
        </div>
        <!-- /breadcrumb -->



        <section class=" pt_0">
            <div class="container">
                <div class="tf-grid-layout md-col-2 tf-img-with-text">
                    <div class="tf-image-wrap radius-10 wow fadeInUp" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                        <img class=" ls-is-cached lazyloaded" data-src="<?= $imageSlider?>" src="<?= $imageSlider?>" alt="collection-img">
                    </div>
                    <div class="tf-content-wrap wow fadeInUp" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                        <span class="sub-heading text-uppercase fw-7 text_green-1">ABOUT PROJECT</span>
                        <div class="heading text_green-1"><?php echo $project['pro_tile']; ?></div>
                        <p class="description text_green-2"><?php echo $project['highlight_text']; ?></p>
                         <strong class="fs-6">Crafted For :</strong> 
                                            <span class="fs-6 variant-picker-label-value value-currentColor"><?php echo $project['client_name']; ?></span><br>
                        <a href="https://<?php echo $project['website_urls']; ?>" target="_blank"> 
                            <button class="subscribe-button tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn" type="button" style="padding: 0px 10px; border:1px solid #000"> View Project <i class="icon icon-arrow1-top-left"></i></button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="flat-spacing-27 flat-iconbox wow fadeInUp" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
            <div class="container">
                <div class="wrap-carousel wrap-mobile">
                    <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                        <div class="swiper-wrapper wrap-iconbox">
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <i class="icon-shipping" style="color:#000 !important;"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title">Project Category</div>
                                        <p><?php echo $project['pro_category']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <i class="icon-payment fs-22" style="color:#000 !important;"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title">Project Industry</div>
                                        <p><?php echo $project['industry_name']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <img width="30" height="30" src="https://img.icons8.com/forma-bold/48/1A1A1A/marker.png" alt="marker"/>
                                    </div>
                                    <div class="content">
                                        <div class="title">Project Location</div>
                                        <p><?php echo $project['country_name']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                       <img width="30" height="30" src="https://img.icons8.com/glyph-neue/64/1A1A1A/calendar.png" alt="calendar--v1"/>
                                    </div>
                                    <div class="content">
                                        <div class="title">Project Year</div>
                                        <p><?php echo $project['year']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="bg_green-9" style="height: 3px;"></div>
        </div>

        <section class="flat-spacing-14">
            <div class="container">
                 <div class="flat-title tf-content-wrap" style="align-items: start;">
                        <span class="heading text_green-1" >Project Gallery</span>
                     </div>
                <div class="hover-sw-nav hover-sw-2">
                    <div dir="ltr" class="swiper tf-sw-collection wrap-sw-over" data-preview="4" data-tablet="2" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                        <div class="swiper-wrapper">
                            <?php
                            
                            mysqli_data_seek($image_result, 0);
                            while ($logo_row = mysqli_fetch_assoc($image_result)) {
                                if (!empty($logo_row['project_image'])) {
                                    $imageSrc = 'project_upload/' . htmlspecialchars($logo_row['project_image']);
                            ?>
                            <div class="swiper-slide" lazy="true">
                                <div class="collection-item style-2 hover-img">
                                    <div class="collection-inner">
                                        <a class="collection-image img-style rounded-0" style="cursor:pointer;">
                                            <img class="lazyload" data-src="<?php echo $imageSrc; ?>" src="<?php echo $imageSrc; ?>" alt="collection-img">
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






        <section class="flat-spacing-14">
            <div class="container">
               <div class="flat-title tf-content-wrap" style="align-items: start;">
                    <span class="heading text_green-1" >Project Videos</span>
                </div>
                <div class="hover-sw-nav">
                    <div dir="ltr" class="swiper tf-sw-collection swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                        <div class="swiper-wrapper" id="swiper-wrapper-ee210e44b8b7ba669" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                            
                            
                            <?php
                    // Assuming $image_result contains data from the database
                    mysqli_data_seek($video_result, 0);
                    while ($logo_row = mysqli_fetch_assoc($video_result)) {
                        if (!empty($logo_row['thumbnail'])) {
                            $imageSrc = '../project/thumbnails/' . htmlspecialchars($logo_row['thumbnail']);
                    ?>
                           <div class="swiper-slide swiper-slide-active" lazy="true" style="width: 518.5px; margin-right: 30px;" role="group" aria-label="1 / 5">
                                <div class="collection-item style-2 hover-img">
                                    <div class="collection-inner position-relative">
                                        <a href="<?php echo $logo_row['url']; ?>" target="_blank" class="collection-image img-style rounded-0 video-link">
                                            <img class="ls-is-cached lazyloaded" data-src="<?php echo $imageSrc; ?>" src="<?php echo $imageSrc; ?>" alt="collection-img">
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
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                    <div class="nav-sw nav-next-slider nav-next-collection box-icon w_46 round swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-ee210e44b8b7ba669" aria-disabled="true"><span class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-prev-slider nav-prev-collection box-icon w_46 round" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-ee210e44b8b7ba669" aria-disabled="false"><span class="icon icon-arrow-right"></span></div>
                    <div class="sw-dots style-2 sw-pagination-collection justify-content-center swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
                </div>
            </div>
        </section>


        
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
        <!-- /tabs -->

        <div class="sticky-btn-wrapper" id="stickyBtn"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" style="cursor:pointer">
            <div class="sticky-content">
                <img style="height:35px; width:35px; margin-right:10px; object-fit:contain" src="images/logo/auc-logo.png" alt="windows10-personalization"/>
                <span class="text-primary">Do you need something like this?</span>
           </div>
        </div>
        

       <section class="flat-spacing-12">
    <div class="container">
        <div class="flat-title">
            <span class="title fw-6 wow fadeInUp" data-wow-delay="0s">What Our Happy Clients Say About Us</span>
        </div>
        
        <div class="wrap-carousel wrapper-thumbs-testimonial flat-thumbs-testimonial">
            <div class="box-left wow fadeInUp" data-wow-delay="0s">
                <div class="swiper client-feedback-swiper tf-thumb-tes swiper-initialized swiper-horizontal">
                    <div class="swiper-wrapper">
                        <?php while ($row = mysqli_fetch_assoc($client_feedback)) { 
                        
                         $image_query = "SELECT * FROM client_feedback_images WHERE client_id = '{$row['id']}'";
                                        $image_result = mysqli_query($con, $image_query);
                                        $image_row = mysqli_fetch_array($image_result);
                        ?>
                        
                            <div class="swiper-slide">
                                <div class="img-sw-thumb">
                                    <img class="img-product" src="../project/client_uploads/<?= $image_row['image']; ?>" alt="Client Image">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="box-right wow fadeInUp" data-wow-delay="0s">
                <div class="swiper client-feedback-swiper tf-sw-tes-2 swiper-initialized swiper-horizontal">
                    <div class="swiper-wrapper">
                        <?php 
                        mysqli_data_seek($client_feedback, 0); // Reset pointer for second loop
                        while ($row = mysqli_fetch_assoc($client_feedback)) { 
                              $image_query = "SELECT * FROM client_feedback_images WHERE client_id = '{$row['id']}'";
                                        $image_result = mysqli_query($con, $image_query);
                                        $image_row = mysqli_fetch_array($image_result);
                        ?>
                            <div class="swiper-slide">
                                <div class="testimonial-item lg">
                                    <div class="icon icon-quote"></div>
                                    <div class="rating">
                                        <?php for ($i = 0; $i < $row['rating']; $i++) { ?>
                                            <i class="icon-star"></i>
                                        <?php } ?>
                                    </div>
                                    <p class="text fw-5">
                                        <?= $row['feedback']; ?>
                                    </p>
                                    <div class="divider"></div>
                                    <div class="author box-author">
                                        <div class="box-img d-md-none">
                                            <img class="img-product" src="../project/client_uploads/<?= $image_row['image']; ?>" alt="Client Image">
                                        </div>
                                        <div class="content">
                                            <div class="name" style="font-size:22px"><?= $row['name']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="nav-sw nav-next-slider nav-next-tes-2 lg"><span class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-tes-2 lg"><span class="icon icon-arrow-right"></span></div>
            </div>
        </div>
    </div>
</section>
        
    
         <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Send Message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="queryForm">
                            <div class="mb-3">
                                <label class="col-form-label">Full Name:</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                                <input type="hidden" class="form-control" name="project_id" id="project_id" value="<?php echo $project['id']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Mobile Number:</label>
                                <input type="number" class="form-control" name="mobile" id="mobile" required>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                                
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary text-light" id="submitQuery">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        <div id="successMessage" class="alert alert-success" style="display: none; position: fixed; top: 20px; right: 20px; z-index:99999">
            Your query has been successfully submitted! <img width="28" height="28" src="https://img.icons8.com/color/48/ok--v1.png" alt="ok--v1"/>
        </div>



        <!-- /product -->

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
                        <a href="https://www.auctech.in/portfolio/" class="mb-menu-link">Project</a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="https://www.auctech.in/" class="mb-menu-link">About Us</a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="https://www.auctech.in/portfolio/contact.php" class="mb-menu-link">Contact</a>
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
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

    <!-- Jquery -->
    <script src="assets/js/plugins/ScrollTrigger.min.js"></script>
    <script>
    // Optional: Set lightbox options
    lightbox.option({
        'resizeDuration': 10,
        'wrapAround': true,
        'fitImagesInViewport': true,
        'maxWidth': '90%',
        'maxHeight': '90%'
    });
    </script>

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
    <script>
    var mainSwiper = new Swiper('.tf-product-media-main', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: thumbsSwiper,
        },
        loop: true,
    });


    var thumbsSwiper = new Swiper('.tf-product-media-thumbs', {
        direction: 'vertical',
        slidesPerView: 4,
        spaceBetween: 10,
        slideToClickedSlide: true,
        loop: true,
        watchSlidesVisibility: true,
    });
    
    </script>

    <script type="module" src="js/model-viewer.min.js"></script>
    <script type="module" src="js/zoom.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#submitQuery").click(function (e) {
                e.preventDefault(); // Prevent form submission
    
                var formData = $("#queryForm").serialize(); // Serialize form data
    
               $.ajax({
        type: "POST",
        url: "/portfolio/submit_query.php", // Corrected relative path
        data: formData,
        dataType: "text",
        success: function (response) {
            if (response.trim() === "success") {
                $("#successMessage").fadeIn().delay(3000).fadeOut();
                $("#queryForm")[0].reset();
                $("#exampleModal").modal("hide");
            } else {
                alert("Server Error: " + response);
            }
        },
        error: function (xhr, status, error) {
            console.log("AJAX Error:", xhr.responseText);
            alert("AJAX error: " + xhr.status + " - " + xhr.statusText);
        }
    });
            });
        });
        
        
        
      document.addEventListener("DOMContentLoaded", function () {
    // Swiper for Client Feedback
    var clientFeedbackSwiper = new Swiper(".client-feedback-swiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        navigation: {
            nextEl: ".nav-next-tes-2",
            prevEl: ".nav-prev-tes-2",
        },
        pagination: {
            el: ".sw-pagination-tes-2",
            clickable: true,
        },
    });

    // Swiper for Project Videos
    var projectVideosSwiper = new Swiper(".project-videos-swiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
            nextEl: ".nav-next-collection",
            prevEl: ".nav-prev-collection",
        },
        pagination: {
            el: ".sw-pagination-collection",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            480: {
                slidesPerView: 1,
            },
        },
    });
});
        
    </script>
</body>

</html>