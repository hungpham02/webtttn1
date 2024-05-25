<div class="clear"></div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../css/style.css">

<p>Thông tin cá nhân </p>
<div class="thongtin">
    <p><?php
        if (isset($_SESSION['dangky'])) {
            echo 'Xin chào: ' . '<span style="color:red">' . $_SESSION['dangky'] . '</span>';
            $id = $_SESSION['dangky'];
            $sql_thongtin = "SELECT * FROM tbl_khachhang WHERE taikhoan='$id' LIMIT 1";
            $query_thongtin = mysqli_query($connect, $sql_thongtin);

            while ($row = mysqli_fetch_array($query_thongtin)) {
        ?></p><br>
    <p class="thongtin-p">Họ và tên : <?= $row['hovaten']  ?></p>
    <p class="thongtin-p">Email : <?= $row['email']  ?></p>
    <p class="thongtin-p">Địa chỉ : <?= $row['diachi']  ?></p>
    <p class="thongtin-p">Số điện thoại : <?= $row['sodienthoai']  ?></p>
<?php
            }
        }
?>
</div>