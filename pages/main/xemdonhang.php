<h5 style="text-align: center; text-transform: uppercase; font-weight: bold;">Xem đơn hàng</h5>
<?php
 $code =$_GET['code'];
 $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham 
 AND tbl_cart_details.code_cart = '".$code."'
 ORDER BY tbl_cart_details.id_cart_details DESC";
 $query_lietke_dh =mysqli_query($connect,$sql_lietke_dh);
?>
<p  style="text-align: center;padding: 15px 0px;"><a class="btn btn-danger" href="index.php?quanly=lichsudonhang"><-BACK</a></p>
<div class="container">
    <div class="table-responsive">
          <table style="width: 100%;" border="1" style="border-collapse: collapse;">
            <tr>
              <th>ID</th>
              <th>Mã đơn hàng</th>
              <th>Tên sản phẩm</th>
              <th>Thời gian đặt</th>
              <th>Số lượng</th>
              <th>Đơn giá</th>
              <th>Thành tiền</th>
              
            </tr>
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
            <?php } ?>
            <tr>
            <td colspan="7">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></td> 
            </tr>
          </table>
    </div>
</div>          