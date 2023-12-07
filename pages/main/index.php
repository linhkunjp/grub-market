<?php include("pages/main/banner.php"); ?>
<div class="main">
    <?php include("pages/main/product_viewed.php"); ?>
    <?php include("pages/main/product_sale.php"); ?>

    <div class="product-category">
        <?php
        $sql_danhmuc = "SELECT * FROM tbl_category ORDER BY cate_id LIMIT 2";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while ($row_title = mysqli_fetch_array($query_danhmuc)) { ?>
            <div>
                <div class="fw-bold fs-18 p-3"><a href="index.php?quanly=qldm&id=<?php echo $row_title['cate_id'] ?>">
                        <?php echo $row_title['cate_name'] ?>
                    </a>
                </div>
                <?php

                $cate_id = $row_title['cate_id'];
                $sql_pro = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id AND tbl_category.cate_id='$cate_id' ORDER BY pdt_id LIMIT 10";
                $query_pro = mysqli_query($mysqli, $sql_pro);

                ?>
                <div class="row row-cols-2 row-cols-lg-5 gy-2 gx-3 gx-lg-2">
                    <?php
                    while ($row = mysqli_fetch_array($query_pro)) {
                        ?>
                        <?php include("pages/main/product_list.php"); ?>
                        <?php
                    }
                    ?>
                </div>
                <div class="my-0 mx-auto" style="width: 200px;">
                    <div class="xemthem">
                        <a class="text-danger" href="index.php?quanly=qldm&id=<?php echo $row_title['cate_id'] ?>">
                            Xem thêm
                        </a>
                    </div>
                </div>
            </div>
            <?php
        } ?>
    </div>
</div>