   <?php
   if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];

        $id = $_GET['id'];
        $img = $sp['hinh'];
        $price = ceil($sp['don_gia']*(100-$sp['giam_gia'])/1000000)*10000;
        $name = $sp['ten_hh'];
        if(isset($_POST['addcart'])){
          $sl = $_POST['sl'];
          $i = 0;$check = 0;
          foreach($_SESSION['cart'] as $cart){
            if($cart[0]==$id){
              $sl = $sl + $cart[4];
              $check = 1;
              $_SESSION['cart'][$i][4] = $sl;
            }$i++;
          }
          if($check==0){
          $cart = [$id,$img,$name,$price,$sl];
        array_push($_SESSION['cart'],$cart);}
        header("location:view/cart.php");
       }
      
    ?>
      <section class="contai">
   <section class="left">
    <section class="box2 d">
      <section class="title">
        <?php echo $sp['ten_hh']?>
      </section>
      <section class="sanpham">
      <img src="../img/<?php echo $sp['hinh']?>" alt="">

      <form action="" method="post">
      <h3>
        <?php if($sp['giam_gia']>0){echo number_format(ceil($sp['don_gia']*(100-$sp['giam_gia'])/1000000)*10000)." vnđ";
        }else{echo number_format($sp['don_gia'])." vnđ";} ?>
      </h3>
        
        <?php if($sp['giam_gia']>0): ?>
          <div class="giamgi">
            <p><?php echo number_format($sp['don_gia'])." vnđ"?></p> 
            <h4> -<?php echo $sp['giam_gia'] ?>%</h4>
          </div>
        <?php endif ?>
        <div class="tgsl">
        <button class="ct" type="button" onclick="giam()">-</button>
        <input type="number" id="sl" name="sl" id="" value="1" min=1 >
        <button class="ct" type="button" onclick="tang()">+</button>
        </div>
         <br>
        <button class="giohang" type="submit" name="addcart">Thêm vào giỏ hàng</button>
      </form>
      </section>
      <h4 class="b">Thông tin sản phẩm</h4>
      <p class="b"><?php echo $sp['mo_ta']?></p>
    </section>
    <section class="box2 d">
      <section class="title bl" >
       Bình luận
        <form action="" method="post" class="pl">
        <input type="text" name="bl" id="" placeholder="Nhập bình luận">
        <button type="submit" name="binhluan">Gửi</button>
      </form>
      </section>
      <section class="conten1">
      <?php foreach($blhh as $rbl) :?>
        <div class= "bl">
        <li class="b"><?php echo $rbl['noi_dung']?></li>
       
         <span><?php echo $rbl['account']?>_<?php echo $rbl['ngay']?></span>
        </div>
         <?php endforeach ?>
      </section>
    </section>
    <section class="box2 d">
      <section class="title">
       Sản phẩm cùng loại
      </section>
      <section class="conten">
         <?php foreach($spcl as $ro) :?>
         <li class="b"><a href="index.php?act=chitiet&id=<?php echo $ro['ma_hh']?>"><?php echo $ro['ten_hh']?></a></li>
         <?php endforeach ?>
      </section>
    </section>
