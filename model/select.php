<?php
//danh mục
function loadall_dm(){
    $sql="select * from danh_muc where trang_thai = 'hiện' order by ma_dm desc";
     $listdm=pdo_query($sql);
     return $listdm;
}
function loaddm($id){
    $sql="select * from danh_muc where ma_dm=$id";
    $dm = pdo_query_one($sql);
    return $dm;
}
//san pham
function loadall_sp(){
    $sql="select * from san_pham order by ma_sp desc";
     $listsp=pdo_query($sql);
     return $listsp;
}
function loadsp($id){
    $sql="select * from san_pham where ma_sp=$id";
    $sp = pdo_query_one($sql);
    return $sp;
}
//san phẩm theo danh mục
function loadspdm($id){
    $sql="select * from san_pham where ma_dm=$id";
    $spdm = pdo_query($sql);
    return $spdm;
}
//sản phẩm cùng loại
function spcungloai($id,$ma_loai){
    $sql="SELECT * FROM san_pham WHERE ma_sp <> $id AND ma_dm = $ma_loai";
    $spcl = pdo_query($sql);
    return $spcl;
}
//tài khoản
function loadall_tt(){
    $sql="select * from khach_hang";
     $listtt=pdo_query($sql);
     return $listtt;
}
function loadtt($id){
    $sql="select * from khach_hang where ma_kh=$id";
    $tt = pdo_query_one($sql);
    return $tt;
}
function loaduser1($acc){
    $sql="select * from khach_hang where tai_khoan = '$acc'";
    $user = pdo_query($sql);
    return $user;
}function loaduser($acc){
    $sql="select * from khach_hang where tai_khoan = '$acc'";
    $user = pdo_query_one($sql);
    return $user;
}
//bình luận
function loadall_bl(){
    $sql="select * from binh_luan";
     $listbl=pdo_query($sql);
     return $listbl;
}
//bình luận theo sản phẩm
function blhh($id){
    $sql="SELECT * FROM binh_luan WHERE ma_sp = $id order by ma_bl desc";
     $blhh=pdo_query($sql);
     return $blhh;
}
//thống kê theo danh mục
function thongke_dm(){
    $sql="select danh_muc.ma_dm as id,danh_muc.ten_dm as danhmuc,count(san_pham.ma_sp) as countsp,min(san_pham.don_gia) as mingia,max(san_pham.don_gia) as maxgia,avg(san_pham.don_gia) as tb
    from san_pham left join danh_muc on san_pham.ma_dm = danh_muc.ma_dm group by danh_muc.ma_dm order by danh_muc.ma_dm asc";
     $listtkdm=pdo_query($sql);
     return $listtkdm;
}
//thống kê bình luận theo sản phẩm
function thongke_bl(){
    $sql="select hang_hoa.ma_hh as id,hang_hoa.ten_hh as name,count(binh_luan.ma_hh) as countbl,min(binh_luan.ngay) as minngay,max(binh_luan.ngay) as maxngay
    from hang_hoa left join binh_luan on hang_hoa.ma_hh = binh_luan.ma_hh group by hang_hoa.ma_hh order by hang_hoa.ma_hh asc";
     $listtkbl=pdo_query($sql);
     return $listtkbl;
}
//thống kê doanh thu theo ngày
function thongke_dt(){
    $sql="select date,sum(thanh_tien) as dt
    from don_hang where tinh_trang <> 'cancel' group by date order by date asc";
     $listtkdt=pdo_query($sql);
     return $listtkdt;
}
//đơn hàng
function loadall_dh(){
    $sql="select * from don_hang order by ma_dh desc";
     $listdh=pdo_query($sql);
     return $listdh;
}
function loaddh($id){
    $sql="select * from don_hang where ma_dh = '$id'";
    $dh = pdo_query_one($sql);
    return $dh;
}
function dhcomplete($acc){
    $sql="select * from don_hang where tai_khoan = '$acc' and trang_thai != 'hủy' order by ma_dh desc";
     $yourdh=pdo_query($sql);
     return $yourdh;
}
//sản phẩm đã bán
function ctdh($id){
    $sql="select * from ct_don_hang where ma_dh = $id";
     $sp=pdo_query($sql);
     return $sp;
}
//tim kiem
function timkiem($key){
    $sql = "SELECT * FROM san_pham WHERE ten_sp LIKE '%$key%'";
    $row=pdo_query($sql);
    return $row;
}
function timkiems($key,$bd){
    $kt = $bd + 4;
    $sql = "SELECT * FROM san_pham WHERE ten_sp LIKE '%$key%' LIMIT $bd,$kt";
    $row=pdo_query($sql);
    return $row;
}
//9 sản phẩm mới nhất
function spmoi(){
    $sql = "SELECT * FROM san_pham ORDER BY ma_sp  DESC LIMIT 5";
    $spmoi=pdo_query($sql);
    return $spmoi;
}
// sản phẩm yêu thích
function spyeuthich(){
    $sql = "SELECT * FROM san_pham ORDER BY luot_xem DESC LIMIT 5";
    $spyt=pdo_query($sql);
    return $spyt;
}
// màu sắc
function loadmau($id){
    $sql = "select * from mau_sac where ma_sp = $id";
    $mau=pdo_query($sql);
    return $mau;
}
function loadms($id){
    $sql = "select * from mau_sac where ma_ms = $id";
    $ms=pdo_query_one($sql);
    return $ms;
}
//so lượng
function loadsl($id){
    $sql = "select * from so_luong where ma_sp = $id";
    $sl=pdo_query($sql);
    return $sl;
}
function loadkho($id,$mau,$kt){
    $sql = "select * from so_luong where ma_sp = $id and ten_ms = '$mau' and ten_kt = '$kt'";
    $kho=pdo_query_one($sql);
    return $kho;
}
//kích thước
function loadkt($id){
    $sql = "select * from kich_thuoc where ma_sp = $id ";
    $kt=pdo_query($sql);
    return $kt;
}
//hình ảnh
function loadha($id){
    $sql = "select * from hinh_anh where ma_ms = $id";
    $ha=pdo_query($sql);
    return $ha;
}
function loadha4($id){
    $sql = "select * from hinh_anh where ma_ms = $id LIMIT 4";
    $ha=pdo_query($sql);
    return $ha;
}
//voucher
function loadvoucher($namevc){
    $sql = "select * from voucher where name_vc = '$namevc'";
    $vc=pdo_query_one($sql);
    return $vc;
}
function loadvc($id){
    $sql = "select * from voucher where ma_vc = $id";
    $vc=pdo_query_one($sql);
    return $vc;
}
function loadall_voucher(){
    $sql = "select * from voucher order by ma_vc desc";
    $vc=pdo_query($sql);
    return $vc;
}
?>
