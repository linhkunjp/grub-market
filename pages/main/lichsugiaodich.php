<div style="padding-bottom: 130px;">
    <h4 class="pb-3">Lịch sử giao dịch</h4>
    <?php
    $id_khachhang = $_SESSION['id_khachhang'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_cart.id_khachhang='$id_khachhang' ORDER BY tbl_cart.cart_id DESC";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
    ?>
    <div style="min-height: 143px;">
        <table class="table-product" border="1">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Tình trạng</th>
                <th>Hình thức thanh toán</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_dh)) {
                $i++;
                ?>
                <tr>
                    <td class="price-color ">
                        <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">
                            <?php echo $row['code_cart'] ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $row['cart_date'] ?>
                    </td>
                    <td>
                        <?php if ($row['cart_status'] == 1) {
                            echo 'Đang chờ xử lý';
                        } else {
                            echo 'Đã xử lý';
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $row['cart_payment'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>
    </div>
</div>