<?php
session_start();
require_once '../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/product-detail.css">
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,900;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <title>Chi tiết sản phẩm</title>
</head>

<body>
  <?php
  include('header.php');
  ?>

  <div class="card-wrapper-cd">
    <div class="card-cd">
      <!-- left -->
      <div class="products-img">
        <!-- <img src="./img/iphone.jpg" alt=""> -->
        <div class="img-display">
          <div class="img-showcase">
            <?php
            require_once('../config/db.php');
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
            }
            $sql = "SELECT * FROM product, img_product WHERE  img_product.id_pro = product.id_pr AND product.id_pr = $id";
            $result =  executeResult($sql);
            foreach ($result as $row) {
              echo '
                  <img src="../uploads/libraryimg/' . $row['imgs'] . '" alt="phone img">
                  ';
            }
            ?>

          </div>
        </div>
        <div class="img-select">
          <?php

          $index = 1;
          $sql = "SELECT * FROM product, img_product WHERE  img_product.id_pro = product.id_pr AND product.id_pr = $id";
          $result =  executeResult($sql);
          foreach ($result as $row) {
            echo '
                <div class="img-item">
                  <a href="#" data-id="' . $index++ . '">
                    <img src="../uploads/libraryimg/' . $row['imgs'] . '" alt="phone img">
                  </a>
                </div>
              ';

            $name = $row['title'];
            $price = $row['price'];
            $price_old = $row['price_old'];
          }
          ?>
        </div>

        <div class="product-details">
          <h2>Bài viết đánh giá:</h2>
          <p>Xét về phong cách thiết kế, iPhone 13 Pro Max vẫn sở hữu khung viền vuông vức bằng kim loại sang trọng tương tự như iPhone 12 Pro Max. Mặt lưng của máy được hoàn thiện nhám để tránh lưu lại vân tay khi sử dụng. Cầm chiếc iPhone 13
            Pro Max trên tay chắc chắn sẽ thu hút mọi ánh nhìn bởi thiết kế quá ấn tượng.</p>
        </div>

      </div>

      <!-- right -->
      <div class="product-content">
        <h2 class="product-title"><?php echo $name ?> </h2>
        <div class="product-rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <span>(4.8)</span>
        </div>
        <div class="ram">
          <a href="#">128GB</a>
          <a href="#">258GB</a>
        </div>
        <div class="color">
          <a href="#">xanh lá</a>
          <a href="#">tím</a>
          <a href="#">đen</a>
          <a href="#">trắng</a>
        </div>
        <div class="product-price">
          <p class="old-price">Giá cũ: <span><?php echo number_format($price_old, 0, ",", ".") ?> VND</span></p>
          <p class="new-price">Giá khuyến mại: <span><?php echo number_format($price, 0, ",", ".") ?></span></p>
        </div>
        <div class="action">

          <button class="btn" onclick="addToCart(<?= $id ?>)">
            Thêm vào giỏ <i class="fas fa-shopping-cart"></i>
          </button>
          <button class="btn">Mua ngay</button>
        </div>


        <div class="info">
          <h2>Chi tiết sản phẩm </h2>
          <?php
          $sql = "SELECT * FROM product, product_details WHERE product.id_pr = product_details.id_product AND product.id_pr = $id";
          $result = executeResult($sql);
          foreach ($result as $row) {
            echo '' . $row['product_details'] . '';
          }
          ?>
        </div>

        <div class="social-link">
          <p>Theo dõi tại:</p>
          <a href="">
            <i class="fab fa-facebook"></i>
          </a>
          <a href="">
            <i class="fab fa-tiktok"></i>
          </a>
          <a href="">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="">
            <i class="fab fa-twitter"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- ------------- -->
    <div class="difference">
      <h2>Xem thêm giao diện khác</h2>
      <div class="filter">
        <a href="">android</a>
        <a href="">từ 13 - 17 triệu</a>
        <a href="">Xiaomi Mi</a>
        <a href="">Chơi game/Cấu hình cao</a>
        <a href="">Sạc pin nhanh</a>
        <a href="">128GB</a>
        <a href="">Chụp góc rộng</a>
        <a href="">Hỗ trọ 5G</a>
        <a href="">Bảo mật khuôn mặt</a>
        <a href="">Bảo mật vân tay</a>
        <a href="">Tràn viền</a>
        <a href="">Từ 6inch trở lên</a>
      </div>
    </div>
    <div class="carousel">
      <?php
      $sql = "SELECT * FROM product";
      $result = executeResult($sql);
      foreach ($result as $row) {
        echo '
          <a style="text-decoration: none" class="carousel-item" style="min-height: 400px" href="./ctsanpham.php?id=' . $row['id_pr'] . '">
          <div class="img-product-bottom">
            <img src="../uploads/' . $row['thumbnail'] . '" alt="">
          </div>
          <p style="height: 40px; overflow: hidden;">' . $row['title'] . '</p>
          <span>' . $row['price_old'] . '</span>
          <span>' . $row['price'] . '</span>
          <div class="product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </a>
        ';
      }
      ?>
    </div>
  </div>
  <?php
  include('footer.php');
  ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../js/main.js"></script>
</body>

</html>

<script type="text/javascript">
  function addToCart(id) {
    $.post('../api/api-product.php', {
      'action': 'add',
      'id': id
    }, function(data) {
      location.reload()
    })
  }
</script>