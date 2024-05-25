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
            <h1>Danh sách loại sản phẩm</h1>
        </section>
        <?php
        if(isset($_POST['timkiem'])){
            $tukhoa = $_POST['tukhoa'];
        } else{
            $tukhoa = '';
        }
$sql_lietke = "SELECT * FROM tbl_loaisanpham WHERE tenloaisanpham LIKE '%$tukhoa%' ORDER BY id_loaisanpham DESC";
$result_lietke = mysqli_query($connect, $sql_lietke);
?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th> Tên loại sản phẩm <span class="icon-arrow"></span></th>
                        <th>Mô tả<span class="icon-arrow"></span></th>
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
            <td><?= $row['tenloaisanpham'] ?></td>
            <td><?= $row['mota'] ?></td>
                        <td> <a class="status pending"
                                href="index.php?quanly=sualoaisanpham&id_loaisanpham=<?= $row['id_loaisanpham'] ?>">Sửa </a></td>
                        <td> <a class="status cancelled"
                                href="index.php?quanly=xulythemmaudonxin&id_loaisanpham=<?= $row['id_loaisanpham'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa </a>
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