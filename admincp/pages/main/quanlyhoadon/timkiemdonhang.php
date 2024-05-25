<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <form class="form-inline" action="index.php?quanly=timkiemdonhang" method="POST">
        <div class="input-group w-100">
            <input type="search" name="tukhoa" class="form-control" placeholder="Nhập mã đơn hàng " aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                    kiếm</button>
            </div>
        </div>
    </form>
    <h6 style="text-align: center;padding: 10px;">Tìm kiếm: <?php echo $_POST['tukhoa'];  ?></h6>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Danh sách đơn hàng của người dùng</h1>
        </section>
        <?php
         if(isset($_POST['timkiem'])){
            $tukhoa = $_POST['tukhoa'];
        } else{
            $tukhoa = '';
        }
 $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky,tbl_shipping,tbl_cart_details WHERE tbl_cart.id_khachhang = tbl_dangky.id_dangky AND tbl_cart.cart_shipping = tbl_shipping.id_shipping 
 AND tbl_cart.code_cart = tbl_cart_details.code_cart AND tbl_cart.code_cart LIKE '%$tukhoa%'  ORDER BY tbl_cart.id_cart DESC";
 $query_lietke_dh =   mysqli_query($connect,$sql_lietke_dh);
?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th> Mã hóa đơn <span class="icon-arrow"></span></th>
                        <th>Tên khách hàng<span class="icon-arrow"></span></th>
                        <th>Địa chỉ<span class="icon-arrow"></span></th>
                        <th>Email <span class="icon-arrow"></span></th>
                        <th>Số điện thoại<span class="icon-arrow"></span></th>
                        <th>Tình trạng <span class="icon-arrow"></span></th>
                        <th>Ngày đặt <span class="icon-arrow"></span></th>
                        <th>Quản lý <span class="icon-arrow"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $i=0;
                  while($row = mysqli_fetch_array($query_lietke_dh)){
                    $i++; 
                    ?>
                    <tr>
                    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td> 
    <td><?php echo $row['tenkhachhang'] ?></td> 
    <td><?php echo $row['address'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td>
        <?php
        if($row['cart_status'] == 1){
            echo ' <a class="btn btn-danger" href="index.php?quanly=xulydonhang&cart_status=0&code='.$row['code_cart'].'">Đơn hàng mới</a>';
        } elseif($row['cart_status'] == 0){
          echo 'Đã xem';
        }
        else{
          echo'<b style="color:violet">Đã nhận hàng</b>';
        }
        ?>
       
    </td>
    <td><?php echo $row['thoigian'] ?></td>
    <td>
        <a   class="btn btn-success" href="index.php?quanly=xemdonhang&code=<?php echo  $row['code_cart']?>">Xem đơn hàng</a>
    </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</main>