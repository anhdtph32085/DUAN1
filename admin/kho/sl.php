<div class="row2 font_title">
          <h2>Số lượng</h2>
         </div>
         <div class="row2 form_content ">
          <form action="" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
               <tr>
               <th>MÀU</th>
               <th>SIZE</th>
               <th>SỐ LƯỢNG</th>
               </tr>
               <?php foreach($sl as $ro): ?>
                  <tr>
                  <td><?php echo $ro['ten_ms'] ?></td>
                  <td><?php echo $ro['ten_kt'] ?></td>
                  <td>
                     <input type="number" name="number[]" value="<?php echo $ro['so_luong'] ?>">
                     <input type="hidden" name="masl[]" value="<?php echo $ro['ma_sl'] ?>">
                  </td>
                  </tr>
               <?php endforeach ?>
            </table>
           </div>
           <div class="row mb10 ">
           <button class="mr20" type="submit">Cập nhật</button>
           </div>
          </form>
         </div>
        </div>

