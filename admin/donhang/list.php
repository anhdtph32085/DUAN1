<?php
         if(!isset($_GET['page'])){
            $page = 1;
          }else{
            $page = $_GET['page'];
          }
           $bd = ($page-1)*8;
           $kt = $bd + 8;
           $sql = "select * from don_hang limit $bd,$kt";
           $dh = pdo_query($sql);
  
?>
<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH ĐƠN HÀNG</h1>
         </div>
      <section class="row2 form_content">
      <form  action="" method="post" >
        <div class="row2 mb10 formds_loai">
      <table>
        <tr>
        <th>Mã</th>
        <th>Tài khoản</th>
        <th>Người Nhận</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Ngày đặt mua</th>
        <th>Trạng thái</th>
        <th></th>
        </tr>
        <?php foreach($dh as $row): ?>
            <tr>
                <td><?php echo $row['ma_dh']?></td>
                <td><?php echo $row['tai_khoan']?></td>
                <td><?php echo $row['nguoi_nhan']?></td>
                <td><?php echo $row['so_dt']?></td>
                <td><?php echo $row['dia_chi']?></td>
                <td><?php echo $row['ngay_tao']?></td>
                <td><?php echo $row['trang_thai']?></td>
                <td><a href="index.php?act=huydh&id=<?php echo $row['ma_dh']?>"><button type="button" <?php if($row['trang_thai']=="hủy") echo "disabled" ?>>Hủy đơn hàng</button></a></td>
            </tr>
        <?php endforeach ?>
       </table>
       </div>
           <div>
           <div class="pagination">
   <?php for($i=1;$i<=ceil(count($listdh)/8);$i++): ?>
   <a href="index.php?act=listdh&page=<?php echo $i?>" class="<?php if($i == $page) echo "active"?>"><?php echo $i?></a>
   <?php endfor ?>
   </div>
           </div>
           </div>
        </form>
      </section>
        </div>
  