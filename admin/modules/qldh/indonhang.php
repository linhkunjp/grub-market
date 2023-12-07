<?php
session_start();
require('../../config/config.php');

?>
<link rel="stylesheet" href="../../css/style_print.css">

<body onload="window.print();">
  <div id="page" class="page">
    <div class="title">
      HÓA ĐƠN THANH TOÁN
      <br />
      -------oOo-------
    </div>
    <br />
    <br />
    <table class="TableData">
      <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
      </tr>
      <?php

      if (isset($_GET['code'])) {
        $code = $_GET['code'];
        $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_product WHERE tbl_cart_details.pdt_id=tbl_product.pdt_id AND tbl_cart_details.code_cart='" . $code . "' ORDER BY tbl_cart_details.cart_details_id DESC";
        $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);


        $i = 0;
        $tongtien = 0;
        while ($row = mysqli_fetch_array($query_lietke_dh)) {
          $i++;
          $tongtien += $row['pdt_price'] * $row['soluongmua'];
          echo "<tr>";
          echo "<td class=\"Id\">" . $i . "</td>";
          echo "<td class=\"code_cart\">" . $row['code_cart'] . "</td>";
          echo "<td class=\"pdt_name\">" . $row['pdt_name'] . "</td>";
          echo "<td class=\"soluongmua\" align='center'>" . $row['soluongmua'] . "</td>";
          echo "<td class=\"pdt_price\">" . number_format($row['pdt_price'], 0, ",", ".") . "</td>";
          echo "<td class=\"thanhtien\">" . number_format(($row['soluongmua'] * $row['pdt_price']), 0, ",", ".") . "</td>";
          echo "</tr>";
        }
      }
      ?>
      <tr>
        <td colspan="5" class="tong">Tổng cộng</td>
        <td class="cotSo">
          <?php echo number_format(($tongtien), 0, ",", ".") ?>
        </td>
      </tr>
    </table>
  </div>
</body>