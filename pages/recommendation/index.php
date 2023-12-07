<?php
include("similar_recommendation.php");
include("recommendation.php");

if (isset($_SESSION['id_khachhang']) && (isset($_SESSION['dangky']))) {

  $id_khachhang = $_SESSION['id_khachhang'];
  $tenkhachhang = $_SESSION['dangky'];
}

$query = "SELECT * FROM tbl_product,tbl_rating WHERE tbl_product.pdt_id=tbl_rating.pdt_id AND tbl_rating.id_khachhang='$id_khachhang'";

$result = mysqli_query($mysqli, $query);
?>
<div style="display: flex;padding:30px 20px;">
  <div style="width:100% ;">
    <p>DS sản phẩm người dùng
      <?php echo '<span style="color:red">' . $tenkhachhang . '</span>' ?>

      đã đánh giá
    </p>
    <table class='recommendation-list'>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Rating đã đánh giá</th>
      </tr>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($result)) {
        $i++;
        ?>
        <tr>
          <td>
            <?php echo $row['pdt_name'] ?>
          </td>
          <td>
            <?php echo $row['rating'] ?>
          </td>
        </tr>
        <?php
      }
      ?>
    </table>
  </div>
  <div style="width:100% ;">
    <?php

    $query = "SELECT * FROM tbl_product,tbl_rating WHERE tbl_product.pdt_id=tbl_rating.pdt_id ORDER BY id ASC";
    $result = mysqli_query($mysqli, $query);
    ?>

    <p>DS người dùng tương tự</p>

    <?php
    $matrix = array();
    while ($row = mysqli_fetch_array($result)) {

      $matrix[$row['tenkhachhang']][$row['pdt_name']] = $row['rating'];

    }
    getRecommendation($matrix, $tenkhachhang);

    ?>
  </div>
  <div style="width:100% ;">
    <?php

    $query = "SELECT * FROM tbl_product,tbl_rating WHERE tbl_product.pdt_id=tbl_rating.pdt_id ORDER BY id ";
    $result = mysqli_query($mysqli, $query);
    ?>

    <p>DS sản phẩm gợi ý</p>
    <table class='recommendation-list'>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Rating dự đoán</th>
      </tr>
      <?php
      $matrix = array();
      while ($row = mysqli_fetch_array($result)) {

        $matrix[$row['tenkhachhang']][$row['pdt_name']] = $row['rating'];

      }

      $query = "SELECT tenkhachhang FROM tbl_rating WHERE tbl_rating.id_khachhang='$id_khachhang'";
      $result = mysqli_query($mysqli, $query);
      $tenkhachhang = mysqli_fetch_array($result);

      ?>
      <?php
      $recommendation = array();
      $recommendation = getRecommendationn($matrix, $tenkhachhang['tenkhachhang']);

      foreach ($recommendation as $row => $rating) {
        ?>
        <tr>
          <td>
            <?php echo $row; ?>
          </td>
          <td>
            <?php echo $rating; ?>

          </td>
        </tr>
        <?php
      }
      ?>
    </table>
  </div>
</div>

<script>
  var wrapper = document.querySelector('.body-wrapper')
  if (window.location) {
    wrapper.style.display = 'none';
  } else {
    content.style.display = 'block'
  }
</script>