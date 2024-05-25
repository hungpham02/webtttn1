<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../css/style.css">

<?php
// GET id là lấy id từ bên MENU.php 
$sql_show = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_nhacungcap='$_GET[id]' ORDER BY id_sanpham DESC";
$query_show = mysqli_query($connect, $sql_show);

//get ten danh muc
$sql_cate = "SELECT * FROM tbl_nhacungcap WHERE id_nhacungcap='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($connect, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<p></p>
<h5> Nhà cung cấp |
    <?php
    if (isset($row_title['tennhacungcap'])) {
        echo $row_title['tennhacungcap'];
    } else {
        echo "lỗi không lấy được data";
    }
    ?>

</h5>
<div id="wp-products">
	<ul id="list-products">
		<?php
		while ($row = mysqli_fetch_array($query_show)) {
		?>
			<div style="width: 280px; height: 430px;" class="item">
				<a style="text-decoration: none;" href="index.php?quanly=sanpham&id=<?= $row['id_sanpham'] ?>">
					<img style="border-radius: 10px;" src="admincp/images/uploadssanpham/<?= $row['hinhanh'] ?>">
					<div style="text-align: center;" class="name"><?= $row['tensanpham'] ?></div>
					<div style="color: rgba(256, 256, 256, 0.6); text-align: justify; padding: 10px; font-size: 14px; height: 90px;" class="desc"><?= $row['tomtat'] ?></div>
					<div class="price"><?= number_format($row['giasanpham'], 0, ',', '.') . 'vnđ'  ?></div>
				</a>
			</div>
		<?php
		}
		?>
	</ul>
</div>