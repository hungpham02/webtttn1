<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <form class="form-inline" action="index.php?quanly=timkiemsize" method="POST">
        <div class="input-group w-100">
            <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên loại size" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                    kiếm</button>
            </div>
        </div>
    </form>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Danh sách loại sản phẩm</h1>
        </section>
        <?php
$sql_lietke_size = "SELECT * FROM tbl_sanpham ,tbl_size WHERE tbl_sanpham.id_sanpham=tbl_size.id_sanpham ORDER BY id_size DESC";
$result_lietke_size = mysqli_query($connect, $sql_lietke_size);
?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th>Mã sản phẩm <span class="icon-arrow"></span></th>
                        <th>Loại size<span class="icon-arrow"></span></th>
                        <th>Sửa <span class="icon-arrow"></span></th>
                        <th>Xóa <span class="icon-arrow"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                 $i = 0;
                 while ($row = mysqli_fetch_array($result_lietke_size)) {
                     $i++;
                    ?>
                    <tr>
                    <td><?= $i ?></td>
            <td style="width:80px;height:150px; text-align: center;">
                <?= $row['masanpham'] ?>
            </td>
            <td style="width:80px;height:150px; text-align: center;">
                <?= $row['loaisize'] ?>
            </td>
                        <td> <a class="status pending"
                                href="index.php?quanly=suasize&id_size=<?= $row['id_size'] ?>">Sửa </a></td>
                        <td> <a class="status cancelled"
                                href="index.php?quanly=xulysize&id_size=<?= $row['id_size'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa </a>
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