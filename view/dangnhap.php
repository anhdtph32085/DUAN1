<?php 
         $er = "";
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $account=$_POST['account'];
            $password = $_POST['password'];
            if(!empty($_POST['account']) && !empty($_POST['password']) ){
            $user=loaduser($account);      
            if(is_array($user)){
                if($password == $user['mat_khau']){
                    $_SESSION['account'] = $account;
                    $_SESSION['password'] = $password; 
                    header("location:index.php");}
                    else{
                        $er = "Sai mật khẩu!";
                    }
            }else {
                $er = "Tài khoản không tồn tại!";
            }
            }else{
              $er= "Vui lòng nhập user và password!";
            }
          }
    ?>
    <div class="sign">
    <form  action="" method="post">
        <h2>Đăng nhập</h2>
            <div>
                Tài khoản
                <br>
                <input class="form" type="text" placeholder="Tài khoản"  name="account">
            </div>
            <div>
                Mật khẩu
                <br>
                <input class="form" type="password" id="" placeholder="Mật khẩu"  name="password">
            </div>
            <p><?php echo $er ?></p>
            <button type="submit" class="siup">Đăng nhập</button>      
        </form>
        <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
        <li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
        </div>