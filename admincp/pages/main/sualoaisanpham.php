<?php
$sql_sua = "SELECT * FROM tbl_loaisanpham WHERE id_loaisanpham='$_GET[id_loaisanpham]' LIMIT 1";
$result_sua = mysqli_query($connect, $sql_sua);
?>
<main class="container" style="padding: 150px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sửa loại sản phẩm</h5>
                    <form method="POST" action="index.php?quanly=xulyloaisanpham&id_loaisanpham=<?= $_GET['id_loaisanpham'] ?>">
                        <?php
                        while ($dong = mysqli_fetch_array($result_sua)) {
                        ?>
                            <div class="mb-3">
                                <label for="tenloaisanpham" class="form-label">Tên loại sản phẩm</label>
                                <input type="text" class="form-control" id="tenloaisanpham" name="tenloaisanpham" value="<?= $dong['tenloaisanpham'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="mota" class="form-label">Mô tả</label>
                                <input type="text" class="form-control" id="mota" name="mota" value="<?= $dong['mota'] ?>">
                            </div>
                        <?php
                        }
                        ?>
                        <button type="submit" class="btn btn-primary" name="sua">Sửa loại sản phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
