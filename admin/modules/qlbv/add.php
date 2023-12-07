<div class="pt-3 px-4">
	<h3 class="p-3">Thêm bài viết</h3>
	<form class="border p-3 w-50" method="POST" action="modules/qlbv/process.php" enctype="multipart/form-data">
		<div class="form-group">
			<label>Danh mục bài viết</label>
			<select name="danhmuc">
				<?php
				$sql_danhmuc = "SELECT * FROM tbl_posts_cate ORDER BY posts_cate_id DESC";
				$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
				while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
					?>
					<option value="<?php echo $row_danhmuc['posts_cate_id'] ?>">
						<?php echo $row_danhmuc['posts_cate_name'] ?>
					</option>
					<?php
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="">Tên bài viết</label>
			<input type="text" name="posts_name" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Hình ảnh</label>
			<input type="file" name="posts_img" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Tóm tắt</label>
			<textarea rows="10" name="tomtat" style="resize: none"></textarea>
		</div>
		<div class="form-group">
			<label for="">Nội dung</label>
			<textarea rows="10" name="noidung_bv" style="resize: none"></textarea>
		</div>
		<div class="pt-2 text-center">
			<input class="p-2" type="submit" name="thembaiviet" value="Thêm bài viết">
		</div>
	</form>
</div>