<?php
if (isset($_GET['trang'])) {
   $page = $_GET['trang'];
} else {
   $page = 1;
}
if ($page == '' || $page == 1) {
   $begin = 0;
} else {
   $begin = ($page * 20) - 20;
}

if (isset($_POST['desc'])) {
   $sql_pro = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id ORDER BY tbl_product.pdt_price DESC LIMIT $begin,20";

} else if (isset($_POST['asc'])) {
   $sql_pro = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id ORDER BY tbl_product.pdt_price ASC LIMIT $begin,20";

} else {
   $sql_pro = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id ORDER BY tbl_product.pdt_id DESC LIMIT $begin,20";
}
$query_pro = mysqli_query($mysqli, $sql_pro);

?>

<div class="fs-18 p-3 fw-bold d-flex justify-content-between">
   <div>Tất cả sản phẩm</div>
   <form action="index.php?quanly=tatcasanpham" method="post">
      <div class="dropdown-price">
         <div class="fs-18">Lọc theo giá</div>
         <div class="dropdown-content">
            <input type="submit" name="desc" class="form-control border-0 shadow-none" value="Cao đến thấp"
               placeholder="...">
            <input type="submit" name="asc" class="form-control border-0 shadow-none" value="Thấp đến cao"
               placeholder="...">
         </div>
      </div>
   </form>
</div>
<div class="pt-3">
   <div class="row row-cols-2 row-cols-lg-5 gy-2 gx-3 gx-lg-2">
      <?php
      while ($row = mysqli_fetch_array($query_pro)) {
         ?>
         <?php include("pages/main/product_list.php"); ?>
         <?php
      }
      ?>
   </div>
</div>

<div style="clear:both;"></div>
<div class="pagination-pdt">
   <?php
   $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_product");
   $row_count = mysqli_num_rows($sql_trang);
   $trang = ceil($row_count / 20);

   ?>
   <p>Trang hiện tại :
      <?php echo $page ?>/
      <?php echo $trang ?>
   </p>
   <div class="list_trang">
      <?php
      if ($page > 2) {
         $first_page = 1;
         ?>
         <li><a href="index.php?quanly=tatcasanpham&trang=<?php echo $first_page ?>">First</a></li>
         <?php
      }
      ?>
      <?php
      $current_page = $page - 3;
      $last_page = $page + 3;
      if ($current_page < 1) {
         $current_page = 1;
      }
      if ($last_page > $trang) {
         $last_page = $trang;
      }
      ;
      for ($i = $current_page; $i <= $last_page; $i++) {
         ?>
         <li <?php if ($i == $page) {
            echo 'style="background: black;"';
         } else {
            echo '';
         }
         ?>>
            <a href="index.php?quanly=tatcasanpham&trang=<?php echo $i ?>">
               <?php echo $i ?>
            </a>
         </li>
         <?php
      }
      ?>
      <?php
      if ($page < $trang - 1) {
         $end_page = $trang;
         ?>
         <li><a href="index.php?quanly=tatcasanpham&trang=<?php echo $end_page ?>">Last</a></li>
         <?php
      }
      ?>
   </div>
</div>