<img class="product_list__list-item-img qr_code mt-1 w-100"
    style="background-image: url(admin/modules/qlsp/<?php echo $row['qrcode'] ?>);">
</img>
<a class="product_list__list-item" href="index.php?quanly=qlsp&id=<?php echo $row['pdt_id'] ?>">
    <?php
    if ($row['sale']) {
        ?>
        <div class="sale-off">
            <span class="sale-off-percent">-
                <?php echo $row['sale'] ?>%
            </span>
        </div>
        <?php
    }
    ?>
    <div class="product_list__list-item-img"
        style="background-image: url(admin/modules/qlsp/uploads/<?php echo $row['pdt_img'] ?>);">
    </div>
    <div class="product_list__list-item-content">
        <li class="title_product">
            <?php echo $row['pdt_name'] ?>
        </li>
        <?php
        if ($row['sale']) {
            ?>
            <div class="d-flex align-items-baseline">
                <li class="price_sale mr-2">
                    <?php echo number_format($row['pdt_price'], 0, ',', '.') ?>&nbsp;₫
                </li>
                <li class="price_product">
                    <?php echo number_format($row['pdt_sale'], 0, ',', '.') ?>&nbsp;₫
                </li>
            </div>
            <?php
        } else {
            ?>
            <li class="price_product">
                <?php echo number_format($row['pdt_price'], 0, ',', '.') ?>&nbsp;₫
            </li>
            <?php
        }
        ?>
        <li class="cate_product">
            <?php echo $row['cate_name'] ?>
        </li>
    </div>
</a>
<div class="pb-3 text-center">
    <button class="btn-themgiohang">
        <form method="POST" action="pages/main/themgiohang.php?pdt_id=<?php echo $row['pdt_id'] ?>">
            <div id="snackbar">
                <div class="toast-icon"><i class="fas fa-check-circle"></i></div>
                <div>Sản phẩm đã được thêm vào giỏ hàng</div>
            </div>
            <?php
            if ($row['soluong'] > 0) {
                ?>
                <div onclick="myFunction();">
                    <input name="themgiohang" type="hidden" value="<?php echo $row['pdt_id'] ?>">
                    <input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng">
                </div>
                <?php
            } else {
                ?>
                <div>
                    <input class="themgiohang" name="themgiohang" type="submit" value="Hết hàng" disabled>
                </div>
                <?php
            }
            ?>
        </form>
    </button>
</div>