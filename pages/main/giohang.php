<h4> Giỏ hàng
   <?php
   if (isset($_SESSION['dangky'])) {
      echo 'Xin chào: ' . '<span style="color: rgb(237, 28, 36);">' . $_SESSION['dangky'] . '</span>';
   }
   ?>
</h4>
<?php
if (isset($_SESSION['cart'])) {

}
?>
<div class="container mb-0">
   <div class="arrow-steps clearfix">
      <div class="step current"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
      <?php
      if (isset($_SESSION['cart']) && (isset($_SESSION['dangky']))) {
         ?>
         <div class="step"> <span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
         <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span> </div>
         <?php
      } else {
         ?>
         <div class="step"> <span>Vận chuyển</span> </div>
         <div class="step"> <span>Thanh toán<span> </div>
         <?php
      }
      ?>
   </div>
</div>
<div class="row mb-3s">
   <?php include("pages/main/cart_detail.php"); ?>
   <?php include("pages/main/cart_payment.php"); ?>
</div>

<script>
   var tttt = document.querySelector('.link-tttt')
   var vc = document.querySelector('.link-vc')
   if (window.location) {
      tttt.style.display = 'none';
   } 
</script>