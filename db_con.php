<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "spg_db";

    $con =  new mysqli($servername, $username, $password, $database);

    if($con->connect_error){
        die("Connection Failed: " . $con->connect_error);
    }
    
?>

