<div class="container py-4">
    <?php
    if (isset($_GET['quanly'])) {
        $tam = $_GET['quanly'];
    } else {
        $tam = '';
    }
    if ($tam == 'qldm') {
        include("main/danhmuc.php");
    } elseif ($tam == 'tatcasanpham') {
        include("main/tatcasanpham.php");

    } elseif ($tam == 'giohang') {
        include("main/giohang.php");
    } elseif ($tam == 'democart') {
        include("main/demo-cart.php");

    } elseif ($tam == 'qldmbv') {
        include("main/danhmucbaiviet.php");

    } elseif ($tam == 'qlbv') {
        include("main/baiviet.php");

    } elseif ($tam == 'lienhe') {
        include("main/lienhe.php");

    } elseif ($tam == 'qlsp') {
        include("main/sanpham.php");

    } elseif ($tam == 'dangky') {
        include("main/dangky.php");

    } elseif ($tam == 'dangnhap') {
        include("main/dangnhap.php");

    } elseif ($tam == 'timkiem') {
        include("main/timkiem.php");

    } elseif ($tam == 'thanks') {
        include("main/thanks.php");

    } elseif ($tam == 'doimatkhau') {
        include("main/doimatkhau.php");

    } elseif ($tam == 'vanchuyen') {
        include("main/vanchuyen.php");

    } elseif ($tam == 'thongtinthanhtoan') {
        include("main/thongtinthanhtoan.php");

    } elseif ($tam == 'setting') {
        include("main/setting.php");

    } elseif ($tam == 'donhangdadat') {
        include("main/donhangdadat.php");

    } elseif ($tam == 'lichsugiaodich') {
        include("main/lichsugiaodich.php");

    } elseif ($tam == 'xemdonhang') {
        include("main/xemdonhang.php");

    } elseif ($tam == 'recommendation2') {
        include("similar_product/index.php");
    } else {
        include("main/index.php");
    }
    ?>
</div>