<div class="fs-18 fw-bold p-3 bg-light">Chi tiết sản phẩm</div>
<?php

if (isset($_SESSION['id_khachhang']) && (isset($_SESSION['dangky']))) {

   $id_khachhang = $_SESSION['id_khachhang'];
   $tenkhachhang = $_SESSION['dangky'];
} else {
   $id_khachhang = 0;
}
// $sql_update = mysqli_query($mysqli, "UPDATE tbl_product SET pdt_view=pdt_view+1 WHERE pdt_id='$_GET[id]'");
// $sql_view = mysqli_query($mysqli, "INSERT INTO tbl_view(id_khachhang,pdt_id) VALUES('$id_khachhang','$_GET[id]')");

$sql_chitiet = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id AND tbl_product.pdt_id='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
   ?>
   <div>
      <div class="product_detail mb-4s">
         <div style="max-width:500px;" class="col-lg-5 py-0 px-3">
            <div class="big-img d-flex align-items-center" style="height: 442px;width: 442px;">
               <img class="mySlides w-100" src="admin/modules/qlsp/uploads/<?php echo $row_chitiet['pdt_img'] ?>">
               <?php
               $sql_img = "SELECT * FROM tbl_images WHERE tbl_images.pdt_id='$_GET[id]'";
               $query_img = mysqli_query($mysqli, $sql_img);
               $img_query = mysqli_fetch_array($query_img);
               foreach ($query_img as $key => $value) {
                  ?>
                  <img class="mySlides w-100 h-100" src="admin/modules/qlsp/uploads/<?php echo $value['img_pdt'] ?>"
                     style="display: none;">
                  <?php
               }
               ?>
            </div>
            <div class="w3-row-padding w3-section">
               <div class="text-center">
                  <img class="demo w3-opacity w3-hover-opacity-off"
                     src="admin/modules/qlsp/uploads/<?php echo $row_chitiet['pdt_img'] ?>"
                     style="max-width: 67px;max-height: 73px;cursor:pointer" onclick="currentDiv(1)">
                  <?php
                  foreach ($query_img as $key => $value) {
                     ?>
                     <img class="demo w3-opacity w3-hover-opacity-off"
                        src="admin/modules/qlsp/uploads/<?php echo $value['img_pdt'] ?>"
                        style="max-width: 67px;max-height: 73px;cursor:pointer" onclick="currentDiv(<?php echo $key + 2 ?>)">
                     <?php
                  }
                  ?>
               </div>
            </div>
         </div>
         <form method="POST" action="pages/main/themgiohang.php?pdt_id=<?php echo $row_chitiet['pdt_id'] ?>">
            <div class="product_detail__list">
               <div>
                  <h1>
                     <?php echo $row_chitiet['pdt_name'] ?>
                  </h1>
               </div>
               <div class="product_detail_detail">
                  <div class="product_detail_left">Mã sp</div>
                  <div>
                     <?php echo $row_chitiet['pdt_ma'] ?>
                  </div>
               </div>
               <?php
                  if($row_chitiet['sale']){
                     ?>
               <div class="product_detail_detail align-items-baseline">
                  <div class="product_detail_left">Giá niêm yết</div>
                  <div class="price_sale">
                     <?php echo number_format($row_chitiet['pdt_price'], 0, ',', '.') ?>&nbsp;₫
                  </div>
               </div>
               <div class="product_detail_detail align-items-baseline">
                  <div class="product_detail_left">Giá khuyến mãi</div>
                  <div class="price-color">
                     <?php echo number_format($row_chitiet['pdt_sale'], 0, ',', '.') ?>&nbsp;₫
                  </div>
               </div>
                           <?php
                  }else{
                     ?>
               <div class="product_detail_detail align-items-baseline">
                  <div class="product_detail_left">Giá </div>
                  <div class="price-color">
                     <?php echo number_format($row_chitiet['pdt_price'], 0, ',', '.') ?>&nbsp;₫
                  </div>
               </div>
                     <?php
                  }
               ?>       
               <div class="product_detail_detail">
                  <div class="product_detail_left">Tồn kho</div>
                     <div>
                        <?php echo $row_chitiet['soluong'] ?>
                     </div>
               </div>
               <div class="product_detail_detail">
                  <div class="product_detail_left">Danh mục</div>
                  <div>
                     <?php echo $row_chitiet['cate_name'] ?>
                  </div>
               </div>
               <div class="product_detail_detail">
                  <div class="product_detail_left">Vận chuyển</div>
                  <div>
                     Miễn phí giao hàng cho đơn từ 300.000&nbsp;₫
                  </div>
               </div>
               <div id="snackbar">
                  <div class="toast-icon"><i class="fas fa-check-circle"></i></div>
                  <div>Sản phẩm đã được thêm vào giỏ hàng</div>
               </div>
               <?php
               if ($row_chitiet['soluong'] > 0) {
                  ?>
                  <div class="pt-5" onclick="myFunction();" style="width: 210px;"><input
                        href="index.php?quanly=qlsp&id=<?php echo $row_chitiet['pdt_id'] ?>" class="themsanpham"
                        name="themgiohang" type="submit" value="THÊM VÀO GIỎ"></div>
                </div>
               <?php
               }else{
                  ?>
                  <div class="pt-5" style="width: 210px;"><input class="themsanpham" style="background: #cecece!important;" name="themgiohang"
                              type="submit" value="THÊM VÀO GIỎ" disabled></div>
                        </div>
                  <?php
               }
               ?>
         </form>
      </div>
      <ul>
         <div class="ul-product d-lex align-items-center pt-3">
            <div class="fs-20 pr-3 mt-2">User rating </div>
            <?php
            $pdt_id = $row_chitiet['pdt_id'];
            // // Fetch the post and rating info from database          
            $query = "SELECT p.*, COUNT(r.rating) as rating_num, FORMAT((SUM(r.rating) / COUNT(r.rating)),1) as average_rating FROM tbl_product as p LEFT JOIN tbl_rating as r ON r.pdt_id = p.pdt_id WHERE p.pdt_id=$pdt_id GROUP BY (r.pdt_id)";

            $query_rating = mysqli_query($mysqli, $query);
            $ratingData = $query_rating->fetch_assoc();

            $averageRating = $ratingData["average_rating"];
            $ratingNum = $ratingData["rating_num"];
            ?>
            <div class="d-flex">
               <?php
               for ($count = 1; $count <= 5; $count++) {
                  if ($count <= 4) {
                     $color = 'color:#ffcc00';
                  } else {
                     $color = 'color:#ccc';
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['dangky'])) {

                     ?>
                     <li class="rating" style="cursor:pointer;font-size:30px;<?php echo $color ?>"
                        id="<?php echo $row_chitiet['pdt_id'] ?>-<?php echo $count ?>"
                        data-pdt_id="<?php echo $row_chitiet['pdt_id'] ?>" data-index="<?php echo $count ?>"
                        data-rating="<?php echo $count ?>" data-tenkhachhang="<?php echo $tenkhachhang ?>"
                        data-id_khachhang="<?php echo $id_khachhang ?>" <?php echo ($averageRating >= $count) ? 'checked="checked"' : ''; ?> ?>
                        &#9733;</li>
                     <?php
                  } else {
                     ?>
                     <li class="rating_login" style="cursor:pointer;font-size:30px;color:#ccc">
                        &#9733;</li>
                     <?php
                  }
                  ?>
                  <?php
               }
               ?>
            </div>
         </div>

         <div class="text-muted fs-16 pb-3">
            (Average <span id="avgrat">
               <?php echo $averageRating; ?>
            </span>
            Based on <span id="totalrat">
               <?php echo $ratingNum; ?>
            </span> Rating)</span>
         </div>
      </ul>
   </div>
   <div class="clear"></div>
   <div class="chitiet-sanpham">
      <div class="mota">
         <div class="fs-18 fw-bold p-3 bg-light">Mô tả</div>
         <div class="mota-sp" style="white-space: pre-line;">
            <?php echo $row_chitiet['noidung'] ?>
         </div>
      </div>
      <div class="thongtin">
         <div class="fs-18 fw-bold p-3 bg-light">Thông tin</div>
         <div class="thongtin-sp">
            <?php echo $row_chitiet['tomtat'] ?>
         </div>
      </div>
   </div>
   </div>
   <div class="container pb-5 mb-0 pdt-recommend">
      <?php
      if (isset($_SESSION['dangky'])) {
         ?>
         <div class="fs-18 fw-bold p-3 bg-light">Gợi ý cho bạn</div>
         <div class="cccc row row-cols-2 row-cols-lg-5 gy-2 gx-3 gx-lg-2">
            <?php
            include("pages/similar_product/index.php")
               ?>
         </div>
         <?php
      } else {
         ?>
         <?php
      }
      ?>
   </div>

   <?php
}
?>
