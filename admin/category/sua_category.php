<?php
session_start();
require_once '../../config/db.php';
require_once('../../config/sql_cn.php');
$id = $_GET['id'];

$sql_cate = "SELECT * FROM categroy";
$query_cate = mysqli_query($connect, $sql_cate);

$sql_up = "SELECT * FROM categroy WHERE id_cate = $id";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['sbm'])) {
    $name = $_POST['name'];

    $sql = "UPDATE categroy SET name = '$name' WHERE id_cate = $id";

    $query = mysqli_query($connect, $sql);
    header('location: index.php');
}
if (!isset($_SESSION['user'])) {
    header('location:../dangnhap.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang quản trị</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Sửa danh mục</h2>
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row_up['name']; ?>">
                    </div>

                    <button name="sbm" class="btn btn-success">Sửa</button>
                    <a href="../category/" class="btn btn-primary">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</body>