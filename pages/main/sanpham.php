<div class="clear"></div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/style_detal.css">



<?php
$sql_chitiet = "SELECT * FROM (tbl_sanpham INNER JOIN tbl_loaisanpham ON tbl_sanpham.id_loaisanpham = tbl_loaisanpham.id_loaisanpham) INNER JOIN tbl_nhacungcap ON tbl_sanpham.id_nhacungcap = tbl_nhacungcap.id_nhacungcap WHERE tbl_sanpham.id_sanpham='$_GET[id]' ORDER BY tbl_sanpham.id_sanpham DESC";
$sql_mausac = "SELECT * FROM tbl_sanpham,tbl_mausac WHERE tbl_sanpham.id_sanpham=tbl_mausac.id_sanpham  AND tbl_sanpham.id_sanpham='$_GET[id]'";
$sql_size = "SELECT * FROM tbl_sanpham,tbl_size WHERE tbl_sanpham.id_sanpham=tbl_size.id_sanpham  AND tbl_sanpham.id_sanpham='$_GET[id]'";
$query_chitiet = mysqli_query($connect, $sql_chitiet);
$query_mausac = mysqli_query($connect, $sql_mausac);
$query_size = mysqli_query($connect, $sql_size);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
   <div id="product">
      <div class="nav">
         <span><a href="../../index.php">Trang chủ</a>/</span>
         <span><a href="">Sản phẩm</a></span> / <span><?= $row_chitiet['tensanpham'] ?></span>
      </div>
      <div class="container">
         <div class="product-content">
            <div class="product-content-left">
               <div class="product-content-left-img-big">
                  <img src="admincp/images/uploadssanpham/<?= $row_chitiet['hinhanh'] ?>" alt="" id="main-img" />
               </div>
            </div>
            <form class="form-sp" action="pages/main/themgiohang.php?idsanpham=<?= $row_chitiet['id_sanpham'] ?>" method="POST">
               <div class="product-content-right">
                  <div class="product-content-right-product-name">
                     <h2><?= $row_chitiet['tensanpham'] ?></h2>
                     <p><b>Mã sản phẩm:</b> <?= $row_chitiet['masanpham'] ?></p>
                  </div>
                  <div class="rating">
                     <span class="review-no">4.7</span>
                     <div class="stars">
                        <span style="color: yellow;" class="fa fa-star checked"></span>
                        <span style="color: yellow;" class="fa fa-star checked"></span>
                        <span style="color: yellow;" class="fa fa-star checked"></span>
                        <span style="color: yellow;" class="fa fa-star checked"></span>
                        <span style="color: yellow;" class="fa fa-star checked"></span>
                     </div>
                  </div>
                  <div class="product-content-right-product-price">
                     <p>
                        <?php $salerandom = rand(10, 40) ?>
                     <p class="gia-cu">
                        <?= number_format($row_chitiet['giasanpham'] * ($salerandom / 100) + $row_chitiet['giasanpham'], 0, ',', '.') ?> VNĐ
                     </p>
                     <h5 class="gia-now">
                        <?= number_format($row_chitiet['giasanpham'], 0, ',', '.') ?> VNĐ
                     </h5>
                     <span class="slae"><?= $salerandom ?>% GIẢM</span>
                     </p>
                  </div>
                  <div class="product-content-right-product-color">
                     <p>
                        <span style="font-weight: bold">Màu sắc: </span>
                        <select name="mausac">
                           <?php
                           while ($row_mausac = mysqli_fetch_assoc($query_mausac)) {
                           ?>
                              <option value="<?= $row_mausac['loaimau'] ?>"><?= $row_mausac['loaimau'] ?></option>
                           <?php
                           }
                           ?>
                        </select>
                     </p>
                  </div>
                  <div class="product-content-right-product-size">
                     <p>
                        <span style="font-weight: bold">Size: </span>
                        <select name="size">
                           <?php
                           while ($row_size = mysqli_fetch_assoc($query_size)) {
                           ?>
                              <option value="<?= $row_size['loaisize'] ?>"><?= $row_size['loaisize'] ?></option>
                           <?php
                           }
                           ?>
                        </select>
                     </p>
                  </div>
                  <div class="quantity">
                     <p class="soluong-sp-p"><b>Số lượng:</b></p>
                     <div class="soluong-sp-dem">
                        <a class="soluong-sp-dem-icon" href="./giohang/suasoluong.php?cong=<?= $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                        <input class="soluong-sp-input" type="text" name="soluong" value="1">
                        <a class="soluong-sp-dem-icon" href="./giohang/suasoluong.php?tru=<?= $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                     </div>
                     <p class="soluong-sp-cosan"><?= $row_chitiet['soluong'] ?></p><span class="soluong-sp-cosan-text">sản phẩm còn sẵn</span>
                  </div>
                  <div class="mota">
                     <p class="mota-text"><b>Loại sản phẩm:</b> <?= $row_chitiet['tenloaisanpham'] ?> </p>
                     <p class="mota-text"><b>Nhà cung cấp:</b> <?= $row_chitiet['tennhacungcap'] ?> </p>
                  </div>
                  <div class="mota">
                     <p class="mota-text"><b>Chi tiết sản phẩm: </b> <?= $row_chitiet['tomtat'] ?> </p>
                  </div>
                  <div class="mota">
                     <p class="mota-text"><?= $row_chitiet['noidung'] ?> </p>
                  </div>
                  <div class="product-content-right-product-button">
                     <button type="submit" name="themgiohang" value="Thêm Giỏ Hàng">Thêm Giỏ Hàng</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
<?php
}
?>
<script type="text/javascript">
   var soluong = document.querySelector('.soluong-sp-input');
   var demPlus = document.querySelector('.soluong-sp-dem-icon .fa-plus');
   var demMins = document.querySelector('.soluong-sp-dem-icon .fa-minus');
   var soluongMax = document.querySelector('.soluong-sp-cosan').innerHTML;
   console.log(soluongMax);

   demPlus.addEventListener('click', function() {
      if (soluong.value >= soluongMax) {
         alert("Số lượng sản phẩm còn lại chỉ còn: " + soluongMax);
         soluong.value = soluongMax;
      } else {
         soluong.value++;
      }
   })
   demMins.addEventListener('click', function() {
      if (soluong.value <= 1) {
         alert('Số lượng sản phẩm phải lớn hơn bằng 1');
         soluong.value = 1;
      } else {
         soluong.value--;
      }
   })
</script>