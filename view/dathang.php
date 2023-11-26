<?php
   $date = date('y-m-d');
   if(isset($_GET['id'])){
    $ma_dh = $_GET['id'];
   }
   $ctdh = ctdh($ma_dh);
   if(count($ctdh)<1){
    deldh($ma_dh);
    header("location:index.php?act=cart");
   }else{
   $tong=0;
   foreach($ctdh as $ct){
    $tong = $ct['don_gia']*$ct['so_luong'] + $tong;
   }
   $tong;
   if(isset($_POST['complete'])){
    if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['address'])){
        $name = check($_POST['name']);
        $phone = check($_POST['phone']);
        $email = check($_POST['email']);
        $address = check($_POST['address']);
        $ptvc = $_POST['ptvc'];
        $tt = $tong+$ptvc;
        $pttt = $_POST['pay'];
        if(empty($_POST['code'])){
            $voucher = "";
        }else{
            $voucher = check($_POST['code']);
            $sql = "select * from voucher where ngay_bd >= $date and ngay_kt >= $date and name_vc = '$voucher'";
            $vc = pdo_query($sql);
            if(is_array($vc) && !empty($_POST['gtvoucher'])){
                $voucher = check($_POST['code']) ;  
                $tt= $tt- check($_POST['gtvoucher']);
            }else{
                $voucher = "";
            }
        }

        updatedh($ma_dh,$name,$phone,$email,$address,$pttt,$ptvc,$voucher,$tt);
        header("location:index.php?act=camon");
    }
   }
}
?>
<form method="post" class="container-1">
    <hr>
<div class="rwo">
<div class="checkout-payment">
<h3 class="checkout-title">Địa chỉ giao hàng</h3>
            <label class="ds__item">
            
                <div class="ds__item__contact-info">
                    <div class="row">
                        <div class="col-6 form-group">
                            <input class="form-control" type="text" value="" name="name" placeholder="Họ tên">
                        </div>
                        <div class="col-6 form-group">
                            <input class="form-control " type="tel" pattern="[0][9,8,3,7]{1}[0-9]{8}" name="phone" value="" placeholder="Số điện thoại">
                        </div>
                        <div class="col-12 form-group">
                            <input class="form-control" type="email" value="" name="email" placeholder="Email">
                        </div>
                        
                        <div class="col-12 form-group">
                            <input class="form-control" type="text" placeholder="Địa chỉ" name="address" value="">
                        </div>
                    </div>
                </div>
            </label>
</div>


            <div class="col-lg-4 cart-page__col-summary">
                <div class="cart-summary" id="cart-page-summary">
                    <div class="cart-summary__overview">
                        <h3>Tóm tắt đơn hàng</h3>

                        <div class="cart-summary__overview__item">
                            <p>Tạm tính</p>
                            <p class="total-not-discount" id="total-not-discount"><?php echo number_format($tong)."đ" ?></p>
                        </div>
                        <div class="cart-summary__overview__item">
                            <p>Phí vận chuyển</p>
                            <p class="total-not-discount" id="total-not-discount"><?php if(!isset($_SESSION['account'])){echo "15,000đ";}else{echo "0đ";}?></p>
                        </div>
                        <div class="cart-summary__overview__item">
                            <p>Tiền thanh toán</p>
                            <p><b class="order-price-total" id="order-price-total"><?php if(isset($_SESSION['account'])){echo number_format($tong)."đ";}else{echo number_format($tong+15000)."đ";}?></b></p>
                            <input type="hidden" name="" id="Voucher" value="<?php if(isset($_SESSION['account'])){echo $tong;}else{echo $tong+15000;}?>">
                            <input type="hidden" name="gtvoucher" id="gtVoucher" value="0">
                        </div>
                    </div>
                </div>
                <div class="row123">
                 
                        <h3>Mã giảm giá</h3><br>
                                <div class="g-2">
                                    <input type="text" id="myVoucher" name="code" value="" placeholder="Mã giảm giá" class="form-control">
                                    <button type="button" onclick="getVoucher()" class="btn_1 outline">Áp dụng</button>
                                    <div id="thongBao"></div>
                                </div>
                        
                </div>
                <div class="cart-summary__button" >
                    <button type="submit" name="complete" class="add" id="btndh" onclick="openModal()">Đặt hàng</button>
                </div>

            </div>
        </div>
        <div class="checkout-payment">
            <h3 class="checkout-title">Phương thức thanh toán</h3>
            <div class="block-border">
                                        <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                                        <div class="checkout-payment__options">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <label class="ds__item">
                                        <input class="ds__item__input" type="radio" name="pay" id="payment_method_1" value="Thẻ tín dụng">
                                        <span class="ds__item__label">
                                            Thanh toán bằng thẻ tín dụng
                                                                                            </span>
                                                                                            <span style="margin-left: 3px">
                                                <img src="https://pubcdn.ivymoda.com/ivy2/images/1.png" class="">
                                            </span>
                                                                                    </label>
      
                                                                                                                                                                                                                                                                                                            <label class="ds__item">
                                        <input class="ds__item__input" type="radio" name="pay" id="payment_method_2" value="Atm">
                                        <span class="ds__item__label">
                                            Thanh toán bằng thẻ ATM
                                                                                                    <span>Hỗ trợ thanh toán online hơn 38 ngân hàng phổ biến Việt Nam.</span>
                                                                                            </span>
                                                                                    </label>
                                                                                                                                                      <div class="my-2">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <label class="ds__item">
                                        <input class="ds__item__input" type="radio" name="pay" id="payment_method_5" value="Momo">
                                        <span class="ds__item__label">
                                            Thanh toán bằng Momo
                                                                                            </span>
                                                                                    </label>

                                                                                                                                                                                                                                                                                                                                                                                <label class="ds__item">
                                        <input class="ds__item__input" type="radio" name="pay" id="payment_method_3" value="Trực tiếp" checked>
                                        <span class="ds__item__label">
                                            Thanh toán khi giao hàng
                                                                                            </span>
                                                                                    </label>
                                                                                                                                                                                                                                                                                </div>
            </div>
        </div>
        
    </div>
    <div class="checkout-payment">
    <h3 class="checkout-title">Phương thức giao hàng</h3>
    <div class="block-border">
    <p>Đơn hàng sẽ được giao đến bạn sớm nhất.</p>
            <label class="ds__item">
            <input class="ds__item__input" type="radio" name="ptvc" id="payment_method_3" value="<?php if(!isset($_SESSION['account'])){echo "15000";}else{echo "0";}?>" checked>
                                        <span class="ds__item__label">
                                            Chuyển phát nhanh                      </span>
            </label>
    </div>
</div>
<?php
    $sq = "select * from voucher where ngay_bd >= $date and ngay_kt >= $date";
    $loadvc = pdo_query($sq);
?>
<?php foreach($loadvc as $vcc):?>
    <input type="hidden" class="vouCher" name="" id="" value="<?php echo strtoupper($vcc['name_vc']); ?>">
    <input type="hidden" class="vlvouCher" name="" id="" value="<?php if($vcc['loai_km']=="fixed money"){echo $vcc['gt_vc'];}else{echo $tong*(100-$vcc['gt_vc']);} ?>"><br>
    <?php endforeach ?>
</form>