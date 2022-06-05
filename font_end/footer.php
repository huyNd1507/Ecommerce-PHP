<footer class="page-footer font-small blue-grey lighten-5" style="background-color:white">

  <div style="background-color: #110bbd;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <!-- <h6 style="color: #fff; text-transform:uppercase ;font-size: 30px;" class="mb-0">dHienshop</h6> -->
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a href="#" class="fb-ic">
            <i style="color: #fff;" class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a href="#" class="tw-ic">
            <i style="color: #fff;" class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a href="#" class="gplus-ic">
            <i style="color: #fff;" class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i style="color: #fff;" class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a href="#" class="ins-ic">
            <i style="color: #fff;" class="fab fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3 dark-grey-text">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

        <!-- Content -->
        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Hỗ Trợ Khách Hàng</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">Mua hàng và thanh toán online</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Tra thông tin đơn hàng </a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Tra thông tin bảo hành</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Trung tâm bảo hành chính hãng</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Sản Phẩm</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <?php
        $sql = "SELECT * FROM categroy";
        $result = executeResult($sql);
        foreach ($result as $items) {
          echo '
                  <p>
                    <a class="dark-grey-text" href="danhmuc.php?id=' . $items['id_cate'] . '">' . $items['name'] . '</a>
                  </p>
              ';
        }
        ?>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Thông Tin Khác</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">Quy chế hoạt động</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Chính sách bảo hành</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Tuyển dụng</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Ưu đãi từ đối tác</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Liên Hệ</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i>235 Hoàng Quốc Việt, Cầu Giấy, Hà Nội
        </p>
        <p>
          <i class="fas fa-envelope mr-3"></i>hienthinhhuy@gmail.com
        </p>
        <p>
          <i class="fas fa-phone mr-3"></i>01234567893
        </p>
        <p>
          <i class="fas fa-print mr-3"></i> + 01 234 567 89
        </p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center text-black-50 py-3">© 2021 Copyright:
    <a class="dark-grey-text" href="index.html">HTHshop.vn</a>
  </div>
  <!-- Copyright -->

</footer>