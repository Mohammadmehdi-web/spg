<?php include 'check_session.php' ?>
<?php
include('../db_con.php');

// Get total count of projects
$total_project = $con->query("SELECT COUNT(*) AS total FROM add_project")->fetch_assoc()['total'];

// Get total count of featured projects (where feature_status = 1)
$total_feature_project = $con->query("SELECT COUNT(*) AS total FROM add_project WHERE feature_status = 1")->fetch_assoc()['total'];

// Get total count of blogs
$total_king_project = $con->query("SELECT COUNT(*) AS total FROM add_project WHERE king_status = 1")->fetch_assoc()['total'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Auctech Portfolio | Admin Dashboard</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include('header.php'); ?>
    <!-- Content body start -->
    <div class="content-body" style="background:#93938a29">
        <div class="container-fluid">
            <div class="row">
                <!-- Total Project Count -->
                <div class="col-lg-4 col-sm-6">
                    <div class="card shadow-sm">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content d-flex align-items-center">
                                <div class="stat-text d-flex align-items-center">
                                    <img width="20" height="20" src="https://img.icons8.com/external-xnimrodx-lineal-xnimrodx/64/FD7E14/external-banner-infographic-and-chart-xnimrodx-lineal-xnimrodx-2.png" alt="Total Banner" class="mr-2" />
                                    <span>Total Project</span>
                                </div>
                                <div class="stat-digit ml-auto">
                                    <?php echo $total_project; ?>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-warning w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Feature Project Count -->
                <div class="col-lg-4 col-sm-6">
                    <div class="card shadow-sm">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content d-flex align-items-center">
                                <div class="stat-text d-flex align-items-center">
                                    <img width="20" height="20" src="https://img.icons8.com/sf-black/64/FD7E14/list.png" alt="list" />
                                    <span>Total Feature Project</span>
                                </div>
                                <div class="stat-digit ml-auto">
                                    <?php echo $total_feature_project; ?>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-warning w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total King Project Count -->
                <div class="col-lg-4 col-sm-6">
                    <div class="card shadow-sm">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content d-flex align-items-center">
                                <div class="stat-text d-flex align-items-center">
                                    <img width="20" height="20" src="https://img.icons8.com/external-xnimrodx-lineal-xnimrodx/64/FD7E14/external-banner-infographic-and-chart-xnimrodx-lineal-xnimrodx-2.png" alt="Total Banner" class="mr-2" />
                                    <span>Total King Project</span>
                                </div>
                                <div class="stat-digit ml-auto">
                                    <?php echo $total_king_project; ?>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-warning w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Industry Pie Chart -->

        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>
