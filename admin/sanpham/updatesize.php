
<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH SIZE</h1>
         </div>
         <div class="row2 form_content ">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th>TÊN KÍCH THƯỚC</th>
                <th></th>
            </tr>
            
                <?php foreach($listkt as $kt): ?>
                    <tr>

                <td><?php echo $kt['ten_kt'] ?></td>
                <td>  <a href="index.php?act=xoadm&id=<?php echo $ktc['ma_kt']?>"><input type="button" value="Xóa"></td></a>
                </tr>
                <?php endforeach ?>
                
            
           </table>
           </div>
           
           <div class="row mb10 ">
           <form action="" method="POST">
           <a href="index.php?act=adddm"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </form>
           </div>
          
         </div>
        </div>

