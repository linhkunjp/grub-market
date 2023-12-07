<?php
if (isset($_POST['doimatkhau'])) {
	$taikhoan = $_POST['email'];
	$matkhau_cu = md5($_POST['password_cu']);
	$matkhau_moi = md5($_POST['password_moi']);
	$sql = "SELECT * FROM tbl_dangky WHERE email='" . $taikhoan . "' AND matkhau='" . $matkhau_cu . "' LIMIT 1";
	$row = mysqli_query($mysqli, $sql);
	$count = mysqli_num_rows($row);
	if ($count > 0) {
		$sql_update = mysqli_query($mysqli, "UPDATE tbl_dangky SET matkhau='" . $matkhau_moi . "'");
		echo '<div id="snackbar">
                     <div class="toast-icon"><i class="fas fa-check-circle"></i></div>
                     <div>Mật khẩu đã được thay đổi</div>
                  </div>';
	} else {
		echo '     
        <div id="snackbar">
            <div class="toast-icon-danger"><i class="fas fa-times-circle"></i></i></div>
            <div>Tài khoản hoặc mật khẩu không đúng!</div>
        </div>';
	}
}
?>
<div class="mask d-flex align-items-center h-100 gradient-custom-3">
	<div class="container-dangky h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-12 col-md-9 col-lg-7 ">
				<div class="card" style="border-radius: 15px;">
					<div class="card-body p-5">
						<h2 class="text-uppercase text-center mb-5">Change password</h2>
						<form action="" autocomplete="off" method="POST">
							<div class="form-outline mb-4">
								<label><b>Your Email</b></label>
								<input type="text" class="form-control form-control-lg" name="email">
							</div>

							<div class="form-outline mb-4">
								<label><b>Password</b></label>
								<input type="text" class="form-control form-control-lg" name="password_cu">
							</div>
							<div class="form-outline mb-4">
								<label><b>New Password</b></label>
								<input type="text" class="form-control form-control-lg" name="password_moi">
							</div>
							<div onclick="myFunction();" class="d-flex justify-content-center">

								<input class=" input-dangky btn btn-block btn-lg gradient-custom-4" type="submit"
									name="doimatkhau" value="Đổi mật khẩu">

							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>