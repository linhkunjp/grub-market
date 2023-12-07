<?php

$sql_pro = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id AND tbl_category.cate_id='$_GET[id]' ";
$query_pro = mysqli_query($mysqli, $sql_pro);

$query_title = mysqli_query($mysqli, $sql_pro);
$row_title = mysqli_fetch_array($query_title);

?>

<div class="p-3 fs-18 fw-bold">Danh mục:
    <?php echo $row_title['cate_name'] ?>
</div>

<div class="row row-cols-2 row-cols-lg-5 gy-2 gx-3 gx-lg-2">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
        ?>
        <?php include("pages/main/product_list.php"); ?>
        <?php
    }
    ?>
</div>