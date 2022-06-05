<?php
session_start();
require_once '../../config/db.php';
require_once('../../config/sql_cn.php');
$id = $_GET['id'];
$sql_cate = "SELECT * FROM cate_news";
$sql_author = "SELECT * FROM useradmin";
$query_cate = mysqli_query($connect, $sql_cate);
$query_au = mysqli_query($connect, $sql_author);

$sql_up = "SELECT * FROM post WHERE id_p = $id";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['sbm'])) {
    $title = $_POST['title'];
    $title = str_replace('"', '\\"', $title);
    $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];

    if ($_FILES['thumbnail']['name'] == "") {
        $thumbnail = $row_up['thumbnail'];
    } else {
        $thumbnail = $_FILES['thumbnail']['name'];
        $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];
        move_uploaded_file($thumbnail_tmp, '../../uploads/' . $thumbnail);
    }


    $shortt = $_POST['shortt'];
    $shortt = str_replace('"', '\\"', $shortt);

    $content = $_POST['content'];
    $content = str_replace('"', '\\"', $content);

    $id_cate = $_POST['id_cate'];
    $id_au = $_POST['id_author'];
    $created_at = $update_at = date('Y-m-d H:s:i');
    $sql = 'update post set title="' . $title . '",thumbnail="' . $thumbnail . '",shortt="' . $shortt . '",content="' . $content . '",id_cate="' . $id_cate . '",update_at="' . $update_at . '",id_author="' . $id_au . '" where id_p=' . $id;
    $query = mysqli_query($connect, $sql);
    header('location: index.php');
}
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
    <title>sua bai viet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- note -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Sửa bài viết:</h2>
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên bài viết</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $row_up['title']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Thumbnail</label> <br>
                        <input type="file" name="thumbnail" value="<?= $row_up['thumbnail'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Short text:</label>
                        <textarea name="shortt" rows="4" value=""><?= $row_up['shortt'] ?></textarea>

                    </div>
                    <div class="form-group">
                        <label>Danh mục:</label>
                        <select class="form-control" name="id_cate" style="height: 40px;">
                            <?php
                            while ($row_cate = mysqli_fetch_assoc($query_cate)) { ?>
                                <option <?php if ($row_cate['id'] == $row_up['id_cate']) {
                                            echo "selected";
                                        }  ?> value="<?php echo $row_cate['id']; ?>"><?php echo $row_cate['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tác giả:</label>
                        <select class="form-control" name="id_author" style="height: 40px;">
                            <?php
                            while ($row_au = mysqli_fetch_assoc($query_au)) { ?>
                                <option <?php if ($row_au['id'] == $row_up['id_author']) {
                                            echo "selected";
                                        }  ?> value="<?php echo $row_au['id']; ?>"><?php echo $row_au['username']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nội dung bài viết:</label>
                        <textarea name="content" class="form-control" rows="5" id="content"><?= $row_up['content'] ?></textarea>
                    </div>

                    <button name="sbm" class="btn btn-success">Sửa</button>
                    <a href="../news/" class="btn btn-primary">Trở về</a>

                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" charset="utf-8">
    $(function() {
        $('#content').summernote();
    })
</script>

</html>