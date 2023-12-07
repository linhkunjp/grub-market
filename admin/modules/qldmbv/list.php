<?php
$sql_list_danhmucbv = "SELECT * FROM tbl_posts_cate ORDER BY stt DESC";
$query_list_danhmucbv = mysqli_query($mysqli, $sql_list_danhmucbv);
?>
<div class="px-4 py-4">
  <h3 class="pb-3">Liệt kê danh mục bài viết</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Tên danh mục</th>
        <th scope="col">Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_list_danhmucbv)) {
        $i++;
        ?>
        <tr>
          <td>
            <?php echo $i ?>
          </td>
          <td>
            <?php echo $row['posts_cate_name'] ?>
          </td>
          <td>
            <a href="modules/qldmbv/process.php?idbaiviet=<?php echo $row['posts_cate_id'] ?>"
              onclick="return confirm('Bạn có muốn xoá không');"> Xóa</a> |
            <a href="?action=qldmbv&query=sua&idbaiviet=<?php echo $row['posts_cate_id'] ?>"> Sửa</a>
          </td>

        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</div>