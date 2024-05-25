<main class="main container" id="main">
    <?php
    $sql_taikhoan = "SELECT * FROM tbl_dangky WHERE id_dangky='$_GET[id_khachhang]' LIMIT 1";
    $querytk = mysqli_query($connect, $sql_taikhoan);
    ?>
    <div class="container">
        <h3>SỬA THÔNG TIN KHÁCH HÀNG</h3>
        <form action="index.php?quanly=xulytaikhoan&id_khachhang=<?= $_GET['id_khachhang'] ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <?php
                while ($khachhang = mysqli_fetch_array($querytk)) {
                ?>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hovatenkh" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="hovatenkh" name="hovatenkh" value="<?= $khachhang['tenkhachhang'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="taikhoankh" class="form-label">Tài khoản</label>
                            <input type="text" class="form-control" id="taikhoankh" name="taikhoankh" value="<?= $khachhang['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="matkhaukh" class="form-label">Mật khẩu</label>
                            <input type="text" class="form-control" id="matkhaukh" name="matkhaukh" value="<?= $khachhang['matkhau'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="dienthoaikh" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="dienthoaikh" name="dienthoaikh" value="<?= $khachhang['dienthoai'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="diachikh" class="form-label">Địa chỉ</label>
                            <textarea class="form-control" id="diachikh" name="diachikh" rows="3"><?= $khachhang['diachi'] ?></textarea>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary" name="sua">Sửa</button>
                        </div>
                    </div>
            </div>
        </form>
    <?php
                }
    ?>
    </div>
</main>
