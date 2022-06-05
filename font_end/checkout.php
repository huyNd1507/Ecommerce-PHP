<?php
session_start();
require_once '../config/db.php';
require_once '../utilshien/utility.php';
require_once('../api/form-checkout.php');
// $id=$_GET['id'];
//   if (isset($_GET['id'])) {
//   // code...
//   $id=$_GET['id'];
//   $sql='select * from categroy where id_cate='.$id;
//   $category=mysqli_query($connect,$sql);
//   if ($category!='') {
//     // code...
//     $name=$category['name'];
//   }
// }
?>!
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thanh toán</title>
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/checkout.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- header-start -->

  <?php
  include 'header.php';
  ?>
  <!-- header-end -->
  <!-- main -->
  <!--
Follow me on
------------
Codepen: https://codepen.io/mycnlz/
Dribbble: https://dribbble.com/mycnlz
Pinterest: https://pinterest.com/mycnlz/
-->


  <div class='checkout'>
    <form class='card-form' method="POST">
      <div class='order'>
        <h3>Thông tin sản phẩm</h3>
        <h5>HTH Shop</h5>
        <ul class='order-list'>
          <?php
          $cart = [];
          if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
          }
          $count = 0;
          $total = 0;
          foreach ($cart as $item) {
            $total += $item['num'] * $item['price'];
            echo '  
            <li><img src="../uploads/' . $item['thumbnail'] . '">
                  <h5 style="font-family:"Segoe UI", Tahoma, Geneva, Verdana, sans-serif">' . $item['title'] . '</h5>
                  <div class="num"><span style="font-family:"Segoe UI", Tahoma, Geneva, Verdana, sans-serif">Số lượng: ' . $item['num'] . '</span></div>
                  <h6 style="font-family:"Segoe UI", Tahoma, Geneva, Verdana, sans-serif">' . number_format($item['num'] * $item['price'], 0, '', '.') . 'vnđ</h6>
                </li>
            ';
          }
          ?>

        </ul>
        <h4 style="font-weight:700; margin-top: 20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Hình thức thanh toán</h4>
        <div class="form-check" style="padding: 0">
          <input class="form-check-input" type="radio" value="" id="flexCheckDefault">
          <span class="form-check-label" for="flexCheckDefault" style="margin-left: 20px;">
            Thanh toán khi nhận hàng
          </span>
        </div>
        <h4 style="font-weight:700; margin-top: 20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Tổng Tiền</h4>
        <h4 style="display:flex"><?= number_format($total, 0, '', '.') ?><p style="color:burlywood">VND</p>
        </h4>
      </div>
      <h2>Thông tin</h2>
      <div id='payment' class='payment'>
        <div class='item-form'>
          <h5 class='title-form'>Thông tin khách hàng</h5>
          <div class="form-group">
            <div>
              <input required="true" type="text" class="form-control" placeholder="Họ và tên" id="fullname" name="fullname">
            </div>
            <div>
              <input required="true" type="text" class="form-control" placeholder="Số điện thoại" id="phone_number" name="phone_number">
            </div>
          </div>
          <h5 class='title-form'>Email</h5>
          <div class="form-group">
            <div style="width: 95%">
              <input type="email" class="form-control" placeholder="Email" style="width:100%" id="email" name="email">
            </div>
          </div>
          <h5 class='title-form'>Cách thức nhận hàng</h5>
          <div class="form-check" style=" margin-bottom: 10px; margin-left: 10px">
            <input class="form-check-input" type="radio" value="" id="flexCheckDefault">
            <span class=" form-check-label" for="flexCheckDefault" style="margin-left: 20px;">
              Giao hàng tận nơi
            </span>
          </div>
          <div class=" form-group">
            <div style="width: 95%">
              <input type="text" class="form-control" placeholder="Địa chỉ" style="width:100%" id="address" name="address">
            </div>
          </div>
        </div>
        <div class="btn-ne">
          <button class='button-cta' title='Confirm your purchase'><span>ĐẶT HÀNG</span></button>
        </div>
    </form>
  </div>
  </div>

  </div>






  <!-- Footer -->
  <?php include 'footer.php'; ?>
  <!-- Footer -->
</body>

</html>