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

    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

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

    .maxsize {
        margin-top: -1vh;
        font-size: 12px;
    }

    .file {
        margin-top: -1vh !important;
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
                            <h4 class="card-title">Add Project</h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="project_insert.php" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Select Delivery Year</label>
                                            <select class="form-control" name="year" id="year" required>
                                                <option value="" disabled selected>--Select--</option>
                                                <?php
                                                include('../db_con.php');
                                                
                                                $sql = "SELECT year	FROM add_year_master";
                                                $result = mysqli_query($con, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
                                                    }
                                                } else {
                                                   
                                                    echo "<option disabled>No Year found</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Select Country</label>
                                            <select class="form-control" name="country_name" id="country_name" required>
                                                <option value="" disabled selected>--Select--</option>
                                                <?php
                                                include('../db_con.php');
                                                
                                                $sql = "SELECT country_name	FROM add_country";
                                                $result = mysqli_query($con, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='" . $row['country_name'] . "'>" . $row['country_name'] . "</option>";
                                                    }
                                                } else {
                                                   
                                                    echo "<option disabled>No Country found</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Select Industry</label>
                                            <select class="form-control" name="industry_name" id="industry_name"
                                                required>
                                                <option value="" disabled selected>--Select--</option>
                                                <?php
                                                include('../db_con.php');
                                                
                                                $sql = "SELECT industry_name FROM add_industry_master";
                                                $result = mysqli_query($con, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='" . $row['industry_name'] . "'>" . $row['industry_name'] . "</option>";
                                                    }
                                                } else {
                                                   
                                                    echo "<option disabled>No Industry found</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Project Category</label>
                                            <select class="form-control" name="pro_category" id="type" required>
                                                <option value="" disabled selected>--Select--</option>
                                                <?php
                                                include('../db_con.php');
                                                
                                                $sql = "SELECT pro_category	FROM add_pro_master";
                                                $result = mysqli_query($con, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='" . $row['pro_category'] . "'>" . $row['pro_category'] . "</option>";
                                                    }
                                                } else {
                                                   
                                                    echo "<option disabled>No categories found</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Project Title</label>
                                            <input type="text" name="pro_tile" class="form-control"
                                                placeholder="Enter Project Tile" Required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Project Highlight</label>
                                            <textarea name="highlight_text" id="" class="form-control" placeholder="Enter Project Highlight"Required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="form-group col-md-12">
                                            <label>Project Brief <span>(Case Story)</span></label>
                                            <textarea name="project_brief" id="project_brief" class="form-control mt-2"
                                                placeholder="Enter Blog Details..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Project Details URL</label>
                                            <input type="text" name='pro_url' class="form-control"
                                                placeholder="Enter Project Detals URL">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Client Name</label>
                                            <input type="text" name='client_name' class="form-control"
                                                placeholder="Enter Client Name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Client Logo <span class="text-primary">(Resolution:250 ×
                                                    250)</span></label>
                                            <p class="maxsize">(Maxsize: 12.0 KB)</p>
                                            <input type="file" name='logos[]' id="logos" class="form-control file"
                                                multiple>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Choose Project Banner Image <span class="text-primary">(Resolution:1920 ×
                                                    1080)</span></label>
                                            <p class="maxsize">(Maxsize: 864 KB)</p>
                                            <input type="file" name="images[]" class="form-control file" id="images"
                                                required>
                                        </div>
                                       
                                    </div>
                                    <div class="form-row">
                                         <div class="form-group col-md-6">
                                            <label>Choose Two Images <span class="text-primary">(Resolution:600 ×
                                                    900)</span></label>
                                            <p class="maxsize">(Maxsize: 223 KB)</p>
                                            <input type="file" name="two_photos[]" class="form-control file"
                                                id="two_photos" multiple required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Choose Main Images <span class="text-primary">(Resolution:1920 ×
                                                    1080)</span></label>
                                            <p class="maxsize">(Maxsize: 870 KB)</p>
                                            <input type="file" name="single_photos[]" class="form-control file"
                                                id="single_photos" multiple required>
                                        </div>

                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                                <label>Choose Gallery Images<span
                                                        class="text-primary">(Resolution:1920*1080)</span></label>
                                                <p class="maxsize">(Maxsize: 3.34 MB)</p>
                                                <input type="file" name="photo_gallery[]" class="form-control file"
                                                    id="photo_gallery" multiple required>
                                            </div>
                                        <div class="form-group col-md-6">
                                            <label>Website Multiple Urls <span>(comma separated)</span></label>
                                            <input type="text" name='website_urls' class="form-control mt-3"
                                                placeholder="Enter Website URL">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                       

                                        
                                        <div class="form-group col-md-6">
                                            <label>Select Status</label>
                                            <select id="inputState" name="status" class="form-control mt-3">
                                                <option selected>--Select--</option>
                                                <option value="1">Publish</option>
                                                <option value="0">Unpublish</option>
                                            </select>
                                        </div>

                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <!-- Include Bootstrap and Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <style>
    .note-editor h1 {
        color: #000000 !important; /* Set your preferred color */
        font-weight: bold !important;
    }
    .note-editor h2 {
        color: #000000 !important;
        font-weight: bold !important;
    }
    .note-editor h3 {
        color: #000000 !important;
        font-weight: bold !important;
    }
    .note-editor h4 {
        color: #000000 !important;
        font-weight: bold !important;
    }
    .note-editor h5 {
        color: #000000 !important;
        font-weight: bold !important;
    }
    .note-editor h6 {
        color: #000000 !important;
        font-weight: bold !important;
    }
    .note-editor p {
        color: #000000 !important; /* Set your preferred color */
        font-weight: normal !important; /* Optional: Change the font-weight as needed */
    }
    li {
    list-style: black;
}
.note-editor ol {
    list-style-type: disc !important;
    color:black;
}
::marker{
    margin-left:10px;
}
.note-editable {
        line-height: 1.8;  /* Customize the value as needed */
    }
</style>

<!-- Initialize Summernote -->
<script>
    $(document).ready(function() {
        $('#project_brief').summernote({
            height: 300,
            toolbar: [
                ['style', ['style', 'paragraph']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],  // Bullet and numbered list
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onInit: function() {
                    // Set the line-height on editor's editable area
                    $('.note-editable').css('line-height', '1.8');  // Customize as needed
                    console.log("Summernote editor initialized with custom line-height!");
                }
            }
        });
    });
</script>
</body>

</html>