<?php
session_start();
include('config/config.php');
if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE username='" . $taikhoan . "' AND password='" . $matkhau . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location:index.php");
    } else {
        echo '<script>alert("Tài khoản hoặc mật khẩu không đúng");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <img class="profile-img"
                        src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                        alt="">
                    <form action="" autocomplete="off" method="POST" class="form-signin">
                        <input type="text" class="form-control" name="username" required autofocus>
                        <input type="password" class="form-control" name="password" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="dangnhap">
                            Sign in</button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Remember me
                        </label>
                        <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                    </form>
                </div>
                <a href="#" class="text-center new-account">Create an account </a>
            </div>
        </div>
    </div>
</body>

</html>