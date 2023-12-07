<div class="pt-3 px-4">
  <h3 class="p-3">Thêm sản phẩm</h3>
  <form class="border p-3 w-50" autocomplete="off" method="POST" action="modules/qlsp/process.php"
    enctype="multipart/form-data">
    <div class="form-group">
      <label>Danh mục</label>
      <select name="danhmuc">
        <?php
        $sql_danhmuc = "SELECT * FROM tbl_category ORDER BY cate_id DESC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
          ?>
          <option value="<?php echo $row_danhmuc['cate_id'] ?>">
            <?php echo $row_danhmuc['cate_name'] ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="">Tên sản phẩm</label>
      <input type="text" name="pdt_name" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Mã sp</label>
      <input type="text" name="pdt_ma" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Giá sp</label>
      <input type="number" name="pdt_price" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Sale</label>
      <input type="number" name="sale" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Số lượng</label>
      <input type="number" name="soluong" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Ảnh</label>
      <input type="file" name="pdt_img" class="form-control">
    </div>
    <!-- <input type="text" name="qrcode" class="form-control"> -->
    <div class="form-group">
      <label for="">Ảnh mô tả</label>
      <input type="file" name="pdt_imgs[]" class="form-control" multiple="multiple">
    </div>
    <div class="form-group">
      <label for="">Tóm tắt</label>
      <textarea rows="10" name="tomtat" style="resize: none"></textarea>
    </div>
    <div class="form-group">
      <label for="">Nội dung</label>
      <textarea rows="10" cols="70" name="noidung" style="resize: none"></textarea>
    </div>
    <div class="pt-2 text-center">
      <input class="p-2" type="submit" name="themsanpham" value="Thêm sản phẩm">
    </div>
  </form>
</div>