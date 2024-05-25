<main class="main container" id="main">
    <?php
      if(isset($_SESSION['id_admin'])){
    ?>
         <h1 style="text-align: center;color: black;">Xin chào: <?php echo $_SESSION['name'] ?></h1>
         <?php

// Truy vấn cơ sở dữ liệu
$sql = "SELECT YEAR(ngaydat) AS nam, SUM(soluongban) AS soluongban FROM tbl_thongke GROUP BY YEAR(ngaydat)";
$result = mysqli_query($connect, $sql);

// Tạo mảng dữ liệu cho biểu đồ
$data = array();
$data[] = ['Năm', 'Số lượng bán'];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [(int)$row['nam'], (int)$row['soluongban']];
}

?>

<html>
<head>
    <h4 style="text-align: center;">Thống kê số lượng bạn hàng theo năm</h4>
<div class="">
                <div class="d-flex justify-content-around mt-4">
                <a class="btn btn-primary" href="index.php?quanly=7ngay" role="button">7 ngày</a>
                <a class="btn btn-primary" href="index.php" role="button">1 tháng</a>
                <a class="btn btn-primary" href="index.php?quanly=1nam" role="button">1 năm</a>
            </div>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

      var options = {
        chart: {
          title: 'Số lượng bán theo năm',
          subtitle: 'Từ năm đầu tiên đến năm hiện tại',
        }
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>
</head>
<body>
  <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
</body>
</html>

    <?php
        }
    ?>
</main>
