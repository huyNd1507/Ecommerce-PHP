<style>
    .name {
        margin-bottom: 0;
    }

    .sideber-menu:hover .name {
        text-decoration: none;
    }

    .sideber-menu {
        margin: 13px auto;
    }

    .sideber-menu span {
        min-width: 50px;
    }

    .profile,
    .log-out {
        height: 100%;
    }
    p
    {
        color: whitesmoke;
    }
</style>
<nav class="navbar">
    <h4 style="margin-left: 140px;"></h4>
    <div class="profile">
        <i class="far fa-user" style="margin-top: -30px;font-size:30px;margin-left:20px"></i>
        <?php
        if (isset($_SESSION['user'])) {
            echo ' <p style="color:white;">' . $_SESSION['user'] . '</p>';
        }
        ?>
    </div>
    <div class="log-out">
        <a href="../dangxuat.php">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
    </div>
</nav>
<input type="checkbox" id="toggle">
<label class="side-toggle" for="toggle">
    <span class="fas fa-bars"></span>
</label>
<!-- sidebar -->
<div class="sidebar">
    <div class="sideber-menu">
        <span class="fab fa-blackberry"></span>
        <a href="../category">
            <p>Danh mục sản phẩm</p>
        </a>
    </div>
    <div class="sideber-menu">
        <span class="far fa-list-alt"></span>
        <a href="../cate_news">
            <p>Danh mục bài viết</p>
        </a>
    </div>
    <div class="sideber-menu">
        <span class="far fa-newspaper"></span>
        <a href="../news/">
            <p> Bài viết</p>
        </a>
    </div>
    <div class="sideber-menu">
        <span class="fab fa-product-hunt"></span>
        <a href="../home.php?page_layout=list_product">
            <p>Sản phẩm</p>
        </a>
    </div>

    <div class="sideber-menu">
        <span class="fas fa-headphones-alt"></span>
        <a href="../contact">
            <p>Liên hệ</p>
        </a>
    </div>
    <div class="sideber-menu">
        <span class="fas fa-shuttle-van"></span>
        <a href="../order">
            <p>Đơn hàng</p>
        </a>
    </div>
    <div class="sideber-menu">
        <span class="far fa-user"></span>
        <a href="../User-admin">
            <p>Thành viên</p>
        </a>
    </div>
</div>