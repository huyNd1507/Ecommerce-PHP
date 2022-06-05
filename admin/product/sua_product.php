<?php
$id = $_GET['id'];

$sql_cate = "SELECT * FROM categroy";
$query_cate = mysqli_query($connect, $sql_cate);

$sql_img = "SELECT * from img_product WHERE id_pro= $id";
$query_img = mysqli_query($connect, $sql_img);
$row_up_img = mysqli_fetch_array($query_img);

$sql_up = "SELECT * FROM product WHERE id_pr = $id";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['sbm'])) {
    $title = $_POST['title'];
    $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];

    if ($_FILES['thumbnail']['name'] == "") {
        $thumbnail = $row_up['thumbnail'];
    } else {
        $thumbnail = $_FILES['thumbnail']['name'];
        $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];
        move_uploaded_file($thumbnail_tmp, '../uploads/' . $thumbnail);
    }

    //ảnh mô tả:
    if (isset($_FILES['images'])) {
        // code...
        $files = $_FILES['images'];
        $files_name = $files['name'];

        if (!empty($files_name[0])) {
            // code...
            mysqli_query($connect, "DELETE FROM img_product WHERE id_pro= $id");

            foreach ($files_name as $key => $value) {
                // code...
                move_uploaded_file($files['tmp_name'][$key], '../uploads/libraryimg/' . $value);
            }
            foreach ($files_name as $key => $value) {
                // code...
                mysqli_query($connect, "INSERT INTO img_product(id_pro,imgs) VALUES('$id','$value')");
            }
        }
    }


    $price_old = $_POST['price_old'];
    $price = $_POST['price'];
    $id_category = $_POST['id_category'];

    $sql = "UPDATE product SET title = '$title', thumbnail = '$thumbnail', price_old = $price_old, price = $price, id_category = $id_category WHERE id_pr = $id";

    $query = mysqli_query($connect, $sql);
    header('location: home.php');
}
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sửa sản phẩm</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $row_up['title']; ?>">
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label> <br>
                    <input type="file" name="thumbnail" value="<?= $row_up['thumbnail'] ?>">
                    <img style="max-height:200px" src="../uploads/<?php echo $row_up['thumbnail']; ?>">
                </div>

                <div class="row" style="padding-top:20px;">
                    <label style="margin-right: 10px">Ảnh mô tả:</label>
                    <input type="file" name="images[]" multiple="multiple">
                    <?php
                    foreach ($query_img as $key => $value) {
                    ?>
                        <img style="max-height:100px;border-style: solid;border-width:2px;" src="../uploads/libraryimg/<?php echo $value['imgs']; ?>">
                    <?php } ?>
                </div>

                <div class="form-group">
                    <label>Giá cũ:</label>
                    <input type="number" name="price_old" class="form-control" value="<?php echo $row_up['price_old']; ?>">
                </div>

                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="number" name="price" class="form-control" value="<?php echo $row_up['price']; ?>">
                </div>
                <div class="form-group">
                    <label>Danh mục sản phẩm:</label>
                    <select class="form-control" name="id_category">
                        <?php
                        while ($row_cate = mysqli_fetch_assoc($query_cate)) { ?>
                            <option <?php if ($row_cate['id_cate'] == $row_up['id_category']) {
                                        echo "selected";
                                    }  ?> value="<?php echo $row_cate['id_cate']; ?>"><?php echo $row_cate['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button name="sbm" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
</div>