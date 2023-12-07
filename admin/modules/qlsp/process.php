<?php
include('../../config/config.php');
include('../../phpqrcode/qrlib.php');
// $pdt_id = $_GET['pdt_id'];

$tensp = $_POST['pdt_name'];
$masp = $_POST['pdt_ma'];
$giasp = $_POST['pdt_price'];
$sale = $_POST['sale'];

if (!empty($sale)) {
    $giasale = $giasp - $sale / 100 * $giasp;
}

$soluong = $_POST['soluong'];
// xử lý hình ảnh
$anh = $_FILES['pdt_img']['name'];
$anh_tmp = $_FILES['pdt_img']['tmp_name'];
$anh = time() . '_' . $anh;

// xử lý ảnh mô tả
$files = $_FILES['pdt_imgs'];
$file_names = $files['name'];

foreach ($file_names as $key => $value) {
    move_uploaded_file($files['tmp_name'][$key], 'uploads/' . $value);
}

$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$danhmuc = $_POST['danhmuc'];

$file_qrcode = 'img_qrcode/' . uniqid() . ".png";
$ecc = 'L';
$pixel_Size = 5;
$frame_Size = 5;


if (isset($_POST['themsanpham'])) {
    // thêm sản phẩm
    $sql_add = "INSERT INTO tbl_product(pdt_name,pdt_ma,pdt_price,sale,pdt_sale,soluong,pdt_img,tomtat,noidung,cate_id,qrcode)
                 VALUE('" . $tensp . "', '" . $masp . "', '" . $giasp . "', '" . $sale . "','" . $giasale . "', '" . $soluong . "', '" . $anh . "','" . $tomtat . "', '" . $noidung . "', '" . $danhmuc . "','" . $file_qrcode . "')";
    mysqli_query($mysqli, $sql_add);
    move_uploaded_file($anh_tmp, 'uploads/' . $anh);

    QRcode::png($noidung, $file_qrcode, $ecc, $pixel_Size, $frame_Size);

    $id_pro = mysqli_insert_id($mysqli);

    foreach ($file_names as $key => $value) {
        mysqli_query($mysqli, "INSERT INTO tbl_images(pdt_id,img_pdt) VALUES ('" . $id_pro . "', '" . $value . "') ");
    }

    header('Location:../../index.php?action=qlsp&query=them');
} elseif (isset($_POST['suasanpham'])) {
    // sủa sản phẩm
    if (!empty($_FILES['pdt_img']['name'])) {
        move_uploaded_file($anh_tmp, 'uploads/' . $anh);

        $sql_update = "UPDATE tbl_product SET pdt_name='" . $tensp . "',pdt_ma='" . $masp . "',pdt_price='" . $giasp . "',sale='" . $sale . "',pdt_sale='" . $giasale . "',soluong='" . $soluong . "',
        pdt_img='" . $anh . "',tomtat='" . $tomtat . "',noidung='" . $noidung . "',cate_id='" . $danhmuc . "',qrcode='" . $file_qrcode . "' WHERE pdt_id='$_GET[idsp]'";

        QRcode::png($noidung, $file_qrcode, $ecc, $pixel_Size, $frame_Size);
        // xoá hình ảnh cũ

        $sql = "SELECT * FROM tbl_product WHERE pdt_id = '$_GET[idsp]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['pdt_img']);
        }

        // sủa ảnh mô tả
        mysqli_query($mysqli, "DELETE FROM tbl_images WHERE tbl_images.pdt_id='$_GET[idsp]'");

        foreach ($file_names as $key => $value) {
            move_uploaded_file($files['tmp_name'][$key], 'uploads/' . $value);
        }

        foreach ($file_names as $key => $value) {
            mysqli_query($mysqli, "INSERT INTO tbl_images(pdt_id,img_pdt) VALUES ('$_GET[idsp]', '$value') ");

        }


    } else {
        $sql_update = "UPDATE tbl_product SET pdt_name='" . $tensp . "',pdt_ma='" . $masp . "',pdt_price='" . $giasp . "',sale='" . $sale . "',pdt_sale='" . $giasale . "',soluong='" . $soluong . "',
        tomtat='" . $tomtat . "',noidung='" . $noidung . "',cate_id='" . $danhmuc . "',qrcode='" . $file_qrcode . "' WHERE pdt_id='$_GET[idsp]'";

        QRcode::png($noidung, $file_qrcode, $ecc, $pixel_Size, $frame_Size);

        $sql_qrcode = "SELECT qrcode FROM tbl_product WHERE pdt_id = '$_GET[idsp]' ";
        $query_qrcode = mysqli_query($mysqli, $sql_qrcode);

        while ($row_qrcode = mysqli_fetch_array($query_qrcode)) {
            unlink('img_qrcode/' . $row_qrcode['qrcode']);
        }


    }
    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=qlsp&query=them');
} else {
    $id = $_GET['idsp'];
    $sql = "SELECT * FROM tbl_product WHERE pdt_id = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['pdt_img']);
    }
    $sql_xoa = "DELETE FROM tbl_product WHERE pdt_id='" . $id . "' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=qlsp&query=them');
}


?>