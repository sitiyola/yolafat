<?php
include"dbsirebu.php";
$nik_siswa=$_GET['nik_siswa'];
$status=$_GET['status'];

mysqli_query($db,
    "UPDATE siswa SET status='Belum' WHERE nik_siswa='$nik_siswa'");
    header("location:ad_data.php?alert=update");
    ?>