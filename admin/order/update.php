<?php
require_once("../../config/db.php");
session_start();
$id = "";
$trangthai = "";
if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql = "SELECT * from order_details, orders, trangthaii, product WHERE order_details.order_id = orders.id AND orders.id_trangthai = trangthaii.id_trangthai AND order_details.product_id = product.id_pr and orders.id = $id";

    $news = executeResult($sql);
    foreach ($news as $order) {
        if ($order != null) {
            $name = $order['fullname'];
            $phone_number = $order['phone_number'];
            $email = $order['email'];
            $address = $order['address'];
            $title = $order['title'];
            $num = $order['num'];
            $price = $order['price'];
            $order_date = $order['order_date'];
        }
    }

    if (!empty($_POST)) {
        if (isset($_POST['id-trangthai'])) {
            $trangthai = $_POST['id-trangthai'];
        }
        $sql = 'update orders set id_trangthai = "' . $trangthai . '" where orders.id = ' . $id;

        execute($sql);
        header('location: ./index.php');
    }
}


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
            <form method="POST">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</th>
                            <td><?= $name ?></td>
                            <td><?= $phone_number ?></td>
                            <td><?= $email ?></td>
                            <td><?= $address ?></td>
                            <td><?= $title ?></td>
                            <td><?= $num ?></td>
                            <td><?= number_format($price, 0, ",", ".") ?> VND</td>
                            <td><?= $order_date ?></td>
                            <td>
                                <select class="form-control" aria-label="Default select example" name="id-trangthai">
                                    <?php
                                    $sql = "SELECT * FROM trangthaii";

                                    $result = executeResult($sql);

                                    foreach ($result as $item) {
                                        echo '
                                    
                                      <option value="' . $item['id_trangthai'] . '">' . $item['name_trangthai'] . '</option>
                                    
                                ';
                                    }
                                    ?>
                                </select>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-primary ">
                        Lưu
                    </button>
                    <a class="btn btn-warning " href="../order/">
                        Trở về
                    </a>
                </div>
            </form>

        </div>


        </div>

        </div>
    </main>
</body>