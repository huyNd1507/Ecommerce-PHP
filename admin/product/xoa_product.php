<?php

    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE id_pr = $id";
    $query = mysqli_query($connect, $sql);

    header('location: home.php');
	
?>