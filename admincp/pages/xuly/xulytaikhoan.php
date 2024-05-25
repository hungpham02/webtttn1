<?php
    $hovatenkh=$_POST['hovatenkh'];
    $taikhoankh = $_POST['taikhoankh'];
    $matkhaukh = $_POST['matkhaukh'];
    $dienthoaikh = $_POST['dienthoaikh'];
    $emailkh = $_POST['emailkh'];
    $diachikh = $_POST['diachikh'];
    $chucvukh =$_POST['chucvukh'];

   if(isset($_POST['sua'])){
        $sql_sua_kh="UPDATE tbl_dangky SET tenkhachhang='".$hovatenkh."',email='".$taikhoankh."',matkhau='".$matkhaukh."',dienthoai='".$dienthoaikh."',diachi='".$diachikh."' WHERE id_dangky='$_GET[id_khachhang]'";
        mysqli_query($connect,$sql_sua_kh);
        echo '<script type="text/javascript">alert("Sửa tài khoản thành công"); window.location.href = "index.php?quanly=danhsachtaikhoan";</script>';
    }else{
        $id=$_GET['id_khachhang'];
        $sql_xoa_kh="DELETE FROM tbl_dangky WHERE id_dangky ='".$id."';";
        mysqli_query($connect,$sql_xoa_kh);
        echo '<script type="text/javascript">alert("Xóa tài khoản thành công"); window.location.href = "index.php?quanly=danhsachtaikhoan";</script>';
    }
?>