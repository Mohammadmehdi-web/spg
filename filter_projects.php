<?php
include('db_con.php');

$city_name = isset($_POST['city_name']) ? $con->real_escape_string($_POST['city_name']) : '';
$property = isset($_POST['property']) ? $con->real_escape_string($_POST['property']) : '';

$sql = "SELECT add_project.*, project_image.project_image AS image 
        FROM add_project
        LEFT JOIN project_image ON add_project.id = project_image.project_id
        WHERE 1=1";

if (!empty($city_name)) {
    $sql .= " AND add_project.city_name = '$city_name'";
}

if (!empty($property)) {
    $sql .= " AND add_project.property = '$property'";
}

$sql .= " GROUP BY add_project.id";

$result = $con->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card-product grid">
            <div class="card-product-wrapper">
                <a href="project/<?= $row['pro_url']; ?>" class="product-img">
                    <img class="lazyload img-product" src="project/project_upload/<?= $row['image']; ?>" alt="image-product">
                    <img class="lazyload img-hover" src="project/project_upload/<?= $row['image']; ?>" alt="image-product">
                </a>
            </div>
            <div class="card-product-info">
                <a href="project/<?= $row['pro_url']; ?>" class="title link">
                    <?= $row['pro_tile']; ?>
                </a>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No projects found.</p>";
}
?>
