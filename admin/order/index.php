<?php
require_once("../../config/db.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đơn Hàng</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <!-- header-start -->
    <?php include '../header.php' ?>
    <!-- header-end -->
    <main>
        <div class="card-body">
            <?php
            if (isset($total_prd)) {
                if ($total_prd !== 0) {
                    echo "<p class='text-success'>Tìm thấy $total_prd sản phẩm</p>";
                } else {
                    echo "<p class='text-danger'> Không tìm thấy sản phẩm nào! </p>";
                }
            }
            ?>
            <table class="table table-hover table-bordered">
                <thead style="background-color: #272c4a;">
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * from order_details, orders, trangthaii, product WHERE order_details.order_id = orders.id AND orders.id_trangthai = trangthaii.id_trangthai AND order_details.product_id = product.id_pr";

                    $result = executeResult($sql);
                    $index = 1;
                    foreach ($result as $item) {
                        if ($item['id_trangthai'] == 1) {
                            $hey =  'btn btn-success';
                        } else if ($item['id_trangthai'] == 5) {
                            $hey =  'btn btn-warning';
                        } else if ($item['id_trangthai'] == 6) {
                            $hey =  'btn btn-danger';
                        } else if ($item['id_trangthai'] == 7) {
                            $hey =  'btn btn-info';
                        };
                        echo '
                    <tr>
                    <td>' . $index++ . '</th>
                    <td>' . $item['fullname'] . '</td>
                    <td>' . $item['phone_number'] . '</td>
                    <td>' . $item['email'] . '</td>
                    <td>' . $item['address'] . '</td>
                    <td>' . $item['title'] . '</td>
                    <td>' . $item['num'] . '</td>
                    <td>' . number_format($item['price'], 0, ",", ".") . ' VND</td>
                    <td>' . $item['order_date'] . '</td>
                    <td>
                        <button class="' . $hey . '">' . $item['name_trangthai'] . '</button>
                    <td>
                    <a class="btn btn-primary" id="change" href="update.php?id=' . $item['id'] . '">Cập nhật</a>
                    </td>
                    </tr>
                    ';
                    }



                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>