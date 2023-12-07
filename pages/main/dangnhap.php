<?php

if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_dangky WHERE email='" . $email . "' AND matkhau='" . $matkhau . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);

    if ($count > 0) {
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        $_SESSION['email'] = $row_data['email'];
        $_SESSION['id_khachhang'] = $row_data['id_dangky'];
        // header('Location:index.php?quanly=giohang');
        echo '<script>window.location="index.php"</script>';
    } else {
        echo '     
        <div id="snackbar">
            <div class="toast-icon-danger"><i class="fas fa-times-circle"></i></i></div>
            <div>Đăng nhập không thành công</div>
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
                        <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                        <form action="" autocomplete="off" method="POST">
                            <table border="1" class="table-login text-center">
                                <div class="form-outline mb-4">
                                    <label><b>Your Email</b></label>
                                    <input type="text" class="form-control form-control-lg" name="email">
                                </div>
                                <div class="form-outline mb-4">
                                    <label><b>Password</b></label>
                                    <input type="password" class="form-control form-control-lg" name="password">
                                </div>
                                <div onclick="myFunction();" class="d-flex justify-content-center">
                                    <input class=" input-dangky btn btn-block btn-lg gradient-custom-4" type="submit"
                                        name="dangnhap" value="Log in" href="#">
                                </div>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>