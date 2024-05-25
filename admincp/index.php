<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="css/styles.css">
    <title>Quản lý bán hàng</title>
</head>

<body>
    <div class="container-fluid">
        <!-- Sidebar bg -->
        <img src="images/sidebar-bg.jpg" alt="sidebar img" class="bg-image">
        <div class="row">
            <?php
        session_start();
        if(!isset($_SESSION['id_admin'])){
            header("location:http://localhost/webtttn1/index.php?quanly=dangnhap");
            exit; 
        }
        include("config/connect.php");
        include("pages/header.php");
        include("pages/main.php");
       ?>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(document).ready(function(){
            thongke();
            var char = new Morris.Area({
                element: 'chart',
                xkey: 'date',
                ykeys: ['order', 'sales', 'quantity'],
                labels: ['Đơn hàng', 'Doanh thu', 'Số lượng bán ra']
            });
            
            $('.select-date').change(function(){
                var thoigian = $(this).val();
                if(thoigian == '7ngay'){
                    text = '7 ngày qua';
                } else if(thoigian == '28ngay'){
                    text = '28 ngày qua';
                } else if(thoigian == '90ngay'){
                    text = '90 ngày qua';
                } else {
                    text = '365 ngày qua';
                }

                $.ajax({
                    url: "modules/thongke.php",
                    method: "POST",
                    dataType: "JSON",
                    data: {thoigian: thoigian},
                    success: function(data) {
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                });
            });

            function thongke(){
                var text = '365 ngày qua';
                $('#text-date').text(text);

                $.ajax({
                    url: "modules/thongke.php",
                    method: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        char.setData(data);
                    }
                });
            }
        });
    </script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#sanphamtt' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#sanphamnd' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#tomtat' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#noidung' ) )
        .catch( error => {
            console.error( error );
    } );
    ClassicEditor
        .create( document.querySelector( '#thongtinlienhe' ) )
        .catch( error => {
            console.error( error );
    } );
    </script>
    <script>
                    $(document).ready(function() {
                var menu = $('.navbar');
                var menuPosition = menu.offset().top;

                $(window).scroll(function() {
                    if($(this).scrollTop() > menuPosition) {
                        menu.addClass('fixed-menu');
                    } else {
                        menu.removeClass('fixed-menu');
                    }
                });
            });

    </script>
    <script src="js/main.js"></script>
</body>

</html>