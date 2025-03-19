<?php
include('db_con.php');

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 12;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$city_name = isset($_GET['city_name']) ? trim($_GET['city_name']) : '';
$property = isset($_GET['property']) ? trim($_GET['property']) : '';
$status = isset($_GET['status']) ? intval($_GET['status']) : 1;

$sql = "SELECT add_project.year, banner_image.banner_image as image, add_project.pro_tile, add_project.highlight_text, 
        add_project.pro_url, add_project.city_name, add_project.property, 
        add_project.id, add_project.status,
        FROM add_project
        INNER JOIN banner_image ON add_project.id = banner_image.project_id
        WHERE add_project.status = $status";  

// Search filter
if (!empty($search)) {
    $sql .= " AND (add_project.pro_tile LIKE '%$search%' 
                 OR add_project.highlight_text LIKE '%$search%' 
                 OR add_project.city_name LIKE '%$search%' 
                 OR add_project.property LIKE '%$search%')";
}

if (!empty($city)) {
    $sql .= " AND add_project.city_name = '$city'";
}
if (!empty($property)) {
    $sql .= " AND add_project.property = '$property'";
}


$sql .= " GROUP BY add_project.id LIMIT $limit OFFSET $offset";

$result = $con->query($sql);
$projects = $result->fetch_all(MYSQLI_ASSOC);

$totalQuery = "SELECT COUNT(DISTINCT add_project.id) AS total FROM add_project WHERE add_project.status = $status";
if (!empty($search)) {
    $totalQuery .= " AND (add_project.pro_tile LIKE '%$search%' 
                         OR add_project.highlight_text LIKE '%$search%' 
                 OR add_project.city_name LIKE '%$search%' 
                 OR add_project.property LIKE '%$search%')";
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