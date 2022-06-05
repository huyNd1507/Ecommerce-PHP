<?php
require_once '../config/db.php';
require_once '../utilshien/utility.php';
if (isset($_POST['name'])) {
  $name = $_POST['name'];
}
?>
<style>
  .Client {
    display: flex;
    position: relative;
  }

  .icon-nav {
    display: flex;
  }

  .fa-search {
    margin-top: 13px;
    font-size: 20px;
  }

  .search-icon {
    margin-right: 24px;
  }

  .Client li a {
    position: absolute;
    margin-top: 40px;
    left: 0;
    display: block;
    width: 130px;
    background-color: blue;
    color: #fff;
    display: none;
    text-decoration: none;
  }

  .Client li {
    list-style: none;
  }

  .Client:hover a {
    display: block;
  }

  .badge {
    display: block;
    position: absolute;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-left: 10px;
    top: 10px;
    font-size: 15px;
    text-align: center;
    font-weight: 500;
    /* line-height: 30px; */
  }
</style>
<div class="wrapper">
  <nav>
    <!-- <script type="alert">hi .$_SESSION['username']</script> -->
    <input type="checkbox" id="show-search">
    <input type="checkbox" id="show-menu">
    <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
    <div class="content">
      <div class="logo"><a href="./index.php">
          <img src="../img/logo.png" alt="">
        </a></div>
      <ul class="links">
        <li><a href="index.php">Trang Chủ</a></li>
        <li>
          <a href="#" class="desktop-link">Tin tức</a>
          <ul>
            <?php
            $sql = "SELECT * FROM cate_news";
            $query = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($query)) { ?>
              <li>
                <a href="cate_news.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a>
              </li>
            <?php } ?>

          </ul>
        </li>
        <li>
          <a href="#" class="desktop-link">Sản Phẩm</a>
          <input type="checkbox" id="show-services">
          <!-- <label for="show-services">Sản Phẩm</label> -->

          <ul>
            <?php
            $sql = "SELECT * FROM categroy";
            $query = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($query)) { ?>
              <li>
                <a href="danhmuc.php?id=<?= $row['id_cate'] ?>"><?= $row['name'] ?></a>
              </li>
            <?php } ?>
          </ul>
        </li>
        <li><a href="contact.php">Liện Hệ</a></li>
        <li><a href="check-order.php">Tìm kiếm đơn hàng</a></li>
      </ul>
    </div>
    <div class="icon-nav">
      <?php
      $cart = [];
      if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
      }
      $count = 0;
      foreach ($cart as $item) {
        $count += $item['num'];
      }
      ?>
      <a style="color: #fff; position: relative" href="cart.php"><i class="fas fa-shopping-cart"></i>
        <div class="num-icon">
          <span id="cart-item" style="margin-left: 0;"><?= $count ?></span>
        </div>

      </a>


      <!-- ------------------ -->


      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <div class="Client">
        <a style="color: #fff;" class="users" href="Login.php"><i class="far fa-user"></i></a>
        <li><a href="logout.php">Đăng xuất</a></li>
        <?php
        if (isset($_SESSION['userclient'])) {
          echo ' <p style="color:white;margin-top:15px">' . $_SESSION['userclient'] . '</p>';
        }
        ?>
      </div>
    </div>

    <form action="search.php" class="search-box">
      <input type="text" placeholder="Nhập tên sản phẩm..." required name="nameproduct">
      <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
    </form>


  </nav>
</div>