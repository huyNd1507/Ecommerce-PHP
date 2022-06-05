<?php
  session_start();
  if (isset($_SESSION['user'])) {
    header('location:home.php');
  }

  if(isset($_POST['submit']) && $_POST['username'] !='' && $_POST['password']!='' )
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    require_once '../config/sql_cn.php';
    $sql="select * from useradmin where username='$username' and password='$password'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0)
    {

      $_SESSION['user']=$username;
      header('location:home.php');
    }
    else
    {
      $_SESSION['thongbao']="Sai tên đăng nhập hoặc mật khẩu!";
      header("location:dangnhap.php");
    }
    $conn->close();
  }
  else
  {
    $_SESSION['thongbao']="Vui lòng` nhập đầy đủ thông tin!";
    header("location:dangnhap.php");
  }

?>