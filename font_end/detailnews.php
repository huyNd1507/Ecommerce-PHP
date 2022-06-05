<?php
session_start();
$id = $_GET['id'];

?>


!
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>dHienshop</title>
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/detailnews.css">

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

  <div class="container">
    <section>
      <article style="margin-top:70px">
        <?php
        $sql = "select * from post ,useradmin,cate_news WHERE post.id_cate=cate_news.id and post.id_author=useradmin.id and post.id_p='" . $id . "'";
        $query = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($query)) { ?>
          <h1 class="titledetail"><?= $row['title']; ?></h1>
          <div class="userdetail">
            <a href="#"><?= $row['username']; ?></a>
            <span><?= $row['update_at']; ?></span>
          </div>
          <!--         <div class="imgwrap">
            <img alt="Ưu đãi đến hơn 2 triệu đồng, sắm Apple Watch S6 ở TGDĐ quá tiết kiệm"  src="../uploads/<?= $row['thumbnail']; ?>" >

        </div> -->
          <div class="content">
            <?= $row['content']; ?>
          </div>
        <?php } ?>


        <h5 class="titlerelate">Bài viết liên quan</h5>
        <ul class="newsrelate">
          <?php
          $sql = "select * from post ,useradmin,cate_news WHERE post.id_cate=cate_news.id and post.id_author=useradmin.id limit 6";
          $query = mysqli_query($connect, $sql);
          while ($row = mysqli_fetch_assoc($query)) { ?>
            <li>
              <a href="detailnews.php?id=<?= $row['id_p'] ?>" class="linkimg">
                <div class="tempvideo">
                  <img width="100" src="../uploads/<?= $row['thumbnail']; ?>">
                </div>
                <h3><?= $row['title']; ?>
                </h3>
                <span class="timepost"><?= $row['update_at']; ?></span>
              </a>
            </li>
          <?php } ?>
        </ul>
      </article>
    </section>
  </div>
  <!-- Footer -->

  <?php
  include('footer.php');
  ?>
</body>

</html>