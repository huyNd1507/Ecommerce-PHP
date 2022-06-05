<?php
session_start();
require_once '../config/db.php';
$id = $_GET['id'];

?>!
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Danh mục sản phẩm</title>
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/category.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- header--start -->
  <?php
  include('header.php');
  ?>
  <!-- header--end -->
  <!-- main -->
  <div class="container">
    <!-- slide banner -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/23/637680343608242158_F-C1_1200x300.png" alt="" style="width:100%;">
        </div>
        <div class="item">
          <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/24/637680387364945356_F-C1_1200x300.png" alt="" style="width:100%;">
        </div>
        <div class="item">
          <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/24/637680449656504536_F-C1_1200x300.png" alt="" style="width:100%;">
        </div>
        <div class="item">
          <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/8/31/637660292386915827_F-C1_1200x300.png" alt="" style="width:100%;">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- box_brands,filter-->
    <section>
      <div class="box-quicklink  block-scroll-main">
        <div class="lst-quickfilter q-manu ">
          <a href="dtdd-apple-iphone" data-href="dtdd-apple-iphone" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/logo-iphone-220x48.png" width="100px" class="no-text">

          </a>
          <a href="dtdd-samsung" data-href="dtdd-samsung" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/samsungnew-220x48-1.png" width="100px" class="no-text">

          </a>
          <a href="dtdd-oppo" data-href="dtdd-oppo" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/OPPO42-b_5.jpg" width="100px" class="no-text">

          </a>
          <a href="dtdd-vivo" data-href="dtdd-vivo" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/Vivo42-b_50.jpg" width="100px" class="no-text">

          </a>
          <a href="dtdd-xiaomi" data-href="dtdd-xiaomi" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/logo-xiaomi-220x48-5.png" width="100px" class="no-text">

          </a>
          <a href="dtdd-realme" data-href="dtdd-realme" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/Realme42-b_37.png" width="100px" class="no-text">

          </a>
          <a href="dtdd-vsmart" data-href="dtdd-vsmart" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/Vsmart42-b_40.png" width="100px" class="no-text">

          </a>
          <a href="dtdd-oneplus" data-href="dtdd-oneplus" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/OnePlus42-b_36.jpg" width="100px" class="no-text">

          </a>
          <a href="dtdd-nokia" data-href="dtdd-nokia" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/Nokia42-b_21.jpg" width="100px" class="no-text">

          </a>
          <a href="dtdd-mobell" data-href="dtdd-mobell" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/Mobell42-b_19.jpg" width="100px" class="no-text">

          </a>
          <a href="dtdd-itel" data-href="dtdd-itel" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/Itel42-b_54.jpg" width="100px" class="no-text">

          </a>
          <a href="dtdd-masstel" data-href="dtdd-masstel" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/Masstel42-b_0.png" width="100px" class="no-text">

          </a>
          <a href="dtdd-energizer" data-href="dtdd-energizer" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
            <img src="//cdn.tgdd.vn/Brand/1/Energizer42-b_32.jpg" width="100px" class="no-text">

          </a>
        </div>
      </div>
    </section>
    <!-- box-filter -->

    <div class="main">
      <aside class="col-sm-4">
        <div class="card">
          <article class="card-group-item">
            <header class="card-header">
              <h5 class="title">Tính năng đặc biệt </h5>
            </header>
            <div class="filter-content">
              <div class="card-body">
                <form>
                  <label class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <span class="form-check-label">
                      Hỗ trợ 5G
                    </span>
                  </label> <!-- form-check.// -->
                  <label class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <span class="form-check-label">
                      Kháng nước,kháng bụi
                    </span>
                  </label> <!-- form-check.// -->
                  <label class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <span class="form-check-label">
                      Sạc không dây
                    </span>
                  </label>
                  <label class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <span class="form-check-label">
                      Nhận diện khuôn mặt
                    </span>
                  </label> <!-- form-check.// -->
                </form>

              </div> <!-- card-body.// -->
            </div>
          </article> <!-- card-group-item.// -->

          <article class="card-group-item">
            <header class="card-header">
              <h5 class="title">Tầng số quét</h5>
            </header>
            <div class="filter-content">
              <div class="card-body">
                <label class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadio" value="">
                  <span class="form-check-label">
                    60Hz
                  </span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadio" value="">
                  <span class="form-check-label">
                    90Hz
                  </span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadio" value="">
                  <span class="form-check-label">
                    120Hz
                  </span>
                </label>
              </div> <!-- card-body.// -->
            </div>
          </article> <!-- card-group-item.// -->
        </div> <!-- card.// -->

        <div class="card">
          <article class="card-group-item">
            <header class="card-header">
              <h5 class="title">Giá </h5>
            </header>
            <div class="filter-content">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Min</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="0đ">
                  </div>
                  <div class="form-group col-md-6 text-right">
                    <label>Max</label>
                    <input type="number" class="form-control" placeholder="50.000.000đ">
                  </div>
                </div>
              </div> <!-- card-body.// -->
            </div>
          </article> <!-- card-group-item.// -->
          <article class="card-group-item">
            <header class="card-header">
              <h5 class="title">Hãng điện thoại </h5>
            </header>
            <div class="filter-content">
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <span class="float-right badge badge-light round">52</span>
                  <input type="checkbox" class="custom-control-input" id="Check1">
                  <label class="custom-control-label" for="Check1">SAMSUNG</label>
                </div> <!-- form-check.// -->

                <div class="custom-control custom-checkbox">
                  <span class="float-right badge badge-light round">132</span>
                  <input type="checkbox" class="custom-control-input" id="Check2">
                  <label class="custom-control-label" for="Check2">Apple</label>
                </div> <!-- form-check.// -->

                <div class="custom-control custom-checkbox">
                  <span class="float-right badge badge-light round">17</span>
                  <input type="checkbox" class="custom-control-input" id="Check3">
                  <label class="custom-control-label" for="Check3">Oppo</label>
                </div> <!-- form-check.// -->

                <div class="custom-control custom-checkbox">
                  <span class="float-right badge badge-light round">7</span>
                  <input type="checkbox" class="custom-control-input" id="Check4">
                  <label class="custom-control-label" for="Check4">Hãng khác</label>
                </div> <!-- form-check.// -->
              </div> <!-- card-body.// -->
            </div>
          </article> <!-- card-group-item.// -->
        </div>
      </aside>
      <div class="box-common_main">
        <div class="listproduct" data-size="10">
          <?php
          $sql = "select product.id_pr,product.title,product.thumbnail,product.price_old,product.price from product INNER JOIN categroy on product.id_category=categroy.id_cate where categroy.id_cate='" . $id . "' ORDER BY id_pr DESC";
          // var_dump($sql); exit();
          $query = mysqli_query($connect, $sql);
          while ($row = mysqli_fetch_assoc($query)) { ?>
            <div class="item_sp">
              <a style="text-decoration: none;" href="ctsanpham.php?id=<?= $row['id_pr'] ?>">
                <div class="item_img">
                  <i> <img class="" src="../uploads/<?= $row['thumbnail']; ?>" alt="" srcset=""></i>
                </div>
                <h3 class="ten"><?= $row['title'] ?></h3>
                <div class="box-p">
                  <p class="price-old"><?= number_format($row['price'], 0, ",", "."); ?> đ</p>
                  <span class="percent">-15%</span>
                </div>
                <strong class="price"><?= number_format($row['price'], 0, ",", "."); ?> đ</strong>
                <ul class="rating">
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star disable"></li>
                </ul>
                <!--  -->
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <?php
  include 'footer.php';
  ?>