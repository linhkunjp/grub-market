<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
?>
<div class="bg-white">
    <div class="header group content">
        <div class="logo">
            <a href="index.php" style="background-image: url(images/grubmarket.png);">
            </a>
        </div>
        <div class="content">
            <div class="tools-member d-none">
                <div class="cart">
                    <a class="tools-mobile" href="index.php">
                        <i class="fa fa-home"></i>
                        <span class="item-mobile">Trang chủ</span>
                    </a>
                </div>
            </div>
            <div class="search-header">
                <form class="input-search" action="index.php?quanly=timkiem" method="POST">
                    <div class="autocomplete">
                        <button name="timkiem" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        <input type="search" name="tukhoa" autocomplete="off" placeholder="Nhập từ khóa tìm kiếm...">
                    </div>
                </form>
            </div>
            <div class="tools-member">
                <div class="cart">
                    <a class="tools-mobile" href="index.php?quanly=giohang">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="item-mobile">Giỏ hàng</span>
                    </a>
                </div>
                <div class="member">
                    <?php
                    if (isset($_SESSION['dangky'])) {
                        ?>
                        <div>
                            <a class="tools-mobile" href="index.php?quanly=setting">
                                <i class="fa fa-user"></i>
                                <span class="item-mobile"> Tài khoản</span>
                            </a>
                        </div>
                        <div class="menuMember border">
                            <a href="index.php?quanly=doimatkhau">Đổi mật khẩu</a>
                            <a href="index.php?quanly=lichsugiaodich">Lịch sử giao dịch</a>
                            <a href="index.php?dangxuat=1">Đăng xuất</a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div>
                            <a class="tools-mobile" href="index.php?quanly=dangky">
                                <i class="fa fa-user"></i>
                                <span class="item-mobile"> Tài khoản</span>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>