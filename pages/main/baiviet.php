<?php
$sql_bv = "SELECT * FROM tbl_posts WHERE tbl_posts.posts_id='$_GET[id]' LIMIT 1";
$query_bv = mysqli_query($mysqli, $sql_bv);
$query_bv_all = mysqli_query($mysqli, $sql_bv);

$row_bv_title = mysqli_fetch_array($query_bv);
?>

<div class="post-tittle">
	<h2>
		<?php echo $row_bv_title['posts_name'] ?>
	</h2>
</div>

<div class="row justify-content-center">
	<?php
	while ($row_bv = mysqli_fetch_array($query_bv_all)) {
		?>
		<div class="col-12 col-lg-8">
			<div class="post-content">

				<p class="title_product">
					<?php echo $row_bv['noidung_bv'] ?>
				</p>
			</div>
		</div>
		<?php
	}
	?>
</div>