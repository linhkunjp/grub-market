<?php
$mysqli = new mysqli("localhost", "root", "", "grub_market");

if ($mysqli->connect_errno) {
    echo "Failed to connect:" . $mysqli->connect_error;
    exit();
}


// if (!$mysqli) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";
?>