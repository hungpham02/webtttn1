<div id="wp-products">
    <?php //lấy quanly từ menu truyền vào bằng phương thức GET
    if (isset($_GET['quanly'])) {
        $bientam = $_GET['quanly'];
    } else {
        $bientam = "";
    }
    if ($bientam == "") { ?>
        <h2>SẢN PHẨM MỚI</h2>
    <?php
        include("main/sanphammoi.php");
    }
    ?>
</div>
<div id="wp-products">
    <?php //lấy quanly từ menu truyền vào bằng phương thức GET
    if (isset($_GET['quanly'])) {
        $bientam = $_GET['quanly'];
    } else {
        $bientam = "";
    }
    if ($bientam == "") { ?>
        <h2>TẤT CẢ SẢN PHẨM</h2>
    <?php
        include("main/index.php");
    }
    ?>
</div>