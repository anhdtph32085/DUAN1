<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NINE SHOP</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <a href="index.php"><img src="../img/logo.png" alt="logo"></a>
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="index.php?act=gt">Giới thiệu</a></li>
            <li><a href="">Liên hệ</a></li>
            <li><a href="">Góp ý</a></li>
            <li><a href="index.php?act=hd">Hỏi đáp</a></li>
        </ul>
        <span>
            Hỗ trợ? <br>
            0123456789
        </span>
    </header>
    <nav id="Menu">
        <div class="offcanvas offcanvas-start" id="demo">
            <div class="offcanvas-header">
              <h1 class="offcanvas-title">Danh mục</h1>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <?php foreach($dm as $ro) :?>
            <li><a href="index.php?act=dmsp&id=<?php echo $ro['ma_dm']?>"><?php echo $ro['ten_dm'] ?></a></li><br>
                 <?php endforeach ?>
            </div>
          </div>
        <button class="danhmuc" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"><i class="fa-solid fa-bars"></i> Danh mục</button>
        <form action="" method="post">
            <input type="search" name="key" id="key" required placeholder="Nhập tên sản phẩm cần tìm">
            <button type="submit" name="search" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <span><?php if(isset($_SESSION['account'])) :?>
            <?php  $acc = $_SESSION['account'] ?>
            <a class="i" href="index.php?act=profile" ><i class="fa-solid fa-user" title="<?php echo $acc ?>"></i></a>
            <?php endif ?>
            <?php if(!isset($_SESSION['account'])) :?>
            <a class="" href="index.php?act=dangnhap"> <i class="fa-regular fa-circle-user" title="Đăng nhập"></i></a>
            <?php endif ?>
            <a href="index.php?act=cart" class=""><i class="fa-solid fa-cart-shopping" title="Giỏ hàng"></i></a></span>
    </nav>