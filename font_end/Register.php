<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Đăng kí</title>
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

    .btn {
        background-color: #ee6b48;
    }
</style>

<body>
    <!-- <a class="user" href=""><i class="far fa-user"></i></a> -->
    <div class="modal ">
        <div class="center ">
            <a href="../index.php"> <i class="fas fa-times"></i></a>

            <h3>Đăng kí tài khoản</h3>
            <form method="POST" action="Register_submit.php">
                <p style="text-align: center;color:#CC0000">
                    <?php
                    if (isset($_SESSION["thongbao"])) {
                        echo $_SESSION["thongbao"];
                        session_unset();
                    }
                    ?>
                </p>
                <div class="txt_field">
                    <input autocomplete="off" type="text" name="username" required>
                    <span></span>
                    <label>Tên đăng kí</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" required>
                    <span></span>
                    <label>Mật khẩu</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="repassword" required>
                    <span></span>
                    <label>Nhập lại mật khẩu</label>
                </div>

                <button class="btn" name="submit">Đăng kí</button>
                <div class="signup_link">
                    Bạn đã có tài khoản?<a href="Login.php">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="../js/login_khachhang.js"></script>

</html>