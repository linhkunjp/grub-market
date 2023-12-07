<?php
$sql_sua_danhmucbv = "SELECT * FROM tbl_posts_cate WHERE posts_cate_id='$_GET[idbaiviet]' LIMIT 1";
$query_sua_danhmucbv = mysqli_query($mysqli, $sql_sua_danhmucbv);
?>
<div class="pt-3 px-4">
	<h3 class="p-3">Sửa danh mục bài viết</h3>
	<form class="border p-3 w-50" method="POST"
		action="modules/qldmbv/process.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>">
		<?php
		while ($dong = mysqli_fetch_array($query_sua_danhmucbv)) {
			?>
			<div class="form-group">
				<label for="">Tên danh mục</label>
				<input type="text" value="<?php echo $dong['posts_cate_name'] ?>" name="posts_cate_name"
					class="form-control">
			</div>
			<div class="form-group">
				<label for="">Stt</label>
				<input type="text" value="<?php echo $dong['stt'] ?>" name="stt" class="form-control">
			</div>
			<div class="pt-2 text-center">
				<input class="p-2" type="submit" name="suadanhmucbaiviet" value="Sửa danh mục bài viết">
			</div>
			<?php
		}
		?>
	</form>
</div>