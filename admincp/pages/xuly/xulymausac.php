<?php
include 'config.php';  // Đảm bảo rằng bạn đã bao gồm tệp cấu hình cơ sở dữ liệu của mình

// Nhận dữ liệu từ form
$sanpham = $_POST['sanpham'];
$mausac = $_POST['mausac'];
$file = $_FILES['hinhanh'];
$hinhanh_name = $file['name'];
$hinhanh_tmp = $file['tmp_name'];
$hinhanhgio = time() . '_' . $hinhanh_name;

if(isset($_POST['them'])){
    if(!empty($hinhanh_name)){
        $hinhanh_type = $file['type'];
        if($hinhanh_type == 'image/jpeg' || $hinhanh_type == 'image/jpg' || $hinhanh_type == 'image/png'){
            move_uploaded_file($hinhanh_tmp, 'images/uploadsmausac/' . $hinhanhgio);
            $sql_themmausac = "INSERT INTO tbl_mausac (id_sanpham, loaimau, hinhanh) VALUES ('$sanpham', '$mausac', '$hinhanhgio')";
            if(mysqli_query($connect, $sql_themmausac)){
                echo '<script>alert("Thêm màu sắc cho sản phẩm thành công"); window.location.href = "index.php?quanly=danhsachmausac";</script>';
            } else {
                echo '<script>alert("Lỗi: ' . mysqli_error($connect) . '"); window.location.href = "index.php?quanly=danhsachmausac";</script>';
            }
        } else {
            echo '<script>alert("Loại file không hợp lệ, vui lòng chọn file ảnh (JPEG, JPG, PNG)"); window.location.href = "index.php?quanly=danhsachmausac";</script>';
        }
    } else {
        echo '<script>alert("Vui lòng chọn hình ảnh"); window.location.href = "index.php?quanly=danhsachmausac";</script>';
    }
} elseif(isset($_POST['sua'])){
    $id_mausac = $_GET['id_mausac'];
    if(!empty($hinhanh_name)){
        $hinhanh_type = $file['type'];
        if($hinhanh_type == 'image/jpeg' || $hinhanh_type == 'image/jpg' || $hinhanh_type == 'image/png'){
            move_uploaded_file($hinhanh_tmp, 'images/uploadsmausac/' . $hinhanhgio);
            
            $sql = "SELECT hinhanh FROM tbl_mausac WHERE id_mausac = '$id_mausac' LIMIT 1";
            $query = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($query);
            
            if($row['hinhanh']){
                unlink('images/uploadsmausac/' . $row['hinhanh']);
            }
            
            $sql_sua = "UPDATE tbl_mausac SET id_sanpham='$sanpham', loaimau='$mausac', hinhanh='$hinhanhgio' WHERE id_mausac='$id_mausac'";
        } else {
            echo '<script>alert("Loại file không hợp lệ, vui lòng chọn file ảnh (JPEG, JPG, PNG)"); window.location.href = "index.php?quanly=danhsachmausac";</script>';
            exit();
        }
    } else {
        $sql_sua = "UPDATE tbl_mausac SET id_sanpham='$sanpham', loaimau='$mausac' WHERE id_mausac='$id_mausac'";
    }
    if(mysqli_query($connect, $sql_sua)){
        echo '<script>alert("Sửa màu sắc cho sản phẩm thành công"); window.location.href = "index.php?quanly=danhsachmausac";</script>';
    } else {
        echo '<script>alert("Lỗi: ' . mysqli_error($connect) . '"); window.location.href = "index.php?quanly=danhsachmausac";</script>';
    }
} else {
    $id_mausac = $_GET['id_mausac'];
    $sql = "SELECT hinhanh FROM tbl_mausac WHERE id_mausac = '$id_mausac' LIMIT 1";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);
    if($row['hinhanh']){
        unlink('images/uploadsmausac/' . $row['hinhanh']);
    }
    
    $sql_xoa = "DELETE FROM tbl_mausac WHERE id_mausac='$id_mausac'";
    if(mysqli_query($connect, $sql_xoa)){
        echo '<script>alert("Xóa màu sắc cho sản phẩm thành công"); window.location.href = "index.php?quanly=danhsachmausac";</script>';
    } else {
        echo '<script>alert("Lỗi: ' . mysqli_error($connect) . '"); window.location.href = "index.php?quanly=danhsachmausac";</script>';
    }
}
?>
