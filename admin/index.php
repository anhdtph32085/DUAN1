<?php
include "../model/pdo.php";
include "../model/insert.php";
include "../model/update.php";
include "../model/delete.php";
include "../model/select.php";
// if(isset($_SESSION['account']) && isset($_SESSION['password'])){
//     $acc = $_SESSION['account'];
//     $user = loaduser($acc);
//    if($user['vaitro']!="admin"){ header("location:../index.php");}
//   }
//      else{
//         header("location:../index.php");
//       } 
    include "header.php";
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "listdm":
                $listdm=loadall_dm();
                include "danhmuc/list.php";
                break;
            case "adddm":
                if(isset($_POST['themmoi'])){
                    if(!empty($_POST['tenloai'])){
                     $ten_loai =$_POST['tenloai'];
                     adddm($ten_loai);
                     $thongbao = "Thêm thành công!";
                    }else{
                        $thongbao = "Vui lòng nhập tên danh mục";
                    }
                 }
                include "danhmuc/add.php";
                break; 
            case "xoadm":
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                         updatettdm($id);
                    }
                         $listdm=loadall_dm();
                        include "danhmuc/list.php";              

                    break;  
            case "suadm":
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $dm=loaddm($id);
                        include "danhmuc/update.php";
                    }
                    break;  
            case "updatedm":
                        if(isset($_POST['capnhat'])){
                            if(!empty($_POST['tenloai'])){
                             $ten_loai =$_POST['tenloai'];
                             $id =$_POST['id'];
                             $tt = $_POST['tt'];
                             updatedm($id,$ten_loai,$tt);
                            }
                         }
                         $listdm=loadall_dm();
                        include "danhmuc/list.php";
                        break; 
            case "addsp":
                        if(isset($_POST['themmoi'])){
                            $target = "../uploads/";
                            $file = $target.basename($_FILES['hinh']['name']);
                            $imageFileType = pathinfo($file,PATHINFO_EXTENSION);
                            if(empty($_POST['tenhh'])){
                                $thongbao = "Vui lòng nhập tên sản phẩm";
                            }else if(empty($_POST['gia'])){
                                $thongbao = "Vui lòng nhập giá";
                            }else if($_FILES['hinh']['name']=="" || $_FILES['hinh']['error'] ==4 || $_FILES["hinh"]["size"] > 500000 || ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif" )){
                                $thongbao = "Hình ảnh không hợp lệ";
                            }else if(empty($_POST['size'])){
                                $thongbao = "Vui lòng chọn size";
                            }else if(empty($_POST['mau'])){
                                $thongbao = "Vui lòng chọn màu";
                            }else
                            if(!empty($_POST['tenhh']) && !empty($_POST['gia']) && !empty($_POST['lhang'])){
                            move_uploaded_file($_FILES['hinh']['tmp_name'],$file);
                            $tenhh = check($_POST['tenhh']);
                            $gia = check($_POST['gia']);
                            $sale = check($_POST['giamgia']);
                            $lhang = check($_POST['lhang']);
                            $mota = check($_POST['mota']);
                            $hinh = check($_FILES['hinh']['name']);
                            addsp($tenhh,$gia,$sale,$hinh,$mota,$lhang);
                            $listsp=loadall_sp();
                            $masp = $listsp[0]['ma_sp'];
                            if(isset($_POST['mau'])){
                            $maus = $_POST['mau'];
                            }
                            if(isset($_POST['size'])){
                                $sizes = $_POST['size'];
                                }
                            foreach ($maus as $key => $mau) {
                                addmau($masp,$mau);
                                foreach ($sizes as $key => $size) {
                                    addsl($masp,$mau,$size);
                                }
                           
                            }
                            foreach ($sizes as $key => $size) {
                                addsize($masp,$size);
                            }
                        
                          
                             header("location:index.php?act=suaha&id=$masp");
                             $thongbao = "Thêm thành công!";
                            }
                         }
                        $listdm=loadall_dm();
                        include "sanpham/add.php";
                        break;
            case 'addha':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                $ms = loadms($id);
                $masp = $ms['ma_sp'];
                $target = "../uploads/";
                
                if(isset($_POST['addimg']) && ($_POST['addimg'])){
                    if(isset($_FILES['imgs'])){      
                        $files = $_FILES['imgs'];
                        
                    }
                    $imgs = $files['name'];
                    $file = $target.basename($_FILES['img']['name']);
                    $ma_ms = $_POST['ma'];
                    $img = $_FILES['img']['name'];
                    $imageFileType = pathinfo($file,PATHINFO_EXTENSION);
                    if($_FILES['img']['name']=="" || $_FILES['img']['error'] ==4 || $_FILES["img"]["size"] > 500000 || ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif")){
                        $thongbao = "Ảnh không hợp lệ!";
                    }
                    else{
                    move_uploaded_file($_FILES['img']['tmp_name'],$file);
                    addimg($ma_ms,$img);
                    
                    foreach ($imgs as $key => $value) {
                        if(!empty($value)){
                        move_uploaded_file($files['tmp_name'][$key],$target.$value);
                        addimg($ma_ms,$value);
                    }}
                    header("location:index.php?act=suaha&id=$masp");
                }
                   
                }
                
                 include "sanpham/addimg.php";
                break;
            case "updatesp":
                            if(isset($_POST['capnhat'])){
                                $target = "../uploads/";
                                $file = $target.basename($_FILES['hinh']['name']);
                                $id =$_POST['id'];
                                $sp=loadsp($id);
                                $tenhh = $_POST['tenhh'];
                                $gia = $_POST['gia'];
                                $sale = $_POST['giamgia'];
                                $lhang =$_POST['lhang'];
                                $mota = $_POST['mota'];
                                if($_FILES['hinh']['name'] !="" && $_FILES['hinh']['error']==0 && !empty($_POST['tenhh']) &&! empty($_POST['gia']) && !empty($_POST['lhang'])){
                                $hinh = $_FILES['hinh']['name'];
                                move_uploaded_file($_FILES['hinh']['tmp_name'],$file);
                               updatesp($tenhh,$gia,$hinh,$sale,$mota,$lhang ,$id);
                                
                               }else{
                                $hinh = $sp['hinh_anh'];
                                updatesp($tenhh,$gia,$hinh,$sale,$mota,$lhang ,$id);
                                
                               }
                             }
                             $listsp=loadall_sp();
                            include "sanpham/list.php";
                            break; 
             case "listsp":
                     $listsp=loadall_sp();
                    include "sanpham/list.php";
                    break;
             case "xoasp":
                                    if(isset($_GET['id'])){
                                        $id = $_GET['id'];
                                        delkt($id);
                                        delms($id);
                                        delsl($id);
                                         delsp($id);
                                         $listsp=loadall_sp();
                                        include "sanpham/list.php";
                                        
                                     }
                                    break;  
              case "suasp":
                                     if(isset($_GET['id'])){
                                            $id = $_GET['id'];
                                            $sp=loadsp($id);
                                            $listdm=loadall_dm();
                                            include "sanpham/update.php";
                                        }
                                        break; 
              case "suaha":
                                     if(isset($_GET['id'])){
                                            $id = $_GET['id'];
                                            $sp=loadsp($id);
                                            $mau=loadmau($id);    
                                        }
                                     if($_SERVER['REQUEST_METHOD']=="POST"){
                                        $ma_ha = $_POST['maha'];
                                        $target = "../uploads/";
                                        $file = $target.basename($_FILES['img']['name']);
                                        if($_FILES['img']['name']!="" && $_FILES['img']['error'] == 0){
                                            move_uploaded_file($_FILES['img']['tmp_name'],$file);
                                        $img = $_FILES['img']['name'];
                                            updateha($ma_ha,$img);
                                        }
                                     }
                                        include "sanpham/listha.php";
                                        break; 
              case "xoaha":
                                    if(isset($_GET['id'])){
                                        $id = $_GET['id'];
                                        delha($id);
                                    }
                                    if(isset($_GET['idd'])){
                                        $idd = $_GET['idd'];
                                        header("location:index.php?act=suaha&id=$idd");  
                                    }
                                    break;  
              case "addsl":
                                    if(isset($_GET['id'])){
                                        $id = $_GET['id'];
                                
                                    }
                                    if(isset($_POST['masl'])){
                                        $masl = $_POST['masl'];
                                    }
                                    if(isset($_POST['number'])){
                                        $number = $_POST['number'];
                                    }
                                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                                        foreach ($masl as $key => $value) {
                                            updatesl($value,$number[$key]);
                                        }
                                    }
                                    $sl = loadsl($id);
                                    include "kho/sl.php";
                                    break;  
            case "listkh":
                $listtt=loadall_tt();
                include "taikhoan/list.php";
                break;
            case "addkh":
                if(isset($_POST['themmoi'])){
                    if(empty($_POST['acc'])){
                        $thongbao = "Vui lòng nhập tài khoản";
                    }else if(empty($_POST['pass'])){
                        $thongbao = "Vui lòng nhập mật khẩu";
                    }else if(empty($_POST['phone'])){
                        $thongbao = "Vui lòng nhập số điện thoại";
                    }else if(empty($_POST['email'])){
                        $thongbao = "Vui lòng nhập email";
                    }else
                    if(!empty($_POST['acc'])&& !empty($_POST['pass'])&&!empty($_POST['email'])&&!empty($_POST['phone'])){
                        $acc = check($_POST['acc']);
                        $pas = check($_POST['pass']);
                        $email = check($_POST['email']);
                        $phone = check($_POST['phone']);
                        addtt($acc,$pas,$email,$phone);
                        $thongbao = "Thêm thành công!";
                       }
                 }
                include "taikhoan/add.php";
                break; 
            case "xoakh":
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                         deltt($id);
                         $listtt=loadall_tt();
                        include "taikhoan/list.php";              
                     }
                    break;  
            case "suakh":
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $kh=loadtt($id);
                        include "taikhoan/update.php";
                    }
                    break;  
            case "updatekh":
                if(isset($_POST['capnhat'])){
                    $acc = check($_POST['acc']);
                    $pas = check($_POST['pas']);
                    $email = check($_POST['email']);
                    $phone = check($_POST['phone']);
                    $hoten = check($_POST['hoten']);
                    $diachi = check($_POST['diachi']);
                    $vaitro = check($_POST['vaitro']);
                     $id =$_POST['id'];
                     updatett($acc,$pas,$email,$phone,$hoten,$diachi,$vaitro ,$id);
                    
                 }
                 $listtt=loadall_tt();
                include "taikhoan/list.php";
                break;  
            case "listbl":
                    $listbl=loadall_bl();
                    include "binhluan/list.php";
                    break;  
            case "xoabl":
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                         delbl($id);
                         $listbl=loadall_bl();
                         include "binhluan/list.php";              
                         }
                        break;   
            case "listtk":
                            // $listtkdt = thongke_dt();
                            // $listtkbl = thongke_bl();
                            $listtkdm=thongke_dm();
                            include "thongke/list.php";
                break;  
            case 'bieudodm':
                $listtkdm=thongke_dm();
                include "thongke/bieudotkdm.php";
                break;
            case 'bieudobl':
                $listtkbl=thongke_bl();
                include "thongke/bieudotkbl.php";
                break;
            case 'bieudodt':
                $listtkdt=thongke_dt();
                include "thongke/bieudodt.php";
                break;
            case 'listdh':
                    $listdh=loadall_dh();
                    include "donhang/list.php";
                    break;
            case 'huydh':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    huydh($id);   
                    header("location:index.php?act=listdh");               
                     }
                break;
            case 'suasize':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                $listkt = loadkt($id);                  
                     
                include "sanpham/updatesize.php";
                break;   
            case 'voucher':
                if(isset($_POST['themmoi'])){
                    if(!empty($_POST['namevc']) && !empty($_POST['gtvc']) && !empty($_POST['voucher'])){
                     $namevc =$_POST['namevc'];
                     $vc = loadvoucher($namevc);
                     if(is_array($vc)){
                     $thongbao = "Voucher đã tồn tại";
                     }else{
                     $gtvc =$_POST['gtvc'];
                     $voucher =$_POST['voucher'];
                     $datebd =$_POST['datebd'];
                     $datekt =$_POST['datekt'];
                     addvoucher($voucher,$namevc,$gtvc,$datebd,$datekt);
                     $thongbao = "Thêm thành công!";
                    }}else{
                        $thongbao = "Vui lòng nhập lại";
                    }
                 }
                
                include "voucher/add.php";
                break; 
            case 'listvc':
                $listvc = loadall_voucher();                  
                     
                include "voucher/list.php";
                break; 
            case 'suavc':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                if(isset($_POST['capnhat'])){
                    if(!empty($_POST['namevc']) && !empty($_POST['gtvc']) && !empty($_POST['voucher'])){
                     $namevc =$_POST['namevc'];
                     $id = $_POST['id'];
                     $gtvc =$_POST['gtvc'];
                     $voucher =$_POST['voucher'];
                     $datebd =$_POST['datebd'];
                     $datekt =$_POST['datekt'];
                     updatevoucher($id,$voucher,$namevc,$gtvc,$datebd,$datekt);
                     $thongbao = "Cập nhật thành công!";
                    }else{
                        $thongbao = "Vui lòng nhập lại";
                    }
                 }
                    $vc = loadvc($id);              
                    include "voucher/update.php";
                break;
            case 'xoavc':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                delvc($id);                  
                header("location:index.php?act=listvc");
                break;                
            default:
              include "view/home.php";
                  break;                             
        }
    }else{
        include "home.php";
    }
    include "footer.php";
?>
