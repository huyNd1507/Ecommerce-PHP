<?php
session_start();
require_once '../../config/db.php';
require_once('../../config/sql_cn.php');

// if(isset($_POST['all_prd'])){
//     unset($_POST['sbm']);
// }
if (!isset($_SESSION['user'])) {
    // code...
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết</title>
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
            <table class="table table-hover table-bordered">
                <thead style="background-color: #272c4a;">
                    <tr>
                        <th width="20px">STT</th>
                        <th>Tên bài viết</th>
                        <th>Thumbnail</th>
                        <th>Short text</th>
                        <th width="100px">Ngày viết</th>
                        <th>Tác giả</th>
                        <th width="100px">Danh mục </th>
                        <th width="12%">Chức năng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
                    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($current_page - 1) * $item_per_page;

                    $totalRecords = mysqli_query($connect, "select * from post");
                    $totalRecords = $totalRecords->num_rows;
                    $totalPages = ceil($totalRecords / $item_per_page);
                    $news = mysqli_query($connect, "select * from post ,useradmin,cate_news WHERE post.id_cate=cate_news.id and post.id_author=useradmin.id order by id_p DESC limit " . $item_per_page . " offset  " . $offset . "");
                    $no = 1;
                    while ($row = mysqli_fetch_array($news)) {
                    ?>
                        <tr>
                            <td><?php echo ++$offset; ?></th>
                            <td>
                                <h5 style="font-weight:bold"><?php echo $row['title']; ?></h5>
                            </td>

                            <td>
                                <img src="../../uploads/<?php echo $row['thumbnail']; ?>">

                            </td>
                            <td><?php echo $row['shortt']; ?></td>
                            <td><?php echo $row['update_at']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="sua_news.php?id=<?php echo $row['id_p']; ?>"> Sửa</a>

                                <a onclick="return Del('<?= $row['title'] ?>')" class="btn btn-danger" href="xoa_news?id=<?php echo $row['id_p']; ?>">Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end" style="margin:20px 0">
                    <?php
                    include '../../config/pagination.php';
                    ?>
                </ul>
            </nav>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="them_news.php" class="btn btn-primary">
                Thêm mới
            </a>
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