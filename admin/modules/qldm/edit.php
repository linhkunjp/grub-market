<?php
$sql_sua_dmsp = "SELECT * FROM tbl_category WHERE cate_id='$_GET[iddm]' LIMIT 1";
$query_sua_dmsp = mysqli_query($mysqli, $sql_sua_dmsp);
?>
<div class="pt-3 px-4">
  <h3 class="p-3">Sửa danh mục sản phẩm</h3>
  <form class="border p-3 w-50" method="POST" action="modules/qldm/process.php?iddm=<?php echo $_GET['iddm'] ?>">
    <?php
    while ($dong = mysqli_fetch_array($query_sua_dmsp)) {
      ?>
      <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" value="<?php echo $dong['cate_name'] ?>" name="cate_name" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Stt</label>
        <input type="text" value="<?php echo $dong['stt'] ?>" name="stt" class="form-control">
      </div>
      <div class="pt-2 text-center">
        <input class="p-2" type="submit" name="suadanhmuc" value="Sửa" class="form-control">
      </div>
      <?php
    }
    ?>
  </form>
</div>