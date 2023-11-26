<?php
function deldm($id){
    $sql = "delete from danh_muc where ma_dm=$id";
    pdo_execute($sql);
}
function delsp($id){
    $sql = "delete from san_pham where ma_sp=$id";
    pdo_execute($sql);
}
function deltt($id){
    $sql = "delete from khach_hang where ma_kh=$id";
    pdo_execute($sql);
}
function delbl($id){
    $sql = "delete from binh_luan where ma_bl=$id";
    pdo_execute($sql);
}
function deldh($id){
    $sql = "delete from don_hang where ma_dh=$id";
    pdo_execute($sql);
}
function del($id){
    $sql = "delete from san_pham_da_ban where ma_dh=$id";
    pdo_execute($sql);
}
function delkt($id){
    $sql = "delete from kich_thuoc where ma_sp = $id";
    pdo_execute($sql);
}
function delms($id){
    $sql = "delete from mau_sac where ma_sp = $id";
    pdo_execute($sql);
}
function delsl($id){
    $sql = "delete from so_luong where ma_sp = $id";
    pdo_execute($sql);
}
function delha($id){
    $sql = "delete from hinh_anh where ma_ha = $id";
    pdo_execute($sql);
}
function delvc($id){
    $sql = "delete from voucher where ma_vc = $id";
    pdo_execute($sql);
}
?>