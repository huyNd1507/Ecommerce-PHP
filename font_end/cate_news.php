<?php
session_start();
$id = $_GET['id'];
// $sql_up = "select * from post,useradmin,cate_news WHERE post.id_cate=cate_news.id and post.id_author=useradmin.id and post.id_p='".$id."' order by id_p DESC   ";
// $query_up = mysqli_query($connect, $sql_up);
// $row_up = mysqli_fetch_assoc($query_up);
?>

!
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HTHshop</title>
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/cate_news.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../config/script.js"></script>
  <style>
    /* Load more */
    .load-more {
      width: 99%;
      background: #15a9ce;
      text-align: center;
      color: white;
      padding: 10px 0px;
      font-family: sans-serif;
    }

    .load-more:hover {
      cursor: pointer;
    }
  </style>
</head>

<body>
  <!-- header -->
  <?php
  include('header.php');
  ?>

  <!-- main -->
  <div class="container">
    <section>
      <div class="home-menu" style="z-index: 10;">
        <section style="margin-top:40px;margin-left:20px;">
          <ul class="menu">
            <?php
            $sql = "SELECT * FROM cate_news";
            $query = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($query)) { ?>

              <li><a href="cate_news.php?id=<?= $row['id'] ?>" class="actmenu"><?= $row['name'] ?></a></li>
            <?php } ?>
          </ul>
        </section>
      </div>
      <aside class="leftcase">
        <div class="infopage">
          <?php
          $sql = "select *from cate_news where id='" . $id . "'";
          $query = mysqli_query($connect, $sql);
          while ($row = mysqli_fetch_assoc($query)) { ?>
            <h1><?= $row['name'] ?></h1>
          <?php } ?>
        </div>


        <ul class="newslist latest">
          <li rel="left-one">
            <?php
            $sql = "select * from post ,useradmin,cate_news WHERE post.id_cate=cate_news.id and post.id_author=useradmin.id and cate_news.id='" . $id . "' order by id_p DESC limit 1";
            $query = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($query)) { ?>
              <a href="detailnews.php?id=<?= $row['id_p'] ?>" style="color: #333;">
                <div class="tempvideo">
                  <img width="100" height="70" src="../uploads/<?= $row['thumbnail']; ?>">
                </div>
                <h3 class="titlecom">
                  <?= $row['title']; ?>
                </h3>
                <figure>
                  <?= $row['shortt']; ?>
                </figure>
                <div class="timepost">
                  <div class="user-info">
                    <i class="fas fa-user"></i>
                    <span><?= $row['username']; ?></span>
                  </div>
                  <span><?= $row['update_at']; ?></span>
                </div>
              </a>
            <?php  } ?>

          </li>
          <li rel="right-one">
            <?php
            $sql = "select * from post ,useradmin,cate_news WHERE post.id_cate=cate_news.id and post.id_author=useradmin.id and cate_news.id='" . $id . "' order by id_p limit 1";
            $query = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($query)) { ?>
              <a href="detailnews.php?id=<?= $row['id_p'] ?>" style="color:#333">
                <div class="tempvideo">
                  <img width="300" height="150" src="../uploads/<?= $row['thumbnail']; ?>">
                </div>
                <h3 class="titlecom">
                  <?= $row['title']; ?>
                </h3>
                <div class="timepost">
                  <div class="user-info">
                    <i class="fas fa-user"></i>
                    <span><?= $row['username']; ?></span>
                  </div>
                  <span><?= $row['update_at']; ?></span>
                </div>
              </a>
            <?php } ?>
          </li>
          <li rel="top3-list">
            <?php
            $sql = "select * from post ,useradmin,cate_news WHERE post.id_cate=cate_news.id and post.id_author=useradmin.id and cate_news.id='" . $id . "' order by id_p limit 3";
            $query = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($query)) { ?>
              <a href="detailnews.php?id=<?= $row['id_p'] ?>" style="color:#333">
                <h3 class="titlecom" style="font-size: 16px;margin-top: -10px;"> <?= $row['title']; ?></h3>
                <div class="timepost">
                  <div class="user-info">
                    <i class="fas fa-user"></i>
                    <span><?= $row['username']; ?></span>
                  </div>
                  <span><?= $row['update_at']; ?></span>
                </div>
              </a>
            <?php } ?>
          </li>

        </ul>
        <ul class="newslist " id="mainlist">
          <li>
            <?php
            $rowperpage = 3;

            // counting total number of posts
            $allcount_query = "SELECT count(*) as allcount FROM post";
            $allcount_result = mysqli_query($connect, $allcount_query);
            $allcount_fetch = mysqli_fetch_array($allcount_result);
            $allcount = $allcount_fetch['allcount'];

            // select first 3 posts
            $query = "select * from post ,useradmin,cate_news WHERE post.id_cate=cate_news.id and post.id_author=useradmin.id and cate_news.id='" . $id . "' order by id_p asc limit 0,$rowperpage ";
            $result = mysqli_query($connect, $query);

            while ($row = mysqli_fetch_array($result)) {

              $id = $row['id_p'];
              $title = $row['title'];
              $thumbnail = $row['thumbnail'];
              $update = $row['update_at'];
            ?>
              <a href="detailnews.php?id=<?= $row['id_p'] ?>" style="color:#333">
                <div class="post" id="post_<?php echo $id; ?>">
                  <div class="tempvideo" style="float:left;margin-right: 15px;">
                    <img width="260" height="140" class=" lazyloaded" src="../uploads/<?= $thumbnail; ?>">
                  </div>
                  <h3 class="titlecom" style="margin-top:10px;">
                    <?= $title ?>
                  </h3>
                  <div class="timepost">
                    <span style="margin-left: 5px;"><?= $update ?></span>
                  </div>
                </div>

              </a>
            <?php } ?>

          </li>
          <h4 class="load-more">Xem them</h4>
          <input type="hidden" id="row" value="0">
          <input type="hidden" id="all" value="<?php echo $allcount; ?>">
        </ul>
      </aside>
      <aside class="rightcase">
        <div class="banner" style="margin-top: 60px;">
          <a href="#">
            <img style="cursor:pointer;margin-top: 15px;" class=" lazyloaded" alt="Mừng hết cách ngăn" width="380" height="215" src="https://cdn.tgdd.vn/2021/10/banner/380x215-380x215.png">
          </a>
        </div>
        <h3 class="titlehome">
          Chu de hot
          <a href="#" class="viewall-topics">xem tat ca chu de <i class="fas fa-chevron-right"></i></a>
        </h3>
        <ul class="hot-list" style="list-style:none">
          <li>
            <a href="#" target="_blank">* meo khong phai ai cung biet</a>
          </li>
          <li>
            <a href="#" target="_blank">* Iphone 13(Iphone nam 2021)</a>
          </li>
          <li>
            <a href="#" target="_blank">* The gioi dong ho</a>
          </li>
          <li>
            <a href="#" target="_blank">* The gioi dong ho</a>
          </li>
        </ul>
        <h3 class="titlehome">Binh luan nhieu</h3>
        <div class="summarycomment">
          <a href="">
            <div>1</div>
            <h3>
              Đánh giá Youtube Vanced mới nhất 2021: Xem Youtube tắt màn hình, chặn quảng cáo và còn nhiều chức năng xịn sò khác
            </h3>
          </a>
          <a href="">
            <div>2</div>
            <h3>
              Đánh giá Youtube Vanced mới nhất 2021: Xem Youtube tắt màn hình, chặn quảng cáo và còn nhiều chức năng xịn sò khác
            </h3>
          </a>
          <a href="">
            <div>3</div>
            <h3>
              Đánh giá Youtube Vanced mới nhất 2021: Xem Youtube tắt màn hình, chặn quảng cáo và còn nhiều chức năng xịn sò khác
            </h3>
          </a>
          <a href="">
            <div>4</div>
            <h3>
              Đánh giá Youtube Vanced mới nhất 2021: Xem Youtube tắt màn hình, chặn quảng cáo và còn nhiều chức năng xịn sò khác
            </h3>
          </a>
        </div>
        <a href="#" class="linkproduct" style="text-decoration:none;">bài viết sản phẩm mới</a>
        <ul class="newsproduct">
          <li>
            <a href="#">
              <img width="100" height="70" src="https://cdn.tgdd.vn/Products/Images/42/249427/xiaomi-11-lite-5g-ne-pink-600x600.jpg" class=" lazyloaded">
              <h3>Xiaomi 11 Lite 5G NE</h3>
              <p>8.990.000₫</p>
              <label>31 bài viết</label>
            </a>
          </li>
          <li>
            <a href="/tin-tuc/san-pham/vivo-v23e-245607">
              <img width="100" height="70" src="https://cdn.tgdd.vn/Products/Images/42/245607/vivo-v23e-400x400.jpg" class=" lazyloaded">
              <h3> Vivo V23e</h3>
              <p>Tin đồn</p>
              <label>5 bài viết</label>
            </a>
          </li>
          <li>
            <a href="/tin-tuc/san-pham/samsung-galaxy-s21-fe-233090">
              <img width="100" height="70" src="https://cdn.tgdd.vn/Products/Images/42/233090/samsung-galaxy-s21-fe-063121-113111-400x400.jpg" class=" lazyloaded">
              <h3>Samsung Galaxy S21 FE</h3>
              <p>Tin đồn</p>
              <label>43 bài viết</label>
            </a>
          </li>
          <li>
            <a href="/tin-tuc/san-pham/iphone-13-pro-max-230529">
              <img width="100" height="70" data-original="https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-graphite-600x600.jpg" src="https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-graphite-600x600.jpg" class=" lazyloaded">
              <h3>iPhone 13 Pro Max</h3>
              <p>33.990.000₫</p>
              <label>111 bài viết</label>
            </a>
          </li>
        </ul>
      </aside>

    </section>


  </div>
  <!-- Footer -->
  <?php
  include('footer.php');
  ?>
</body>

</html>