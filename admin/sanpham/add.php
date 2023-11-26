<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI SẢN PHẨM</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10">
                <label for="">Tên sản phẩm:</label>
                <br>
                <input class="row2 mb10" type="text" placeholder="Nhập vào tên sản phẩm" name="tenhh">
            </div>  
            <div class="row2 mb10">
                <label for="">Giá cũ:</label>
                <br>
                <input class="row2 mb10" type="text" placeholder="Nhập vào giá" name="gia" min ="0" >
            </div> 
            <div class="row2 mb10">
                <label for="">Giá mới:</label>
                <br>
                <input class="row2 mb10" type="text" placeholder="Nhập giảm giá" name="giamgia" min ="0" value="0">
            </div>
            <div class="row2 mb10">
                <label for="">Hình ảnh:</label>
                <br>
                <input class="row2 mb10" type="file" name="hinh" >
            </div>
            <div class="row2 mb10">
                <label for="">Size:</label>
                <br>
                <div class="checkb">
                <input class="" type="checkbox"  name="size[]" value="S"> <br>
                S
                </div>
                <div class="checkb">
                <input class="" type="checkbox"  name="size[]" value="M"> <br>
                M
                </div>
                <div class="checkb">
                <input class="" type="checkbox"  name="size[]" value="L"> <br>
                L
                </div>
                <div class="checkb">
                <input class="" type="checkbox"  name="size[]" value="XL"> <br>
                XL
                </div>
            </div>
            <div class="row2 mb10">
                <label for="">Màu:</label>
                <br>
                <div class="checkb mb10">
                <input class="" type="checkbox"  name="mau[]" value="Trắng"> <br>
                Trắng 
                </div>
                <div class="checkb">
                <input class="" type="checkbox"  name="mau[]" value="Đen"> <br>
                Đen
                </div>
                <div class="checkb">
                <input class="" type="checkbox"  name="mau[]" value="Xám"> <br>
                Xám
                </div>
                <div class="checkb">
                <input class="" type="checkbox"  name="mau[]" value="Xanh"> <br>
                Xanh
                </div>
                <div class="checkb">
                <input class="" type="checkbox"  name="mau[]" value="Tím"> <br>
                Tím
                </div>
                <div class="checkb">
                <input class="" type="checkbox"  name="mau[]" value="Lục"> <br>
                Lục
                </div>
            <div class="row2 mb10">
                <label for="">Danh mục:</label>
                <br>
                <select class="mb10 checkb" name="lhang" id="">
                  <option value="0">chọn danh mục</option>
                  <?php foreach($listdm as $dm) :?>
                    <option value="<?php echo $dm['ma_dm'] ?>"><?php echo $dm['ten_dm'] ?></option>
                  <?php endforeach ?>
                </select>
            </div> 
            <div class="row2 mb10">
                <label for="">Mô tả:</label>
                <br>
                <textarea class="row2 mb10" name="mota" id="" cols="40" rows="10"></textarea>
            </div> 
           <div class="row mb10 ">
         <input name="themmoi" class="mr20" type="submit" value="THÊM MỚI">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
          </form>
         </div>
         <?php
        if(isset($thongbao) && $thongbao!="") echo $thongbao;      
         ?>
        </div>