<?php
 function updatedm($id,$ten_loai,$tt){
    $sql = "update danh_muc set ten_dm='$ten_loai',trang_thai='$tt' where ma_dm = $id";
    pdo_execute($sql);
 }
 function updatettdm($id){
  $sql = "update danh_muc set trang_thai='ẩn' where ma_dm = $id";
  pdo_execute($sql);
}
 function updatesp($tenhh,$gia,$hinh,$sale,$mota,$lhang ,$id){
  $sql = "UPDATE san_pham SET ten_sp = '$tenhh',don_gia = '$gia',giam_gia = '$sale',hinh_anh = '$hinh',mo_ta = '$mota',ma_dm = '$lhang' WHERE ma_sp = $id";
   pdo_execute($sql);
 }
 function updatett($acc,$pas,$email,$phone,$hoten,$diachi,$vaitro ,$id){
   $sql = "UPDATE login SET account='$acc',password='$pas',email='$email',phone='$phone',hoten='$hoten',diachi='$diachi',vaitro='$vaitro' WHERE id =$id";
   pdo_execute($sql);
  }
  function updateuser($acc,$name,$email,$phone,$diachi){
    $sql = "UPDATE khach_hang SET ho_ten='$name',dia_chi='$diachi',email='$email',so_dt='$phone' WHERE tai_khoan = '$acc'";
    pdo_execute($sql);
   }
  function huydh($id){
    $sql = "UPDATE don_hang SET trang_thai = 'hủy' where ma_dh = $id";
    pdo_execute($sql);
 }
 function updatedh($id,$name,$phone,$email,$address,$pttt,$ptvc,$voucher,$tt){
  $sql = "UPDATE don_hang SET nguoi_nhan = '$name',so_dt = '$phone',email = '$email',dia_chi = '$address',pt_tt = '$pttt',pt_vc = '$ptvc',voucher = '$voucher',thanh_tien = '$tt',trang_thai = 'Hoàn thành' where ma_dh = $id";
  pdo_execute($sql);
}
 function updatesl($id,$number){
  $sql = "UPDATE so_luong SET so_luong = '$number' where ma_sl = $id";
  pdo_execute($sql);
}
function updatekho($id,$mau,$kt,$number){
  $sql = "UPDATE so_luong SET so_luong = '$number' where ma_sp = $id and ten_ms = '$mau' and ten_kt = '$kt'";
  pdo_execute($sql);
}
function updateha($ma_ha,$hinh){
  $sql = "UPDATE hinh_anh SET hinh = '$hinh' where ma_ha = $ma_ha";
  pdo_execute($sql);
}
function updatevoucher($id,$voucher,$namevc,$gtvc,$datebd,$datekt){
  $sql = "UPDATE voucher SET name_vc = '$namevc',loai_km = '$voucher',gt_vc = '$gtvc',ngay_bd = '$datebd',ngay_kt = '$datekt' where ma_vc = $id";
  pdo_execute($sql);
}
?>