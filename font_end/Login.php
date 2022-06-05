<?php
session_start();
if (isset($_SESSION['userclient'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="../css/logins_khachhang.css">
</head>
<style>
    body {
        background: linear-gradient(120deg, #2980b9, #8e44ad);
    }

    .center h3 {
        text-align: center;
        padding: 25px 0;
        border-bottom: 1px solid silver;
    }
</style>

<body>
    <div class="modal ">
        <div class="center ">
            <a href="../index.php"> <i class="fas fa-times"></i></a>
            <h3>Đăng nhập tài khoản</h3>

            <form action="Login_submit.php" method="POST">
                <p style="text-align: center;color:#CC0000">
                    <?php
                    if (isset($_SESSION['thongbao'])) {
                        echo $_SESSION['thongbao'];
                        session_unset();
                    }
                    ?>
                </p>
                <div class="txt_field">
                    <input autocomplete="off" type="text" for="username" name="username" required>
                    <span></span>
                    <label>Tên đăng nhập</label>
                </div>
                <div class="txt_field">
                    <input type="password" for="password" name="password" required>
                    <span></span>
                    <label>Mật khẩu</label>
                </div>
                <div class="pass">
                    Quên mật khẩu?
                </div>
                <input name="submit" type="submit" class="btn" value="Đăng nhập"></input>
                <div class="signup_link">
                    Không phải là thành viên?<a href="Register.php">Đăng kí</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="../js/login_khachhang.js"></script>

</html>