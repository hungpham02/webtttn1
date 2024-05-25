<?php
$sql_loaisanpham = "SELECT * FROM tbl_loaisanpham ORDER BY id_loaisanpham DESC";
$query_loaisanpham = mysqli_query($connect, $sql_loaisanpham);

$sql_nhacungcap = "SELECT * FROM tbl_nhacungcap ORDER BY id_nhacungcap DESC";
$query_nhacungcap = mysqli_query($connect, $sql_nhacungcap);
?>
<main class="main container" id="main">
    <div class="container">
        <h2 class="mt-4 text-center">Thêm sản phẩm</h2>
        <form method="POST" action="index.php?quanly=xulysanpham" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tensanpham" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="tensanpham" name="tensanpham">
            </div>
            <div class="mb-3">
                <label for="masanpham" class="form-label">Mã sản phẩm</label>
                <input type="text" class="form-control" id="masanpham" name="masanpham">
            </div>
            <div class="mb-3">
                <label for="giasanpham" class="form-label">Giá</label>
                <input type="number" class="form-control" id="giasanpham" name="giasanpham">
            </div>
            <div class="mb-3">
                <label for="soluong" class="form-label">Số lượng</label>
                <input type="text" class="form-control" id="soluong" name="soluong">
            </div>
            <div class="mb-3">
                <label for="hinhanh" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="hinhanh" name="hinhanh">
            </div>
            <div class="mb-3">
                <label for="tomtat" class="form-label">Tóm tắt</label>
                <textarea class="form-control" id="tomtat" name="tomtat" rows="3" style="resize: none;"></textarea>
            </div>
            <div class="mb-3">
                <label for="noidung" class="form-label">Nội dung</label>
                <textarea class="form-control" id="noidung" name="noidung" rows="3" style="resize: none;"></textarea>
            </div>
            <div class="mb-3">
                <label for="loaisanpham" class="form-label">Loại sản phẩm</label>
                <select class="form-select" id="loaisanpham" name="loaisanpham">
                    <?php while ($row_loaisanpham = mysqli_fetch_array($query_loaisanpham)) { ?>
                    <option value="<?= $row_loaisanpham['id_loaisanpham'] ?>"><?= $row_loaisanpham['tenloaisanpham'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nhacungcap" class="form-label">Nhà cung cấp</label>
                <select class="form-select" id="nhacungcap" name="nhacungcap">
                    <?php while ($row_nhacungcap = mysqli_fetch_array($query_nhacungcap)) { ?>
                    <option value="<?= $row_nhacungcap['id_nhacungcap'] ?>"><?= $row_nhacungcap['tennhacungcap'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="hienthi" class="form-label">Tình trạng</label>
                <select class="form-select" id="hienthi" name="hienthi">
                    <option value="1">Mới</option>
                    <option value="0">Cũ</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="them">Thêm sản phẩm</button>
            </div>
        </form>
    </div>
</main>
