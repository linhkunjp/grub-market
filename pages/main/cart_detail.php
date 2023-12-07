<div class="col-12 col-lg-8 pb-0">
    <div class="border mb-3 " style="border-bottom: 0px!important;">
        <div class="">
            <?php
            if (isset($_SESSION['cart'])) {
                ?>
                <div class="bg-light pt-3s px-3 pd-10">
                    <div class="row g-0 w-100">
                        <div class="col col-lg-8 align-self-center pd-0">
                            <strong class="fs-16">Sản phẩm</strong>
                        </div>
                        <div class="col-12 col-lg align-self-center text-center pd-0 f-impor cart-soluong">
                            <strong class="fs-16">Số lượng</strong>
                        </div>
                        <div class="col-auto align-self-center ms-auto pd-0">
                            <a href="pages/main/themgiohang.php?xoatatca=1"
                                onclick="return confirm('Bạn có muốn xoá không');">
                                <button class="btn btn-outline-light cart-del" type="button">
                                    <i class="fa fa-trash text-dark"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                $i = 0;
                $tongtien = 0;
                foreach ($_SESSION['cart'] as $cart_item) {
                    $cart_name = $cart_item['pdt_name'];

                    $sql_cart = "SELECT * FROM tbl_product WHERE tbl_product.pdt_name='$cart_name'";
                    $query_cart = mysqli_query($mysqli, $sql_cart);
                    $row_cart = mysqli_fetch_array($query_cart);

                    $thanhtien = ((int) $cart_item['soluong'] * (int) $cart_item['pdt_price']);
                    $tongtien += $thanhtien;
                    $i++;
                    ?>
                    <div class="pt-3">
                        <div class=" px-3 border-bottom">
                            <div class="row g-3 cart-content">
                                <div class="col col-lg-8 align-self-center pd-0 ml-3 cart-item">
                                    <div class=" row g-3s mb-3 cart-name">
                                        <div class="col-auto mb-0 pt-0 pb-0 cart-img">
                                            <div class=" img"><img
                                                    src="admin/modules/qlsp/uploads/<?php echo $cart_item['pdt_img']; ?>"
                                                    width="112">
                                            </div>
                                        </div>
                                        <div class="col cart-title">
                                            <h4 class="">
                                                <?php echo $cart_item['pdt_name']; ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg align-self-center text-center f-impor cart-pay">
                                    <div class=" mb-2 cart-price">
                                        <?php echo number_format($thanhtien, 0, ',', '.'); ?>&nbsp;₫
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <div class="input-group mx-auto cart-quan">
                                                <?php
                                                if ($cart_item['soluong'] == 1) {
                                                    ?>
                                                    <button class="btn btn-quan" type="button" disabled>
                                                        <i class="fa fa-minus cart-ml-4" aria-hidden="true"></i>
                                                    </button>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>">
                                                        <button class="btn btn-quan" type="button">
                                                            <i class="fa fa-minus cart-ml-4" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                    <?php
                                                }
                                                ?>

                                                <input type="text" class="cart-input text-center"
                                                    value="<?php echo $cart_item['soluong']; ?>" disabled>
                                                <!-- <input type="text" class="cart-input text-center"
                                                    value="<?php echo $row_cart['soluong']; ?>" disabled> -->

                                                <?php
                                                if ($cart_item['soluong'] == $row_cart['soluong']) {
                                                    ?>
                                                    <button class="btn btn-quan" type="button" disabled>
                                                        <i class="fa fa-plus cart-ml-4" aria-hidden="true"></i>
                                                    </button>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>">
                                                        <button class="btn btn-quan" type="button">
                                                            <i class="fa fa-plus cart-ml-4" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto align-self-center cart-del-mobile">
                                    <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">
                                        <button class="btn btn-outline-light cart-del" type="button">
                                            <i class="fa fa-trash text-dark"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
            } else {
                ?>
                <div class="border-bottom cart-empty">
                    <div class="col-xl-5 mx-auto text-center my-5 empty-mobile">
                        <h2 class="mb-3 ">Chưa có sản phẩm!</h2>
                        <p class="img mb-3"><img src="images/empty-img.png" alt="" /></p>
                        <a class="btn btn-danger w-100 m-0 fs-16" type="button" href="index.php">Tiếp tục mua hàng</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>