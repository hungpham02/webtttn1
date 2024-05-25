<main class="main container" id="main">
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thêm loại sản phẩm</h5>
                        <form method="POST" action="index.php?quanly=xulyloaisanpham">
                            <div class="mb-3">
                                <label for="tenloaisanpham" class="form-label">Tên loại sản phẩm</label>
                                <input type="text" class="form-control" id="tenloaisanpham" name="tenloaisanpham">
                            </div>
                            <div class="mb-3">
                                <label for="mota" class="form-label">Mô tả</label>
                                <input type="text" class="form-control" id="mota" name="mota">
                            </div>
                            <button type="submit" class="btn btn-primary" name="them">Thêm loại sản phẩm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>