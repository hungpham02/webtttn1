<div class="clear"></div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../css/style.css">

<?php
if (isset($_POST['timkiem'])) {
	$tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_loaisanpham WHERE tbl_sanpham.id_loaisanpham=tbl_loaisanpham.id_loaisanpham 
	AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
$query_pro = mysqli_query($connect, $sql_pro);

?>
<h3>Từ khoá tìm kiếm : <?= $_POST['tukhoa']; ?></h3>
<div id="wp-products">
	<ul id="list-products">
		<?php
		while ($row = mysqli_fetch_array($query_pro)) {
		?>
			<div class="item">
				<a href="index.php?quanly=sanpham&id=<?= $row['id_sanpham'] ?>">
					<img src="admincp/images/uploadssanpham/<?= $row['hinhanh'] ?>">
					<div class="name"><?= $row['tensanpham'] ?></div>
					<div class="desc"><?= $row['tomtat'] ?></div>
					<div class="price"><?= number_format($row['giasanpham'], 0, ',', '.') . 'vnđ'  ?></div>
				</a>
			</div>
		<?php
		}
		?>
	</ul>
</div>