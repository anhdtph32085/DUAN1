<?php 
    $er = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $acc = check($_POST['acc']);
        $email = check($_POST['email']);
        $user = loaduser($acc);
        if(is_array($user)){
          if($user['email'] == $email){
            $er = "Gửi email thành công!";
            sendPass($email, $user['tai_khoan'], $user['mat_khau']);
          }else {
            $er = "Email không tồn tại trong hệ thống!";
          }
        }else{
        $er = "Tài khoản không tồn tại!";
       }    
    }
    ?>
    <section class="sign">
  <form  action="" method="post" class="">
         <h2>Quên mật khẩu</h2>
         <div>
             <label for="">Tài khoản</label>
             
             <input class="form" type="text" placeholder="Tài khoản"  name="acc" required>
         </div>
         <div>
             <label for="">Email</label>
            
             <input class="form" type="email" id="" placeholder="Email"  name="email" required>
         </div>
         <p><?php echo $er ?></p>
         <button type="submit" class="siup">Xác nhận</button>
         
     </form>
     <li><a href="index.php?act=dangnhap">Đăng nhập</a></li>
     <li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
    </section>
