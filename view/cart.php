<?php
 $hethang = "";
          if(isset($_POST['add'])){          
                 $check = 0; 
                
                $soluong = $_POST['sl'];
                foreach($_SESSION['cart'] as $key => $cart){
                    $ma_sp = $cart[0];
                    $mau = $cart[4];
                    $kt = $cart[5];
                    $sl = $soluong[$key];
                    $tkho = loadkho($ma_sp,$mau,$kt);
                    if($tkho['so_luong']<$sl){
                        $check = 1;
                    }
                }if($check == 0){
                    if(isset($_SESSION['account'])){
                        $acc = $_SESSION['account'];
                    }else{
                        $acc = "";
                    }
                    adddh0($acc); 
                    $sql ="select * from don_hang order by ma_dh desc limit 1 ";
                    $mahh =  pdo_query_one($sql);
                    $ma_dh = $mahh['ma_dh'];

                 foreach($_SESSION['cart'] as $key => $cart){
                    $ma_sp = $cart[0];
                    $mau = $cart[4];
                    $kt = $cart[5];
                    $ten = $cart[2];
                    $sl = $soluong[$key];
                    $gia = $cart[3];
                    $tkho = loadkho($ma_sp,$mau,$kt);
                    $kho = $tkho['so_luong'] - $sl;
                    if($sl>0){
                    addctdh($ma_sp,$ten,$gia,$mau,$kt,$sl,$ma_dh);
                    updatekho($ma_sp,$mau,$kt,$kho);}
                }
                header("location:../model/deletecart.php?ma_dh=$ma_dh");
            }else{
                $hethang = "Sản phẩm không đủ!";
            }
            
         }
?>
<main class="bg_gray">
    <?php if($_SESSION['cart']==[] || !isset($_SESSION['cart'])) :?>
        <div class="thongbao">Giỏ hàng trống!</div>
        <div class="rs"><a href="index.php">&#8617 Quay lại mua sắm</a></div>
    <?php endif ?>
    <?php if($_SESSION['cart']!=[]) :?>
            <form class="container margin_30" method="post">
            <div class="page_header">
                    <h1>Giỏ hàng</h1>
            </div>
            <!-- /page_header -->
            <div class="row100">
              
                <table class="table table-striped cart-list">
                <thead>
                    <tr>
                        <th>
                            Sản phẩm
                        </th>
                        <th>
                            Giá
                        </th>
                        <th>
                            Số lượng
                        </th>
                        <th>
                            Tổng tiền
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       $tong=0;
                       $so=0;
                    ?>
                    <?php foreach($_SESSION['cart'] as $key => $cart) :?>
                        <?php
                        $kho = loadkho($cart[0],$cart[4],$cart[5]);
                        ?>
                    <tr class="rim">
                        <td>
                            <div class="thumb_cart">
                                <img src="uploads/<?php echo $cart[1] ?>" data-src="style/buy-1.jpg" class="lazy loaded" alt="Image" data-was-processed="true">
                            </div>
                            <div class="girdcart">
                                <span class="item_cart"><?php echo $cart[2] ?></span>
                                <span class="item_cart">Màu sắc : <?php echo $cart[4] ?></span>
                                <span class="item_cart">Size : <?php echo $cart[5] ?></span>
                            </div>
                        </td>
                        <td class="hiv">
                            <strong  ><?php echo number_format($cart[3]) ?></strong><strong>đ</strong>
                            <input type="hidden" name="" class="pr0" value="<?php echo $cart[3] ?>">

                        </td>
                        <td>
                            <?php if($kho['so_luong']==0):?>
                               
                                <input type="hidden" value="0"  class="qty2 sl0" name="sl[]" min="" max="">
                                Hết hàng!
                            
                            <?php endif ?>
                            <?php if($kho['so_luong']>0):?>
                            <div class="numbers-row">
                                <input type="number" value="<?php echo $cart[6] ?>"  class="qty2 sl0" name="sl[]" min="1" max="<?php echo $kho['so_luong']?>">
                                <div class="inc button_inc" id="" onclick="tang0(<?php echo $key ?>)">+</div>
                                <div class="dec button_inc" id="" onclick="giam0(<?php echo $key ?>)">-</div>
                            </div>
                            <?php endif ?>
                        </td>
                        <td>
                            <div class="cartPrice price_0" id="" ><?php if($kho['so_luong']==0){ echo 0;}else{echo number_format($cart[3]*$cart[6]);} ?>đ</div>
                        </td>
                        <td class="options">
                           <a href="../model/deletecart.php?id=<?php echo $key ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                       <?php
                       if($kho['so_luong']==0){
                          $tong = $tong;
                          $so = $so;
                       }else{
                        $tong = $tong + $cart[3]*$cart[6];
                        $so = $so+ $cart[6];}
                       ?>
                    <?php endforeach ?>
                    
                </tbody>
                
            </table>

            <div class="col-lg-4 cart-page__col-summary">
                <div class="cart-summary" id="cart-page-summary">
                    <div class="cart-summary__overview">
                        <h3>Tổng tiền giỏ hàng</h3>
                        <div class="cart-summary__overview__item">
                            <p>Tổng sản phẩm</p>
                            <p class="total-product" id="total-product"><?php echo number_format($so) ?></p>
                        </div>
                        <div class="cart-summary__overview__item">
                            <p>Tổng tiền hàng</p>
                            <p class="total-not-discount" id="total-not-discount"><?php echo number_format($tong) ?>đ</p>
                        </div>
                        <div class="cart-summary__overview__item">
                            <p>Thành tiền</p>
                            <p><b class="order-price-total" id="order-price-total"><?php echo number_format($tong) ?>đ</b></p>
                        </div>
                        
                    </div>
                </div>
                <div class="cart-summary__button">
                    <button name="add" type="submit" class="add" class="btn btn--large" id="btndh">Đặt hàng</button>
                </div>
                <div class="kho" id="khoh-1"><?php echo $hethang ?></div>
            </div>
                        </div>
                    </form>
        <?php endif ?>
        </main>
     