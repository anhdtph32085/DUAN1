<div class="banner">
        <div id="demo1" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#demo1" data-bs-slide-to="0" class="active"></button>
              <button type="button" data-bs-target="#demo1" data-bs-slide-to="1"></button>
              <button type="button" data-bs-target="#demo1" data-bs-slide-to="2"></button>
              <button type="button" data-bs-target="#demo1" data-bs-slide-to="3"></button>
            </div>
            
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/bn1.jpg" alt="bn1" >
              </div>
              <div class="carousel-item">
                <img src="img/bn2.jpg" alt="bn2" >
              </div>
              <div class="carousel-item">
                <img src="img/bn3.jpg" alt="bn3" >
              </div>
              <div class="carousel-item">
                <img src="img/bn4.jpg" alt="bn4" >
              </div>
            </div>
            
            <!-- Left and right controls/icons -->
            <span class="prev" type="button" data-bs-target="#demo1" data-bs-slide="prev">
                ❮
            </span>
            <span class="next" type="button" data-bs-target="#demo1" data-bs-slide="next">
                ❯
            </span>
          </div>
    </div>
    <!-- <div class="focus">
      <div class="collection">Bộ sưu tập 1</div>
      <div class="collection">Bộ sưu tập 2</div>
      <div class="collection">Bộ sưu tập 3</div>
      <div class="collection">Bộ sưu tập 4</div>
    </div> -->
    <div class="container">
        <div class="title">
          <h2>Sản phẩm mới</h2>
        </div>
        <div class="product">
          <?php foreach($listsp as $key => $row) :?>
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
                  <a href="index.php?act=cart"><button class="buy" type="button">Xem giỏ hàng</button></a>
                </form>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
      <?php endforeach ?>

   </div>
   <div class="xemtc">
   <a href="index.php?act=allnew"><button class="buy" type="button">Xem tất cả >></button></a>
   </div>
   <div class="title">
          <h2>Sản phẩm yêu thích</h2>
        </div>
        <div class="product">
          <?php foreach($spyt as $key => $row) :?>
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
                  <button class="add" type="submit" name="addcarts">Thêm vào giỏ hàng</button>
                  <a href="index.php?act=cart"><button class="buy" type="button">Xem giỏ hàng</button></a>
                </form>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
      <?php endforeach ?>

   </div>
   <div class="xemtc">
   <a href="index.php?act=like"><button class="buy" type="button">Xem tất cả >></button></a>
   </div>
    </div>