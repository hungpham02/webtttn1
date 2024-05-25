<?php
    $severname="localhost";
    $username="root";
    $password="";
    $database="webtttn";

    $connect= mysqli_connect($severname,$username,$password,$database);
    if(mysqli_connect_errno()){
        echo "loi ket noi".mysqli_connect_error();
        exit();
    }
?>