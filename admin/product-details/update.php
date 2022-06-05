<?php
require_once('../../config/db.php');
$id = '';
$idProduct = '';
session_start();
$product_details = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}



$sql = "SELECT * FROM product_details, product WHERE product.id_pr = product_details.id_product and id_product_details = $id";
$result = executeResult($sql);
foreach ($result as $row) {
    $product_details = $row['product_details'];
    $idProduct = $row['id_product'];
    $name = $row['title'];
}

if (!empty($_POST)) {
    if (isset($_POST['product_details'])) {
        $productDetails = $_POST['product_details'];
    }

    $created_at = $updated_at = date('Y-m-d H:s:i');
    //Luu vao database
    $sql = 'UPDATE product_details set product_details = "' . $productDetails . '", id_product = "' . $idProduct . '" where id_product_details = ' . $id;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    <div class="alert alert-primary" role="alert">
        <a href="index.php?id=<?php echo $id ?>" class="link">Trở về trang chi tiết sản phẩm</a>
    </div>
    <form method="POST" id="news">
        <textarea id="summernote" name="product_details"><?php echo $product_details  ?></textarea>
        <div class="item-input">
            <label for="" style="margin-right: 20px; font-size: 20px">Tên sản phẩm: <?php echo $name  ?></label>

        </div>
        <div class="button-submit">
            <button class="btn btn-success mt-3">Cập nhật</button>
            <?php
            echo '<a href="../product-details?id=' . $idProduct . '" class="btn btn-primary " style="width:75%; margin-top: 40px">
                    Trở về
                </a>';
            ?>

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