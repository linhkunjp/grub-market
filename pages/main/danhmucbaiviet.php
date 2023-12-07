<?php
$sql_bv = "SELECT * FROM tbl_posts ";
$query_bv = mysqli_query($mysqli, $sql_bv);
//get ten danh muc
$sql_cate = "SELECT * FROM tbl_posts_cate";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<h3 class="pt-3 fw-bold fs-18">
	<?php echo $row_title['posts_cate_name'] ?>
</h3>
<div class="row row-cols-2 row-cols-lg-3 post">
	<?php
	while ($row_bv = mysqli_fetch_array($query_bv)) {
		?>
		<div class="col post_list">
			<a class="post_list-item" href="index.php?quanly=qlbv&id=<?php echo $row_bv['posts_id'] ?>">
				<div class="post_list-img"
					style="background-image: url(admin/modules/qlbv/uploads/<?php echo $row_bv['posts_img'] ?>);">
				</div>
				<h4>
					<?php echo $row_bv['posts_name'] ?>
				</h4>
				<li class="post_list-title">
					<?php echo $row_bv['tomtat'] ?>
				</li>
			</a>
		</div>
		<?php
	}
	?>
</div>