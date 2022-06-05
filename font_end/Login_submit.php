<?php
session_start();
if (isset($_SESSION['userclient'])) {
  header('location: index.php');
}

if (isset($_POST['submit']) && $_POST['username'] != '' && $_POST['password'] != '') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  require_once '../config/sql_cn.php';
  $sql = "select * from userclient where username='$username' and password='$password'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {

    $_SESSION['userclient'] = $username;
    header('location:index.php');
  } else {
    $_SESSION['thongbao'] = "Sai tên đăng nhập hoặc mật khẩu!";
    header("location:Login.php");
  }
  $conn->close();
} else {
  $_SESSION['thongbao'] = "Vui lòng` nhập đầy đủ thông tin!";
  header("location:Login.php");
}
