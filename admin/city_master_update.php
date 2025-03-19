<?php
if (isset($_POST['submit'])) {
    // Database connection
    include '../db_con.php';

    // Get form data
    $id = $_POST['id'];
    $city_name = $_POST['city_name'];

    $sql = "UPDATE add_city_master SET city_name = '$city_name' WHERE id = '$id'";

    // Execute the query
    if ($con->query($sql) === TRUE) {
        header('Location: city_master_list.php');
        exit;
    } else {
        echo "Error: " . $con->error;
    }
    $con->close();
}
?>

