<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../css/style.css">
<div class="slideshow-container">
                <div class="mySlides fade" style="display: none;">
                    <img src="./assets/banner1.jpg" style="width:100%">
                </div>
                <div class="mySlides fade" style="display: none;">
                    <img src="./assets/banner2.jpg" style="width:100%">
                </div>
                <div class="mySlides fade" style="display: block;">
                    <img src="./assets/banner3.png" style="width:100%">
                </div>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot active"></span>
            </div>

            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                    setTimeout(showSlides, 3000); // Change image every 2 seconds
                }
                const next = document.querySelector('.next')
                const prev = document.querySelector('.prev')
                const comment = document.querySelector('#list-comment')
                const commentItem = document.querySelectorAll('#list-comment .item')
                var translateY = 0
                var count = commentItem.length
            </script>
<?php
if (isset($_GET['trang'])) {
	$page = $_GET['trang'];
} else {
	$page = 1;
}
if ($page == '' || $page == 1) {
	$begin = 0;
} else {
	$begin = ($page * 8) - 8;
}
// GET id là lấy id từ bên MENU.php 
$sql_show = "SELECT * FROM tbl_sanpham,tbl_loaisanpham WHERE tbl_sanpham.id_loaisanpham=tbl_loaisanpham.id_loaisanpham ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,8";
$query_show = mysqli_query($connect, $sql_show);

?>

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
<style type="text/css">
	ul.list_trang {
		padding: 0;
		margin: 0;
		list-style: none;
		display: flex;
		justify-content: center;
	}

	ul.list_trang li {
		float: left;
		padding: 5px 13px;
		margin: 5px;
		background: burlywood;
		display: block;
	}

	ul.list_trang li a {
		color: #000;
		text-align: center;
		text-decoration: none;

	}
</style>
<?php
$sql_trang = mysqli_query($connect, "SELECT * FROM tbl_sanpham");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 8);
?>

<ul class="list_trang">

	<?php

	for ($i = 1; $i <= $trang; $i++) {
	?>
		<li <?php if ($i == $page) {
				echo 'style="background: brown;"';
			} else {
				echo '';
			}  ?>><a href="index.php?trang=<?= $i ?>"><?= $i ?></a></li>
	<?php
	}
	?>

</ul>