<?php
include('../../config/config.php');

$tenbaiviet = $_POST['posts_name'];
//xuly hinh anh

$hinhanh = $_FILES['posts_img']['name'];
$hinhanh_tmp = $_FILES['posts_img']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;


$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung_bv'];
$danhmuc = $_POST['danhmuc'];


if (isset($_POST['thembaiviet'])) {
	//them
	$sql_them = "INSERT INTO tbl_posts(posts_name,posts_img,tomtat,noidung_bv,cate_posts_id) VALUE('" . $tenbaiviet . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "','" . $danhmuc . "')";
	mysqli_query($mysqli, $sql_them);
	move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
	header('Location:../../index.php?action=qlbv&query=them');
} elseif (isset($_POST['suabaiviet'])) {
	//sua
	if (!empty($_FILES['posts_img']['name'])) {

		move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

		$sql_update = "UPDATE tbl_posts SET posts_name='" . $tenbaiviet . "',posts_img='" . $hinhanh . "',tomtat='" . $tomtat . "',noidung_bv='" . $noidung . "',cate_posts_id='" . $danhmuc . "' WHERE posts_id='$_GET[idbaiviet]'";

		//xoa hinh anh cu
		$sql = "SELECT * FROM tbl_posts WHERE post_id = '$_GET[idbaiviet]' LIMIT 1";
		$query = mysqli_query($mysqli, $sql);
		while ($row = mysqli_fetch_array($query)) {
			unlink('uploads/' . $row['hinhanh']);
		}

	} else {
		$sql_update = "UPDATE tbl_posts SET posts_name='" . $tenbaiviet . "',tomtat='" . $tomtat . "',noidung_bv='" . $noidung . "',cate_posts_id='" . $danhmuc . "' WHERE posts_id='$_GET[idbaiviet]'";

	}

	mysqli_query($mysqli, $sql_update);
	header('Location:../../index.php?action=qlbv&query=them');

} else {
	$id = $_GET['idbaiviet'];
	$sql = "SELECT * FROM tbl_posts WHERE posts_id = '$id' LIMIT 1";
	$query = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($query)) {
		unlink('uploads/' . $row['hinhanh']);
	}
	$sql_xoa = "DELETE FROM tbl_posts WHERE posts_id='" . $id . "'";
	mysqli_query($mysqli, $sql_xoa);
	header('Location:../../index.php?action=qlbv&query=them');
}

?>