<?php
$sql_danhmuc = "SELECT * FROM tbl_category ORDER BY cate_id DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
   unset($_SESSION['dangky']);
}
?>
<div style="border-bottom: 2px solid #da291c;">
   <nav class="navbar navbar-expand-lg navbar-dark bg-white content w-100">
      <div class="logo-mobile">
         <a href="index.php" style="background-image: url(images/grubmarket.png);">
         </a>
      </div>
      <button class="navbar-toggler bg-secondary" type="button" data-toggle="collapse"
         data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
         aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <div class="navbar-nav mr-auto ul-menu justify-content-between w-100">
            <div class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                  data-toggle="dropdown" aria-expanded="false">
                  Danh mục sản phẩm
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php
                  while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                     ?>
                     <a class="dropdown-item" href="index.php?quanly=qldm&id=<?php echo $row_danhmuc['cate_id'] ?>">
                        <?php echo $row_danhmuc['cate_name'] ?>
                     </a>
                     <?php
                  }
                  ?>
               </div>
            </div>
            <div class="d-flex item-nav">
               <div class="nav-item">
                  <a class="nav-link text-dark" href="index.php?quanly=tatcasanpham">Tất cả sản phẩm</a>
               </div>
               <div class="nav-item "><a class="nav-link text-dark" href="index.php?quanly=qldmbv">Bài viết</a>
               </div>
            </div>
            </ul>
         </div>
   </nav>
</div>