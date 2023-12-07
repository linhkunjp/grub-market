<h4>Thông tin vận chuyển</h4>
<?php
if (isset($_SESSION['id_khachhang'])) {
  ?>
  <!-- Responsive Arrow Progress Bar -->
  <div class="container mb-0">
    <div class="arrow-steps clearfix">
      <div class="step done"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
      <div class="step current"> <span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
      <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span> </div>
    </div>
  </div>
  <?php
}
?>
<?php
if (isset($_POST['themvanchuyen'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $note = $_POST['note'];
  $id_dangky = $_SESSION['id_khachhang'];
  $sql_them_vanchuyen = mysqli_query($mysqli, "INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) VALUES('$name','$phone','$address','$note','$id_dangky')");
  if ($sql_them_vanchuyen) {
    echo '<script>alert("Thêm vận chuyển thành công")</script>';
  }
} elseif (isset($_POST['capnhatvanchuyen'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $note = $_POST['note'];
  $id_dangky = $_SESSION['id_khachhang'];
  $sql_update_vanchuyen = mysqli_query($mysqli, "UPDATE tbl_shipping SET name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
  if ($sql_update_vanchuyen) {
    echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
  }
}
?>
<?php
$id_dangky = $_SESSION['id_khachhang'];
$sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
$count = mysqli_num_rows($sql_get_vanchuyen);
if ($count > 0) {
  $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
  $name = $row_get_vanchuyen['name'];
  $phone = $row_get_vanchuyen['phone'];
  $address = $row_get_vanchuyen['address'];
  $note = $row_get_vanchuyen['note'];
} else {
  $name = '';
  $phone = '';
  $address = '';
  $note = '';
}
?>
<div class="col-md-12 pl-0 pr-0 pb-0">
  <form class="border form-trans" action="" autocomplete="off" method="POST">
    <div class="form-group">
      <label for="name">Họ và tên</label>
      <input type="text" id="name" name="name" class="form-control" value="<?php echo $name ?>" placeholder="...">
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $phone ?>" placeholder="...">
    </div>
    <div class="form-group">
      <label for="address">Địa chỉ</label>
      <input type="text" id="address" name="address" class="form-control" value="<?php echo $address ?>"
        placeholder="...">
    </div>
    <div class="form-group">
      <label for="note">Ghi chú</label>
      <input type="text" id="note" name="note" class="form-control" value="<?php echo $note ?>" placeholder="...">
    </div>
    <?php
    if ($name == '' && $phone == '') {
      ?>
      <button type="submit" name="themvanchuyen" class="btn btn-primary mt-2">Thêm thông tin</button>
      <?php
    } elseif ($name != '' && $phone != '') {
      ?>
      <button type="submit" name="capnhatvanchuyen" class="btn btn-success mt-2">Thay đổi thông tin</button>
      <?php
    }
    ?>
  </form>
</div>

<div class="row mb-3s">
  <?php include("pages/main/cart_detail.php"); ?>
  <?php include("pages/main/cart_payment.php"); ?>
</div>

<script>
  var tttt = document.querySelector('.link-tttt')
  var vc = document.querySelector('.link-vc')
  if (window.location) {
    vc.style.display = 'none';
  } else {
    tttt.style.display = 'block'
  }
</script>