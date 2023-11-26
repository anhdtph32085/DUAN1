<footer>
<div class="con">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone</p>
                    <div class="app-logo">
                        <img src="img/play-store.png" alt="">
                        <img src="img/app-store.png" alt="">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="img/logo.png" alt="">
                    <p>Our Purpose Is To Sustainabbly Make the Pleasure and 
                        Benfits of Sports Accessible to the Mary.
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Use links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="sopyright">Copyright 2023 - NINE SHOP</p>
        </div>
</footer>
</body>
<script>
           var namevc = document.getElementsByClassName('vouCher');
        var vlvoucher = document.getElementsByClassName('vlvouCher');
        function getVoucher() {           
        let myInput = document.getElementById("myVoucher");
        let myVoucher = myInput.value.toUpperCase();   
        let check = 0;   
        for(let i = 0;i<namevc.length;i++){
            if(namevc[i].value==myVoucher){
            var gt = i;
            check = 1;
            }
        }if(check==1){
            var thanhtien = document.getElementById('Voucher').value - vlvoucher[gt].value;
            document.getElementById('gtVoucher').value = vlvoucher[gt].value;
            document.getElementById('order-price-total').innerHTML= thanhtien.toLocaleString("en-US") +"đ"; 
            document.getElementById('thongBao').innerHTML = "Áp dụng thành công!";
        }              
}    
        var khohang = document.getElementsByClassName('khohang');
    var kho =  document.getElementById('khoh-1');
    var sl = document.getElementById('sl');
    var khoss = document.getElementsByClassName('khoss');
    function tang1(i){   
        kho.innerHTML =khohang[i].value;
        document.getElementById('khhh').value = khoss[i].value;
    }
</script>
<script>
    window.onscroll = function() {stickyMenu()};

// Định nghĩa hàm khi sự kiện cuộn trang được kích hoạt
var menu, sticky;
menu = document.getElementById('Menu');
sticky = menu.offsetTop;

function stickyMenu() {
    if(window.pageYOffset >= sticky) {
        menu.classList.add("sticky");
    }else{
        menu.classList.remove("sticky");    
    }
}

function tang(){   
       if(document.getElementById('sl').value<parseInt(document.getElementById('khhh').value)){
        document.getElementById('sl').value++;  }
       }
    
    function giam(){   
        if(document.getElementById('sl').value >1)
        document.getElementById('sl').value--;  
    
    if(document.getElementById('sl').value <0)
        document.getElementById('sl').value=1;  
    }
</script>
<script>
    var sl0 = document.getElementsByClassName('sl0');
    var pr0 = document.getElementsByClassName('pr0');
    var price0 = document.getElementsByClassName('price_0');
  
             function tang0(i){   
        sl0[i].value++;  
        var conten = parseInt(sl0[i].value) *parseInt(pr0[i].value);
        price0[i].innerHTML=conten.toLocaleString("en-US") + "đ";
        var tong = 0;
        var sl = 0;
        for(var j = 0;j<sl0.length;j++){
            tong = tong+ parseInt(sl0[j].value) *parseInt(pr0[j].value);
            sl = sl + parseInt(sl0[j].value);
        }
        document.getElementById('total-product').innerHTML = sl;
        document.getElementById('total-not-discount').innerHTML = tong.toLocaleString("en-US") + "đ";
        document.getElementById('order-price-total').innerHTML = tong.toLocaleString("en-US") + "đ";
    }
    function giam0(i){   
        if(sl0[i].value >1){
        sl0[i].value--;  
        var conten = parseInt(sl0[i].value) *parseInt(pr0[i].value);
        price0[i].innerHTML=conten.toLocaleString("en-US") + "đ";
        var tong = 0;
        var sl = 0;
        for(var j = 0;j<sl0.length;j++){
            tong = tong+ parseInt(sl0[j].value) *parseInt(pr0[j].value);
            sl = sl + parseInt(sl0[j].value);
        }
        document.getElementById('total-product').innerHTML = sl;
        document.getElementById('total-not-discount').innerHTML = tong.toLocaleString("en-US") + "đ";
        document.getElementById('order-price-total').innerHTML = tong.toLocaleString("en-US") + "đ";
        }
    if(document.getElementById('sl0').value <0)
        document.getElementById('sl0').value=1;  
    }

        </script>
<script src="../js/radio.js">  

        function closeModal(){
            var modal = document.getElementById('modalThank');
            modal.style.display= 'none';
        }
        function openModal(){
            var modall = document.getElementById('modalThank');
            modall.style.display="block";
        }
        var modall = document.getElementById('modalThank');
        modall.style.display="none";

 
    
</script>
</html>