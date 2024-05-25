<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <p><?php
        if (isset($_SESSION['dangky'])) {
            $id = $_SESSION['dangky'];
            $sql_thongtin = "SELECT * FROM tbl_khachhang WHERE taikhoan='$id' LIMIT 1";
            $query_thongtin = mysqli_query($connect, $sql_thongtin);

            while ($row = mysqli_fetch_array($query_thongtin)) {
        ?></p><br>
            <?php
                if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
                    unset($_SESSION['dangky']);
                }
            ?>
    <div class="container-info">
        <div class="container-info-left">
            <ul class="card-list">
                <li class="card-item">
                    <img class="card-item-img" src="../../../BTLNhom9/assets/vector-users-icon.webp" alt="">
                    <p class="card-item-name">
                        <?php
                        echo '' . '<span style="color:#fff">' . $row['taikhoan'] . '</span>';
                        ?></p>
                    <p class="card-item-duty"><?php
                                                echo '' . '<span >' . $row['hovaten'] . '</span>';
                                                ?></p>
                    <div class="social-media-list">
                        <a href="" class="social-media-item"><i class="fab fa-facebook facebook-icon"></i></a>
                        <a href="" class="social-media-item"><i class="fab fa-youtube"></i></a>
                        <a href="" class="social-media-item"><i class="fab fa-instagram"></i></a>
                        <a href="" class="social-media-item"><i class="fab fa-github"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="wrapper-info">
            <div class="info-header">
                <h3>Hồ sơ của bạn</h3>
                <p>Quản lý thông tin cá nhân của bạn</p>
            </div>
            <div class="infor-main">
                <div class="infor-main-text">
                    <label for="">Tên Đăng Nhập: </label>
                    <span class="infor-text-sql"><?php echo $row['hovaten']  ?></span>
                </div>
                <div class="infor-main-text">
                    <label for="">Email: </label>
                    <span class="infor-text-sql"><?php echo $row['email']  ?></span>
                </div>
                <div class="infor-main-text">
                    <label for="">Địa Chỉ: </label>
                    <span class="infor-text-sql"><?php echo $row['diachi']  ?></span>
                </div>
                <div class="infor-main-text">
                    <label for="">Số Điện Thoại: </label>
                    <span class="infor-text-sql"><?php echo $row['sodienthoai']  ?></span>
                </div>
                <div>
                    <a style="margin-left: 100px; color: red;" href="index.php?dangxuat=1">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
<?php
            }
        }

?>
</body>

</html>