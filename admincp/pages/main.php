<div class="wrapper">
    <style>
    .wrapper {
        display: flex;
    }
    </style>
    <?php
        include("sidebar/sidebar.php")
        ?>

    <?php
            if(isset($_GET['quanly'])){
                $tam = $_GET['quanly'];
            } else {
                $tam = '';
            }
            if($tam =='danhsachloaisanpham'){
                include("main/danhsachloaisanpham.php");
            }

            else if($tam =='danhsachmausac'){
                include("main/quanlymausac/danhsachmausac.php");
            }

            else if($tam =='timkiemmausac'){
                include("main/quanlymausac/timkiemmausac.php");
            }

            else if($tam =='suamausac'){
                include("main/quanlymausac/suamausac.php");
            }

            else if($tam =='themmausac'){
                include("main/quanlymausac/themmausac.php");
            }

            else if($tam =='xemchitiet'){
                include("main/quanlylienhe/xemchitiet.php");
            }

            else if($tam =='danhsachhoadon'){
                include("main/quanlyhoadon/danhsachhoadon.php");
            }

            else if($tam =='xemdonhang'){
                include("main/quanlyhoadon/xemhoadon.php");
            }

            else if($tam =='danhsachsanpham'){
                include("main/quanlysanpham/danhsachsanpham.php");
            }

            else if($tam =='suasanpham'){
                include("main/quanlysanpham/suasanpham.php");
            }

            else if($tam =='themsanpham'){
                include("main/quanlysanpham/themsanpham.php");
            }

            
            else if($tam =='timkiemloaisanpham'){
                include("main/quanlysanpham/timkiemloaisanpham.php");
            }

            else if($tam =='timkiemdonhang'){
                include("main/quanlyhoadon/timkiemdonhang.php");
            }

            else if($tam =='danhsachsize'){
                include("main/quanlysize/danhsachsize.php");
            }

            else if($tam =='suasize'){
                include("main/quanlysize/suasize.php");
            }

            else if($tam =='themsize'){
                include("main/quanlysize/themsize.php");
            }

            else if($tam =='timkiemsize'){
                include("main/quanlysize/timkiemsize.php");
            }

            else if($tam =='danhsachnhacungcap'){
                include("main/quanlynhacungcap/danhsachnhacungcap.php");
            }

            else if($tam =='themnhacungcap'){
                include("main/quanlynhacungcap/themnhacungcap.php");
            }

            else if($tam =='suanhacungcap'){
                include("main/quanlynhacungcap/suanhacungcap.php");
            }

            else if($tam =='timkiemnhacungcap'){
                include("main/quanlynhacungcap/timkiemnhacungcap.php");
            }

            else if($tam =='danhsachtaikhoan'){
                include("main/quanlytaikhoan/danhsachtaikhoan.php");
            }

            else if($tam =='suataikhoan'){
                include("main/quanlytaikhoan/suataikhoan.php");
            }

            else if($tam =='timkiemtaikhoan'){
                include("main/quanlytaikhoan/timkiemtaikhoan.php");
            }

            else if($tam =='timkiemloaisanpham'){
                include("main/timkiemloaisanpham.php");
            }

            else if($tam =='7ngay'){
                include("main/7ngay.php");
            }

            else if($tam =='1nam'){
                include("main/1nam.php");
            }

            else if($tam =='themloaisanpham'){
                include("main/themloaisanpham.php");
            }

            else if($tam =='sualoaisanpham'){
                include("main/sualoaisanpham.php");
            }

            else if($tam =='xulyloaisanpham'){
                include("xuly/xulyloaisanpham.php");
            }

            else if($tam =='xulynhacungcap'){
                include("xuly/xulynhacungcap.php");
            }

            else if($tam =='xulymausac'){
                include("xuly/xulymausac.php");
            }

            else if($tam =='xulydonhang'){
                include("xuly/xulydonhang.php");
            }

            
            else if($tam =='xulysize'){
                include("xuly/xulysize.php");
            }

            else if($tam =='xulysanpham'){
                include("xuly/xulysanpham.php");
            }

            else if($tam =='xulytaikhoan'){
                include("xuly/xulytaikhoan.php");
            }

            else {
                include("main/index.php");
            }
          ?>
</div>