<?php
if (isset($_POST['submit'])) {
    include '../db_con.php';


    $banner_id = $_POST['banner_id'];
    $type = $_POST['type'];
    $title = $_POST['title'];
    $details = $_POST['details'];


    $sql = "UPDATE add_banner SET type='$type', title='$title', details='$details'";

    if (!empty($_FILES["image"]["tmp_name"])) {
        $target_file = "banner_uploads/" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $sql .= ", image_path='$target_file'";
    }

    $sql .= " WHERE id='$banner_id'";

    if ($con->query($sql) === TRUE) {
        header('Location: banner_list.php');
    } else {
        echo "Error: " . $con->error;
    }
    $con->close();
}
?>
