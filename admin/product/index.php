<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,900;1,700&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
</head>

<body>
    <!-- header-start -->

    <nav class="navbar">
        <h4 style="margin-left: 140px;">Sản phẩm</h4>
        <div class="profile">
            <i class="far fa-user" style="margin-top: -30px;font-size:30px;margin-left:20px"></i>
            <?php
            if (isset($_SESSION['user'])) {
                echo ' <p style="color:white;">' . $_SESSION['user'] . '</p>';
            }
            ?>
        </div>
        <div class="log-out">
            <a href="./dangxuat.php">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
            </a>
        </div>
    </nav>
    <input type="checkbox" id="toggle">
    <label class="side-toggle" for="toggle">
        <span class="fas fa-bars"></span>
    </label>

    <div class="sidebar">
        <div class="sideber-menu">
            <span class="fab fa-blackberry"></span>
            <a href="./category">
                <p>Danh mục sản phẩm</p>
            </a>
        </div>
        <div class="sideber-menu">
            <span class="far fa-list-alt"></span>
            <a href="./cate_news">
                <p>Danh mục bài viết</p>
            </a>
        </div>
        <div class="sideber-menu">
            <span class="far fa-newspaper"></span>
            <a href="./news/">
                <p> Bài viết</p>
            </a>
        </div>
        <div class="sideber-menu">
            <span class="fab fa-product-hunt"></span>
            <a href="home.php?page_layout=list_product">
                <p>Sản phẩm</p>
            </a>
        </div>

        <div class="sideber-menu">
            <span class="fas fa-headphones-alt"></span>
            <a href="./contact">
                <p>Liên hệ</p>
            </a>
        </div>
        <div class="sideber-menu">
            <span class="fas fa-shuttle-van"></span>
            <a href="./order">
                <p>Đơn hàng</p>
            </a>
        </div>
        <div class="sideber-menu">
            <span class="far fa-user"></span>
            <a href="./User-admin">
                <p>Thành viên</p>
            </a>
        </div>
    </div>
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
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá cũ </th>
                        <th>Giá sản phẩm</th>
                        <th>Danh mục</th>
                        <th width="12%">Chức năng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
                    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($current_page - 1) * $item_per_page;
                    $product = mysqli_query($connect, "select product.id_pr,product.title,product.thumbnail,product.price_old,product.price,categroy.name category_name from product left join categroy on product.id_category=categroy.id_cate ORDER BY id_pr DESC limit " . $item_per_page . " offset  " . $offset . "");
                    $totalRecords = mysqli_query($connect, "select * from product");
                    $totalRecords = $totalRecords->num_rows;
                    $totalPages = ceil($totalRecords / $item_per_page);
                    $no = 1;
                    while ($row = mysqli_fetch_array($product)) {
                    ?>
                        <tr>
                            <td><?php echo ++$offset; ?></th>
                            <td><?php echo $row['title']; ?></td>

                            <td>
                                <img src="../uploads/<?php echo $row['thumbnail']; ?>" width="80px">

                            </td>

                            <td><?php echo number_format($row['price_old'], 0, ",", "."); ?> VND</td>
                            <td><?php echo number_format($row['price'], 0, ",", "."); ?> VND</td>
                            <td><?php echo $row['category_name']; ?></td>

                            <td>
                                <div style="display: flex; justify-content: space-between">
                                    <a class="btn btn-warning" style="width: 45% " href="home.php?page_layout=sua_product&id=<?php echo $row['id_pr']; ?>"> Sửa</a>
                                    <a onclick="return Del('<?= $row['title'] ?>')" style="width: 45%" class="btn btn-danger" href="home.php?page_layout=xoa_product&id=<?php echo $row['id_pr']; ?>">Xóa</a>
                                </div>

                                <a class="btn btn-info" style="width:100%" href="product-details?id=<?php echo $row['id_pr']; ?>">Chi tiết sản phẩm</a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end" style="margin:20px 0">
                    <?php
                    include '../config/pagination.php';
                    ?>
                </ul>
            </nav>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="home.php?page_layout=them_product" class="btn btn-primary ">
                Thêm mới
            </a>
        </div>
    </main>
</body>
<script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa: " + name + " ?");
    }
</script>