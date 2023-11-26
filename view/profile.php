<section class="contain">
  <section class="left">
  <section class="box1">
      <section class="titlen">
        <strong>TÀI KHOẢN</strong>
      </section>
      <section class="conten">
      <div class="a">
        <img src="../img/user.jpg" alt="" width="100px" height ="100px">
        <h4><?php echo $acc ?></h4>
        </div>
        <?php if($user['vai_tro']=="admin") : ?>
        <li><a href="admin/index.php">Đăng nhập admin</a></li>
        <?php endif ?>
        <li><a href="index.php?act=profile&pro=thongtin">Thông tin tài khoản</a></li>
        <li><a href="index.php?act=profile&pro=lsmh">Lịch sử mua hàng</a></li>
        <li><a href="index.php?act=profile&pro=repass">Đổi mật khẩu</a></li>
        <li><a href="model/logout.php">Đăng xuất</a></li>
      </section>
      </section>
  </section> 
  <section class="right">
  <div id="repass" >
<?php include "sanpham/menu.php" ?>
</div>
  </section>
  </section>
