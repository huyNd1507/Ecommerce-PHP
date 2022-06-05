<?php
session_start();
	require_once '../config/db.php';
	require_once '../utilshien/utility.php';

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
?>!<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HTHshop</title>
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/cart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head> 
<body>
  <!-- header -->
<?php
  include('header.php');
?>
  <!-- silde -->
  <!-- main -->
<div class="container">
  <div class="row pd-page" style="margin-top:20px;">
        <div class="col-md-12 col-xs-12 heading-page">
            <div class="header-page">
                <h1>Giỏ hàng của bạn</h1>
                <p class="count-cart">Có <span style="color:red;"><?=$count?></span> sản phẩm trong giỏ hàng</p>
            </div>
        </div>
        <div class="col-md-12 col-xs-12 wrapbox-content-cart">
            <div class="cart-container">
                <div class="cart-col-left">
                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <table class="table-cart">
                              <tbody>
<?php 
          $cart = [];
            if(isset($_SESSION['cart'])) {
              $cart = $_SESSION['cart'];
            }
            else{

            }
          $count = 0;
          $total = 0;
          foreach ($cart as $item) {
             $count += $item['num'];
            $total += $item['num'] * $item['price'];
            echo ' <tr class="line-item-container">
                                  <td class="image" >
                                      <div class="product_image">
                                          <a href="/products/button-pants">
                                              <img style="max-height:150px" src="../uploads/'.$item['thumbnail'].'" >
                                          </a>
                                      </div>
                                  </td>
                                  <td class="item" style="width: 90%;">
                                      <a href="/products/button-pants">
                                          <h3>'.$item['title'].'</h3>
                                      </a>
                                      <p>
                                          <span>650,000₫</span>
                                          
                                      </p>
                                      <p class="variant">
                                          
                                          <span class="variant_title">SL: '.$item['num'].' </span>
                                          
                                      </p>
                                      <p class="price">
                                          <span class="line-item-total" style="font-size:18px">'.number_format($item['num'] * $item['price'], 0, '', '.').'₫</span>
                                      </p>
                                      <div style="float: right;margin-top: -135px;margin-right: -115px;padding:10px;border-style: outset;">
                                        <a href="#" class="cart"  onclick=" deleteItem('.$item['id_pr'].')">
                                          <i class="fas fa-times" style="font-size:25px"></i>
                                        </a>
                                      </div>
                                  </td>
                                  </tr>';
                                }
?>
                                 
                              </tbody>
                          </table>
                      </div>
                      <div class="col-md-6 col-sm-12 col-xs-12 text-right" style="margin-left: auto;">
                        <p class="order-infor">         
                          Tổng tiền:
                          <span class="total_price" style="color: red"><b><?=number_format($total, 0, '', '.')?>₫</b></span>
                        </p>
                        <div class="cart-buttons">
                          <a class="button dark link-continue" href="index.php" title="Tiếp tục mua hàng"><i class="fa fa-reply"></i>Tiếp tục mua hàng</a>
                          <a href="checkout.php" id="checkout" class="btn-checkout button dark" >
                            <span>thanh toán</span>
                          </a>
    
                        </div>
    
                        
                      </div>
                  </div>

                </div>
            </div>
        </div>
    </div>


</div>

<!-- Footer -->
<?php
  include('footer.php'); 
?>
</body>
<script type="text/javascript">
	function deleteItem(id) {
		$.post('../api/api-product.php', {
			'action': 'delete',
			'id_pr': id
		}, function(data) {
			location.reload()
		})
	}
</script>
</html>