<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI DANH MỤC</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=adddm" method="POST">
           <div class="row2 mb10">
            <label>Tên danh mục </label> <br>
            <input class="row2 mb10" type="text" name="tenloai" placeholder="nhập vào tên danh mục">
           </div>
           <div class="row mb10 ">
         <input name="themmoi" class="mr20" type="submit" value="THÊM MỚI">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listdm"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
         <?php
        if(isset($thongbao) && $thongbao!="") echo $thongbao;      
         ?>
        </div>