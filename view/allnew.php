<?php
         if(isset($_GET['id'])){
          $id = $_GET['id'];
         }
         if(!isset($_GET['page'])){
          $page = 1;
        }else{
          $page = $_GET['page'];
        }
         $listsp = loadall_sp();
         $bd = ($page-1)*4;
         $kt = $bd + 4;
         $sql = "select * from san_pham order by ma_sp desc limit $bd,$kt";
         $sp = pdo_query($sql);

?>
<hr>
<div class="titles">Trang chủ/ Sản phẩm mới 
    </div >
<section class="cont">
<div class="loc">
  <form class="contacts" method="post">
  <div class="filter_type version_2">
                <h4><a href="#filter_2" data-bs-toggle="collapse" class="collapsed closed" aria-expanded="false">Màu sắc</a></h4>
                <div class="collapse" id="filter_2" >
                    <ul>
                        <li class="color">
                            <label class="">
                                
                                <input type="checkbox"> <br>
                                Blue 
                            </label>

                            <label class="">
                                <input type="checkbox"><br> Red 
                         
                            </label>

                            <label class="">
                                <input type="checkbox"> <br>
                               range 
          
                            </label>
   
                            <label class=""> 
                                <input type="checkbox"> <br>
                                Black
          
                            </label>
                           
                        </li>
                        
                    </ul>
                    
                </div>
                <hr>
            </div>
            <div class="filter_type version_2">
                <h4><a href="#filter_1" data-bs-toggle="collapse" class="collapsed closed" aria-expanded="false">Size</a></h4>
                <div class="collapse" id="filter_1" >
                    <ul>
                        <li>
                            <label class="container_check">S
                                <input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">M 
                                <input type="checkbox" class="checkbox"> 
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">L
                                <input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">XL
                                <input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                   
                </div>
                <hr>
            </div>
            <div class="filter_type version_2">
                <h4><a href="#filter_4" data-bs-toggle="collapse" class="closed">Giá</a></h4>
                <div class="collapse" id="filter_4">
                    <ul>
                        <li>
                            <label class="container_check">Dưới 500,000đ
                                <input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">500,000đ - 1,000,000đ
                                <input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">1,000,000đ - 2,000,000đ
                                <input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">Trên 2,000,000đ
                                <input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                   
                </div>
                <hr>
            </div>
            <div class="buttons">
            <button class="buy" type="reset">Bỏ lọc</button>
      <button class="add" type="submit">Lọc</button>
            </div>
      </form>

  </div>
  <div class="container">
  <section class="titles">
        <h2>Sản phẩm mới</h2>
      </section>
      <div class="products">
          <?php foreach($sp as $key => $row) :?>
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
   <div class="pagination">
   <?php for($i=1;$i<=ceil(count($listsp)/4);$i++): ?>
   <a href="index.php?act=allnew&page=<?php echo $i?>" class="<?php if($i == $page) echo "active"?>"><?php echo $i?></a>
   <?php endfor ?>
   </div>
   </div>

</section>