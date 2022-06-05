<?php
if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM categroy  WHERE name LIKE '%$search%'";
    $query = mysqli_query($connect, $sql);
    $total_prd = mysqli_num_rows($query);
} else {
    $sql = "SELECT * FROM categroy";
    $query = mysqli_query($connect, $sql);
}

if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <?php
    include('header.php')
    ?>

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
            <thead style="background-color:blue; color:white;">
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
                        <td><?php echo $no++; ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="home.php?page_layout=sua_cy&id=<?php echo $row['id_cate']; ?>">Sửa</a>

                            <a onclick="return Del('<?= $row['name'] ?>')" class="btn btn-danger" href="home.php?page_layout=xoa_cy&id=<?php echo $row['id_cate']; ?>"> Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="card-footer d-flex justify-content-between">
        <a href="home.php?page_layout=them_cy" class="btn btn-primary">
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
</body>

</html>


<script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa: " + name + " ?");
    }
</script>