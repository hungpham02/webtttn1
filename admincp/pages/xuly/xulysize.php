<?php
    $sanpham=$_POST['sanpham'];
    $size = $_POST['size'];

    if(isset($_POST['them'])){
        $sql_themkichthuoc="INSERT INTO tbl_size(id_sanpham ,loaisize)
                VALUE ('".$sanpham."','".$size."')";
                mysqli_query($connect,$sql_themkichthuoc);
                echo '<script type="text/javascript">alert("Thêm size thành công"); window.location.href = "index.php?quanly=danhsachsize";</script>';
    }

    elseif(isset($_POST['sua'])){

        $sql_sua="UPDATE tbl_size SET id_sanpham='".$sanpham."',loaisize='".$size."' WHERE id_size='$_GET[id_size]'";
        mysqli_query($connect,$sql_sua);
        echo '<script type="text/javascript">alert("Sửa size thành công"); window.location.href = "index.php?quanly=danhsachsize";</script>';
    }

    else{
        $id=$_GET['id_size'];
        $sql_xoa="DELETE FROM tbl_size WHERE id_size ='".$id."';";
        mysqli_query($connect,$sql_xoa);
        echo '<script type="text/javascript">alert("Xóa size thành công"); window.location.href = "index.php?quanly=danhsachsize";</script>';
    }
?>