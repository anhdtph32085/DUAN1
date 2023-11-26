<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI KHÁCH HÀNG</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=updatekh" method="POST">
           <div class="row2 mb10">
            <label>Tài khoản</label> <br>
            <input class="row2 mb10" type="text" placeholder="nhập vào tài khoản" value="<?php echo $kh['tai_khoan'] ?>" disabled>
           </div>
           <div class="row2 mb10">
            <label>Họ tên</label> <br>
            <input class="row2 mb10" type="text" placeholder="nhập vào họ tên" value="<?php echo $kh['ho_ten'] ?>" >
           </div>
           <div class="row2 mb10">
           <label>Mật khẩu</label> <br>
            <input class="row2 mb10" type="text" name="pass" placeholder="nhập vào mật khẩu" value="<?php echo $kh['mat_khau'] ?>">
           </div>
           <div class="row2 mb10">
            <label>Số điện thoại</label> <br>
            <input class="row2 mb10" type="text" name="phone" placeholder="nhập vào số điện thoại" value="<?php echo $kh['so_dt'] ?>">
           </div>
           <div class="row2 mb10">
            <label>Email</label> <br>
            <input class="row2 mb10" type="text" name="email" placeholder="nhập vào email" value="<?php echo $kh['email'] ?>">
           </div>
           <div class="row2 mb10">
            <label>Địa chỉ</label> <br>
            <input class="row2 mb10" type="text" name="address" placeholder="nhập vào địa chỉ" value="<?php echo $kh['dia_chi'] ?>">
           </div>
           <div class="row2 mb10">
            <label>Vai trò</label> <br>
            <input class="row2 mb10" type="text" name="role" placeholder="" value="<?php echo $kh['vai_tro'] ?>">
           </div>
           <div class="row mb10 ">
           <input type="hidden" name="id" value="<?php echo $kh['ma_kh'] ?>">
           <input type="hidden" name="acc" value="<?php echo $kh['tai_khoan'] ?>">
         <input name="capnhat" class="mr20" type="submit" value="Cập Nhật">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listkh"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
         <?php
        if(isset($thongbao) && $thongbao!="") echo $thongbao;      
         ?>
        </div>