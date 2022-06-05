<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng kí</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
</head>
<style>
    body {
        background-color: #2b7b94;
        font-family: "Roboto", sans-serif;
    }

    .signup-box {
        width: 360px;
        min-height: 330px;
        margin: auto;
        background-color: white;
        border-radius: 3px;
    }

    .login-box {
        width: 360px;
        height: 280px;
        margin: auto;
        border-radius: 3px;
        background-color: white;
    }

    h1 {
        text-align: center;
        padding-top: 15px;
    }

    h4 {
        text-align: center;
    }

    form {
        width: 300px;
        margin-left: 20px;
    }

    form label {
        display: flex;
        margin-top: 20px;
        font-size: 14px;
    }

    form input {
        width: 100%;
        padding: 7px;
        border: none;
        border: 1px solid gray;
        border-radius: 6px;
        outline: none;
    }

    form button {
        width: 315px;
        height: 35px;
        margin-top: 23px;
        border: none;
        background-color: #49c1a2;
        color: white;
        font-size: 18px;
        border-radius: 5px;
    }

    p {
        text-align: center;
        padding-top: 20px;
        padding-bottom: 20px;
        font-size: 15px;
    }

    .signup-box a {
        color: #20d3a6;
    }

    .para-2 {
        text-align: center;
        color: white;
        font-size: 15px;
        margin-top: -13px;
    }

    .para-2 a {
        color: #10e6b0;
    }
</style>

<body>
    <div class="signup-box">
        <h1>Đăng kí</h1>
        <form method="POST" action="dki.php">
            <p style="color:red">
                <?php
                if (isset($_SESSION["thongbao"])) {
                    echo $_SESSION["thongbao"];
                    session_unset();
                }
                ?>
            </p>
            <label>Tên đăng nhập</label>
            <input autocomplete="off" type="text" placeholder="" name="username" />
            <label>Mật khẩu</label>
            <input autocomplete="off" type="password" placeholder="" name="password" />
            <label>Nhập lại mật khẩu</label>
            <input autocomplete="off" type="password" placeholder="" name="repassword" />
            <button type="submit" name="submit">Đăng kí</button>
        </form>
        <p>
            Bằng cách đăng kí, bạn đồng ý với các <br />
            <a href="#">Điều khoản sử dụng</a> của chúng tôi
        </p>
    </div>
    <p class="para-2">
        Bạn đã có tài khoản? <a href="login.php"> Đăng nhập</a>
    </p>
</body>

</html>