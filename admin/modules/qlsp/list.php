<?php
$sql_list_sp = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id ORDER BY pdt_id DESC";
$query_list_sp = mysqli_query($mysqli, $sql_list_sp);
?>
<div class="px-4 py-4">
  <h3 class="pb-3">Danh sách </h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Danh mục</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Mã sp</th>
        <th scope="col">Giá sp</th>
        <th scope="col">Sale</th>
        <th scope="col">Giá sale</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Tóm tắt</th>
        <th scope="col">Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_list_sp)) {
        $i++;
        ?>
        <tr>
          <td>
            <?php echo $i ?>
          </td>
          <td>
            <?php echo $row['cate_name'] ?>
          </td>
          <td>
            <?php echo $row['pdt_name'] ?>
          </td>
          <td>
            <?php echo $row['pdt_ma'] ?>
          </td>
          <td>
            <?php echo $row['pdt_price'] ?>
          </td>
          <td>
            <?php echo $row['sale'] ?> %
          </td>
          <td>
            <?php echo $row['pdt_sale'] ?>
          </td>
          <td>
            <?php echo $row['soluong'] ?>
          </td>
          <td><img src="modules/qlsp/uploads/<?php echo $row['pdt_img'] ?>" width="150px"></td>
          <td class="text-start ps-3">
            <?php echo $row['tomtat'] ?>
          </td>
          <td>
            <a href="modules/qlsp/process.php?idsp=<?php echo $row['pdt_id'] ?>"
              onclick="return confirm('Bạn có muốn xoá không');">Xóa</a> |
            <a href="?action=qlsp&query=sua&idsp=<?php echo $row['pdt_id'] ?>">Sửa</a>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</div>