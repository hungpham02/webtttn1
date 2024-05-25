 <!--=============== SIDEBAR ===============-->
 <?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['name']);
    unset($_SESSION['dangnhap']);
    unset($_SESSION['id_admin']);
    unset($_SESSION['level']);
    header('location:http://localhost/webtttn1/index.php?quanly=dangnhap');
    }
?>
 <div class="sidebar" id="sidebar" style="background: black;">
     <nav class="sidebar__container">
         <div class="sidebar__logo">
             <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9vKExMYVzYQLYKlbEmfjGkVePY1es7ooqY_2wbUObbA&s" alt="" class="sidebar__logo-img">
         </div>

         <div class="sidebar__content">
             <div class="sidebar__list">
                 <a href="index.php" class="sidebar__link active-link">
                     <i class="ri-home-5-line"></i>
                     <span class="sidebar__link-name">Trang chủ</span>
                     <span class="sidebar__link-floating">Trang chủ</span>
                 </a>

                 <a href="index.php?quanly=themloaisanpham" class="sidebar__link">
                     <i class="ri-compass-3-line"></i>
                     <span class="sidebar__link-name">Thêm loại sản phẩm</span>
                     <span class="sidebar__link-floating">Thêm loại sản phẩm</span>
                 </a>

                 <a href="index.php?quanly=themmausac" class="sidebar__link">
                     <i class="ri-video-line"></i>
                     <span class="sidebar__link-name">Thêm màu sắc</span>
                     <span class="sidebar__link-floating">Thêm màu sắc</span>
                 </a>

                 <a href="index.php?quanly=themsanpham" class="sidebar__link">
                     <i class="ri-add-box-line"></i>
                     <span class="sidebar__link-name">Thêm sản phẩm</span>
                     <span class="sidebar__link-floating">Thêm sản phẩm</span>
                 </a>

                 <a href="index.php?quanly=themsize" class="sidebar__link">
                     <i class="ri-add-box-line"></i>
                     <span class="sidebar__link-name">Thêm size sản phẩm</span>
                     <span class="sidebar__link-floating">Thêm size sản phẩm</span>
                 </a>

                 <a href="index.php?quanly=themnhacungcap" class="sidebar__link">
                     <i class="ri-add-box-line"></i>
                     <span class="sidebar__link-name">Thêm nhà cung cấp sản phẩm</span>
                     <span class="sidebar__link-floating">Thêm nhà cung cấp sản phẩm</span>
                 </a>

             </div>

             <h3 class="sidebar__title">
                 <span>Danh sách</span>
             </h3>
             <div class="sidebar__list">
                 <a href="index.php?quanly=danhsachloaisanpham" class="sidebar__link">
                     <i class="ri-history-line"></i>
                     <span class="sidebar__link-name">Danh sách loại sản phẩm</span>
                     <span class="sidebar__link-floating">Danh sách loại sản phẩm</span>
                 </a>
                 <a href="index.php?quanly=xemchitiet" class="sidebar__link">
                     <i class="ri-history-line"></i>
                     <span class="sidebar__link-name">Quản lý liên hệ</span>
                     <span class="sidebar__link-floating">Quản lý liên hệ</span>
                 </a>
                 <a href="index.php?quanly=danhsachsize" class="sidebar__link">
                     <i class="ri-history-line"></i>
                     <span class="sidebar__link-name">Quản lý size</span>
                     <span class="sidebar__link-floating">Quản lý size</span>
                 </a>
                 <a href="index.php?quanly=danhsachnhacungcap" class="sidebar__link">
                     <i class="ri-history-line"></i>
                     <span class="sidebar__link-name">Quản lý nhà cung cấp</span>
                     <span class="sidebar__link-floating">Quản lý nhà cung cấp</span>
                 </a>
                 <a href="index.php?quanly=danhsachsanpham" class="sidebar__link">
                     <i class="ri-history-line"></i>
                     <span class="sidebar__link-name">Quản lý sản phẩm</span>
                     <span class="sidebar__link-floating">Quản lý sản phẩm</span>
                 </a>
                 <a href="index.php?quanly=danhsachhoadon" class="sidebar__link">
                     <i class="ri-history-line"></i>
                     <span class="sidebar__link-name">Quản lý đơn hàng</span>
                     <span class="sidebar__link-floating">Quản lý đơn hàng</span>
                 </a>
                 <a href="index.php?quanly=danhsachmausac" class="sidebar__link">
                     <i class="ri-history-line"></i>
                     <span class="sidebar__link-name">Danh sách màu sắc</span>
                     <span class="sidebar__link-floating">Danh sách màu sắc</span>
                 </a>
                 <a href="index.php?quanly=danhsachtaikhoan" class="sidebar__link">
                     <i class="ri-history-line"></i>
                     <span class="sidebar__link-name">Danh sách tài khoản</span>
                     <span class="sidebar__link-floating">Danh sách tài khoản</span>
                 </a>
</div>

             <h3 class="sidebar__title">
                 <span>General</span>
             </h3>

             <div class="sidebar__list">
                 <a href="index.php?dangxuat=1" class="sidebar__link">
                     <i class="ri-logout-box-r-line"></i>
                     <span class="sidebar__link-name">Logout</span>
                     <span class="sidebar__link-floating">Logout</span>
                 </a>
             </div>
         </div>
         <div class="sidebar__account">
             <img src="images/perfil.png" alt="sidebar image" class="sidebar__perfil">

             <div class="sidebar__names">
                 <h3 class="sidebar__name"><?php echo  $_SESSION['name']  ?></h3>
                 <span class="sidebar__email"><?php echo  $_SESSION['dangnhap']  ?></span>
             </div>

             <i class="ri-arrow-right-s-line"></i>
         </div>
     </nav>
 </div>
 
 <div class="sidebar__account">
     <img src="" alt="sidebar image" class="sidebar__perfil">

     <div class="sidebar__names">
         <h3 class="sidebar__name"><?php echo  $_SESSION['name']  ?></h3>
         <span class="sidebar__email"><?php echo  $_SESSION['dangnhap']  ?></span>
     </div>

     <i class="ri-arrow-right-s-line"></i>
 </div>
 </nav>
 </div>
 