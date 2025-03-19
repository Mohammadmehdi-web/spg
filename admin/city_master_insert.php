<?php
if (isset($_POST['submit'])) {
    include '../db_con.php';

    $city_name = $_POST['city_name'];
    $sql = "INSERT INTO add_city_master (city_name) VALUES ('$city_name')";

    if (mysqli_query($con, $sql)) {
        header('Location: city_master_list.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
