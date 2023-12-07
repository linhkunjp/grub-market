<?php
if(isset($_SESSION['id_khachhang']) && (isset($_SESSION['dangky']))) {

    $id_khachhang = $_SESSION['id_khachhang'];
    $tenkhachhang = $_SESSION['dangky'];

} else {
    $id_khachhang = 0;
}

$sql_view = "SELECT DISTINCT `pdt_id`, `id_khachhang` FROM `tbl_view` WHERE `id_khachhang`='$id_khachhang' ORDER BY id DESC LIMIT 5";
$query_view = mysqli_query($mysqli, $sql_view);
$row_num = mysqli_num_rows($query_view);

?>

<?php
if($row_num > 0) {
    ?>
    <div class="product-viewed">
        <div class="pt-2">
            <li class="fw-bold fs-18 p-3">Sản phẩm vừa xem</li>
        </div>
        <div>
            <div class="row row-cols-2 row-cols-lg-5 gy-2 gx-3 gx-lg-2">
                <?php
                while($row_view = mysqli_fetch_array($query_view)) {
                    ?>
                    <?php

                    $pdt_id = $row_view['pdt_id'];
                    $sql_pro = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id AND tbl_product.pdt_id='$pdt_id'";
                    $query_pro = mysqli_query($mysqli, $sql_pro);

                    ?>
                    <?php
                    while($row = mysqli_fetch_array($query_pro)) {
                        ?>
                        <?php include("pages/main/product_list.php"); ?>
                        <?php
                    }
                    ?>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
?>