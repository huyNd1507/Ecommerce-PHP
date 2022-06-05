<?php
session_start();
require_once '../../config/db.php';
require_once('../../config/sql_cn.php');


if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM useradmin  WHERE name LIKE '%$search%'";
    $query = mysqli_query($connect, $sql);
    $total_prd = mysqli_num_rows($query);
} else {
    $sql = "SELECT * FROM useradmin";
    $query = mysqli_query($connect, $sql);
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}
if (!isset($_SESSION['user'])) {
    header('location:../dangnhap.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản lý user</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <?php include '../header.php' ?>


    <!-- main -->
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
                        <th width="10%">STT</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th width="20%">Chức năng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></th>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="sua_user.php?id=<?php echo $row['id']; ?>">Cập nhật</a>
                                <a onclick="return Del('<?= $row['username'] ?>')" class="btn btn-danger" href="xoa_user.php?id=<?php echo $row['id']; ?>"> Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="them_user.php" class="btn btn-primary">
                Thêm mới
            </a>
            <?php
            if (isset($_POST['sbm']) && !empty($_POST['search'])) { ?>
                <form method="POST" action="">
                    <button name="all_prd" class='btn btn-success text-light'>Tất cả danh muc</button>
                </form>
            <?php } ?>
        </div>
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