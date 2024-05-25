<?php
$sql_sua_mausac = "SELECT * FROM tbl_mausac WHERE id_mausac ='$_GET[id_mausac]' LIMIT 1";
$result_sua_mausac = mysqli_query($connect, $sql_sua_mausac);
?>
<main class="main container" id="main">
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sửa màu sắc sản phẩm</h5>
                        <form method="POST" action="index.php?quanly=xulymausac&id_mausac=<?= $_GET['id_mausac'] ?>" enctype="multipart/form-data">
                            <?php
                        while ($row = mysqli_fetch_array($result_sua_mausac)) {
                        ?>
                            <div class="mb-3">
                                <label for="sanpham" class="form-label">Tên sản phẩm</label>
                                <select class="form-select" id="sanpham" name="sanpham">
                                    <?php
                                    $sql_sanpham = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC";
                                    $query_sanpham = mysqli_query($connect, $sql_sanpham);
                                    while ($row_sanpham = mysqli_fetch_array($query_sanpham)) {
                                        if ($row_sanpham['id_sanpham'] == $row['id_sanpham']) {
                                    ?>
                                    <option value="<?= $row_sanpham['id_sanpham'] ?>" selected>
                                        <?= $row_sanpham['tensanpham'] ?></option>
                                    <?php
                                        } else {
                                        ?>
                                    <option value="<?= $row_sanpham['id_sanpham'] ?>"><?= $row_sanpham['tensanpham'] ?>
                                    </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="mausac" class="form-label">Màu sắc</label>
                                <input type="text" class="form-control" id="mausac" name="mausac"
                                    value="<?= $row['loaimau'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="hinhanh" class="form-label">Hình ảnh</label>
                                <input type="file" class="form-control" id="hinhanh" name="hinhanh">
                                <img src="images/uploadsmausac/<?= $row['hinhanh'] ?>" width="150px"
                                    class="mt-2">
                            </div>

                            <button type="submit" class="btn btn-primary" name="sua">Sửa sản phẩm</button>
                            <?php
                        }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>