<?php
// include('../../config/config.php');

$sql_list_dmsp = "SELECT * FROM tbl_category ORDER BY stt DESC";
$query_list_dmsp = mysqli_query($mysqli, $sql_list_dmsp);
?>
<div class="px-4 py-4">
  <h3 class="pb-3">Danh sách </h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Thứ tự</th>
        <th scope="col">Tên danh mục</th>
        <th scope="col">Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_list_dmsp)) {
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
            <a href="modules/qldm/process.php?iddm=<?php echo $row['cate_id'] ?>"
              onclick="return confirm('Bạn có muốn xoá không');">Xóa</a> |
            <a href="?action=qldm&query=sua&iddm=<?php echo $row['cate_id'] ?>">Sửa</a>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</div>