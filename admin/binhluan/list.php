<?php
         if(!isset($_GET['page'])){
            $page = 1;
          }else{
            $page = $_GET['page'];
          }
           $bd = ($page-1)*8;
           $kt = $bd + 8;
           $sql = "select * from binh_luan limit $bd,$kt";
           $bl = pdo_query($sql);
  
?>
<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH BÌNH LUẬN</h1>
         </div>
         <div class="row2 form_content ">
          <form action="" method="POST">
           <div class="row2 mb10 formds_loai">
            <table>
               <tr>
               <th>TÀI KHOẢN</th>
               <th>SẢN PHẨM</th>
               <th>BÌNH LUẬN</th>
               <th>NGÀY BÌNH LUẬN</th>
               <th></th>
               </tr>
               <?php foreach($bl as $row): ?>
                <?php
                   $sp=loadsp($row['ma_sp']);
                   $kh = loadtt($row['ma_kh'])
                ?>
                  <tr>
                  <td><?php echo $kh['tai_khoan'] ?></td>
                  <td><?php echo $sp['ten_sp'] ?></td>
                  <td><?php echo $row['noi_dung'] ?></td>
                  <td><?php echo $row['ngay_bl'] ?></td>
                  <td>
                     <a href="index.php?act=xoabl&id=<?php echo $row['ma_bl'] ?>"><button type="button">Xóa</button></a>
                  </td>
                  </tr>
               <?php endforeach ?>
            </table>
            </div>
           <div class="row mb10 ">
         <div class="pagination">
   <?php for($i=1;$i<=ceil(count($listbl)/8);$i++): ?>
   <a href="index.php?act=listbl&page=<?php echo $i?>" class="<?php if($i == $page) echo "active"?>"><?php echo $i?></a>
   <?php endfor ?>
   </div>
           </div>
          </form>
         </div>
        </div>

 