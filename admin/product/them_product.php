<?php
// session_start();
$sql_cate = "SELECT * FROM categroy";
$query_cate = mysqli_query($connect, $sql_cate);

if (isset($_POST['sbm'])) {
    $title = $_POST['title'];

    $thumbnail = $_FILES['thumbnail']['name'];
    $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];

    $image = $_FILES['imgs']['name'];
    $image_tmp = $_FILES['imgs']['tmp_name'];


    $price_old = $_POST['price_old'];
    $price = $_POST['price'];
    $id_category = $_POST['id_category'];
    if ($price_old < $price) {
        // code...
        $_SESSION['alert'] = "khong dc nho hon!";
    } else {

        $sql = "INSERT INTO product(title, thumbnail, price_old, price, id_category) VALUES('$title', '$thumbnail', $price_old, $price, '$id_category')";

        $query = mysqli_query($connect, $sql);
        $id_pro = mysqli_insert_id($connect);
        foreach ($image as $key => $value) {
            mysqli_query($connect, "insert into img_product(id_pro,imgs) values('$id_pro','$value')");
            move_uploaded_file($image_tmp[$key], '../uploads/libraryimg/' . $value);
        }

        move_uploaded_file($thumbnail_tmp, '../uploads/' . $thumbnail);
        header('location: home.php?page_layout=list_product');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Thêm sản phẩm</h2>
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Ảnh sản phẩm</label> <br>
                        <input type="file" name="thumbnail">
                        <!-- <img src="../uploads/<?= $thumbnail ?>" alt="" style="max-width: 160px;"> -->
                    </div>
                    <div class="form-group">
                        <label>Ảnh mô tả:</label> <br>
                        <input type="file" name="imgs[]" multiple="multiple">
                        <!-- <img src="../uploads/<?= $thumbnail ?>" alt="" style="max-width: 160px;"> -->
                    </div>

                    <div class="form-group">
                        <label>gia cũ:</label>
                        <input type="number" name="price_old" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Giá sản phẩm</label>
                        <h5 style="color:red">
                            <?php
                            if (isset($_SESSION['alert'])) {
                                // code...
                                echo $_SESSION['alert'];
                                // header('location:home.php?page_layout=them_product');
                                unset($_SESSION['alert']);
                            }
                            ?>
                        </h5>
                        <input type="number" name="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>danh muc</label>
                        <select class="form-control" name="id_category" style="width: 50%; height: 100%;">

                            <?php
                            while ($row_cate = mysqli_fetch_assoc($query_cate)) { ?>
                                <option value="<?php echo $row_cate['id_cate']; ?>"><?php echo $row_cate['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button name="sbm" class="btn btn-success">Thêm mới</button>
                </form>
                <a href="home.php?page_layout=list_product"><button class="btn " name="btn">back</button></a>
            </div>
        </div>
        <!--     	<script type="text/javascript" charset="utf-8">
		function updateThumbnail()
		{
			$('#newimg').attr('src',$('#thumbnail').val());
		}
	</script> -->
    </div>
</body>

</html>