<?php
	session_start();
	if (isset($_SESSION['user'])) {
		// code...
		unset($_SESSION['user']);
	}
	header("location:login.php"); 
?>