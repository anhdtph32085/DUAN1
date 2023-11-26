<div class="row2">
         <div class="row2 font_title">
          <h1>CẬP NHẬT HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=updatedm" method="POST">
           <div class="row2 mb10 form_content_container">
           <label> Mã loại </label> <br>
            <input class="row2 mb10" type="text" name="maloai" placeholder="auto number"  >
           </div>
           <div class="row2 mb10">
            <label>Tên loại </label> <br>
            <input class="row2 mb10" type="text" name="tenloai" placeholder="nhập vào tên" value="<?php echo $dm['ten_dm'] ?>">
           </div>
           <div class="row2 mb10">
            <label>Trạng thái </label> <br>
            <select name="tt" id="" >
              <option value="ẩn" <?php if($dm['trang_thai'] == "ẩn") echo "selected" ?>>ẩn</option>
              <option value="hiện" <?php if($dm['trang_thai'] == "hiện") echo "selected" ?>>hiện</option>
            </select>
           </div>
           <div class="row mb10 ">
            <input type="hidden" name="id" value="<?php echo $dm['ma_dm'] ?>">
         <input name="capnhat" class="mr20" type="submit" value="Cập Nhật">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listdm"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
         <?php
        if(isset($thongbao) && $thongbao!="") echo $thongbao;      
         ?>
        </div>