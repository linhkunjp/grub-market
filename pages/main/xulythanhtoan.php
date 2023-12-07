<?php
session_start();
include('../../admin/config/config.php');
require('../../mail/sendmail.php');
require('../../carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh');
$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0, 9999);
$cart_payment = $_POST['payment'];
//lay id thong tin van chuyen
$id_dangky = $_SESSION['id_khachhang'];
$sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
$shipping_id = $row_get_vanchuyen['shipping_id'];

$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $now . "','" . $cart_payment . "','" . $shipping_id . "')";
$cart_query = mysqli_query($mysqli, $insert_cart);
if ($cart_query) {
    //them gio hang chi tiet
    foreach ($_SESSION['cart'] as $key => $value) {

        $cart_id = $value['id'];

        $sql_cart = "SELECT * FROM tbl_product WHERE tbl_product.pdt_id='$cart_id'";
        $query_cart = mysqli_query($mysqli, $sql_cart);
        while ($row_cart = mysqli_fetch_array($query_cart)) {

            $stock = $row_cart['soluong'] - $value['soluong'];

            $pdt_id = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_cart_details(pdt_id,code_cart,soluongmua,stock) VALUE('" . $pdt_id . "','" . $code_order . "','" . $soluong . "','" . $stock . "')";
            $sql_update = "UPDATE tbl_product SET soluong='" . $stock . "' WHERE pdt_id='$cart_id'";
            mysqli_query($mysqli, $sql_update);
            mysqli_query($mysqli, $insert_order_details);

        }
    }

    $tieude = "Đặt hàng website banhangcongnghe.net thành công!";
    $noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng : " . $code_order . "</p>";
    $noidung .= "<h4>Đơn hàng đặt bao gồm :</h4p>";

    foreach ($_SESSION['cart'] as $key => $val) {
        $thanhtien = ((int) $val['soluong'] * (int) $val['pdt_price']);
        $noidung .= "<ul style='padding:0;list-style: none;line-height: 1.5rem;border: 1px solid #ccc;'>
   			<li> Tên sản phẩm: " . $val['pdt_name'] . "</li>
   			<li> Mã sản phẩm: " . $val['pdt_ma'] . "</li>
   			<li> Đơn giá: " . number_format($val['pdt_price'], 0, ',', '.') . "đ</li>
   			<li> Số lượng: " . $val['soluong'] . "</li>
   			<li> Thành tiền: " . number_format($thanhtien, 0, ',', '.') . "đ</li>
   			</ul>";
    }
    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude, $noidung, $maildathang);
}
unset($_SESSION['cart']);
header('Location:../../index.php?quanly=thanks');

?>