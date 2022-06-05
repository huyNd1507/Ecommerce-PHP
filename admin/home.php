<?php
session_start();
require_once '../config/db.php';
require_once('../config/sql_cn.php');
if (!isset($_SESSION['user'])) {
    // code...
    header('location:dangnhap.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        label {
            font-weight: 500;
        }

        .card input[type="search"] {
            margin-right: -6px;
        }

        .card input[type="search"]:focus,
        .card-header button:focus {
            box-shadow: none !important;
        }

        .card-header button {
            width: 140px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
    <title>Sản phẩm</title>
</head>

<body>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'list_product':
                require_once 'product/index.php';
                break;

            case 'them_product':
                require_once 'product/them_product.php';
                break;

            case 'sua_product':
                require_once 'product/sua_product.php';
                break;

            case 'xoa_product':
                require_once 'product/xoa_product.php';
                break;

                // case 'them_cy':
                //     require_once 'category/them_category.php';
                //     break;

                // case 'sua_cy':
                //     require_once 'category/sua_category.php';
                //     break;

                // case 'xoa_cy':
                //     require_once 'category/xoa_category.php';
                //     break;

            case 'list_cy':
                require_once 'category/index.php';
                break;

            default:
                require_once 'category/index.php';
                break;
        }
    } else {
        require_once 'product/index.php';
    }
    ?>
</body>

</html>