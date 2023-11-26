<div class="row2">
         <div class="row2 font_title">
          <h1>CẬP NHẬT HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
          <div class="row2 mb10 form_content_container">
            <div class="row2 mb10">
                <label for="">Tên hàng hóa:</label>
                <br>
                <input class="row2 mb10" type="text" placeholder="" name="tenhh" value="<?php echo $sp['ten_sp']?>">
            </div>  
            <div class="row2 mb10">
                <label for="">Giá cũ:</label>
                <br>
                <input class="row2 mb10" type="number" placeholder="" name="gia" min ="0" value="<?php echo $sp['don_gia']?>">
            </div> 
            <div class="row2 mb10">
                <label for="">Giá mới:</label>
                <br>
                <input class="row2 mb10" type="number" placeholder="" name="giamgia" value="<?php echo $sp['giam_gia']?>">
            </div> 
            <div class="row2 mb10">
                <label for="">Hình ảnh:</label> <br>
                <img class="mb10 " src="../uploads/<?php echo $sp['hinh_anh'] ?>" alt="" width="100px">
                <br>
                <input class="row2 mb10"  type="file" placeholder="" name="hinh">
            </div> 
            <div class="row2 mb10">
                <label for="">Danh mục:</label>
                <br>
                <select class="mb10 checkb" name="lhang" id=""  >
                    <?php foreach($listdm as $row) : ?>
                        <option value="<?php echo $row['ma_dm']?>" <?php if($row['ma_dm']==$sp['ma_dm']) echo "selected" ?>><?php echo $row['ten_dm']?></option>
                    <?php endforeach ?>
                </select>
            </div> 
            <div class="row2 mb10">
                <label for="">Mô tả:</label>
                <br>
                <textarea class="row2 mb10"  name="mota" id="" cols="40" rows="10"><?php echo $sp['mo_ta']?></textarea>
            </div> 
           <div class="row mb10 ">
            <input type="hidden" name="id" value="<?php echo $sp['ma_sp'] ?>">
         <input name="capnhat" class="mr20" type="submit" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
         <?php
        if(isset($thongbao) && $thongbao!="") echo $thongbao;      
         ?>
        </div>