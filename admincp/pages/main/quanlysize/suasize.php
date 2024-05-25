<main class="main container" id="main">
    <div class="container">
        <h2 class="mt-4">Sửa kích thước sản phẩm</h2>
        <div class="row">
            <div class="col-md-6">
                <?php
            $sql_sua_size = "SELECT * FROM tbl_size WHERE id_size='$_GET[id_size]' LIMIT 1";
            $result_sua_size = mysqli_query($connect, $sql_sua_size);
            while ($row = mysqli_fetch_array($result_sua_size)) {
            ?>
                <form method="POST" action="index.php?quanly=xulysize&id_size=<?= $_GET['id_size'] ?>">
                    <div class="mb-3">
                        <label for="sanpham" class="form-label">Chọn mã sản phẩm</label>
                        <select class="form-select" id="sanpham" name="sanpham">
                            <?php
                            $sql_sanpham = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC";
                            $query_sanpham = mysqli_query($connect, $sql_sanpham);
                            while ($row_sanpham = mysqli_fetch_array($query_sanpham)) {
                                if ($row_sanpham['id_sanpham'] == $row['id_sanpham']) {
                                    echo "<option value='{$row_sanpham['id_sanpham']}' selected>{$row_sanpham['masanpham']}</option>";
                                } else {
                                    echo "<option value='{$row_sanpham['id_sanpham']}'>{$row_sanpham['masanpham']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" class="form-control" id="size" name="size" value="<?= $row['loaisize'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="sua">Sửa sản phẩm</button>
                </form>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</main>