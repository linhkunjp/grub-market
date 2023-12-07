<div class="col-12 col-lg-4 pb-0">
    <div class="cart-sale">
        <h3 class=" px-3s py-1 bg-light text-center rounded-1 mb-3 justify-content-center ">
            Khuyến Mãi</h3>
        <ul class="list-unstyled list-color-dark-gray">
            <li><a class="d-flex align-items-center py-1" href="#"><strong class="pe-2">Mã giảm
                        giá</strong><span class="text-gray"></span><i class=" fas fa-chevron-right ms-auto"></i></a>
            </li>
            <li><a class="d-flex align-items-center py-1" href="#"><strong class="pe-2">Ưu đãi cho đơn
                        hàng</strong><span class="text-gray"></span><i class=" fas fa-chevron-right ms-auto"></i></a>
            </li>
            <li><a class="d-flex align-items-center py-1" href="#"><strong class="pe-2">Giá siêu
                        tốt</strong><span class="text-gray"></span><i class=" fas fa-chevron-right ms-auto"></i></a>
            </li>
        </ul>
        <h3 class=" px-3s py-1 bg-light text-center rounded-1 mb-3 justify-content-center">
            Thông tin thanh toán</h3>
        <dl class="row g-3s mb-0 ">
            <dt class="col-7 fw-normal text-black-50 mb-2 pb-0 pt-0 fs-16">Tổng giá trị đơn hàng</dt>
            <dd class="col-5 text-end mb-2 pb-0 pt-0"><strong class="fs-16">
                    <?php if (isset($_SESSION['cart']))
                        echo number_format($tongtien, 0, ',', '.');
                    else
                        echo 0 ?> ₫
                    </strong></dd>
                <dt class="col-7 fw-normal text-black-50 mb-2 pb-0 pt-0 fs-16">Phí vận chuyển</dt>
                <dd class="col-5 text-end mb-2 pb-0 pt-0"><strong class="fs-16">0 ₫</strong></dd>
            </dl>
            <div class="row g-3s mb-4s cart-price-title">
                <div class="col align-self-center cart-price pb-0 pt-0">Thành tiền</div>
                <div class="col text-end text-danger cart-price pb-0 pt-0">
                <?php if (isset($_SESSION['cart']))
                        echo number_format($tongtien, 0, ',', '.');
                    else
                        echo 0 ?> ₫
                </div>
            </div>
            <div class="">
                <?php
                    if (isset($_SESSION['dangky'])) {
                        ?>
                <div class="container p-0">
                    <a href="index.php?quanly=vanchuyen" class="link-vc">
                        <button class="btn btn-danger w-100 m-0 fs-16" type="button">
                            Thanh toán
                        </button>
                    </a>
                    <a href="index.php?quanly=thongtinthanhtoan" class="link-tttt">
                        <button class="btn btn-danger w-100 m-0 fs-16" type="button">
                            Thanh toán
                        </button>
                    </a>
                </div>
                <?php
                    } else {
                        ?>
                <div class="container px-2">
                    <a href="index.php?quanly=dangky">
                        <button class="btn btn-danger w-100 m-0 fs-16" type="button">
                            Đăng ký đặt hàng
                        </button>
                    </a>
                </div>
                <?php
                    }
                    ?>
        </div>
    </div>
</div>