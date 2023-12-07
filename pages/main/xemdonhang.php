<div style="padding-bottom: 130px;">
    <h4 class="pb-3">Xem đơn hàng</h4>
    <?php
    $code = $_GET['code'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_product WHERE tbl_cart_details.pdt_id=tbl_product.pdt_id AND tbl_cart_details.code_cart='" . $code . "' ORDER BY tbl_cart_details.cart_details_id DESC";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
    ?>
    <div style="min-height: 143px;">
        <table class="table-product" border="1">
            <tr>
                <th>Tên sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
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
                        <?php echo $row['pdt_name'] ?>
                    </td>
                    <td>
                        <?php echo $row['pdt_ma'] ?>
                    </td>
                    <td>
                        <?php echo number_format($row['pdt_price'], 0, ',', '.') . 'vnđ' ?>
                    </td>
                    <td>
                        <?php echo $row['soluongmua'] ?>
                    </td>
                    <td>
                        <?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="4">Tổng tiền</td>
                <td>
                    <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?>
                </td>
            </tr>
        </table>
    </div>
</div>