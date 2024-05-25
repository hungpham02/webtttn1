<link rel="stylesheet" href="../css/style.css">
<div class="main">
    <div class="maincontent">
        <?php
        if (isset($_GET['quanly'])) {
            $bientam = $_GET['quanly'];
        } else {
            $bientam = "";
        }
        if ($bientam == 'loaisanphamlist') {
            include("main/loaisanpham.php");
        } elseif ($bientam == 'nhacungcaplist') {
            include("main/nhacungcap.php");
        }elseif ($bientam == 'lichsudonhang') {
            include("main/lichsudonhang.php");
        } elseif ($bientam == 'giohang') {
            include("main/giohang.php");
        } elseif ($bientam == 'contact') {
            include("main/contact.php");
        } elseif ($bientam == 'sanpham') {
            include("main/sanpham.php");
        } elseif ($bientam == 'dangnhap') {
            include("main/login.php");
        } elseif ($bientam == 'dangky') {
            include("main/dangky.php");
        } elseif ($bientam == 'vanchuyen') {
            include("main/vanchuyen.php");
        } elseif ($bientam == 'xemdonhang') {
            include("main/xemdonhang.php");
        } elseif ($bientam == 'donhangdadat') {
            include("main/donhangdadat.php");
        }elseif ($bientam == 'camon') {
            include("main/camon.php");
        }elseif ($bientam == 'xulydonhang') {
            include("main/xulydonhang.php");
        }  elseif ($bientam == 'thongtin') {
            include("main/info.php");
        }elseif ($bientam == 'thongtinthanhtoan') {
            include("main/thongtinthanhtoan.php");
        } elseif ($bientam == 'timkiem') {
            include("main/timkiem.php");
        } else {?><div class="slideshow-container">
                <div class="mySlides fade" style="display: none;">
                    <img src="./assets/banner1.jpg" style="width:100%">
                </div>
                <div class="mySlides fade" style="display: none;">
                    <img src="./assets/banner2.jpg" style="width:100%">
                </div>
                <div class="mySlides fade" style="display: block;">
                    <img src="./assets/banner3.png" style="width:100%">
                </div>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot active"></span>
            </div>

            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                    setTimeout(showSlides, 3000); // Change image every 2 seconds
                }
                const next = document.querySelector('.next')
                const prev = document.querySelector('.prev')
                const comment = document.querySelector('#list-comment')
                const commentItem = document.querySelectorAll('#list-comment .item')
                var translateY = 0
                var count = commentItem.length
            </script>
        <?php
        }
        ?>
    </div>
</div>