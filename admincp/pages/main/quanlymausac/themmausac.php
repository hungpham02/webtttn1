<main class="main container" id="main">
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thêm màu sắc sản phẩm</h5>
                        <form method="POST" action="index.php?quanly=xulymausac" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="sanpham" class="form-label">Chọn tên sản phẩm</label>
                                <select class="form-select" id="sanpham" name="sanpham">
                                    <?php
                                $sql_sanpham = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC";
                                $query_sanpham = mysqli_query($connect, $sql_sanpham);
                                while ($row_sanpham = mysqli_fetch_array($query_sanpham)) {
                                ?>
                                    <option value="<?= $row_sanpham['id_sanpham'] ?>"><?= $row_sanpham['tensanpham'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="mausac" class="form-label">Màu sắc</label>
                                <input type="text" class="form-control" id="mausac" name="mausac">
                            </div>

                            <div class="mb-3">
                                <label for="hinhanh" class="form-label">Hình ảnh</label>
                                <input type="file" class="form-control" id="hinhanh" name="hinhanh">
                            </div>

                            <button type="submit" class="btn btn-primary" name="them">Thêm màu sắc</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>