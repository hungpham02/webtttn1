<?php

$tensanpham = $_POST['tensanpham'];
$masanpham = $_POST['masanpham'];
$giasanpham = $_POST['giasanpham'];
$soluong = $_POST['soluong'];
$file = $_FILES['hinhanh'];
$hinhanh = $file['name'];
$hinhanh_tmp = $file['tmp_name'];
$hinhanhgio = time() . '_' . $hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$hienthi = $_POST['hienthi'];
$loaisanpham = $_POST['loaisanpham'];
$nhacungcap = $_POST['nhacungcap'];

if(isset($_POST['them'])){
    // Thêm sản phẩm
    if(!empty($hinhanh)){
        move_uploaded_file($hinhanh_tmp, 'images/uploadssanpham/' . $hinhanhgio);
        $sql_themsp = "INSERT INTO tbl_sanpham(tensanpham, masanpham, giasanpham, soluong, hinhanh, tomtat, noidung, trangthai, id_loaisanpham, id_nhacungcap) 
                        VALUES ('".$tensanpham."', '".$masanpham."', '".$giasanpham."', '".$soluong."', '".$hinhanhgio."', '".$tomtat."', '".$noidung."', ".$hienthi.", '".$loaisanpham."', '".$nhacungcap."')";
        mysqli_query($connect, $sql_themsp);
        echo '<script type="text/javascript">alert("Thêm sản phẩm thành công"); window.location.href = "index.php?quanly=danhsachsanpham";</script>';
    } else {
        echo '<script type="text/javascript">alert("Vui lòng tải lên hình ảnh"); window.location.href = "index.php?quanly=themsanpham";</script>';
    }
} elseif(isset($_POST['sua'])){
    $id_sanpham = $_GET['id_sanpham'];

    if(!empty($hinhanh)){
        move_uploaded_file($hinhanh_tmp, 'images/uploadssanpham/' . $hinhanhgio);

        $sql = "SELECT hinhanh FROM tbl_sanpham WHERE id_sanpham = '$id_sanpham' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);
        
        if($row['hinhanh']) {
            unlink('images/uploadssanpham/' . $row['hinhanh']);
        }

        $sql_sua = "UPDATE tbl_sanpham SET tensanpham = '".$tensanpham."', masanpham = '".$masanpham."', giasanpham = '".$giasanpham."', soluong = '".$soluong."', hinhanh = '".$hinhanhgio."', tomtat = '".$tomtat."', noidung = '".$noidung."', trangthai = '".$hienthi."', id_loaisanpham = '".$loaisanpham."', id_nhacungcap = '".$nhacungcap."' WHERE id_sanpham = '$id_sanpham'";
    } else {
        $sql_sua = "UPDATE tbl_sanpham SET tensanpham = '".$tensanpham."', masanpham = '".$masanpham."', giasanpham = '".$giasanpham."', soluong = '".$soluong."', tomtat = '".$tomtat."', noidung = '".$noidung."', trangthai = '".$hienthi."', id_loaisanpham = '".$loaisanpham."', id_nhacungcap = '".$nhacungcap."' WHERE id_sanpham = '$id_sanpham'";
    }
    mysqli_query($connect, $sql_sua);
    echo '<script type="text/javascript">alert("Sửa sản phẩm thành công"); window.location.href = "index.php?quanly=danhsachsanpham";</script>';
} else {
    $id = $_GET['id_sanpham'];
    $sql = "SELECT hinhanh FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if($row['hinhanh']) {
        unlink('images/uploadssanpham/' . $row['hinhanh']);
    }

    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham = '$id'";
    mysqli_query($connect, $sql_xoa);
    echo '<script type="text/javascript">alert("Xóa sản phẩm thành công"); window.location.href = "index.php?quanly=danhsachsanpham";</script>';
}
?>
