<?php
include('../config/config.php');

$mysqli = new mysqli("localhost", "root", "", "grub_market");

if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $pdt_id = $_POST['pdt_id'];
    $id_khachhang = $_POST['id_khachhang'];
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $tenkhachhang = $_POST['tenkhachhang'];

    $query = "SELECT rating FROM tbl_rating WHERE pdt_id = $pdt_id AND id_khachhang = '$id_khachhang' AND user_ip = '" . $user_ip . "'";
    $result = $mysqli->query($query);

    if ($result !== false && $result->num_rows > 0) {
        $status = 2;
    } else {

        $query = "INSERT INTO tbl_rating(rating,pdt_id,id_khachhang,tenkhachhang,user_ip) VALUES('" . $index . "','" . $pdt_id . "','" . $id_khachhang . "','" . $tenkhachhang . "','" . $user_ip . "')";
        $insert = $mysqli->query($query);
        $status = 1;
    }

    $query = "SELECT COUNT(rating) as rating_num, FORMAT((SUM(rating) / COUNT(rating)),1) as average_rating FROM tbl_rating WHERE pdt_id = $pdt_id GROUP BY (pdt_id)";
    $query_rating = mysqli_query($mysqli, $query);
    $ratingData = $query_rating->fetch_assoc();

    $response = array(
        'data' => $ratingData,
        'status' => $status
    );

    echo json_encode($response);

}

?>