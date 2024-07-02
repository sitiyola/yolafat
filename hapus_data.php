<?php
include"dbsirebu.php";
$nik_siswa=$_GET['nik_siswa'];

mysqli_query($db,
    "Delete FROM siswa
    WHERE nik_siswa='$nik_siswa'");


    header("location:ad_data.php?alert=hapus");
    ?>
