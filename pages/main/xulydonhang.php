<?php

 if(isset($_GET['cart_status']) && isset($_GET['code'])){
    $status = $_GET['cart_status'];
    $code = $_GET['code'];

    $sql = "UPDATE tbl_cart SET cart_status = '$status' WHERE code_cart = '$code'";
    $sql_query = mysqli_query($connect, $sql);
    header('location:http://localhost/webtttn1/index.php?quanly=donhangdadat');

 }else if(isset($_POST['huydonhang'])){
    $id_cart = $_GET['code'];
    $lido = $_POST['noidung'];

    $sql_UPDATE = "UPDATE tbl_cart SET cart_status = 4 WHERE id_cart = '$id_cart'";
    $kq= mysqli_query($connect,$sql_UPDATE);

    $sql_trahang = "INSERT INTO tbl_trahang (id_donhang,lido) VALUES ($id_cart,'$lido')";
    $qr = mysqli_query($connect,$sql_trahang);

    if($kq > 0 && $qr >0){
      header('location:http://localhost/webtttn1/index.php?quanly=donhangdadat');
    }


 }
 

?>