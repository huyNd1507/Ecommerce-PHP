<?php
session_start();
require_once '../config/db.php';

if (isset($_POST['register'])) {
  $fullname = '';
  $email = '';
  $phonenumber = '';
  $product = '';
  $note = '';
  if (isset($_POST['fullname']) && isset($_POST['email']) && $_POST['phonenumber'] && isset($_POST['product'])) {
    $fullname = $_POST['fullname'];
    $phonenumber = $_POST['phonenumber'];
    $note = $_POST['note'];
    $product = $_POST['product'];
    $email = $_POST['email'];
  }
  $created_at = $updated_at = date('Y-m-d H:s:i');
  $sql = "INSERT INTO contact (fullname, email, note, phoneNumber, product, created_at) VALUES ('$fullname','$email','$note','$phonenumber','$product' ,'$created_at')";
  $result = execute($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liên hệ</title>
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/contact.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- header-start -->

  <?php
  include 'header.php';
  ?>
  <!-- header-end -->

  <div class="container-contact">
    <div class="content-contact">
      <h2>Nhóm 18</h2>
    </div>
    <div class="list-icon">
      <img src="../img/logone.svg" alt="">
      <ul>
        <li>
          <div class="icon">
            <i class="fas fa-user-tie"></i>
          </div>
          <span>Nguyễn Duy Hiển</span>
        </li>
        <li>
          <div class="icon">
            <i class="fas fa-user-tie"></i>
          </div>
          <span>Trần Văn Thịnh</span>
        </li>
        <li>
          <div class="icon">
            <i class="fas fa-user-tie"></i>
          </div>
          <span>Trần Quang Huy</span>
        </li>
      </ul>
    </div>


    <form class="form-card" method="post">
      <fieldset class="form-fieldset">
        <legend class="form-legend">Liên hệ với chúng tôi</legend>
        <div class="form-element form-input">
          <input id="input-name" class="form-element-field" placeholder="Vui lòng nhập đầy đủ họ tên" type="input" required name="fullname" />
          <div class="form-element-bar"></div>
          <label class="form-element-label" for="input-name">Họ và tên</label>
        </div>
        <div class="form-element form-input">
          <input id="email" class="form-element-field" placeholder=" " name="email" type="email" required />
          <div class="form-element-bar"></div>
          <label class="form-element-label" for="email">Email</label>
        </div>
        <div class="form-element form-input">
          <input id="phone" class="form-element-field" placeholder=" " name="phonenumber" type="text" required />
          <div class=" form-element-bar">
          </div>
          <label class="form-element-label" for="phone">Số điện thoại</label>
        </div>

        <div class="form-element form-select">
          <select id="selected" class="form-element-field" name="product">
            <?php
            $sql = 'Select * from categroy ';
            $result = executeResult($sql);
            foreach ($result as $items) {
              echo '<option value="' . $items["id_cate"] . '">' . $items['name'] . '</option>';
            }
            ?>
          </select>
          <div class="form-element-bar"></div>
          <label class="form-element-label" for="selected">Sản phẩm bạn đang quan tâm là gì nào </label>
        </div>

        <div class="form-element form-textarea">
          <textarea id="note" class="form-element-field" placeholder=" " name="note" cols="40" rows="5"></textarea>
          <div class="form-element-bar"></div>
          <label class="form-element-label" for="note">Ghi chú cho chúng tôi</label>

        </div>
      </fieldset>
      <div class="form-actions">
        <button class="form-btn" type="submit" name="register">Gửi</button>
        <button class="form-btn-cancel -nooutline" type="reset">Huỷ</button>
      </div>
    </form>

  </div>

</body>

</html>



<?php
include 'footer.php'
?>

<script>
  function validateForm() {
    var check = /^(()?\d{3}())?(-|\s)?\d{3}(-|\s)?\d{4}$/;
    let x = document.forms["myForm"]["phonenumber"].value;
    if (x == "") {
      alert("Vui lòng nhập số điện thoại!");
      return false;
    } else if (isNaN(x) || x < 0 || x > 10) {
      alert('Không đúng định dạng số điện thoại');
      return false;
    }

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value)) {
      return (true)
    } else {

      alert("You have entered an invalid email address!")
      return (false)
    }

  }
</script>