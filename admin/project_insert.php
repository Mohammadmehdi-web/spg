<?php

include('../db_con.php');



if (isset($_POST['submit'])) {

    $con->begin_transaction();

    try {

        $pro_url_first = $_POST['pro_url'];

        $pro_url = str_replace(' ', '-', $pro_url_first);

        $city_name = $_POST['city_name'];

        $property = $_POST['property'];

        $totalarea = $_POST['totalarea'];

        $totalamount = $_POST['totalamount'];

        $address = $_POST['address'];

        $pro_tile = $_POST['pro_tile'];

        $highlight_text = $_POST['highlight_text'];

        $status = $_POST['status'];

        $project_brief = $_POST['project_brief'];

        $created_at = date('Y-m-d');

        $sql = "INSERT INTO add_project (pro_url, city_name, property, totalarea, totalamount, address, pro_tile, highlight_text, status, project_brief, created_at)

                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";



        $stmt = $con->prepare($sql);

        $stmt->bind_param("sssssssssss", $pro_url, $city_name,  $property, $totalarea, $totalamount, $address, $pro_tile, $highlight_text, $status, $project_brief, $created_at);



        if (!$stmt->execute()) {

            throw new Exception("Error inserting project: " . $stmt->error);

        }



        // Get the last inserted product ID

        $project_id = $stmt->insert_id;



        // Handle multiple file uploads for images

        $target_dir = "../project/project_upload/";

        foreach ($_FILES['images']['name'] as $key => $image_name) {

            // Generate unique image name

            $unique_image_name = uniqid() . "_" . basename($image_name);

            $target_file = $target_dir . $unique_image_name;



            // Move the uploaded file to the server

            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {

                // Insert image data into project_images table

                $sql = "INSERT INTO banner_image (project_id, banner_image) VALUES (?, ?)";

                $stmt = $con->prepare($sql);

                $stmt->bind_param("is", $project_id, $unique_image_name);



                if (!$stmt->execute()) {

                    throw new Exception("Error inserting image: " . $stmt->error);

                }

            } else {

                throw new Exception("Error uploading image: $image_name");

            }

        }

        // Handle multiple file uploads for two_photos (same product_id is used)

        if (isset($_FILES['two_photos'])) {

            foreach ($_FILES['two_photos']['name'] as $key => $two_name) {

                // Generate unique name for each photo

                $unique_two_name = uniqid() . "_" . basename($two_name);



                if ($_FILES['two_photos']['error'][$key] == 0) {

                    $target_file = $target_dir . $unique_two_name;



                    if (move_uploaded_file($_FILES['two_photos']['tmp_name'][$key], $target_file)) {

                        // Insert photo into project_images table

                        $sql = "INSERT INTO project_image (project_id, project_image) VALUES (?, ?)";

                        $stmt = $con->prepare($sql);

                        $stmt->bind_param("is", $project_id, $unique_two_name);



                        if (!$stmt->execute()) {

                            throw new Exception("Error inserting photo: " . $stmt->error);

                        }

                    } else {

                        throw new Exception("Error uploading photo: $two_name");

                    }

                } else {

                    throw new Exception("Error uploading photo: " . $_FILES['two_photos']['error'][$key]);

                }

            }

        }



        // Handle multiple file uploads for single_photos (same product_id is used)

        if (isset($_FILES['single_photos'])) {

            foreach ($_FILES['single_photos']['name'] as $key => $single_name) {

                // Generate unique name for each photo

                $unique_single_name = uniqid() . "_" . basename($single_name);



                if ($_FILES['single_photos']['error'][$key] == 0) {

                    $target_file = $target_dir . $unique_single_name;



                    if (move_uploaded_file($_FILES['single_photos']['tmp_name'][$key], $target_file)) {

                        // Insert photo into project_images table

                        $sql = "INSERT INTO slider_image (project_id, slider_image) VALUES (?, ?)";

                        $stmt = $con->prepare($sql);

                        $stmt->bind_param("is", $project_id, $unique_single_name);



                        if (!$stmt->execute()) {

                            throw new Exception("Error inserting photo: " . $stmt->error);

                        }

                    } else {

                        throw new Exception("Error uploading photo: $single_name");

                    }

                } else {

                    throw new Exception("Error uploading photo: " . $_FILES['single_photos']['error'][$key]);

                }

            }

        }





        // Commit the transaction

        $con->commit();



        // Redirect to project list

        header('Location: project_list.php');



    } catch (Exception $e) {

        // Rollback transaction if error occurs

        $con->rollback();

        echo "Failed to insert project and images: " . $e->getMessage();

    }



    // Close statement and connection

    $stmt->close();

    $con->close();

}

?>

