
<?php if((isset($_GET['pro']) && $_GET['pro'] == "thongtin") || !isset($_GET['pro'])): ?>
    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(!empty($_POST['email'])&&!empty($_POST['phone'])){
         $name = check($_POST['name']);
         $diachi = check($_POST['diachi']);
         $email = check($_POST['email']);
         $phone = check($_POST['phone']);
         updateuser($acc,$name,$email,$phone,$diachi);
         header("location:index.php?act=profile");
        }
     }
   ?>
 <form action="" method="post" class="signs">
     <h2>Thông tin tài khoản</h2>
     <div>
                <label for="">Họ và tên</label>
               <br>
                <input name="name" class="formn" type="text" placeholder="Họ và tên" value="<?php echo $user['ho_ten']?>">
            </div>
            <div>
                <label for="">Số điện thoại</label>
                <br>
                <input name="phone" class="formn" type="tel" pattern="[0][9,8,3,7]{1}[0-9]{8}" placeholder="Số điện thoại" value="<?php echo $user['so_dt']?>">
            </div>
            <div>
                <label for="">Email</label>
                <br>
                <input class="formn" type="email" name="email" id="" placeholder="Email" value="<?php echo $user['email']?>">
            </div>
            <div>
                <label for="">Địa chỉ</label>
      <br>
                <input class="formn" type="text" name="diachi" id="" placeholder="Địa chỉ" value="<?php echo $user['dia_chi']?>">
            </div>
            <div class="">
            <button type="submit" class="siupn">Lưu thay đổi</button>
            </div>            
     </form>
 <?php endif ?>
 <?php if(isset($_GET['pro']) && $_GET['pro'] == "repass"): ?>
    <?php 
     $er = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      if($_POST['old']!=$user['mat_khau']){
        $er = "Nhập sai mật khẩu";
      }else if($_POST['new']!=$_POST['renew']){
        $er = "Mật khẩu mới không khớp";
      }else 
       if(!empty($_POST['old'])&& !empty($_POST['new'])&&!empty($_POST['renew'])){
        $new = check($_POST['new']);
        $sql = "UPDATE khach_hang SET mat_khau='$new' WHERE tai_khoan = '$acc'";
        pdo_execute($sql);
        $er = "Đổi mật khẩu thành công";
       }
    }
    ?>
  <form  action="" method="post" class="center">
         <h2>Đổi mật khẩu</h2>
         <div>
             <label for="">Mật khẩu</label>
             
             <input class="formn" type="password" placeholder="Mật khẩu"  name="old" required>
         </div>
         <div>
             <label for="">Mật khẩu mới</label>
            
             <input class="formn" type="password" id="" placeholder="Mật khẩu mới"  name="new" required>
         </div>
         <div>
         <label for="">Nhập lại mật khẩu mới</label>
        
         <input class="formn" type="password" id="" placeholder="Mật khẩu mới"  name="renew" required>
     </div>
         <p><?php echo $er ?></p>
         <button type="submit" class="siupn">Xác nhận</button>
         
     </form>
  <?php endif ?>
 
  <?php if(isset($_GET['pro']) && $_GET['pro'] == "lsmh"): ?>
    <?php
        $yourdh=dhcomplete($acc);
   ?>
       <table>
        <tr>
        <th>Mã</th>
        <th>Người Nhận</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Ngày đặt mua</th>
        <th>Chi tiết</th>
        </tr>
        <?php foreach($yourdh as $row): ?>
            <tr>
                <td><?php echo $row['ma_dh']?></td>
                <td><?php echo $row['nguoi_nhan']?></td>
                <td><?php echo $row['so_dt']?></td>
                <td><?php echo $row['dia_chi']?></td>
                <td><?php echo $row['ngay_tao']?></td>
                <td><a href="index.php?act=profile&pro=chitiet&id=<?php echo $row['ma_dh']?>"><button type="button">Xem</button></a></td>
            </tr>
        <?php endforeach ?>
       </table>
 <?php endif ?>

