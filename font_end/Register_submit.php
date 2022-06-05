<?php
session_start();

if (isset($_POST['submit']) && $_POST['username'] != '' && $_POST['password'] != '' && $_POST['repassword']) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	if ($password != $repassword) {
		$_SESSION['thongbao'] = "Mật khẩu không khớp!";
		header("location:Register.php");
		die();
	}

	require_once("../config/sql_cn.php");
	$sql = "select * from userclient where username='$username'";
	$old = mysqli_query($conn, $sql);
	if (mysqli_num_rows($old) > 0) {
		$_SESSION['thongbao'] = "Tài khoản đã tồn tại!";
		header("location:Register.php");
		die();
	}
	$query = "insert into userclient(username,password)
					values('" . $username . "','" . $password . "')";
	mysqli_query($conn, $query);
	$_SESSION['thongbao'] = "Đăng kí' thành công!";
	header('location:Login.php');
	echo ("da dang ky thanh cong!");

	$conn->close();
	header("location:Login.php");
} else {
	$_SESSION['thongbao'] = "Vui lòng nhập đầy đủ thông tin!";
	header("location:dangki.php");
}
