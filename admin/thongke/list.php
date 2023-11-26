<div class="row2">
         <div class="row2 font_title">
          <h1>THỐNG KÊ</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
      <form  action="" method="post">
            <table>
               <tr>
               <th>MÃ DANH MỤC</th>
               <th>DANH MỤC</th>
               <th>SỐ LƯỢNG</th>
               <th>GIÁ THẤP NHẤT</th>
               <th>GIÁ CAO NHẤT</th>
               <th>GIÁ TRUNG BÌNH</th>
               </tr>
               <?php foreach($listtkdm as $row): ?>
                  <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['danhmuc'] ?></td>
                  <td><?php echo $row['countsp'] ?></td>
                  <td><?php echo $row['mingia'] ?></td>
                  <td><?php echo $row['maxgia'] ?></td>
                  <td><?php echo $row['tb'] ?></td>
                  </tr>
               <?php endforeach ?>
            </table>
            <div class="row mb10">
<a href="index.php?act=bieudodm"> <input  class="mr20" type="button" value="BIỂU ĐỒ"></a>
           </div>
        </form>
           </div>
 