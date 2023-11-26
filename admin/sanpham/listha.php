<div class="name">
          <h1><?php echo $sp['ten_sp'] ?></h1>
         </div>
<?php foreach($mau as $ms): ?>
    <div class="row2">
         <div class="row2 font_title">
          <h2><?php echo $ms['ten_mau']?></h2>
         </div>
         <div class="row2 form_content">
           <div class="row2 mb10 formds_loai">
           <table>
               <tr>
               <th>HÌNH ẢNH</th>
               <th></th>
               <th></th>
               </tr>
                  <?php
                     $ha = loadha($ms['ma_ms']);
                  ?>
                                        <?php if(count($ha)<=0){echo "Chưa có hình ảnh";}else{
                        echo "";
                      } ?>
                 <?php foreach ($ha as $key => $value):?>
                    <form action="" method="post" enctype="multipart/form-data">
                  <tr>
                  <td>
                     <img src="../uploads/<?php echo $value['hinh'] ?>" alt="" width="100px"> 
                  </td>
                  <td>
                    <input type="file" name="img" id="">
                    <input type="hidden" name="maha" value="<?php echo $value['ma_ha'] ?>">
                  </td>
                  <td>
                  <button type="submit">Đổi ảnh</button>
                  <a href="index.php?act=xoaha&id=<?php echo $value['ma_ha'] ?>&idd=<?php echo $id?>"><button type="button">Xóa ảnh</button></a>
                  </td>
                  </tr>
                  </form>
                  <?php endforeach ?>
            </table>
            <a href="index.php?act=addha&id=<?php echo $ms['ma_ms'] ?>"><button type="button">Thêm ảnh</button></a>
           </div>
         </div>
<?php endforeach ?>
<a href="index.php?act=addsl&id=<?php echo $id ?>"><button type="button">Nhập số lượng</button></a>
<a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>