<?php
$sql_list_bv = "SELECT * FROM tbl_posts,tbl_posts_cate WHERE tbl_posts.cate_posts_id=tbl_posts_cate.posts_cate_id ORDER BY tbl_posts.posts_id DESC";
$query_list_bv = mysqli_query($mysqli, $sql_list_bv);
?>
<div class="px-4 py-4">
  <h3 class="pb-3">Liệt kê danh mục bài viết</h3>
  <table class="table">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Tên bài viết</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Tóm tắt</th>
      <th scope="col">Quản lý</th>

    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_list_bv)) {
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
          <?php echo $row['posts_name'] ?>
        </td>
        <td><img src="modules/qlbv/uploads/<?php echo $row['posts_img'] ?>" width="150px"></td>
        <td class="text-start ps-3">
          <?php echo $row['tomtat'] ?>
        </td>
        <td>
          <a href="modules/qlbv/process.php?idbaiviet=<?php echo $row['posts_id'] ?>"
            onclick="return confirm('Bạn có muốn xoá không');">Xoá</a> | <a
            href="?action=qlbv&query=sua&idbaiviet=<?php echo $row['posts_id'] ?>">Sửa</a>
        </td>

      </tr>
      <?php
    }
    ?>
  </table>
</div>