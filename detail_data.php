<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Utama</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <style>
        .table_detail_data, td, tr, th{
            border-style: solid;
            border-width: 2px;
            border-color: #003C80; 
            border-collapse: collapse;
            background-color: #3ABAEA;
            font-family: Verdana;
            color: white;
            font-weight: bold;
            padding: 10px;
            word-wrap: break-word;
            max-width: 70%;

        } th{
            background-color: #0072BE;
            width: 200px;
            text-align: left;
        
        } @media print {
            .btn-container, .navbar, .print_button, .judul, .kembali_detail_data {
                display: none;
                
            
            } .table_detail_data {
                position: relative;
                top: -60px;
               
            } html, body {
                height:100%; 
                margin: 0 !important; 
                padding: 0 !important;
                overflow: hidden;
            }
        }

            </style>
             <?php include 'navbar_ad.php';
            include('dbsirebu.php'); 
            
            $ambil = mysqli_query($db, "SELECT * FROM siswa where nik_siswa='$_GET[nik_siswa]'");
            $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
            
            foreach($result as $result) : ?>


            <div class="judul">Detail Data Siswa</div>         
            <table  class="table_detail_data" id="tabel-input">
                <tr>
                    <th>NIK</th>
                    <td><?php echo $result["nik_siswa"]; ?></td>
                </tr>
                <tr>
                    <th>Nama Siswa</th>
                    <td><?php echo $result["nm_siswa"]; ?></td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td><?php echo $result["tempat_lahir"]; ?></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td><?php echo $result["tanggal_lahir"]; ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?php echo $result["jenkel"]; ?></td>
                </tr>
                <tr>
                    <th>Anak Ke</th>
                    <td><?php echo $result["anak_ke"]; ?></td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td><?php echo $result["agama"]; ?></td>
                </tr>
                <tr>
                    <th>NIK Ayah</th>
                    <td><?php echo $result["nik_ayah"]; ?></td>
                </tr>
                <tr>
                    <th>Nama Ayah</th>
                    <td><?php echo $result["nm_ayah"]; ?></td>
                </tr>
                <tr>
                    <th>Pekerjaan Ayah</th>
                    <td><?php echo $result["pek_ayah"]; ?></td>
                </tr>
                <tr>
                    <th>No Hp Ayah</th>
                    <td><?php echo $result["no_ayah"]; ?></td>
                </tr>
                <tr>
                    <th>NIK Ibu</th>
                    <td><?php echo $result["nik_ibu"]; ?></td>
                </tr>
                <tr>
                    <th>Nama Ibu</th>
                    <td><?php echo $result["nm_ibu"]; ?></td>
                </tr>
                <tr>
                    <th>Pekerjaan Ibu</th>
                    <td><?php echo $result["pek_ibu"]; ?></td>
                </tr>
                <tr>
                    <th>No Hp Ibu</th>
                    <td><?php echo $result["no_ibu"]; ?></td>
                </tr>
                <tr>
                    <th>Foto KK</th>
                    <td><img style="max-width:30%;" src="uploads/<?php echo $result['file_kk']; ?>"></td>
                </tr>
                <tr>
                    <th>Foto Siswa</th>
                    <td><img style="max-width:30%;" src="uploads/<?php echo $result['file_foto']; ?>"></td>
                </tr>
                <tr>
                    <th>Foto Akta</th>
                    <td><img style="max-width:30%;" src="uploads/<?php echo $result['file_akta']; ?>"></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?php echo $result["alamat"]; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <a href="ad_data.php" class="kembali_detail_data" name="kembali">Kembali</a>
            <button class="print_button" onclick="window.print()">Cetak Data</button>
        </div>
    </body>
</html>


