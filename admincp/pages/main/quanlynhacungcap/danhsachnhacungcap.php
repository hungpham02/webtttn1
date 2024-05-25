<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <form class="form-inline" action="index.php?quanly=timkiemnhacungcap" method="POST">
        <div class="input-group w-100">
            <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên nhà cung cấp" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                    kiếm</button>
            </div>
        </div>
    </form>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Liệt kê nhà cung cấp</h1>
        </section>
        <?php
$sql_lietke = "SELECT * FROM tbl_nhacungcap ORDER BY id_nhacungcap DESC";
$result_lietke = mysqli_query($connect, $sql_lietke);
?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th>Tên nhà cung cấp<span class="icon-arrow"></span></th>
                        <th>Địa chỉ<span class="icon-arrow"></span></th>
                        <th>Số điện thoại<span class="icon-arrow"></span></th>
                        <th>Sửa <span class="icon-arrow"></span></th>
                        <th>Xóa <span class="icon-arrow"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $i = 0;
                  while ($row = mysqli_fetch_array($result_lietke)) {
                      $i++;
                    ?>
                    <tr>
                    <td><?= $i ?></td>
            <td><?= $row['tennhacungcap'] ?></td>
            <td><?= $row['diachi'] ?></td>
            <td><?= $row['sodienthoai'] ?></td>
                        <td> <a class="status pending"
                                href="index.php?quanly=suanhacungcap&id_nhacungcap=<?= $row['id_nhacungcap'] ?>">Sửa </a></td>
                        <td> <a class="status cancelled"
                                href="index.php?quanly=xulynhacungcap&id_nhacungcap=<?= $row['id_nhacungcap'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa </a>
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