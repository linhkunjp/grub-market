<?php
if (isset($_POST['dangky'])) {
	$tenkhachhang = $_POST['hovaten'];
	$email = $_POST['email'];
	$dienthoai = $_POST['dienthoai'];
	$matkhau = md5($_POST['matkhau']);
	$diachi = $_POST['diachi'];
	$sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')");
	if ($sql_dangky) {
		echo '<div id="snackbar">
                     <div class="toast-icon"><i class="fas fa-check-circle"></i></div>
                     <div>Đăng kí tài khoản thành công</div>
                  </div>';
		$_SESSION['dangky'] = $tenkhachhang;
		$_SESSION['email'] = $email;
		$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
		echo '<script>window.location="index.php"</script>';
	}
}
?>

<div class="mask d-flex align-items-center h-100 gradient-custom-3">
	<div class="container-dangky h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-12 col-md-9 col-lg-7 ">
				<div class="card" style="border-radius: 15px;">
					<div class="card-body p-5">
						<h2 class="text-uppercase text-center mb-5">Create an account</h2>
						<form action="" method="POST">
							<div class="form-outline mb-4">
								<label for="hovaten"><b>Your Name</b></label>
								<input type="text" class="form-control form-control-lg" name="hovaten" id="hovaten">

							</div>

							<div class="form-outline mb-4">
								<label for="email"><b>Your Email</b></label>
								<input type="text" class="form-control form-control-lg" name="email" id="email"
									required>
							</div>

							<div class="form-outline mb-4">
								<label for="dienthoai"><b>Phone</b></label>

								<input type="text" class="form-control form-control-lg" name="dienthoai" id="dienthoai">
							</div>

							<div class="form-outline mb-4">
								<label for="diachi"><b>Address</b></label>

								<input type="text" class="form-control form-control-lg" name="diachi" id="diachi">
							</div>

							<div class="form-outline mb-4">
								<label for="matkhau"><b>Password</b></label>
								<input type="text" class="form-control form-control-lg" name="matkhau" id="matkhau"
									required>

							</div>

							<div onclick="myFunction();" class="d-flex justify-content-center">

								<input class="input-dangky btn btn-block btn-lg gradient-custom-4" type="submit"
									name="dangky" value="Register">

							</div>

							<p class="text-center text-muted mt-5 mb-0">Have already an account? <a
									href="index.php?quanly=dangnhap" class="fw-bold text-body"><u>Login here</u></a>
							</p>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>