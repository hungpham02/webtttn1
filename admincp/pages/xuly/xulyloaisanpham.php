<?php
    $tenloaisanpham=$_POST['tenloaisanpham'];
    $mota = $_POST['mota'];
    if(isset($_POST['them'])){
        $sql_them="INSERT INTO tbl_loaisanpham(tenloaisanpham,mota) VALUE('".$tenloaisanpham."','".$mota."'); ";
        mysqli_query($connect,$sql_them);
        echo '<script type="text/javascript">alert("Thêm loại sản phẩm thành công");    window.location.href = "index.php?quanly=danhsachloaisanpham"; </script>';
    }elseif(isset($_POST['sua'])){
        $sql_sua="UPDATE tbl_loaisanpham SET tenloaisanpham='".$tenloaisanpham."',mota='".$mota."' WHERE id_loaisanpham='$_GET[id_loaisanpham]'";
        mysqli_query($connect,$sql_sua);
        echo '<script type="text/javascript">alert("Sửa loại sản phẩm thành công");    window.location.href = "index.php?quanly=danhsachloaisanpham"; </script>';
    }else{
        $id=$_GET['id_loaisanpham'];
        $sql_xoa="DELETE FROM tbl_loaisanpham WHERE id_loaisanpham ='".$id."';";
        mysqli_query($connect,$sql_xoa);
        echo '<script type="text/javascript">alert("Xóa loại sản phẩm thành công");    window.location.href = "index.php?quanly=danhsachloaisanpham"; </script>';
    }
?>