<?php
require_once("../../config/db.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
</head>

<body>
    <!-- header-start -->
    <?php include '../header.php' ?>
    <!-- header-end -->

    <!-- Main-start -->
    <main class="container">
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
                        <th>Sản phẩm quan tâm</th>
                        <th>Ghi chú</th>
                        <th>Ngày gửi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * from contact, categroy where contact.product = categroy.id_cate";

                    $result = executeResult($sql);

                    $index = 1;
                    foreach ($result as $item) {
                        echo '
                        <tr>
                            <td>' . $index++ . '</th>
                            <td>' . $item['fullname'] . '</td>
                            <td>' . $item['phoneNumber'] . '</td>
                            <td>' . $item['email'] . '</td>
                            <td>' . $item['name'] . '</td>
                            <td>' . $item['note'] . '</td>
                            <td>' . $item['created_at'] . '</td>
                        </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>