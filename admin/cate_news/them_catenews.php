<?php

session_start(); //phần này phải thêm vào mới chạy đc login
    require_once '../../config/db.php';
    require_once('../../config/sql_cn.php');
    if(isset($_POST['sbm'])){
        $name = $_POST['name'];
        // $thumbnail = $_FILES['thumbnail']['name'];
        // $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];
        $created_at=date('Y-m-d H:s:i');
        // $price_old = $_POST['price_old'];
        // $price = $_POST['price'];
        // $id_category = $_POST['id_category'];
        $sql = "INSERT INTO cate_news(name,created_at) VALUES('$name','$created_at')";
        $query = mysqli_query($connect, $sql);
        // move_uploaded_file($thumbnail_tmp, '../uploads/'.$thumbnail);
        header('location: index.php');
    }
    if (!isset($_SESSION['user'])) {
        // code...
        header('location:../dangnhap.php');//phần này phải thêm vào mới chạy đc login
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>them danh muc bai viet</title>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm danh mục bài viết:</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên danh mục:</label>
                    <input type="text" name="name" class="form-control">
                </div>

                    <button name="sbm" class="btn btn-success">Thêm mới</button>
            </form>
            <a href="index.php" ><button class="btn " name="btn">quay về</button></a>
        </div>
    </div>
<!--     	<script type="text/javascript" charset="utf-8">
		function updateThumbnail()
		{
			$('#newimg').attr('src',$('#thumbnail').val());
		}
	</script> -->
</div>
</body>
</html>
