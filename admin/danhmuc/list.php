
        <div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH DANH MỤC</h1>
         </div>
         <div class="row2 form_content ">
          <form action="" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th>TRẠNG THÁI</th>
                <th></th>
            </tr>
            
                <?php foreach($listdm as $danhmuc): ?>
                    <tr>
                <td><?php echo $danhmuc['ma_dm'] ?></td>
                <td><?php echo $danhmuc['ten_dm'] ?></td>
                <td><?php echo $danhmuc['trang_thai'] ?></td>
                <td><a href="index.php?act=suadm&id=<?php echo $danhmuc['ma_dm']?>"><input type="button" value="Sửa"></a>   <a href="index.php?act=xoadm&id=<?php echo $danhmuc['ma_dm']?>"><input type="button" value="Xóa"></td></a>
                </tr>
                <?php endforeach ?>
                
            
           </table>
           </div>
           <div class="row mb10 ">
<a href="index.php?act=adddm"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>

