<?php require "model/pdo.php" ?>
<?php require "model/luotxem.php" ?>
<?php require "model/select.php" ?>
<?php require "model/insert.php" ?>
<?php require "model/update.php" ?>
<?php require "model/delete.php" ?>
<?php
 if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['key']) ){
  $key = $_POST['key'];
  $_SESSION['key'] = $key;
  header("location:index.php?act=timkiem");
 }
}

if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
// if(isset($_POST['addcarts'])){
//   if(!empty($_POST['color'])&&!empty($_POST['size'])){
//   $color = $_POST['color'];
//   $size = $_POST['size'];
//   $cart = [$color,$size];
//   array_push($_SESSION['cart'],$cart);
//   }
// }
$spyt = spyeuthich();
$listsp = spmoi();
$dm = loadall_dm();
include "view/header.php";
    if(isset($_GET['act']) && $_GET['act']){
      $act = $_GET['act'];
    switch ($act) {
      case 'timkiem':        
        include "view/sanpham/timkiem.php"; 
        break;
      case 'dmsp':        
         include "view/sanpham/danhmucsp.php";
        break;
        case 'ct':
          if(isset($_SESSION['account'])){
            $acc = $_SESSION['account'];
            $user = loaduser($acc);
          }
          
          if(isset($_GET['id'])){
            $id = $_GET['id'];
           }
           if(isset($_GET['ms'])){
            $ms = $_GET['ms'];
           }
           $sp=loadsp($id); 
           $dm = loaddm($sp['ma_dm']) ;  
           $spcl = spcungloai($id,$sp['ma_dm'])     ;   
           $mau = loadmau($id);
           $maus = loadms($ms);
           $kt = loadkt($id);
           $ha = loadha4($ms);
           $listbl = blhh($id);
            include "view/sanpham/chitiet.php";
          
          break;
          case 'gt':

            include "view/gioithieu.php";
            break;
          case 'lh':
              include "view/lienhe.php";
              break;
          case 'gy':
                include "view/gopy.php";
                break;
          case 'hd':
                  include "view/hoidap.php";
                  break;
          case 'dangnhap':
                    include "view/dangnhap.php";
                    break;  
         case 'dangky':
                   include "view/dangky.php";
                  break;  
          case 'quenmk':
                   include "view/quenmk.php";
                  break;
          case 'cart':
                   include "view/cart.php";
                  break;
          case 'dathang':
                   include "view/dathang.php";
                  break;
          case 'camon':
                   include "view/camon.php";
                  break;
          case 'allnew':
                   include "view/allnew.php";
                  break;
          case 'like':
                   include "view/yeuthich.php";
                  break;
          case 'profile':
            if(isset($_SESSION['account'])){
              $acc = $_SESSION['account'];
              $user = loaduser($acc);
              $acc = $user['tai_khoan'];
            }
            
                   include "view/profile.php";
                  break;    
      default:
 
      include "view/home.php";
        break;
    }
    }else{
    
      include "view/home.php";
    
  } 
    include "view/footer.php";
?>