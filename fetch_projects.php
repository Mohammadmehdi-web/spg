<?php
include('db_con.php');

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 12;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$industry = isset($_GET['industry']) ? trim($_GET['industry']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : '';
$country = isset($_GET['country']) ? trim($_GET['country']) : '';
$year = isset($_GET['year']) ? trim($_GET['year']) : '';
$status = isset($_GET['status']) ? intval($_GET['status']) : 1;
$feature_status = isset($_GET['feature_status']) ? intval($_GET['feature_status']) : null;
$king_status = isset($_GET['king_status']) ? intval($_GET['king_status']) : null;

$sql = "SELECT add_project.year, banner_image.banner_image as image, add_project.pro_tile, add_project.highlight_text, 
        add_project.pro_url, add_project.industry_name, add_project.pro_category, add_project.country_name, 
        add_project.id, add_project.status, add_project.king_status, add_project.feature_status
        FROM add_project
        INNER JOIN banner_image ON add_project.id = banner_image.project_id
        WHERE add_project.status = $status";  

// Search filter
if (!empty($search)) {
    $sql .= " AND (add_project.pro_tile LIKE '%$search%' 
                 OR add_project.highlight_text LIKE '%$search%' 
                 OR add_project.industry_name LIKE '%$search%' 
                 OR add_project.pro_category LIKE '%$search%' 
                 OR add_project.country_name LIKE '%$search%')";
}

if (!empty($industry)) {
    $sql .= " AND add_project.industry_name = '$industry'";
}
if (!empty($category)) {
    $sql .= " AND add_project.pro_category = '$category'";
}
if (!empty($country)) {
    $sql .= " AND add_project.country_name = '$country'";
}
if (!empty($year)) {
    $sql .= " AND add_project.year = '$year'";
}

if ($feature_status !== null) {
    $sql .= " AND add_project.feature_status = $feature_status";
}
if ($king_status !== null) {
    $sql .= " AND add_project.king_status = $king_status";
}

$sql .= " GROUP BY add_project.id LIMIT $limit OFFSET $offset";

$result = $con->query($sql);
$projects = $result->fetch_all(MYSQLI_ASSOC);

$totalQuery = "SELECT COUNT(DISTINCT add_project.id) AS total FROM add_project WHERE add_project.status = $status";
if (!empty($search)) {
    $totalQuery .= " AND (add_project.pro_tile LIKE '%$search%' 
                         OR add_project.highlight_text LIKE '%$search%' 
                         OR add_project.industry_name LIKE '%$search%' 
                         OR add_project.pro_category LIKE '%$search%' 
                         OR add_project.country_name LIKE '%$search%')";
}

$totalResult = $con->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalProjects = $totalRow['total'];
$totalPages = ceil($totalProjects / $limit);

$response = [
    'projects' => $projects,
    'totalPages' => $totalPages,
    'currentPage' => $page
];

echo json_encode($response);
?>