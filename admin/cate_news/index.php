<?php
session_start();
require_once '../../config/db.php';
require_once('../../config/sql_cn.php');
if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM cate_news  WHERE name LIKE '%$search%'";
    $query = mysqli_query($connect, $sql);
    $total_prd = mysqli_num_rows($query);
} else {
    $sql = "SELECT * FROM cate_news";
    $query = mysqli_query($connect, $sql);
}

if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}
if (!isset($_SESSION['user'])) {
    // code...
    header('location:../dangnhap.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục bài viết</title>
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
                    echo "<p class='text-success'>Tìm thấy $total_prd danh muc</p>";
                } else {
                    echo "<p class='text-danger'> Không tìm thấy sản phẩm nào! </p>";
                }
            }
            ?>
            <table class="table table-hover table-bordered">
                <thead style="background-color: #272c4a;">
                    <tr>
                        <th width="10%">stt</th>
                        <th>Tên danh mục</th>
                        <th width="12%">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?></th>
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="sua_catenews.php?id=<?php echo $row['id']; ?>">Sửa</a>
                                <a onclick="return Del('<?= $row['name'] ?>')" class="btn btn-danger" href="xoa_catenews.php?id=<?php echo $row['id']; ?>"> Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="them_catenews.php" class="btn btn-primary">Thêm mới</a>
            <?php
            if (isset($_POST['sbm']) && !empty($_POST['search'])) { ?>
                <form method="POST" action="">
                    <button name="all_prd" class='btn btn-success text-light'>Tất cả danh muc</button>
                </form>
            <?php } ?>
        </div>
        </div>
    </main>
</body>

</html>


<script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa: " + name + " ?");
    }
</script>