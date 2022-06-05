<?php
session_start();
require_once '../../config/db.php';
require_once('../../config/sql_cn.php');
$id = $_GET['id'];

// $sql_cate = "SELECT * FROM categroy";
// $query_cate = mysqli_query($connect, $sql_cate);

$sql_up = "SELECT * FROM cate_news WHERE id = $id";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['sbm'])) {
    $name = $_POST['name'];
    // $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];

    // if($_FILES['thumbnail']['name'] == ""){
    //     $thumbnail = $row_up['thumbnail'];
    // }else{
    //     $thumbnail = $_FILES['thumbnail']['name'];
    //     $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];
    //     move_uploaded_file($thumbnail_tmp, '../uploads/'.$thumbnail);
    // }


    // $price_old = $_POST['price_old'];
    // $price = $_POST['price'];
    // $id_category = $_POST['id_category'];

    $sql = "UPDATE cate_news SET name = '$name' WHERE id = $id";

    $query = mysqli_query($connect, $sql);
    header('location: index.php');
}
if (!isset($_SESSION['user'])) {

    header('location:../login.php');
}
?>
!
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sua danh mục bài viết</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        label {
            font-weight: 500;
        }

        .card input[type="search"] {
            margin-right: -6px;
        }

        .card input[type="search"]:focus,
        .card-header button:focus {
            box-shadow: none !important;
        }

        .card-header button {
            width: 140px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Sửa danh mục:</h2>
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên danh mục:</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row_up['name']; ?>">
                    </div>
                    <button name="sbm" class="btn btn-success">Sửa</button>
                    <a href="../cate_news/" class="btn btn-primary">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>