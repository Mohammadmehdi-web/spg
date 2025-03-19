<?php
if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email'])) {

    include('../db_con.php');

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'] ?? null;
    $added_date = date('Y-m-d H:i:s');

    $page_url = isset($_POST['page_url']) ? ucwords(str_replace('-', ' ', pathinfo($_POST['page_url'], PATHINFO_FILENAME))) : null;

    $sql = "INSERT INTO contact (name, phone, email, page_url, message, added_date) 
            VALUES ('$name', '$phone', '$email', '$page_url', '$message', '$added_date')";

    $con->query($sql);
    echo $con->affected_rows > 0 ? "success" : "error";

    $con->close();
}
?>
