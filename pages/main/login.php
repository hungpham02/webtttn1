<?php


if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $matkhau = md5($_POST['password']);
    
    // Truy vấn kiểm tra tài khoản người dùng
    $sql_dangky = "SELECT * FROM tbl_dangky WHERE email = ? AND matkhau = ? LIMIT 1";
    $stmt_dangky = mysqli_prepare($connect, $sql_dangky);
    mysqli_stmt_bind_param($stmt_dangky, 'ss', $email, $matkhau);
    mysqli_stmt_execute($stmt_dangky);
    $result_dangky = mysqli_stmt_get_result($stmt_dangky);
    $count_dangky = mysqli_num_rows($result_dangky);
    
    // Truy vấn kiểm tra tài khoản admin
    $sql_admin = "SELECT * FROM tbl_admin WHERE username = ? AND password = ? LIMIT 1";
    $stmt_admin = mysqli_prepare($connect, $sql_admin);
    mysqli_stmt_bind_param($stmt_admin, 'ss', $email, $matkhau);
    mysqli_stmt_execute($stmt_admin);
    $result_admin = mysqli_stmt_get_result($stmt_admin);
    $count_admin = mysqli_num_rows($result_admin);

    if ($count_dangky > 0 || $count_admin > 0) {
        if ($count_dangky > 0) {
            $row_dangky = mysqli_fetch_array($result_dangky);
            $_SESSION['dangky'] = $row_dangky['tenkhachhang'];
            $_SESSION['email'] = $row_dangky['email'];
            $_SESSION['id_khachhang'] = $row_dangky['id_dangky'];
            $_SESSION['level'] = 0; // Khách hàng không có level admin
        } else if ($count_admin > 0) {
            $row_dangnhap = mysqli_fetch_array($result_admin);
            $_SESSION['name'] = $row_dangnhap['name'];
            $_SESSION['dangnhap'] = $row_dangnhap['username'];
            $_SESSION['id_admin'] = $row_dangnhap['id_admin'];
            $_SESSION['level'] = $row_dangnhap['admin_status']; // Admin có level quản trị
        }
        // Chuyển hướng người dùng sau khi đăng nhập thành công
        if (isset($_SESSION['dangky'])) {
            echo "<script>alert('Đăng nhập thành công'); window.location.href = 'index.php';</script>";
        } else if (isset($_SESSION['dangnhap'])) {
            echo "<script>alert('Đăng nhập thành công'); window.location.href = 'admincp/index.php';</script>";
        }
    } else {
        echo '<p style="color:red">Mật khẩu hoặc tài khoản sai. Vui lòng đăng nhập lại.</p>';
    }
}
?>

<form action="" method="POST">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Đăng nhập khách hàng</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Tài khoản</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu...">
                        </div>
                        <div class="form-group">
                            <a href="index.php?quanly=quenmatkhau">Quên mật khẩu ?</a>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="dangnhap" value="Đăng nhập">
                        </div>
                        <div class="form-group text-center">
                            <a href="index.php?quanly=dangky">Đăng ký tài khoản</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
