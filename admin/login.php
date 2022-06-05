<?php
session_start();
if (isset($_SESSION['user'])) {
  header('location:home.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Đăng nhập</title>
  <link rel="stylesheet" type="text/css" href="../css/logins.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
  .wrap {
    display: flex;
    justify-content: space-between;
  }

  .input-div {
    margin-top: 70px;
  }
</style>

<body>
  <div class="container">
    <div class="img">
      <img src="../img/dangnhap/phone.svg">
    </div>
    <div class="login-content">
      <form action="login_submit.php" method="POST">
        <img src="../img/dangnhap/avartar.svg">
        <h2 class="title">Kết nối với chúng tôi</h2>
        <p class="notify">
          <?php
          if (isset($_SESSION['thongbao'])) {
            echo $_SESSION['thongbao'];
            session_unset();
          }
          ?>
        </p>

        <div class="input-div one">
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <h5>Tài khoản</h5>
            <input autocomplete="off" type="text" for="name" class="input" name="username" required>
          </div>
        </div>
        <div class="input-div pass">
          <div class="icon">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <h5>Mật khẩu</h5>
            <input type="password" for="password" class="input" name="password" required>
          </div>
        </div>
        <div class="wrap">
          <a href="register.php">Đăng kí</a>
          <a href="#">Quên mật khẩu?</a>
        </div>

        <input type="submit" class="btn" name="submit" value="Đăng nhập">
      </form>
    </div>
  </div>
  <script type="text/javascript" src="../js/logins.js"></script>
</body>

</html>