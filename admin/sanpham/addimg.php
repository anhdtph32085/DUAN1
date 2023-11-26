<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM HÌNH ẢNH </h1>
         </div>
         <div class="row2 form_content ">
          <form action="" method="POST" enctype="multipart/form-data">
           <div class="row2 mb10 form_content_container">
           
           <label> <?php echo $ms['ten_mau'] ?> </label> <br>
           </div>
           <div class="row2 mb10">
            <label>Ảnh đại diện: </label> <br>
            <input type="file" name="img" class="row2 mb10" >
           </div>
            <div class="row2 mb10">
            <label>Ảnh chi tiết: </label> <br>
            <input type="file" name="imgs[]" multiple class="row2 mb10">
            <input type="hidden" name="ma" value="<?php echo $ms['ma_ms'] ?>" >
           </div>
          <hr>
           <div class="row mb10 ">
         <input name="addimg" class="mr20" type="submit" value="THÊM HÌNH ẢNH">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listdm"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
         <?php
        if(isset($thongbao) && $thongbao!="") echo $thongbao;      
         ?>
        </div>


