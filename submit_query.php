<?php
include 'db_con.php';
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}// Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $project_id = mysqli_real_escape_string($con, $_POST['project_id']);

    $query = "INSERT INTO queries (name, mobile, email, project_id) VALUES ('$name', '$mobile', '$email', '$project_id')";

    if (mysqli_query($con, $query)) {
        echo "success";
    } else {
        echo "Database Error: " . mysqli_error($con);
    }
} else {
    echo "Invalid Request!";
}
?>