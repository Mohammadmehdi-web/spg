<?php include 'check_session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Auctech Portfolio | Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    label {
        color: #302f2f;
        font-weight: bold;
    }

    .form-control {
        background: #fff;
        border: 1px solid #cbc3c3;
        color: #454545;
        padding: 0.3rem 0.7rem;
    }
   
    
    </style>
</head>

<body>
        <?php
            include('header.php');
        ?>
    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body" style="background:#93938a29">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-xxl-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-black">Add Banners</h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="banner_insert.php" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Image  <span class="text-primary">(Size:1894 × 840)</span></label>
                                            <p class="maxsize">(Maxsize: 158 KB)</p>
                                            <input type="file" name='image' class="form-control file" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="mb-4">Banner Type</label>
                                            <select id="inputState" name="type" class="form-control mt-4">
                                                <option selected>--Select--</option>
                                                <option value="Banner">Banner</option>
                                                <option value="Project">Project</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row mt-2">
                                        <div class="form-group col-md-6">
                                            <label>Banner Title</label>
                                            <input type="text" name='title' class="form-control"
                                                placeholder="Enter Banner Title">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Banner Details</label>
                                            <input type="text" name="details" class="form-control"
                                                placeholder="Enter Details">
                                        </div>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary mt-4 mb-4">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->
    <?php
            include('footer.php');
        ?>