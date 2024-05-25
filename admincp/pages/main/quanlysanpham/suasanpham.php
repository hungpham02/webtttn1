<?php
$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[id_sanpham]' LIMIT 1";
$result_sua_sp = mysqli_query($connect, $sql_sua_sp);
?>
<main class="main container" id="main">
<div class="container">
    <h2 class="mt-4">Sửa sản phẩm</h2>
    <form method="POST" action="index.php?quanly=xulysanpham&id_sanpham=<?= $_GET['id_sanpham'] ?>" enctype="multipart/form-data">
        <?php while ($row = mysqli_fetch_array($result_sua_sp)) { ?>
        <div class="mb-3">
            <label for="tensanpham" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="tensanpham" name="tensanpham" value="<?= $row['tensanpham'] ?>">
        </div>
        <div class="mb-3">
            <label for="masanpham" class="form-label">Mã sản phẩm</label>
            <input type="text" class="form-control" id="masanpham" name="masanpham" value="<?= $row['masanpham'] ?>">
        </div>
        <div class="mb-3">
            <label for="giasanpham" class="form-label">Giá</label>
            <input type="number" class="form-control" id="giasanpham" name="giasanpham"
                value="<?= $row['giasanpham'] ?>">
        </div>
        <div class="mb-3">
            <label for="soluong" class="form-label">Số lượng</label>
            <input type="text" class="form-control" id="soluong" name="soluong" value="<?= $row['soluong'] ?>">
        </div>
        <div class="mb-3">
            <label for="hinhanh" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="hinhanh" name="hinhanh">
            <img src="images/uploadssanpham/<?= $row['hinhanh'] ?>" class="img-fluid mt-2" width="150px">
        </div>
        <div class="mb-3">
            <label for="tomtat" class="form-label">Tóm tắt</label>
            <textarea class="form-control" id="tomtat" name="tomtat" rows="3"
                style="resize: none;"><?= $row['tomtat'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="noidung" class="form-label">Nội dung</label>
            <textarea class="form-control" id="noidung" name="noidung" rows="3"
                style="resize: none;"><?= $row['noidung'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="loaisanpham" class="form-label">Loại sản phẩm</label>
            <select class="form-select" id="loaisanpham" name="loaisanpham">
                <?php
                    $sql_loaisanpham = "SELECT * FROM tbl_loaisanpham ORDER BY id_loaisanpham DESC";
                    $query_loaisanpham = mysqli_query($connect, $sql_loaisanpham);
                    while ($row_loaisanpham = mysqli_fetch_array($query_loaisanpham)) {
                        $selected = ($row_loaisanpham['id_loaisanpham'] == $row['id_loaisanpham']) ? 'selected' : '';
                        echo "<option value='{$row_loaisanpham['id_loaisanpham']}' $selected>{$row_loaisanpham['tenloaisanpham']}</option>";
                    }
                    ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nhacungcap" class="form-label">Nhà cung cấp</label>
            <select class="form-select" id="nhacungcap" name="nhacungcap">
                <?php
                    $sql_nhacungcap = "SELECT * FROM tbl_nhacungcap ORDER BY id_nhacungcap DESC";
                    $query_nhacungcap = mysqli_query($connect, $sql_nhacungcap);
                    while ($row_nhacungcap = mysqli_fetch_array($query_nhacungcap)) {
                        $selected = ($row_nhacungcap['id_nhacungcap'] == $row['id_nhacungcap']) ? 'selected' : '';
                        echo "<option value='{$row_nhacungcap['id_nhacungcap']}' $selected>{$row_nhacungcap['tennhacungcap']}</option>";
                    }
                    ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="hienthi" class="form-label">Tình trạng</label>
            <select class="form-select" id="hienthi" name="hienthi">
                <option value="1" <?= $row['trangthai'] == 1 ? 'selected' : '' ?>>Mới</option>
                <option value="0" <?= $row['trangthai'] == 0 ? 'selected' : '' ?>>Cũ</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="sua">Sửa sản phẩm</button>
        <?php } ?>
    </form>
</div>
</main>