<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI KHÁCH HÀNG</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=addkh" method="POST">
           <div class="row2 mb10">
            <label>Tài khoản</label> 
            <input class="row2 mb10" type="text" name="acc" placeholder="nhập vào tài khoản">
           </div>
           <div class="row2 mb10">
           <label>Mật khẩu</label> <br>
            <input class="row2 mb10" type="text" name="pass" placeholder="nhập vào mật khẩu">
           </div>
           <div class="row2 mb10">
            <label>Số điện thoại</label> <br>
            <input class="row2 mb10" type="text" name="phone" placeholder="nhập vào số điện thoại">
           </div>
           <div class="row2 mb10">
            <label>Email</label> <br>
            <input class="row2 mb10" type="text" name="email" placeholder="nhập vào email">
           </div>
           <div class="row mb10 ">
         <input name="themmoi" class="mr20" type="submit" value="THÊM MỚI">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listkh"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
         <?php
        if(isset($thongbao) && $thongbao!="") echo $thongbao;      
         ?>
        </div>