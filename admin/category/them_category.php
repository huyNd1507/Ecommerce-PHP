<?php
    // $sql_cate = "SELECT * FROM categroy";
    // $query_cate = mysqli_query($connect, $sql_cate);
    session_start(); 
    require_once '../../config/db.php';
    require_once('../../config/sql_cn.php');
    if(isset($_POST['sbm'])){
        $name = $_POST['name'];
        $sql = "INSERT INTO categroy(name) VALUES('$name')";

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
	<title>them danh muc</title>
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
            <h2>Thêm danh muc</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên danh muc</label>
                    <input type="text" name="name" class="form-control">
                </div>

                    <button name="sbm" class="btn btn-success">Thêm mới</button>
            </form>
            <a href="index.php" ><button class="btn " name="btn">back</button></a>
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
