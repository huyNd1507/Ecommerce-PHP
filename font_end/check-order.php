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
    <div class="container" style="margin-bottom: 340px; margin-top:100px">
        <!-- slide banner -->
        <h1>Tìm kiếm sản phẩm</h1>

        <form class="form-inline" method="POST" name="myForm" onsubmit="return validateForm()">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phoneNumber" id="phone_number">
            </div>
            <button name="hihi" type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
        </form>
        <div class="main">
            <table class="table">


                <?php
                $STT = 1;
                $sql = '';
                if (isset($_POST['hihi'])) {
                    if (isset($_POST['phoneNumber'])) {
                        $phoneNumber = $_POST['phoneNumber'];
                    }
                    $sql = "SELECT * FROM orders, trangthaii, order_details, product where phone_number  = $phoneNumber  and orders.id_trangthai = trangthaii.id_trangthai and order_details.product_id = product.id_pr and order_details.order_id = orders.id ";
                    $result = executeResult($sql);

                    if (empty($result)) {
                        echo '<button type="button" class="btn btn-primary" style="margin-top: 20px; display:flex">
                           Không tìm thấy số điện thoại đặt hàng
                            <span class="badge badge-light" style="display:flex; justify-content: center; align-item:center;">!</span>
                            <span class="sr-only">unread messages</span>
                        </button>';
                    } else {
                        echo '
                    <thead style="width: 100%">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>';
                    }


                    foreach ($result as $row) {
                        echo '
                                <tr>
                                    <th scope="row">' . $STT++ . '</th>
                                    <th scope="row">' . $row['fullname'] . '</th>
                                    <td> ' . $row['phone_number'] . '</td>
                                    <td> ' . $row['email'] . '</td>
                                    <td> ' . $row['title'] . '</td>
                                    <td> ' . $row['num'] . '</td>
                                    <td> ' . number_format($row['price'], 0, ",", ".") . 'đ</td>
                                    <td> ' . $row['order_date'] . '</td>
                                    <td> ' . $row['name_trangthai'] . '</td>   
                                </tr>
                            ';
                    }
                }

                ?>
                </tbody>
            </table>

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

    <script>
        function validateForm() {

            let x = document.forms["myForm"]["phoneNumber"].value;
            if (x == "") {
                alert("Vui lòng nhập số điện thoại!");
                return false;
            } else if (isNaN(x) || x < 0) {
                alert('Không đúng định dạng số điện thoại');
                return false;
            }

        }
    </script>