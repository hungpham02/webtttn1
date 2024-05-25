<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <form class="form-inline" action="index.php?quanly=timkiemtaikhoan" method="POST">
        <div class="input-group w-100">
            <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên chủ tài khoản" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                    kiếm</button>
            </div>
        </div>
    </form>
    <h6 style="text-align: center;padding: 10px;">Tìm kiếm: <?php echo $_POST['tukhoa'];  ?></h6>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Danh sách tài khoản</h1>
        </section>
        <?php
         if(isset($_POST['timkiem'])){
            $tukhoa = $_POST['tukhoa'];
        } else{
            $tukhoa = '';
        }
$sql_lietke_taikhoan = "SELECT * FROM tbl_dangky WHERE tenkhachhang LIKE '%$tukhoa%' ORDER BY id_dangky DESC";
$result_lietke_taikhoan = mysqli_query($connect, $sql_lietke_taikhoan);
?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th>Họ và tên<span class="icon-arrow"></span></th>
                        <th>Tài khoản<span class="icon-arrow"></span></th>
                        <th>Mật khẩu <span class="icon-arrow"></span></th>
                        <th>Số điện thoại <span class="icon-arrow"></span></th>
                        <th>Địa chỉ<span class="icon-arrow"></span></th>
                        <th>Chức vụ <span class="icon-arrow"></span></th>
                        <th>Sửa <span class="icon-arrow"></span></th>
                        <th>Xóa <span class="icon-arrow"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   $i = 0;
                   while ($row = mysqli_fetch_array($result_lietke_taikhoan)) {
                       $i++;
                    ?>
                    <tr>
                    <td style="height:100px;"> <?= $i ?></td>
            <td> <?= $row['tenkhachhang'] ?></td>
            <td> <?= $row['email'] ?></td>
            <td> <?= $row['matkhau'] ?></td>
            <td> <?= $row['dienthoai'] ?></td>
            <td> <?= $row['diachi'] ?></td>
            <td> <?php echo 'Khách hàng '?></td>
                        <td> <a class="status pending"
                                href="index.php?quanly=suataikhoan&id_loaisanpham&id_khachhang=<?= $row['id_dangky'] ?>">Sửa </a></td>
                        <td> <a class="status cancelled"
                                href="index.php?quanly=xulytaikhoan&id_loaisanpham&id_khachhang=<?= $row['id_dangky'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</main>