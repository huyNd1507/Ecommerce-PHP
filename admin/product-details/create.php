<?php
require_once('../../config/db.php');
$name = '';
$productDetails = '';
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


$sql = "SELECT * FROM product WHERE id_pr = $id";
$result = executeResult($sql);
foreach ($result as $row) {
    $name = $row['title'];
}

if (!empty($_POST)) {
    if (isset($_POST['product_details'])) {
        $productDetails = $_POST['product_details'];
    }
    $created_at = $updated_at = date('Y-m-d H:s:i');
    //Luu vao database
    $sql = "INSERT INTO product_details(product_details, id_product, created_at, updated_at) VALUES ('  $productDetails  ', ' $id  ', ' $created_at  ', '  $updated_at  ')";
    execute($sql);
    header('Location: ../home.php?page_layout=list_product');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    <div class="alert alert-primary" role="alert">
        <a href="index.php?id=<?php echo $id ?>" class="link">Trở về trang chi tiết sản phẩm</a>
    </div>
    <form method="POST" id="news">
        <textarea id="summernote" name="product_details"></textarea>
        <div class="item-input">
            <label for="" style="margin-right: 20px; font-size: 20px">Tên sản phẩm: <?php echo $name  ?></label>

        </div>
        <div class="button-submit">
            <button class="btn btn-success mt-3">Cập nhật</button>
        </div>
    </form>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 600, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null,
            width: 1200, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });
    });
</script>

<style>
    #news {
        display: flex;
    }

    .input-group {
        width: 400px;
    }

    .item-input {
        display: flex;
        justify-content: space-between;
        padding: 10px;
    }

    .button-submit {
        margin: 40px;
    }

    .button-submit>button {
        padding: 6px 40px;
        font-weight: bold;
        font-size: 22px;
    }

    .link {
        text-decoration: none;
        font-weight: bold;
        font-size: 22px;
    }
</style>