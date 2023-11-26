<?php require "../model/pdo.php" ?>
<?php require "../model/select.php" ?>
<?php require "../model/update.php" ?>
<?php require "../model/kiemsoat.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=2,shrink-to-fit=no">
    <title>DTA SHOP</title>
    <link rel="stylesheet" href="../css/tk.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/all.css">
</head>
<body>
<?php
        $user=loaduser($acc);
   ?>

  <section class="container">
   <header>
      <div class="icon">
      <a href="../index.php"><img src="../img/logodta.png" alt="DTA SHOP"></a>
      </div>
      <nav class="nav">
        <ul>
          <li><a href="../index.php">Trang chủ</a></li>
          <li><a href="../index.php?act=gt">Giới thiệu</a></li>
          <li><a href="../index.php?act=lh">Liên hệ</a></li>
          <li><a href="../index.php?act=gy">Góp ý</a></li>
          <li><a href="../index.php?act=hd">Hỏi đáp</a></li>
        </ul>
        <a href="cart.php" class="i"><i class="fa-solid fa-cart-shopping" title="Giỏ hàng"></i></a>
      </nav>

   </header>
  <section class="contai">
  <section class="left">
  <section class="box1">
      <section class="title">
        <h3>TÀI KHOẢN</h3>
      </section>
      <section class="conten">
      <div class="a">
        <img src="../img/user.jpg" alt="" width="100px" height ="100px">
        <h4><?php echo $acc ?></h4>
        </div>
        <?php if($user['vaitro']=="admin") : ?>
        <li><a href="../admin/index.php">Đăng nhập admin</a></li>
        <?php endif ?>
        <li><a href="taikhoan.php?act=thongtin">Thông tin tài khoản</a></li>
        <li><a href="taikhoan.php?act=lsmh">Lịch sử mua hàng</a></li>
        <li><a href="taikhoan.php?act=repass">Đổi mật khẩu</a></li>
        <li><a href="../view/dangky.php?act=quenmk">Quên mật khẩu</a></li>
        <li><a href="../model/logout.php">Đăng xuất</a></li>
      </section>
      </section>
  </section> 
  <section class="right">
  <div id="repass" >
<?php include "sanpham/menu.php" ?>
</div>
  </section>
  </section>

   <footer>
   <div id="tt">
        <a href="#">Chính Sách Về Quyền Riêng Tư</a>
        <a href="#">Điều Khoản Dịch Vụ</a>
        <a href="#">Giới Thiệu Công Ty</a>
        <a href="#">Liên Hệ Chúng Tôi</a>
      </div>
      Copyright
      <i class="fa-regular fa-copyright"></i>
      COGNOSPHERE. All Right Reserved.
    
   </footer>
  </section>
</body>
<script src="../js/main.js"></script>
</html>

