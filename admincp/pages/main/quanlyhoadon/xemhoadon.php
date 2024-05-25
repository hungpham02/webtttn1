<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Xem đơn hàng</h1>
        </section>
        <?php
 $code =$_GET['code'];
 $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham 
 AND tbl_cart_details.code_cart = '".$code."'
 ORDER BY tbl_cart_details.id_cart_details DESC";
 $query_lietke_dh =mysqli_query($connect,$sql_lietke_dh);
?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th>Mã đơn hàng <span class="icon-arrow"></span></th>
                        <th>Tên sản phẩm<span class="icon-arrow"></span></th>
                        <th>Thời gian đặt<span class="icon-arrow"></span></th>
                        <th>Số lượng <span class="icon-arrow"></span></th>
                        <th>Đơn giá <span class="icon-arrow"></span></th>
                        <th>Thành tiền<span class="icon-arrow"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    $tongtien=0;
                    while($row = mysqli_fetch_array($query_lietke_dh)){
                      $i++;  
                    $thanhtien = $row['giasanpham']*$row['soluongmua'];
                    $tongtien += $thanhtien;
                    ?>
                    <tr>
                    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td> 
    <td><?php echo $row['tensanpham'] ?></td> 
    <td><?php echo $row['thoigian'] ?></td> 
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format( $row['giasanpham'],0,',','.').'vnđ' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td> 
                    </tr>
                    <?php
                    }
                    ?>
                     <td colspan="7">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></td> 
                </tbody>
            </table>
            <p  style="text-align: center;padding: 15px 0px;"><a class="btn btn-danger" href="index.php?quanly=danhsachhoadon" style="color: black;"><-BACK</a></p>
        </section>
    </main>
</main>