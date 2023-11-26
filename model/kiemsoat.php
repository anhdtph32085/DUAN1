<?php 
    $sql="select * from don_hang where trang_thai = 'Chưa hoàn thành'";
    $listdh = pdo_query($sql);
    foreach ($listdh as $key => $dh) {
      $first_date = new DateTime($dh['ngay_tao']);
      $second_date = new DateTime(date('Y-m-d'));
      $dateinterval = $first_date->diff($second_date);
      $time = $dateinterval->days;
      if($time>1){
        huydh($dh['ma_dh']);
      }
    }

?>