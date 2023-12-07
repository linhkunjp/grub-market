<?php
$sql_sua_bv = "SELECT * FROM tbl_posts WHERE posts_id='$_GET[idbaiviet]' LIMIT 1";
$query_sua_bv = mysqli_query($mysqli, $sql_sua_bv);
?>
<div class="pt-3 px-4">
	<h3 class="p-3">Sửa bài viết</h3>
	<?php
	while ($row = mysqli_fetch_array($query_sua_bv)) {
		?>
		<form class="border p-3 w-50" method="POST"
			action="modules/qlbv/process.php?idbaiviet=<?php echo $row['posts_id'] ?>" enctype="multipart/form-data">
			<div class="form-group">
				<label>Danh mục</label>
				<select name="danhmuc">
					<?php
					$sql_danhmuc = "SELECT * FROM tbl_posts_cate ORDER BY posts_cate_id DESC";
					$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
					while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {

						if ($row_danhmuc['posts_cate_id'] == $row['cate_posts_id']) {
							?>
							<option selected value="<?php echo $row_danhmuc['posts_cate_id'] ?>">
								<?php echo $row_danhmuc['posts_cate_name'] ?>
							</option>
							<?php
						} else {
							?>
							<option value="<?php echo $row_danhmuc['posts_cate_id'] ?>">
								<?php echo $row_danhmuc['posts_cate_name'] ?>
							</option>
							<?php
						}
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Tên bài viết</label>
				<input type="text" value="<?php echo $row['posts_name'] ?>" name="posts_name" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Hình ảnh</label>
				<input type="file" name="posts_img" class="form-control">
			</div>
			<div class="form-group p-3 justify-content-center">
				<img src="modules/qlbv/uploads/<?php echo $row['posts_img'] ?>" width="150px">
			</div>
			<div class="form-group">
				<label for="">Tóm tắt</label>
				<textarea rows="10" name="tomtat" style="resize: none"><?php echo $row['tomtat'] ?></textarea>
			</div>
			<div class="form-group">
				<label for="">Nội dung</label>
				<textarea rows="10" name="noidung_bv" style="resize: none"><?php echo $row['noidung_bv'] ?></textarea>
			</div>
			<div class="pt-2 text-center">
				<input class="p-2" type="submit" name="suabaiviet" value="Sửa bài viết" class="form-control">
			</div>
		</form>
		<?php
	}
	?>
</div>