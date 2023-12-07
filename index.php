<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" type="text/css" href="css1/style.css">

  <link rel="stylesheet" type="text/css"
    href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/slideshow.css">
  <link rel="stylesheet" href="css/sanpham.css">
  <link rel="stylesheet" href="css/dangky.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/table.css">
  <link rel="stylesheet" href="css/danhmucbv.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/setting-menu.css">
  <link rel="stylesheet" href="css/giohang.css">
  <link rel="stylesheet" href="css/vanchuyen.css">

  <title>Grub Market</title>
</head>

<body>
  <div class="body-wrapper">
    <?php
    session_start();
    include "admin/config/config.php";
    ?>
    <div class="sticky-wrapper">
      <?php
      include "pages/header.php";
      include "pages/menu.php";
      ?>
    </div>
    <div class="content">
      <?php include "pages/main.php"; ?>
    </div>
    <div class="footer">
      <?php include "pages/footer.php"; ?>
    </div>
  </div>
  <div>
    <?php include "pages/recommendation.php"; ?>
  </div>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
  function remove_background(pdt_id) {
    for (var count = 1; count <= 5; count++) {
      $('#' + pdt_id + '-' + count).css('color', '#ccc');
    }
  }
  // hover chuột đánh giá sao
  $(document).on('mouseenter', '.rating', function () {
    var index = $(this).data("index");
    var pdt_id = $(this).data('pdt_id');

    remove_background(pdt_id);
    for (var count = 1; count <= index; count++) {
      $('#' + pdt_id + '-' + count).css('color', '#ffcc00');
    }

  });
  // nhả chuột ko đánh giá
  $(document).on('mouseleave', '.rating', function () {
    var index = $(this).data("index");
    var pdt_id = $(this).data('pdt_id');
    var rating = $(this).data("rating");

    remove_background(pdt_id);
    for (var count = 1; count <= rating; count++) {
      $('#' + pdt_id + '-' + count).css('color', '#ffcc00');
    }

  });
</script>
<script>
  // click chuột đánh giá
  $('.rating').click(function () {
    var index = $(this).data("index");
    var pdt_id = $(this).data('pdt_id');
    var id_khachhang = $(this).data('id_khachhang');
    var tenkhachhang = $(this).data('tenkhachhang');
    $.ajax(
      {
        url: 'admin/ajax/rating.php',
        data: { index: index, pdt_id: pdt_id, id_khachhang: id_khachhang, tenkhachhang: tenkhachhang },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
          if (data.status == 1) {
            $('#avgrat').data(data.trungbinhsao);
            $('#totalrat').data(data.solan);
            alert('Đánh giá ' + index + ' sao thành công');
          } else if (data.status == 2) {
            alert('Bạn đã đánh giá sản phẩm này rồi')
          }
          $(".rating").each(function () {
            if (index <= parseInt(data.trungbinhsao)) {
              $(this).attr('checked', 'checked');
            } else {
              $(this).prop("checked", false);
            }
          });
        }
      }
    )
  })
  $('.rating_login').click(function () {
    alert('Đăng nhập để đánh giá');
  })
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $('.select-price').change(function () {
      var id = $(this).val();
      $(".pdt-simi").hide()
      $("#" + id).fadeIn();
    }).change();
  })
</script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</html>