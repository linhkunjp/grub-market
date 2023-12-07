<?php
include('../../config/config.php');

$tenloaisp = $_POST['cate_name'];
$thutu = $_POST['stt'];
if (isset($_POST['themdanhmuc'])) {
    //them
    $sql_add = "INSERT INTO tbl_category(cate_name,stt) VALUE('" . $tenloaisp . "', '" . $thutu . "')";
    mysqli_query($mysqli, $sql_add);
    header('Location:../../index.php?action=qldm&query=them');
} elseif (isset($_POST['suadanhmuc'])) {
    //sua
    $sql_update = "UPDATE tbl_category SET cate_name='" . $tenloaisp . "',stt='" . $thutu . "' WHERE cate_id='$_GET[iddm]'";
    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=qldm&query=them');
} else {

    $id = $_GET['iddm'];
    $sql_xoa = "DELETE FROM tbl_category WHERE cate_id='" . $id . "' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=qldm&query=them');
}


?>