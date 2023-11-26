<?php
         if(!isset($_GET['page'])){
            $page = 1;
          }else{
            $page = $_GET['page'];
          }
           $bd = ($page-1)*8;
           $kt = $bd + 8;
           $sql = "select * from voucher limit $bd,$kt";
           $vc = pdo_query($sql);
  
?>
<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH VOUCHER</h1>
         </div>
         <div class="row2 form_content ">
          <form action="" method="POST">
           <div class="row2 mb10 formds_loai">
            <table>
               <tr>
               <th>VOUCHER</th>
               <th>LOẠI VOUCHER</th>
               <th>GIÁ TRỊ</th>
               <th>NGÀY BẮT ĐẦU</th>
               <th>NGÀY KẾT THÚC</th>
               <th></th>
               </tr>
               <?php foreach($vc as $row): ?>
                  <tr>
                  <td><?php echo $row['name_vc'] ?></td>
                  <td><?php echo $row['loai_km'] ?></td>
                  <td><?php echo $row['gt_vc'] ?></td>
                  <td><?php echo $row['ngay_bd'] ?></td>
                  <td><?php echo $row['ngay_kt'] ?></td>
                  <td>
                  <a href="index.php?act=suavc&id=<?php echo $row['ma_vc'] ?>"><button type="button">Sửa</button></a>
                     <a href="index.php?act=xoavc&id=<?php echo $row['ma_vc'] ?>"><button type="button">Xóa</button></a>
                  </td>
                  </tr>
               <?php endforeach ?>
            </table>
            </div>
           <div class="row mb10 ">
           <a href="index.php?act=voucher"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           <div class="pagination">
            <?php for($i=1;$i<=ceil(count($listvc)/8);$i++): ?>
            <a href="index.php?act=listvc&page=<?php echo $i?>" class="<?php if($i == $page) echo "active"?>"><?php echo $i?></a>
            <?php endfor ?>
            </div>   
           </div>
          </form>
         </div>
        </div>
