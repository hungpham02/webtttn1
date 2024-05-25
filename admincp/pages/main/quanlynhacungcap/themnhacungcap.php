<main class="main container" id="main">
<div class="container">
    <h2 class="mt-4">Thêm nhà cung cấp</h2>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="index.php?quanly=xulynhacungcap">
                <div class="mb-3">
                    <label for="tennhacungcap" class="form-label">Tên nhà cung cấp</label>
                    <input type="text" class="form-control" id="tennhacungcap" name="tennhacungcap">
                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi">
                </div>
                <div class="mb-3">
                    <label for="sodienthoai" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sodienthoai" name="sodienthoai">
                </div>
                <button type="submit" class="btn btn-primary" name="them">Thêm nhà cung cấp</button>
            </form>
        </div>
    </div>
</div>
</main>