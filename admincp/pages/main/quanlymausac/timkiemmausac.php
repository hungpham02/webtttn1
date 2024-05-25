<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <form class="form-inline" action="index.php?quanly=timkiemmausac" method="POST">
        <div class="input-group w-100">
            <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên màu sắc " aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                    kiếm</button>
            </div>
        </div>
    </form>
    <h6 style="text-align: center;padding: 10px;">Tìm kiếm: <?php echo $_POST['tukhoa'];  ?></h6>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Danh sách màu sắc</h1>
        </section>
        <?php
        if(isset($_POST['timkiem'])){
            $tukhoa = $_POST['tukhoa'];
        } else{
            $tukhoa = '';
        }
$sql_lietke_mausac = "SELECT * FROM tbl_sanpham ,tbl_mausac WHERE tbl_sanpham.id_sanpham=tbl_mausac.id_sanpham AND tbl_mausac.loaimau LIKE '%$tukhoa%'  ORDER BY id_mausac DESC";
$result_lietke_mausac = mysqli_query($connect, $sql_lietke_mausac);
?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th> Tên màu sắc <span class="icon-arrow"></span></th>
                        <th>Màu sắc<span class="icon-arrow"></span></th>
                        <th>Hình ảnh<span class="icon-arrow"></span></th>
                        <th>Sửa <span class="icon-arrow"></span></th>
                        <th>Xóa <span class="icon-arrow"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $i = 0;
                  while ($row = mysqli_fetch_array($result_lietke_mausac)) {
                      $i++;
                    ?>
                    <tr>
                    <td><?= $i ?></td>
            <td style="width:80px;height:150px; text-align: center;">
                <?= $row['tensanpham'] ?>
            </td>
            <td style="width:80px;height:150px; text-align: center;">
                <?= $row['loaimau'] ?>
            </td>
            <td style="width:150px;height:150px;">
                <img src="images/uploadsmausac/<?= $row['hinhanh'] ?> " width="100%">
            </td>
                        <td> <a class="status pending"
                                href="index.php?quanly=suamausac&id_mausac=<?= $row['id_mausac'] ?>">Sửa </a></td>
                        <td> <a class="status cancelled"
                                href="index.php?quanly=xulymausac&id_mausac=<?= $row['id_mausac'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa </a>
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