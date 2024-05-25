<?php
session_start();
include "../../admincp/config/connect.php";

// Thêm số lượng sản phẩm
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        foreach ($_SESSION['cart'] as &$cart_item) {
            if ($cart_item['id'] == $id) {
                if ($cart_item['soluong'] < $row['soluong']) { // Kiểm tra nếu số lượng hiện tại nhỏ hơn số lượng trong kho
                    $cart_item['soluong']++;
                }
                break;
            }
        }
    }
    header('location:../../index.php?quanly=giohang');
}

// Trừ số lượng sản phẩm
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['id'] == $id) {
            if ($cart_item['soluong'] > 1) { // Kiểm tra nếu số lượng hiện tại lớn hơn 1
                $cart_item['soluong']--;
            }
            break;
        }
    }
    header('location:../../index.php?quanly=giohang');
}

// Xóa sản phẩm
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if ($cart_item['id'] == $id) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reset các key của mảng
            break;
        }
    }
    header('location:../../index.php?quanly=giohang');
}

// Xóa tất cả sản phẩm
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']);
    header('location:../../index.php?quanly=giohang');
}

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST['themgiohang']) && isset($_POST['soluong'])) {
    $soluongsp = $_POST['soluong'];
    $soluong = (int)$soluongsp;
    $id = $_GET['idsanpham'];
    $mausac = $_POST['mausac'];
    $size = $_POST['size'];

    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $new_product = array(array(
            'tensanpham' => $row['tensanpham'],
            'id' => $id,
            'soluong' => $soluong,
            'giasanpham' => $row['giasanpham'],
            'hinhanh' => $row['hinhanh'],
            'masanpham' => $row['masanpham'],
            'mausac' => $mausac,
            'size' => $size
        ));

        if (isset($_SESSION['cart'])) {
            $found = false;
            $product = array();

            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id'] == $id) {
                    if ($cart_item['soluong'] + $soluong <= $row['soluong']) { // Kiểm tra số lượng thêm vào không vượt quá kho
                        $cart_item['soluong'] += $soluong;
                    } else {
                        $cart_item['soluong'] = $row['soluong']; // Nếu vượt quá kho, set số lượng bằng kho
                    }
                    $found = true;
                }
                $product[] = $cart_item;
            }

            if (!$found) {
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location: ../../index.php?quanly=giohang');
}
?>