<?php if(isset($_GET['act']) && $_GET['act'] == "xacnhan"  ) :?>
    <?php
        $er = "";
        
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $date = date('y-m-d');
            if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['diachi'])){           
                adddh($name,$phone,$acc,$date,$tt,$diachi);
                $sql ="select * from don_hang order by ma_dh desc limit 1 ";
                $mahh =  pdo_query_one($sql);
                
                 foreach($_SESSION['cart'] as $key => $cart){
                    $ma_hh = $cart[0];
                    $ma_dh = $mahh['ma_dh'];
                    $ten = $cart[2];
                    $soluong = $cart[4];
                    $dongia = $cart[3];
                    // addspdb($ma_hh,$ma_dh,$ten,$soluong,$dongia);
                }
               include "../model/deletecart.php";
                
               
            } else $er = "vui lòng điền đầy đủ thông tin";     
         }?>
 
    <form action="" method="post">
        <h2>Xác nhận thông tin </h2>
        <div>
                <label for="">Họ và tên</label>
               <br>
                <input name="name" class="form" type="text" placeholder="Họ và tên" value="<?php echo $user['hoten']?>" required>
            </div>
            <div>
                <label for="">Số điện thoại</label>
                <br>
                <input name="phone" class="form" type="tel" pattern="[0][9,8,3,7]{1}[0-9]{8}" placeholder="Số điện thoại" value="<?php echo $user['phone']?>" required>
            </div>
            <div>
                <label for="">Địa chỉ</label>
      <br>
                <input class="form" type="text" name="diachi" id="" placeholder="Địa chỉ" value="<?php echo $user['diachi']?>" required>
            </div>
            <h5><?php echo $er ?></h5>
            
            <button  type="submit"class="siup">Xác nhận đặt hàng</button>
                   
    </form>
<?php endif ?>
<?php if(isset($_GET['pro']) && $_GET['pro'] == "chitiet" && isset($_GET['id']) ) :?>
    <?php $id = $_GET['id'];
     $dh = loaddh($id);
     $sp = ctdh($id);
     if(isset($_POST['huy'])){
     huydh($id);
     header("location:index.php?act=profile&pro=lsmh");
     }
    ?>
    <?php
    $first_date = new DateTime($dh['ngay_tao']);
    $second_date = new DateTime(date('Y-m-d'));
    $dateinterval = $first_date->diff($second_date);
    $time = $dateinterval->days;
    ?>
    <h2>Chi tiết đơn hàng</h2>                                    
    <h4>Đơn hàng: NINE<?php echo $id ?></h4>
    <h4>Ngày đặt hàng: <?php echo $dh['ngay_tao'] ?></h4>
    <h4>Ngươi  nhận: <?php echo $dh['nguoi_nhan'] ?></h4>
    <h4>Số điện thoại: <?php echo $dh['so_dt'] ?></h4>
    <h4>Email: <?php echo $dh['email'] ?></h4>
    <h4>Địa chỉ: <?php echo $dh['dia_chi'] ?></h4>
    <h4>Sản phẩm:</h4>
    <?php foreach($sp as $row): ?>
        <p><?php echo $row['ten_sp'] ?>:    <?php echo number_format($row['don_gia'])?>đ  x<?php echo $row['so_luong'] ?></p>
    <?php endforeach ?>
    <h4>Phí vận chuyển: <?php echo number_format($dh['pt_vc'])?>đ</h4>
    <h4>Voucher: <?php echo $dh['voucher'] ?></h4>
    <h4>Thành tiền: <?php echo number_format($dh['thanh_tien']) ?>đ</h4>
    <h4>Thanh toán <?php echo $dh['pt_tt'] ?></h4>
    <form action="" method="post">
        <a href="index.php?act=profile&pro=lsmh"><button type="button">Trở về</button></a>
        <button name="huy" type="submit" <?php if($time>1) echo "disabled" ?>>Hủy đơn hàng</button>
    </form>
    
<?php endif ?>
