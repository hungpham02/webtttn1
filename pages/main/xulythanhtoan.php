<?php
session_start();
include "../../admincp/config/connect.php";
require("../../carbon/autoload.php");

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
$id_khachhang = $_SESSION['id_khachhang'];
$code_oder = rand(0, 9999);
$cart_payment = $_POST['payment'];

// Lấy id thông tin vận chuyển
$id_dangky = $_SESSION['id_khachhang'];
$sql_getvanchuyen = mysqli_query($connect, "SELECT * FROM  tbl_shipping WHERE id_dangky ='$id_dangky' LIMIT 1");
$row_getvanchuyen = mysqli_fetch_array($sql_getvanchuyen);
$id_shipping = $row_getvanchuyen["id_shipping"];

$tongtien = 0;
foreach ($_SESSION['cart'] as $key => $value) {
    $thanhtien = $value['soluong'] * $value['giasp'];
    $tongtien += $thanhtien;
}

if ($cart_payment == 'tienmat' || $cart_payment == 'chuyenkhoan') {
    // Insert vào đơn hàng
    $insert_cart = "INSERT INTO tbl_cart(id_khachhang, code_cart, cart_status, thoigian, cart_payment, cart_shipping) 
    VALUES ('$id_khachhang', '$code_oder', 1, '$now', '$cart_payment', '$id_shipping')";
    $cart_query = mysqli_query($connect, $insert_cart);

    // Lấy đơn hàng chi tiết
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];

        $sql_get_soluong = "SELECT soluong FROM tbl_sanpham WHERE id_sanpham = $id_sanpham";
        $query_get_soluong = mysqli_query($connect, $sql_get_soluong);
        $row_soluong = mysqli_fetch_array($query_get_soluong);
        $soluong_hientai = $row_soluong['soluong'];

        // Trừ số lượng đã mua
        $soluong_moi = $soluong_hientai - $soluong;

        // Cập nhật số lượng mới vào CSDL
        $sql_update_soluong = "UPDATE tbl_sanpham SET soluong = $soluong_moi WHERE id_sanpham = $id_sanpham";
        mysqli_query($connect, $sql_update_soluong);

        $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham, code_cart, soluongmua, thoigian) 
        VALUES ('$id_sanpham', '$code_oder', '$soluong', '$now')";
        mysqli_query($connect, $insert_order_details);
    }
    header('location:index.php?quanly=camon');
} elseif ($cart_payment == 'vnpay') {
    // Thanh toán vnpay
    // Khai báo các biến được sử dụng trong VNPay
    $vnp_TxnRef = $code_oder;
    $vnp_OrderInfo = 'Thanh toán đã đặt hàng tại web';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $tongtien * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    // Thực hiện tạo mã hash và chuẩn bị dữ liệu cho giao dịch
    // (Phần này cần điều chỉnh tùy theo cách tích hợp VNPay của bạn)

    // Redirect sang trang VNPay để thanh toán
} elseif ($cart_payment == 'momo') {
    // Xử lý thanh toán qua MoMo
} elseif ($cart_payment == 'paypal') {
    // Xử lý thanh toán qua PayPal
}

unset($_SESSION['cart']);
header('location:../../index.php?quanly=camon');
?>
