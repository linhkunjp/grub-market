<div class="product-sale">
    <div class="pt-2">
        <li class="fw-bold fs-18 p-3">Sản phẩm khuyến mãi</li>
    </div>
    <?php

    $sql_pro = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id AND tbl_product.sale > 0";
    $query_pro = mysqli_query($mysqli, $sql_pro);

    ?>
    <div>
        <div class="row row-cols-2 row-cols-lg-5 gy-2 gx-3 gx-lg-2">
            <?php
            while ($row = mysqli_fetch_array($query_pro)) {
                ?>
                <?php include("pages/main/product_list.php"); ?>
                <?php
            }
            ?>
        </div>
    </div>
</div>