<?php

if (isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $matkhau = md5($_POST['matkhau']);
    $diachi = $_POST['diachi'];
    $level = 3;
    
    // Chuẩn bị truy vấn
    $sql_dangky = "INSERT INTO tbl_dangky (tenkhachhang, email, diachi, matkhau, dienthoai, level) 
                   VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql_dangky);
    
    if ($stmt) {
        // Gắn các biến vào truy vấn
        mysqli_stmt_bind_param($stmt, "sssssi", $tenkhachhang, $email, $diachi, $matkhau, $dienthoai, $level);
        
        // Thực thi truy vấn
        if (mysqli_stmt_execute($stmt)) {
            echo '<p style="color:green">Bạn đã đăng kí thành công</p>';
        } else {
            echo '<p style="color:red">Đăng ký thất bại</p>';
        }
        
        // Đóng truy vấn
        mysqli_stmt_close($stmt);
    } else {
        echo '<p style="color:red">Lỗi chuẩn bị truy vấn</p>';
    }
    
    // Đóng kết nối
    mysqli_close($connect);
}
?>

<h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Đăng kí thành viên</h6>
<style>
    table.dangky tr td {
        padding: 5px;
    }
    p {
        text-align: center;
    }
</style>
<div>
<form action="" method="POST">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hovaten">Họ và tên</label>
                    <input type="text" class="form-control" id="hovaten" name="hovaten" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="dienthoai">Điện thoại</label>
                    <input type="text" class="form-control" id="dienthoai" name="dienthoai" required>
                </div>
                <div class="form-group">
                    <label for="diachi">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi" required>
                </div>
                <div class="form-group">
                    <label for="matkhau">Mật khẩu</label>
                    <input type="password" class="form-control" id="matkhau" name="matkhau" required>
                </div>
                <button type="submit" class="btn btn-primary" name="dangky">Đăng ký</button>
                <a href="index.php?quanly=dangnhap" class="btn btn-link">Đăng nhập nếu có tài khoản</a>
            </div>
        </div>
    </div>
</form>
