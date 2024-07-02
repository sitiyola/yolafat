<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .table_data, td, tr, th {
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
            max-width: 90%;
            text-align: center;
        }
        th {
            background-color: #0072BE;
        }
        .tombol_lulus, .tombol_blulus, .tombol_hapus, .tombol_edit {
            font-family: Verdana;
            font-weight: bold;
            position: relative;
            cursor: pointer;
            font-size: 12px;
            padding: 6px 23px;
            border: solid 2px;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            width: 40%;
            margin-bottom: 5px;
        }
        .tombol_lulus {
            background-color: #0F812C;
            color: white;
            border-color: #0F812C;
        }
        .tombol_lulus:hover {
            background-color: #C1FCAC;
            color: black;
        }
        .tombol_blulus {
            background-color: #FFF500;
            color: black;
            border-color: #FFF500;
        }
        .tombol_blulus:hover {
            background-color: #FFFDCC;
            color: black;
        }
        .tombol_hapus {
            background-color: #DA0116;
            color: white;
            border-color: #DA0116;
        }
        .tombol_hapus:hover {
            background-color: #FF7F66;
            color: white;
        }
        .tombol_edit {
            background-color: #3ABAEA;
            color: white;
            border-color: #3ABAEA;
        }
        .tombol_edit:hover {
            background-color: #7AD7F0;
            color: black;
        }
        .alert {
            padding: 20px;
            color: white;
            margin-top: 5px;
            font-family: Verdana;
            font-weight: bold;
            position: relative;
            top: 60px;
            left: 63px;
            max-width: 87%;
        }
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            font: Verdana;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }
    </style>
</head>
<body>
    <?php include 'navbar_ad.php'; ?>
    <?php include 'dbsirebu.php'; ?>

    <div class="judul">Data Siswa</div>

    <?php if (isset($_GET['alert'])) : ?>
        <?php if ($_GET['alert'] == 'gagal') : ?>
            <div class="alert" style="background-color: #B50021;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Gagal menghapus data.
            </div>
        <?php elseif ($_GET['alert'] == 'hapus') : ?>
            <div class="alert" style="background-color: #B50021;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Data berhasil dihapus.
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <table class="table_data" id="tabel-input">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Detail</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $ambil = mysqli_query($db, "SELECT * FROM siswa ORDER BY nm_siswa");
            $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
            foreach($result as $result) : 
            ?>
                <tr>
                    <td><?php echo $result["nik_siswa"]; ?></td>
                    <td><?php echo $result["nm_siswa"]; ?></td>
                    <td><?php echo $result["jenkel"]; ?></td>
                    <td><?php echo $result["nm_ayah"]; ?></td>
                    <td><?php echo $result["nm_ibu"]; ?></td>
                    <td><a href="detail_data.php?nik_siswa=<?php echo $result['nik_siswa']; ?>" class="tombol_data">Detail</a></td>
                    <td> <?php
                    if ($result['status'] == "Lulus") {
                        ?>
                            <a href="status_lulus.php?nik_siswa=<?php echo $result['nik_siswa'] ?>" class="tombol_lulus" onclick="return confirm ('Yakin Mengubah Data Siswa Ini?')">
                            <?php echo $result["status"]; ?>
                            </a>
                            <?php
                    }elseif ($result['status'] == "Belum") {
                        ?>
                            <a href="status_belum.php?nik_siswa=<?php echo $result['nik_siswa'] ?>" class="tombol_blulus" onclick="return confirm ('Yakin Mengubah Data Siswa Ini?')">
                         <?php echo $result["status"]; ?>
                        </a>
                        <?php } ?>  </td>
                    <td><a class="tombol_data" href="edit_data.php?nik_siswa=<?php echo $result['nik_siswa']; ?>" class="tombol_edit">Edit</a></td>
                    <td><a href="hapus_data.php?nik_siswa=<?php echo $result['nik_siswa']; ?>" class="tombol_hapus" onclick="return confirm('Yakin ingin Menghapus?')">Hapus</a></td>
                </tr>
                <?php $nomor++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    

    </form>
</body>
</html>
