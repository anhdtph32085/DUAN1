<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI VOUCHER</h1>
         </div>
         <div class="row2 form_content ">
          <form action="" method="POST">
           <div class="row2 mb10">
            <label>Tên voucher</label> <br>
            <input class="row2 mb10" type="text" name="namevc" placeholder="nhập vào voucher" value="<?php echo $vc['name_vc'] ?>">
           </div>
           <div class="row2 mb10">
            <label>Giá trị voucher</label> <br>
            <input class="row2 mb10" type="number" name="gtvc" placeholder="nhập vào giá trị" value="<?php echo $vc['gt_vc'] ?>">
           </div>
           <div class="row2 mb10">
            <label>Ngày bắt đầu</label> <br>
            <input class="row2 mb10" type="date" name="datebd" placeholder="nhập vào giá trị" value="<?php echo $vc['ngay_bd'] ?>">
           </div>
           <div class="row2 mb10">
            <label>Ngày kết thúc</label> <br>
            <input class="row2 mb10" type="date" name="datekt" placeholder="nhập vào giá trị" value="<?php echo $vc['ngay_kt'] ?>">
           </div>
           <div class="row2 mb10">
            <label>Loại voucher </label> <br>
            <select name="voucher" id="">
                <option value="phần trăm" <?php if($vc['loai_km']=="phần trăm") echo "selected" ?>>Phần trăm</option>
                <option value="fixed money" <?php if($vc['loai_km']=="fixed money") echo "selected" ?>>Fixed money</option>
            </select>
           </div>
           <div class="row mb10 ">
         <input type="hidden" name="id" value="<?php echo $vc['ma_vc'] ?>">
         <input name="capnhat" class="mr20" type="submit" value="Cập Nhật">
         <input  class="mr20" type="reset" value="NHẬP LẠI">
         <a href="index.php?act=listvc"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
         <?php
        if(isset($thongbao) && $thongbao!="") echo $thongbao;      
         ?>
        </div>