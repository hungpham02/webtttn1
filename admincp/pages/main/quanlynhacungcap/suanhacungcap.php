<main class="main container" id="main">
<div class="container">
    <h2 class="mt-4">Sửa nhà cung cấp</h2>
    <div class="row">
        <div class="col-md-6">
            <?php
            $sql_sua = "SELECT * FROM tbl_nhacungcap WHERE id_nhacungcap='$_GET[id_nhacungcap]' LIMIT 1";
            $result_sua = mysqli_query($connect, $sql_sua);
            while ($dong = mysqli_fetch_array($result_sua)) {
            ?>
            <form method="POST" action="index.php?quanly=xulynhacungcap&id_nhacungcap=<?= $_GET['id_nhacungcap'] ?>">
                <div class="mb-3">
                    <label for="tennhacungcap" class="form-label">Tên nhà cung cấp</label>
                    <input type="text" class="form-control" id="tennhacungcap" name="tennhacungcap"
                        value="<?= $dong['tennhacungcap'] ?>">
                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi" value="<?= $dong['diachi'] ?>">
                </div>
                <div class="mb-3">
                    <label for="sodienthoai" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sodienthoai" name="sodienthoai"
                        value="<?= $dong['sodienthoai'] ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="sua">Sửa nhà cung cấp</button>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</main>