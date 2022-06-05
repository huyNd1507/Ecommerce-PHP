<?php
		session_start();
		
		if (isset($_POST['submit']) && $_POST['username'] !='' && $_POST['password'] !='' && $_POST['repassword'])
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$repassword=$_POST['repassword'];
			if ($password != $repassword)
			{
				$_SESSION['thongbao']="Mật khẩu không khớp!";
				header("location:dangki.php"); 
				die();
			}

			require_once("../config/sql_cn.php");
			$sql="select * from useradmin where username='$username'";
			$old=mysqli_query($conn, $sql);
			if (mysqli_num_rows($old)>0)
			{
				$_SESSION['thongbao']="Tài khoản đã tồn tại!";
				header("location:dangki.php");
				die();
			}
			$query="insert into useradmin(username,password)
					values('".$username."','".$password."')";
			mysqli_query($conn, $query);
			$_SESSION['thongbao']="Đăng kí' thành công!";
			header('location:dangnhap.php');
			echo("da dang ky thanh cong!");

			$conn->close();
			header("location:dangnhap.php");
		}
		else
		{
			$_SESSION['thongbao']="Vui lòng nhập đầy đủ thông tin!";
			header("location:dangki.php");
		}
?>