<h3 style="text-align: center; text-transform: uppercase; font-weight: bold;">Thông tin vận chuyển</h3>
<div class="container">
<?php
   if (isset($_SESSION['id_khachhang'])) { ?>
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=vanchuyen">Địa chỉ nhận</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a></span> </div>
    <div class="step"> <span> <a href="index.php?quanly=lichsudonhang">Lịch sử đơn hàng</a> </span> </div>
  </div>
  <?php
   }
?>
<h4>Địa chỉ nhận</h4>
<?php
    if (isset($_POST['themvanchuyen'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_them_vanchuyen = mysqli_query($connect, "INSERT INTO tbl_shipping(name, phone, address, note, id_dangky) 
        VALUES('$name', '$phone', '$address', '$note', '$id_dangky')");
        if ($sql_them_vanchuyen) {
            echo '<script>alert("Thêm địa chỉ nhận thành công")</script>';
        }
    } elseif (isset($_POST['capnhapvanchuyen'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_update_vanchuyen = mysqli_query($connect, "UPDATE tbl_shipping 
        SET name='$name', phone='$phone', address='$address', note='$note' WHERE id_dangky='$id_dangky'");
        if ($sql_update_vanchuyen) {
            echo '<script>alert("Cập nhật địa chỉ nhận thành công")</script>';
        }
    }
?>
<div class="row">
    <?php
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_getvanchuyen = mysqli_query($connect, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
        $count = mysqli_num_rows($sql_getvanchuyen);
        if ($count > 0) {
            $row_getvanchuyen = mysqli_fetch_array($sql_getvanchuyen);
            $name = $row_getvanchuyen['name'];
            $phone = $row_getvanchuyen['phone'];
            $address = $row_getvanchuyen['address'];
            $note = $row_getvanchuyen['note'];
        } else {
            $name = '';
            $phone = '';
            $address = '';
            $note = '';
        }
    ?>
    <form action="" autocomplete="off" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" name="name" placeholder="...." class="form-control" value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" placeholder="...." class="form-control" value="<?php echo $phone; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Địa chỉ nhận</label>
                        <input type="text" name="address" placeholder="...." class="form-control" value="<?php echo $address; ?>">
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <input type="text" name="note" placeholder="...." class="form-control" value="<?php echo $note; ?>">
                    </div>
                </div>
            </div>
            <?php
            if ($name == '' && $phone == '') {
            ?>
                <button type="submit" name="themvanchuyen" class="btn btn-primary">Thêm địa chỉ nhận</button>
            <?php
            } elseif ($name != '' && $phone != '') {
            ?>
                <button type="submit" name="capnhapvanchuyen" class="btn btn-success">Cập nhật địa chỉ nhận</button>
            <?php
            }
            ?>
        </div>
    </form>
</div>

<div class="container">
    <div class="table-responsive">
        <table class="table giohang" style="width: 100%; text-align: center;" border="1" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã sp</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($_SESSION['cart'])) {
                        $i = 0;
                        $tongtien = 0;
                        foreach ($_SESSION['cart'] as $cart_item) {
                            $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
                            $tongtien += $thanhtien;
                            $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $cart_item['masanpham']; ?></td>
                    <td><?php echo $cart_item['tensanpham']; ?></td>
                    <td><img src="admincp/images/uploadssanpham/<?= $cart_item['hinhanh'] ?>" width="150px" alt=""></td>
                    <td><?php echo $cart_item['soluong']; ?></td>
                    <td><?php echo number_format($cart_item['giasanpham'], 0, ',', '.') . ' VNĐ'; ?></td>
                    <td><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ'; ?></td>
                </tr>
                <?php
                        }
                ?>
                <tr>
                    <td colspan="7">
                        <p style="float: left;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'; ?></p>
                        <div style="clear: both;"></div>
                        <?php
                            if (isset($_SESSION['dangky'])) {
                        ?>
                        <p><a href="index.php?quanly=thongtinthanhtoan" class="btn btn-primary">Thanh toán</a></p>
                        <?php
                            } else {
                        ?>
                        <p><a href="index.php?quanly=dangky" class="btn btn-primary">Đăng ký đặt hàng</a></p>
                        <?php
                            }
                        ?>
                    </td>
                </tr>
                <?php
                    } else {
                ?>
                <tr>
                    <td colspan="7"><p>Hiện tại giỏ hàng trống</p></td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

</div>
