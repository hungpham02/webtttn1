<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <form class="form-inline" action="index.php?quanly=timkiemloaisanpham" method="POST">
        <div class="input-group w-100">
            <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên loại sản phẩm" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                    kiếm</button>
            </div>
        </div>
    </form>
    <h6 style="text-align: center;padding: 10px;">Tìm kiếm: <?php echo $_POST['tukhoa'];  ?></h6>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Danh sách sản phẩm</h1>
        </section>
        <?php
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
} else {
    $tukhoa = '';
}
$sql_lietke_sp = "SELECT * FROM (tbl_sanpham INNER JOIN tbl_loaisanpham ON tbl_sanpham.id_loaisanpham = tbl_loaisanpham.id_loaisanpham) INNER JOIN tbl_nhacungcap ON tbl_sanpham.id_nhacungcap = tbl_nhacungcap.id_nhacungcap WHERE tbl_sanpham.tensanpham LIKE '%$tukhoa%' ORDER BY id_sanpham DESC";
$result_lietke_sp = mysqli_query($connect, $sql_lietke_sp);
?>

        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th> Mã sản phẩm <span class="icon-arrow"></span></th>
                        <th>Tên sản phẩm<span class="icon-arrow"></span></th>
                        <th>Hình ảnh<span class="icon-arrow"></span></th>
                        <th>Giá sản phẩm <span class="icon-arrow"></span></th>
                        <th>Số lượng <span class="icon-arrow"></span></th>
                        <th>Loại sản phẩm <span class="icon-arrow"></span></th>
                        <th>Nhà cung cấp <span class="icon-arrow"></span></th>
                        <th>Tóm tắt <span class="icon-arrow"></span></th>
                        <th>Nội dung <span class="icon-arrow"></span></th>
                        <th>Trạng thái <span class="icon-arrow"></span></th>
                        <th>Sửa <span class="icon-arrow"></span></th>
                        <th>Xóa<span class="icon-arrow"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $i = 0;
                  while ($row = mysqli_fetch_array($result_lietke_sp)) {
                      $i++;
                  ?>
                    <tr>
                    <td><?= $i ?></td>
            <td style="width:80px;height:150px; text-align: center;">
                <?= $row['masanpham'] ?>
            </td>
            <td style="width:80px;height:150px; text-align: center;">
                <?= $row['tensanpham'] ?>
            </td>
            <td style="width:150px;height:150px;">
                <img src="images/uploadssanpham/<?= $row['hinhanh'] ?> " width="100%">
            </td>
            <td style="width:150px;text-align: center;">
                <?= number_format($row['giasanpham'], 0, ',', '.') . 'VNĐ'  ?>
            </td>
            <td><?= $row['soluong'] ?> </td>
            <td><?= $row['tenloaisanpham'] ?> </td>
            <td><?= $row['tennhacungcap'] ?> </td>
            <td><?= $row['tomtat'] ?> </td>
            <td><?= $row['noidung'] ?> </td>
            <td><?php if ($row['trangthai'] == 1) {
                    echo "Mới";
                } else {
                    echo "Cũ";
                } ?>
            </td>
            <td> <a class="status pending"
                                href="index.php?quanly=suasanpham&id_sanpham=<?= $row['id_sanpham'] ?>">Sửa </a></td>
                        <td> <a class="status cancelled"
                                href="index.php?quanly=xulysanpham&id_sanpham=<?= $row['id_sanpham'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa </a>
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