<?php
require('carbon/autoload.php');
use Carbon\Carbon;

$now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

if(isset($_GET['cart_status']) && isset($_GET['code'])){
    $status = $_GET['cart_status'];
    $code = $_GET['code'];

    $sql = "UPDATE tbl_cart SET cart_status = '$status' WHERE code_cart = '$code'";
    $sql_query = mysqli_query($connect, $sql);

    $sql_lietke_dh = "SELECT * FROM tbl_cart_details, tbl_sanpham WHERE 
    tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart = '$code' 
    ORDER BY tbl_cart_details.id_cart_details DESC";
    $query_lietke_dh = mysqli_query($connect, $sql_lietke_dh);

    $sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat = '$now'";
    $query_thongke = mysqli_query($connect, $sql_thongke);

    $soluongmua = 0;
    $doanhthu = 0;

    while($row = mysqli_fetch_array($query_lietke_dh)){
        $soluongmua += $row['soluongmua'];
        $doanhthu += $row['giasanpham'];
    }

    if(mysqli_num_rows($query_thongke) == 0){
        $soluongban = $soluongmua;
        $donhang = 1;
        $sql_update_thongke = mysqli_query($connect, "INSERT INTO tbl_thongke(ngaydat, donhang, doanhthu, soluongban) VALUES ('$now', '$donhang', '$doanhthu', '$soluongban')");
    } else {
        while($row_tk = mysqli_fetch_array($query_thongke)){
            $soluongban = $row_tk["soluongban"] + $soluongmua;
            $doanhthu = $row_tk["doanhthu"] + $doanhthu;
            $donhang = $row_tk["donhang"] + 1;
            $sql_update_thongke = mysqli_query($connect, "UPDATE tbl_thongke SET donhang ='$donhang', doanhthu ='$doanhthu', soluongban='$soluongban' WHERE ngaydat='$now'");
        }
    }

    echo '<script type="text/javascript">alert("Đã duyệt đơn hàng thành công");    window.location.href = "index.php?quanly=danhsachhoadon"; </script>';
}

?>
