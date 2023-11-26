<?php
  $hethang = "";
  $thongbao = "";
  if(isset($_POST['comment'])){
    if(!empty($_POST['bl'])){
    $idus = $user['ma_kh'];
    $bl = $_POST['bl'];
    $date = date('Y-m-d');
    addbl($id,$idus,$bl,$date);
    header("location:index.php?act=ct&id=$id&ms=$ms");
    }
  }
  if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
  $id = $_GET['id'];
  $img = $ha[0]['hinh'];
  if($sp['giam_gia']>0){
  $price = $sp['giam_gia'];}else{$price = $sp['don_gia'];}
  $name = $sp['ten_sp'];
  $color = $maus['ten_mau'];
  if(isset($_POST['addcart'])){
    $sl = $_POST['sl'];
    if(empty($_POST['size'])){
      $thongbao = "Chưa chọn size!";
    }else{
    $size = $_POST['size'];
    $tkho = loadkho($id,$color,$size);
    if($sl > $tkho['so_luong']){
      $hethang= "Không đủ hàng!";
    }else{
    $i = 0;$check = 0;
    foreach($_SESSION['cart'] as $cart){
      if($cart[0]==$id && $cart[4]==$color && $cart[5]==$size){
        $sl = $sl + $cart[6];
        $check = 1;
        $_SESSION['cart'][$i][6] = $sl;
        $thongbao = "Thêm thành công!";
      }$i++;
    }
    if($check==0){
    $cart = [$id,$img,$name,$price,$color,$size,$sl];
  array_push($_SESSION['cart'],$cart);
    $thongbao = "Thêm thành công!";}}
 }}
 if(isset($_POST['buy'])){
  $sl = $_POST['sl'];
  if(empty($_POST['size'])){
    $thongbao = "Chưa chọn size!";
  }else{
  $size = $_POST['size'];
  $tkho = loadkho($id,$color,$size);
  if($sl > $tkho['so_luong']){
    $hethang = "Không đủ hàng!";
  }else{
  $i = 0;$check = 0;
  foreach($_SESSION['cart'] as $cart){
    if($cart[0]==$id && $cart[4]==$color && $cart[5]==$size){
      $sl = $sl + $cart[6];
      $check = 1;
      $_SESSION['cart'][$i][6] = $sl;
    }$i++;
  }
  if($check==0){
  $cart = [$id,$img,$name,$price,$color,$size,$sl];
array_push($_SESSION['cart'],$cart);}
header("location:index.php?act=cart");
}}}
?>
 <hr>
    <div class="titles">Trang chủ/ <?php echo $dm['ten_dm'] ?>/ <?php echo $sp['ten_sp'] ?>
    </div >
   
    <div class="contai">
     
        <div class="slidesp">
            <div id="demo1" class="carousel slide slideshow" data-bs-ride="carousel">
                <div class="carousel-inner">
                <?php foreach ($ha as $key => $value):?>
                  <div class="carousel-item <?php if($key == 0) echo "active" ?>">
                    <img src="uploads/<?php echo $value['hinh'] ?>" alt="" >
                  </div>
                <?php endforeach ?>
                </div>
                <span class="prev" type="button" data-bs-target="#demo1" data-bs-slide="prev">
                    ❮
                </span>
                <span class="next" type="button" data-bs-target="#demo1" data-bs-slide="next">
                    ❯
                </span>
              </div>
              <div class="chitiet">
              <?php foreach ($ha as $key => $value):?>
                <button type="button" data-bs-target="#demo1" data-bs-slide-to="<?php echo $key ?>"><img src="uploads/<?php echo $value['hinh'] ?>" alt="" ></button>
                <?php endforeach ?>
              </div>
        </div>
        <div class="chitietsp">
            <h2><?php echo mb_strtoupper($sp['ten_sp']) ?></h2>
            <h3><?php echo number_format($sp['giam_gia']) ?> vnđ</h3>
            <p><?php echo number_format($sp['don_gia']) ?> vnđ</p>
         
            <h1 class="title--item"> Màu sắc: <?php echo $maus['ten_mau'] ?></h1>
            <?php foreach ($mau as $key => $value):?>
              <a href="index.php?act=ct&id=<?php echo $sp['ma_sp'] ?>&ms=<?php echo $value['ma_ms']?>"><button class="<?php if($value['ten_mau']=="Đen") echo "Den"; 
                                                                                                    if($value['ten_mau']=="Xám") echo "Xam";
                                                                                                    if($value['ten_mau']=="Xanh") echo "Xanh";
                                                                                                    if($value['ten_mau']=="Trắng") echo "Trang";
                                                                                                    if($value['ten_mau']=="Tím") echo "Tim";
                                                                                                    if($value['ten_mau']=="Lục") echo "Luc";?>" type="button"><?php if($maus['ten_mau']==$value['ten_mau']) echo "&#10003" ?></button></a>
              <?php endforeach ?>
            <form class="" method="post">
              <div class="check">
            <h1 class="title--item"> Size</h1>
            <?php foreach ($kt as $key => $value):?>
              <?php
                $kho=loadkho($id,$maus['ten_mau'],$value['ten_kt']);
              ?>
            <div class="filter__form-item">
              <input type="hidden" class="khoss" name="" value="<?php echo $kho['so_luong']?>">
              <input type="hidden" class="khohang" name="" value = "<?php if($kho['so_luong']<=0){ echo "Hết hàng!";}else{echo "Kho: ".$kho['so_luong'];} ?>">
              <input  type="radio" id="productBand<?php echo $key ?>" name="size" value="<?php echo $value['ten_kt']?>" <?php if($kho['so_luong']<=0) echo "disabled" ?>>
              <label onclick="tang1(<?php echo $key ?>)" class="productBand <?php if($kho['so_luong']<=0) echo "het" ?>" for="productBand<?php echo $key ?>"><?php echo $value['ten_kt']?></label>
            </div>
            <?php endforeach ?>
      </div>
       <br>
        <div class="tgsl">
          <h1 class="title--item"> Số lượng</h1>
          <div class="border">
            <button class="ct" type="button" onclick="giam()">-</button>
            <input type="number" id="sl" name="sl" id="" value="1" min="1" >
            <button class="ct" type="button" onclick="tang()">+</button>
            </div> <div class="kho" id="khoh-1"><?php echo $hethang ?></div>
            <input type="hidden" name="" id="khhh" value="100">
        </div>
        <button class="add" name="addcart" type="submit">Thêm vào giỏ</button>
        <button class="buy" name="buy" type="submit">Mua hàng</button>
        <?php echo $thongbao ?>
        </form>
        <div><h2>Chi tiết sản phẩm </h2><br>
          <?php echo $sp['mo_ta'] ?>
        </div>
        </div>
    </div>
    <div class="comment">
      <h4>Bình luận</h4>
      <?php if(!isset($_SESSION['account'])): ?>
      <a  href="index.php?act=dangnhap"><button type="button" class="loi">Vui lòng đăng nhập để có thể để lại đánh giá!</button></a>
      <?php endif ?>
      <?php if(isset($_SESSION['account'])): ?>
      <form action="" method="post" id="comm">
        <textarea name="bl" id="text" class="text"  rows="2" placeholder="Bình luận của bạn"></textarea>
        <button id="comment" type="submit" name="comment"><i class="fa-regular fa-comment"></i></button>
      </form>
      <?php endif ?>
      <?php foreach($listbl as $bl):?>
        <?php
        $ac = loadtt($bl['ma_kh']);
        ?>
      <span class="acc"><?php echo $ac['tai_khoan'] ?></span> <br>
      <span class=""><?php echo $bl['noi_dung'] ?></span> <br>
      <span class="date"><?php echo $bl['ngay_bl'] ?></span>
      <hr>
      <?php endforeach ?>
    </div>
    <div class="container">
    <section class="title">
        <h2>Sản Phẩm Tương Tự</h2>
      </section>
      <div class="product">
          <?php foreach($spcl as $key => $row) :?>
            <?php 
                 $mau = loadmau($row['ma_sp']);
                 $kt = loadkt($row['ma_sp']);
              ?>
           <div class="box">
            <a href="index.php?act=ct&id=<?php echo $row['ma_sp'] ?>&ms=<?php echo $mau[0]['ma_ms'] ?>"><img src="uploads/<?php echo $row['hinh_anh'] ?>" alt=""></a>
            <a href="index.php?act=ct&id=<?php echo $row['ma_sp'] ?>&ms=<?php echo $mau[0]['ma_ms'] ?>"><?php echo $row['ten_sp']?></a>
           <div class = "giamgia">
   
            <?php echo number_format($row['giam_gia'])?> vnđ
      
            <p><?php echo number_format($row['don_gia'])?> vnđ</p> 
         
            <button type="button" class=" cart" data-bs-toggle="modal" data-bs-target="#m<?php echo $key ?>"">
            <i class="fa-solid fa-cart-shopping" title="Giỏ hàng"></i>
            </button>
            </div>
         
        </div>
          <div class="modal" id="m<?php echo $key ?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form class="body" method="post">
                  <div class="checkb">
                  <label for="">Chọn màu:</label>
               
                    <?php foreach($mau as $key => $ro):?>
                      <div class="name">
                  <input type="radio" name="color" id="" value="<?php echo $ro['ten_mau']?>" <?php if($key==0) echo "checked" ?>><br> <?php echo $ro['ten_mau']?>
                  </div>
                  <?php endforeach ?>
                 
                  </div>
                  <div class="checkb">
                  <label for="">Chọn size:</label>
                  <?php foreach($kt as $key => $ros):?>
                  <div class="name">
                  <input type="radio" name="size" id="" value="<?php echo $ros['ten_kt']?>" <?php if($key==0) echo "checked" ?>><br> <?php echo $ros['ten_kt']?>
                  </div>
                  <?php endforeach ?>
                  </div>
                  <button class="add" type="submit" name="addcart">Thêm vào giỏ hàng</button>
                  <a href="giohang.html"><button class="buy" type="button">Xem giỏ hàng</button></a>
                </form>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
      <?php endforeach ?>

   </div>
    </div>