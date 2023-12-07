<?php
session_start();
// ob_start();
include('../../admin/config/config.php');
//them so luong
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    foreach ($_SESSION['cart'] as $cart_item) {
        $cart_id = $cart_item['id'];

        $sql_cart = "SELECT * FROM tbl_product WHERE tbl_product.pdt_id='$cart_id'";
        $query_cart = mysqli_query($mysqli, $sql_cart);
        while ($row_cart = mysqli_fetch_array($query_cart)) {

            if ($cart_item['id'] != $id) {

                $product[] = array(
                    'pdt_name' => $cart_item['pdt_name'],
                    'id' => $cart_item['id'],
                    'soluong' => $cart_item['soluong'],
                    'pdt_price' => $cart_item['pdt_price'],
                    'pdt_img' => $cart_item['pdt_img'],
                    'pdt_ma' => $cart_item['pdt_ma']
                );
                $_SESSION['cart'] = $product;
            } else {
                $tangsoluong = $cart_item['soluong'] + 1;
                if ($cart_item['soluong'] < $row_cart['soluong']) {

                    $product[] = array(
                        'pdt_name' => $cart_item['pdt_name'],
                        'id' => $cart_item['id'],
                        'soluong' => $tangsoluong,
                        'pdt_price' => $cart_item['pdt_price'],
                        'pdt_img' => $cart_item['pdt_img'],
                        'pdt_ma' => $cart_item['pdt_ma']
                    );
                } else {
                    $product[] = array(
                        'pdt_name' => $cart_item['pdt_name'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'],
                        'pdt_price' => $cart_item['pdt_price'],
                        'pdt_img' => $cart_item['pdt_img'],
                        'pdt_ma' => $cart_item['pdt_ma']
                    );
                }
                $_SESSION['cart'] = $product;
            }

        }
    }
    header('Location:../../index.php?quanly=giohang');
}
//tru so luong
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'pdt_name' => $cart_item['pdt_name'],
                'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'],
                'pdt_price' => $cart_item['pdt_price'],
                'pdt_img' => $cart_item['pdt_img'],
                'pdt_ma' => $cart_item['pdt_ma']
            );
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluong'] - 1;
            if ($cart_item['soluong'] > 1) {

                $product[] = array(
                    'pdt_name' => $cart_item['pdt_name'],
                    'id' => $cart_item['id'],
                    'soluong' => $tangsoluong,
                    'pdt_price' => $cart_item['pdt_price'],
                    'pdt_img' => $cart_item['pdt_img'],
                    'pdt_ma' => $cart_item['pdt_ma']
                );
            } else {
                $product[] = array(
                    'pdt_name' => $cart_item['pdt_name'],
                    'id' => $cart_item['id'],
                    'soluong' => $cart_item['soluong'],
                    'pdt_price' => $cart_item['pdt_price'],
                    'pdt_img' => $cart_item['pdt_img'],
                    'pdt_ma' => $cart_item['pdt_ma']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}
//xoa san pham
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    foreach ($_SESSION['cart'] as $cart_item) {

        if ($cart_item['id'] != $id) {
            $product[] = array(
                'pdt_name' => $cart_item['pdt_name'],
                'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'],
                'pdt_price' => $cart_item['pdt_price'],
                'pdt_img' => $cart_item['pdt_img'],
                'pdt_ma' => $cart_item['pdt_ma']
            );
        }

        $_SESSION['cart'] = $product;
        header('Location:../../index.php?quanly=giohang');
    }
}

//xoa tat ca san pham
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=giohang');
}
//them sp vao gio
if (isset($_POST['themgiohang'])) {
    // session_destroy();
    $id = $_GET['pdt_id'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_product WHERE pdt_id='" . $id . "' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = array(array('pdt_name' => $row['pdt_name'], 'id' => $id, 'soluong' => $soluong, 'pdt_price' => $row['pdt_price'], 'pdt_img' => $row['pdt_img'], 'pdt_ma' => $row['pdt_ma']));
        //kiểm tra session có tồn tại
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                //nếu dữ liệu trùng
                if ($cart_item['id'] == $id) {
                    $product[] = array(
                        'pdt_name' => $cart_item['pdt_name'],
                        'id' => $cart_item['id'],
                        'soluong' => $soluong + 1,
                        'pdt_price' => $cart_item['pdt_price'],
                        'pdt_img' => $cart_item['pdt_img'],
                        'pdt_ma' => $cart_item['pdt_ma']
                    );
                    $found = true;
                } else {
                    //nếu dữ liệu ko trùng
                    $product[] = array(
                        'pdt_name' => $cart_item['pdt_name'],
                        'id' => $cart_item['id'],
                        'soluong' => $soluong,
                        'pdt_price' => $cart_item['pdt_price'],
                        'pdt_img' => $cart_item['pdt_img'],
                        'pdt_ma' => $cart_item['pdt_ma']
                    );
                }
            }
            if ($found == false) {
                //liên kết dữ liệu
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    // header('Location:../../index.php?quanly=giohang');
    header("location:javascript://history.go(-1)");
}
//  ob_end_flush();
?>