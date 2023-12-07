<?php
$sql_sua_sp = "SELECT * FROM tbl_product WHERE pdt_id='$_GET[idsp]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);

// lấy ra ảnh mô tả
$img_pro = mysqli_query($mysqli, "SELECT * FROM tbl_images WHERE pdt_id='$_GET[idsp]'");
?>
<div class="pt-3 px-4">
  <h3 class="p-3">Sửa sản phẩm</h3>
  <?php
  while ($row = mysqli_fetch_array($query_sua_sp)) {
    ?>
    <form class="border p-3 w-50" method="POST" action="modules/qlsp/process.php?idsp=<?php echo $row['pdt_id'] ?>"
      enctype="multipart/form-data">
      <div class="form-group">
        <label>Danh mục</label>
        <select name="danhmuc">
          <?php
          $sql_danhmuc = "SELECT * FROM tbl_category ORDER BY cate_id DESC";
          $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
          while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
            if ($row_danhmuc['cate_id'] == $row['cate_id']) {
              ?>
              <option selected value="<?php echo $row_danhmuc['cate_id'] ?>">
                <?php echo $row_danhmuc['cate_name'] ?>
              </option>
              <?php
            } else {
              ?>
              <option value="<?php echo $row_danhmuc['cate_id'] ?>">
                <?php echo $row_danhmuc['cate_name'] ?>
              </option>
              <?php
            }
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" value="<?php echo $row['pdt_name'] ?>" name="pdt_name" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Mã sp</label>
        <input type="text" value="<?php echo $row['pdt_ma'] ?>" name="pdt_ma" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Giá sp</label>
        <input type="number" value="<?php echo $row['pdt_price'] ?>" name="pdt_price" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Sale</label>
        <input type="number" value="<?php echo $row['sale'] ?>" name="sale" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Số lượng</label>
        <input type="number" value="<?php echo $row['soluong'] ?>" name="soluong" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" name="pdt_img" class="form-control">
      </div>
      <div class="form-group justify-content-center p-3">
        <img src="modules/qlsp/uploads/<?php echo $row['pdt_img'] ?>" width="150px">
      </div>
      <div class="form-group">
        <label for="">Ảnh mô tả</label>
        <input type="file" name="pdt_imgs[]" class="form-control" multiple="multiple">
      </div>
      <div class="form-group justify-content-center p-3">
        <?php foreach ($img_pro as $key => $value) { ?>
          <img class="px-2" src="modules/qlsp/uploads/<?php echo $value['img_pdt'] ?>" width="200px">
        <?php } ?>
      </div>
      <div class="form-group">
        <label for="">Tóm tắt</label>
        <textarea rows="10" name="tomtat" style="resize: none"><?php echo $row['tomtat'] ?></textarea>
      </div>
      <div class="form-group">
        <label for="">Nội dung</label>
        <textarea rows="10" cols="70" name="noidung" style="resize: none"><?php echo $row['noidung'] ?></textarea>
      </div>
      <div class="pt-2 text-center">
        <input class="p-2" type="submit" name="suasanpham" value="Sửa">
      </div>
    </form>
    <?php
  }
  ?>
</div>