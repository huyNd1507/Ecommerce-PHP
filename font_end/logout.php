<?php
	session_start();
	if (isset($_SESSION['userclient'])) {
		// code...
		unset($_SESSION['userclient']);
	}
    header('location:Login.php');
