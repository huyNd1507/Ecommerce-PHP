<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
    <!-- header-start -->
    <?php session_start();
    include("../header.php");
    ?>
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
                        <th>Chi tiết sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Ngày sửa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $id = '';
                    require_once("../../config/db.php");
                    if (isset($_GET['id'])) {
                        $id_product = $_GET['id'];
                    }
                    $index = 1;
                    $sql = "SELECT * FROM product, product_details WHERE product.id_pr = product_details.id_product and product.id_pr = $id_product ";
                    $result = executeResult($sql);
                    foreach ($result as $item) {
                        echo '
                        <tr>
                        <td>' . $index++ . '</th>
                        <td>' . $item['product_details'] . '</td>
                        <td style="font-weight: bold">' . $item['title'] . '</td>
                        <td>' . $item['created_at'] . '</td>
                        </tr>
                        ';
                        $id = $item['id_product_details'];
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <?php
            if (empty($id)) {
                echo '<a href="create.php?id=' . $id_product . '" class="btn btn-primary ">
                            Thêm mới
                        </a>
                        <a href="../home.php?page_layout=list_product" class="btn btn-primary ">
                            Trở về
                        </a>';
            } else {
                echo '<a href="update.php?id=' . $id . '" class="btn btn-primary ">
                            Cập nhật
                        </a>
                        <a href="../home.php?page_layout=list_product " class="btn btn-primary ">
                            Trở về
                        </a>
                        ';
            }

            ?>

        </div>
    </main>
</body>