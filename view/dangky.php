<?php
  $er="";
  if($_SERVER['REQUEST_METHOD'] == "POST"){
  $acc = check($_POST['acc']);
    $pas = check($_POST['pas']);
    $repas = check($_POST['repas']);
    $email = check($_POST['email']);
   
   if(!empty($_POST['acc'])&& !empty($_POST['pas'])&&!empty($_POST['email']) && !empty($_POST['repas'])){
    $user = loaduser($acc);
    if(is_array($user)){
      $er = "Tài khoản đã tồn tại";
    }else if($pas!=$repas){
      $er = "Mật khẩu không khớp!";
    }
    else{
    addtt($acc,$pas,$email);
    if(isset($_SESSION['account']) && isset($_SESSION['password'])){
        session_unset();
        header("location:dangky.php?act=dangky");
    }
    $er="Đăng ký thành công!";
    
   }
  }
}
?>
    <section class="sign">
        <h2>Đăng ký</h2>
        <form  action="" method="post">
            <div>
                <label for="">Tài khoản</label>
                <br>
                <input class="form" name="acc" type="text" placeholder="Tài khoản" required>
            </div>
            <div>
                <label for="">Email</label>
                <br>
                <input class="form" type="email" name="email" id="" placeholder="Email" required>
            </div>
            <div>
                <label for="">Mật khẩu</label>
                <br>
                <input class="form" type="password" name="pas" id="" placeholder="Mật khẩu" required>
            </div>
            <div>
                <label for="">Nhập lại mật khẩu</label>
                <br>
                <input class="form" type="password" name="repas" id="" placeholder="Nhập lại mật khẩu" required>
            </div>
            <p><?php echo $er ?></p>
            <button class="siup">Đăng ký</button>
        </form>
        <li><a href="index.php?act=dangnhap">Đăng nhập</a></li>
        <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
    </section>