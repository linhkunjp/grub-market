<div class="fs-18 fw-bold p-3">Kết quả tìm kiếm:
    <?php echo '<span style="color: rgb(237, 28, 36);">' . $_POST['tukhoa'] . '</span>'; ?>
</div>

<?php
if ((isset($_POST['timkiem'])) && (!empty($_POST['tukhoa']))) {
    $tukhoa = $_POST['tukhoa'];

    $sql_pro = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id AND tbl_product.pdt_name LIKE '%" . $tukhoa . "%'";
    $query_pro = mysqli_query($mysqli, $sql_pro);
    $num = mysqli_num_rows($query_pro);

    if ($num == 0) {
        ?>
        <div class="fs-18 fw-bold p-3">Không tìm thấy kết quả với từ khoá:
            <?php echo '<span style="color: rgb(237, 28, 36);">' . $_POST['tukhoa'] . '</span>'; ?>
        </div>
        <?php
    } else {
        ?>
        <div class="pb-5">
            <div class="row row-cols-2 row-cols-lg-5 gy-2 gx-3 gx-lg-2">
                <?php
                while ($row = mysqli_fetch_array($query_pro)) {
                    ?>
                    <?php include("pages/main/product_list.php"); ?>
                    <?php
                }
    }
}
?>
    </div>
</div>