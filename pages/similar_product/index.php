<?php
include("process.php");

if(isset($_SESSION['id_khachhang']) && (isset($_SESSION['dangky']))) {

  $id_khachhang = $_SESSION['id_khachhang'];
  $tenkhachhang = $_SESSION['dangky'];
}

?>
<?php

$query = "SELECT * FROM tbl_product,tbl_rating WHERE tbl_product.pdt_id=tbl_rating.pdt_id ORDER BY id ";
$result = mysqli_query($mysqli, $query);
?>

<?php
$matrix = array();

while($row_simi = mysqli_fetch_array($result)) {

  $matrix[$row_simi['tenkhachhang']][$row_simi['pdt_name']] = $row_simi['rating'];

}

$query1 = "SELECT tenkhachhang FROM tbl_rating WHERE tbl_rating.id_khachhang='$id_khachhang'";
$result1 = mysqli_query($mysqli, $query1);
$tenkhachhang = mysqli_fetch_array($result1);

?>
<?php
$recommendation = array();
if(!empty($matrix) && !empty($tenkhachhang['tenkhachhang'])) {

  $recommendation = getRecommendation_product($matrix, $tenkhachhang['tenkhachhang']);
}

foreach($recommendation as $row_simi => $rating) {
  ?>
  <?php

  $sql_pro = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id AND tbl_product.pdt_name LIKE '%".$row_simi."%'";
  $query_pro = mysqli_query($mysqli, $sql_pro);
  $num = mysqli_num_rows($query_pro);

  while($row = mysqli_fetch_array($query_pro)) {
    ?>
    <div class="position-relative">
      <?php include("pages/main/product_list.php"); ?>
      <?php

      $pdt_name = $row['pdt_name'];
      $sochu = explode(" ", $pdt_name);
      $name_search = $sochu[0].' '.$sochu[1];

      $query_simi = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.cate_id=tbl_category.cate_id AND pdt_name LIKE '".$name_search."%'";

      $result_simi = mysqli_query($mysqli, $query_simi);
      $num_simi = mysqli_num_rows($result_simi);
      ?>
      <select class="form-select select-price shadow-none">
        <option>Chọn mức giá</option>
        <?php
        if($num_simi > 0) {
          while($result_pdt = mysqli_fetch_array($result_simi)) {
            ?>
            <?php
            if($result_pdt) {
              ?>
              <option value="<?php echo $result_pdt['pdt_id'] ?>">
                <?php echo $result_pdt['pdt_price'] ?>
              </option>
              <?php
            }
            ?>
            <?php
          }
        }
        ?>
      </select>
      <?php
      $query_pro = mysqli_query($mysqli, $query_simi);

      while($row = mysqli_fetch_array($query_pro)) {
        ?>
        <div class="pdt-simi" id="<?php echo $row['pdt_id'] ?>">
          <div class="product_list__list shadow-none">
            <?php include("pages/main/product_item.php"); ?>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
    <?php
  }
?>
<?php
}
?>