<main class="main container" id="main">
    <div class="container">
        <h2 class="mt-4">Thêm kích cỡ sản phẩm</h2>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="index.php?quanly=xulysize" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="sanpham" class="form-label">Chọn mã sản phẩm</label>
                        <select class="form-select" id="sanpham" name="sanpham">
                            <?php
                        $sql_sanpham = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC";
                        $query_sanpham = mysqli_query($connect, $sql_sanpham);
                        while ($row_sanpham = mysqli_fetch_array($query_sanpham)) {
                            echo "<option value='" . $row_sanpham['id_sanpham'] . "'>" . $row_sanpham['masanpham'] . "</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" class="form-control" id="size" name="size">
                    </div>
                    <button type="submit" class="btn btn-primary" name="them">Thêm kích thước</button>
                </form>
            </div>
        </div>
    </div>
</main>