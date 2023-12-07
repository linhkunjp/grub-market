<?php
$code = $_GET['code'];
$sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_product WHERE tbl_cart_details.pdt_id=tbl_product.pdt_id AND tbl_cart_details.code_cart='" . $code . "' ORDER BY tbl_cart_details.cart_details_id DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<div class="px-4 py-4">
  <h3 class="pb-3">Xem đơn hàng</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Đơn giá</th>
        <th scope="col">Thành tiền</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      $tongtien = 0;
      while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
        $thanhtien = $row['pdt_price'] * $row['soluongmua'];
        $tongtien += $thanhtien;
        ?>
        <tr>
          <td>
            <?php echo $i ?>
          </td>
          <td>
            <?php echo $row['code_cart'] ?>
          </td>
          <td>
            <?php echo $row['pdt_name'] ?>
          </td>
          <td>
            <?php echo $row['soluongmua'] ?>
          </td>
          <td>
            <?php echo number_format($row['pdt_price'], 0, ',', '.') . 'vnđ' ?>
          </td>
          <td>
            <?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?>
          </td>
        </tr>
        <?php
      }
      ?>
      <tr>
        <td colspan="6">
          <p>Tổng tiền :
            <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?>
          </p>
        </td>
      </tr>
    </tbody>
  </table>
</div>