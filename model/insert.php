<?php
function adddm($ten_loai){
    $sql = "INSERT INTO danh_muc(ten_dm) VALUES('$ten_loai')";
    pdo_execute($sql);
}
function addsp($tenhh,$gia,$sale,$hinh,$mota,$lhang){
    $date = date('Y-m-d');
    $sql = "INSERT INTO san_pham(ten_sp,don_gia,giam_gia,hinh_anh,ngay_dang,mo_ta,ma_dm) VALUES('$tenhh','$gia','$sale','$hinh','$date','$mota','$lhang')";
    pdo_execute($sql);
}
function addmau($masp,$mau){
    $sql = "INSERT INTO mau_sac VALUES(null,'$mau','$masp')";
    pdo_execute($sql);
}
function addsize($masp,$size){
    $sql = "INSERT INTO kich_thuoc VALUES(null,'$size','$masp')";
    pdo_execute($sql);
}
function addimg($mams,$img){
    $sql = "INSERT INTO hinh_anh VALUES(null,'$mams','$img')";
    pdo_execute($sql);
}
function addsl($masp,$tenms,$tenkt){
    $sql = "INSERT INTO so_luong(ma_sp,ten_ms,ten_kt) VALUES('$masp','$tenms','$tenkt')";
    pdo_execute($sql);
}
function addtt($acc,$pas,$email){
    $sql = "INSERT INTO khach_hang(tai_khoan,mat_khau,email) VALUES('$acc','$pas','$email')";
    pdo_execute($sql);
}
function addbl($id,$idus,$bl,$date){
    $sql = "INSERT INTO binh_luan VALUES(null,'$idus','$id','$bl','$date')";
    pdo_execute($sql);
}
function adddh($name,$phone,$acc,$date,$tt,$diachi){
    $sql = "insert into don_hang values(null,'$acc','$name','$phone','$tt','$date','$diachi','complete')";
    pdo_execute($sql);
}
function adddh0($acc){
    $date = date('y-m-d');
    $sql = "insert into don_hang(ngay_tao,tai_khoan) values('$date','$acc')";
    pdo_execute($sql);
}
function addctdh($ma_sp,$ten_sp,$gia,$mau,$kt,$sl,$ma_dh){
    $sql = "insert into ct_don_hang values(null,'$ma_sp','$ten_sp','$gia','$mau','$kt','$sl','$ma_dh')";
    pdo_execute($sql);
}
function addvoucher($voucher,$namevc,$gtvc,$datebd,$datekt){
    $sql = "INSERT INTO voucher VALUES(null,'$voucher','$namevc','$gtvc','$datebd','$datekt')";
    pdo_execute($sql);
}
?>