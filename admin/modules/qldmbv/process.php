<?php
include('../../config/config.php');

$tendanhmucbaiviet = $_POST['posts_cate_name'];
$thutu = $_POST['stt'];

if (isset($_POST['themdanhmucbaiviet'])) {
	//them
	$sql_them = "INSERT INTO tbl_posts_cate(posts_cate_name,stt) VALUE('" . $tendanhmucbaiviet . "','" . $thutu . "')";
	mysqli_query($mysqli, $sql_them);
	header('Location:../../index.php?action=qldmbv&query=them');

} elseif (isset($_POST['suadanhmucbaiviet'])) {
	//sua
	$sql_update = "UPDATE tbl_posts_cate SET posts_cate_name='" . $tendanhmucbaiviet . "',stt='" . $thutu . "' WHERE posts_cate_id='$_GET[idbaiviet]'";
	mysqli_query($mysqli, $sql_update);
	header('Location:../../index.php?action=qldmbv&query=them');
} else {

	$id = $_GET['idbaiviet'];
	$sql_xoa = "DELETE FROM tbl_posts_cate WHERE posts_cate_id='" . $id . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:../../index.php?action=qldmbv&query=them');
}

?>