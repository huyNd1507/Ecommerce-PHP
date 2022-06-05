<?php
session_start();
require_once '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tìm kiếm</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/category.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- header--start -->
    <?php
    include('header.php');
    ?>
    <!-- header--end -->
    <!-- main -->
    <div class="container">
        <!-- slide banner -->
        <h1>Tìm kiếm sản phẩm</h1>
        <div class="main">
            <div class="box-common_main">
                <div class="listproduct" data-size="10">
                    <?php
                    $name = '';
                    if (isset($_GET['nameproduct'])) {
                        $name = $_GET['nameproduct'];
                    }
                    $sql = "SELECT * FROM product where title LIKE '%" . $name . "%'";
                    $query = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <div class="item_sp">
                            <a style="text-decoration: none;" href="ctsanpham.php?id=<?= $row['id_pr'] ?>">
                                <div class="item_img">
                                    <i> <img class="" src="../uploads/<?= $row['thumbnail']; ?>" alt="" srcset=""></i>
                                </div>
                                <h3 class="ten"><?= $row['title'] ?></h3>
                                <div class="box-p">
                                    <p class="price-old"><?= number_format($row['price'], 0, ",", "."); ?> đ</p>
                                    <span class="percent">-15%</span>
                                </div>
                                <strong class="price"><?= number_format($row['price'], 0, ",", "."); ?> đ</strong>
                                <ul class="rating">
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star disable"></li>
                                </ul>
                                <!--  -->
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php
    include 'footer.php';
    ?>


    <style>
        .container>h1 {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-bottom: 30px;
        }

        .box-common_main {
            margin-left: 0;
            position: relative;
        }
    </style>