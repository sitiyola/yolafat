<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form_edit {
            font-family: Verdana;
            margin: auto;
            width: 50%;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], input[type="date"], textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="file"] {
            margin-top: 10px;
        }
        .tombol {
            font-family: Verdana;
            font-weight: bold;
            cursor: pointer;
            font-size: 12px;
            background-color: #0072BE;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .tombol:hover {
            background-color: #005FAA;
        }
    </style>
</head>
<body>
    <?php
    include 'navbar_ad.php';
    include 'dbsirebu.php';

    // Ambil nik_siswa dari parameter GET
    $nik_siswa = $_GET['nik_siswa'];

    // Query untuk mengambil data siswa berdasarkan nik_siswa
    $query = "SELECT * FROM siswa WHERE nik_siswa = '$nik_siswa'";
    $result = mysqli_query($db, $query);
    $siswa = mysqli_fetch_assoc($result);
    ?>

    <div class="form_edit">
        <h2>Edit Data Siswa</h2>
        <form action="edit_data_proses.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="nik_siswa" value="<?php echo $siswa['nik_siswa']; ?>">
            
            <label>Jenis Kelamin:</label>
            <select name="jenkel" required>
                <option value="Laki-laki" <?php if ($siswa['jenkel'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($siswa['jenkel'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
            </select>
            
            <label>Nama Siswa:</label>
            <input type="text" name="nama_siswa" value="<?php echo $siswa['nm_siswa']; ?>" required>
            
            <label>Anak Ke:</label>
            <input type="number" name="anak_ke" value="<?php echo $siswa['anak_ke']; ?>" required>
            
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" value="<?php echo $siswa['tempat_lahir']; ?>" required>
            
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" value="<?php echo $siswa['tanggal_lahir']; ?>" required>
            
            <label>Agama:</label>
            <input type="text" name="agama" value="<?php echo $siswa['agama']; ?>" required>
            
            <label>NIK Ayah:</label>
            <input type="text" name="nik_ayah" value="<?php echo $siswa['nik_ayah']; ?>" required>
            
            <label>Nama Ayah:</label>
            <input type="text" name="nm_ayah" value="<?php echo $siswa['nm_ayah']; ?>" required>
            
            <label>Pekerjaan Ayah:</label>
            <input type="text" name="pek_ayah" value="<?php echo $siswa['pek_ayah']; ?>" required>
            
            <label>No. Telepon Ayah:</label>
            <input type="text" name="no_ayah" value="<?php echo $siswa['no_ayah']; ?>" required>
            
            <label>NIK Ibu:</label>
            <input type="text" name="nik_ibu" value="<?php echo $siswa['nik_ibu']; ?>" required>
            
            <label>Nama Ibu:</label>
            <input type="text" name="nm_ibu" value="<?php echo $siswa['nm_ibu']; ?>" required>
            
            <label>Pekerjaan Ibu:</label>
            <input type="text" name="pek_ibu" value="<?php echo $siswa['pek_ibu']; ?>" required>
            
            <label>No. Telepon Ibu:</label>
            <input type="text" name="no_ibu" value="<?php echo $siswa['no_ibu']; ?>" required>
            
            <label>Alamat:</label>
            <textarea name="alamat" rows="4" required><?php echo $siswa['alamat']; ?></textarea>
            
            <br><tr>
                <td class="label_pendaftaran">Kartu Keluarga</td><br>
                <td colspan="2"><input class="upload_pendaftaran" type="file" name="file_kartu_keluarga" required></td><br>
            </tr>
            
            <br><tr>
                <td class="label_pendaftaran">File Foto</td><br>
                <td colspan="2"><input class="upload_pendaftaran" type="file" name="file_foto" required></td><br>
            </tr>
            
            <br><tr>
                <td class="label_pendaftaran">Akta Kelahiran</td><br>
                <td colspan="2"><input class="upload_pendaftaran" type="file" name="file_akta_kelahiran" required></td><br>
            </tr>
            <br>

            <td><a class="kembali_pendaftaran" href="ad_data.php">Kembali</a> <input type="submit" name="simpan" onclick="return confirm('Yakin Data Disimpan?')" value="Simpan" id="tombol-simpan" class="simpan_pendaftaran"></td>
           
        </form>
    </div>
</body>
</html>
