<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangnhap']);
    header('Location:login.php');
}
?>
<h2 class="text-center"><a href="index.php?dangxuat=1">Đăng xuất
    </a>
</h2>