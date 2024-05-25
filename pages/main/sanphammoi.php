<div class="clear"></div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../css/style.css">

<?php
    // GET id là lấy id từ bên MENU.php
    $sql_show_new ="SELECT * FROM tbl_sanpham,tbl_loaisanpham WHERE tbl_sanpham.id_loaisanpham=tbl_loaisanpham.id_loaisanpham AND tbl_sanpham.trangthai=1 ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 4";
    $query_show_new =mysqli_query($connect,$sql_show_new);
?>

<div id="wp-products">
	<ul id="list-products">
		<?php
		while ($row = mysqli_fetch_array($query_show_new)) {
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
