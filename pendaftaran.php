<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .alert {
            padding: 20px;
            color: white;
            margin-top: 5px;
            font-family: Verdana;
            font-weight: bold;
            position: relative;
            top: 60px;
            left: 125px;
            width: 77%;
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

        }.upload_pendaftaran{
            font-family: Verdana;
            font-size:16px;
            text-decoration: none;
            color:white;
            padding: 7px 0px 10px 0px;
            position: relative;
            margin: bottom 5px;
            margin-top:20px;
            left: -200px;
            resize:vertical;
            width: 80%; 
    
        } .pilihan_pendaftaran{
            font-family: Verdana;
            font-size:16px;
            text-decoration: none;
            background-color:white;
            border-style: solid;
            border-width: 1px;
            padding: 7px 74px 7px 10px;
            margin-bottom: 20px;
            resize:vertical;
            width: 103%; 
        
    }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="judul">PENDAFTARAN</div>
    <div class="sub_judul">Formulir Pendaftaran</div>
    
    <?php if (isset($_GET['alert'])) {
        if ($_GET['alert'] == 'gagal') {
    ?>
        <div class="alert" style="background-color: #B50021;">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            Gagal mengubah data.
        </div>
    <?php } elseif ($_GET['alert'] == "tambah") { ?>
        <div class="alert" style="background-color: #0F812C;">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            Data berhasil ditambahkan.
        </div>
    <?php } } ?>

    <form action="pendaftaran_input_proses.php" method="post" enctype="multipart/form-data">
        <table class="table_pendaftaran" id="tabel-input">
            <tr>
                <td class="label_pendaftaran" colspan="2">NIK</td>
                <td class="label_pendaftaran">Jenis Kelamin</td>
            </tr>
            <tr>    
                <td colspan="2"><input type="text" class="isian_pendaftaran" name="nik_siswa" placeholder="Nomor Induk Kependudukan (NIK)" required></td>  
                <td class="radio_pendaftaran">
                    <input type="radio" id="laki" name="jenkel" value="Laki - Laki" required><label for="laki_laki">Laki - Laki</label>
                    <input type="radio" id="perempuan" name="jenkel" value="Perempuan" required><label for="perempuan">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td class="label_pendaftaran" colspan="2">Nama</td>
                <td class="label_pendaftaran">Anak Ke</td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" class="isian_pendaftaran" name="nama_siswa" placeholder="Nama Lengkap Siswa" required></td>
                <td><input type="text" class="isian_pendaftaran"  name="anak_ke" id="anak_ke" required></td> 
            </tr>
            <tr>
                <td class="label_pendaftaran" colspan="2">Tempat Tanggal Lahir</td>
                <td class="label_pendaftaran">Agama (Opsional)</td>
            </tr>
            <tr>
                <td><input type="text" class="isian_pendaftaran" style="width:220px;" name="tempat_lahir" placeholder="Tempat Lahir" required></td>
                <td><input type="date" class="isian_pendaftaran" style="width:155px; position:relative; right:20px; padding-right:10px;" name="tanggal_lahir" required></td>
                <td>
                    <select class="pilihan_pendaftaran" name="agama">
                        <option value="" selected disabled>Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                        <option value="Kepercayaan Lain">Kepercayaan Lain</option>
                        <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label_pendaftaran" colspan="2">NIK Ayah</td>
                <td class="label_pendaftaran">NIK Ibu</td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" class="isian_pendaftaran" name="nik_ayah" placeholder="NIK Ayah" required></td>
                <td><input type="text" class="isian_pendaftaran" name="nik_ibu" placeholder="NIK Ibu" required></td> 
            </tr>
            <tr>
                <td class="label_pendaftaran" colspan="2">Nama Lengkap Ayah</td>
                <td class="label_pendaftaran">Nama Lengkap Ibu</td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" class="isian_pendaftaran" name="nm_ayah" placeholder="Nama Lengkap Ayah" required></td>
                <td><input type="text" class="isian_pendaftaran" name="nm_ibu" placeholder="Nama Lengkap Ibu" required></td> 
            </tr>
            <tr>
                <td class="label_pendaftaran" colspan="2">Pekerjaan Ayah (Opsional)</td>
                <td class="label_pendaftaran">Pekerjaan Ibu (Opsional)</td>
            </tr>
            <tr>
                <td colspan="2">
                    <select class="pilihan_pendaftaran" style=" width: 95%; " name="pek_ayah">
                        <option value="" selected disabled>Pilih Pekerjaan Ayah</option>
                        <option value="PNS">PNS</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                        <option value="Petani">Petani</option>
                        <option value="TNI/Polri">TNI/Polri</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </td>
                <td>
                    <select class="pilihan_pendaftaran" name="pek_ibu">
                        <option value="" selected disabled>Pilih Pekerjaan Ibu</option>
                        <option value="PNS">PNS</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                        <option value="Petani">Petani</option>
                        <option value="TNI/Polri">TNI/Polri</option>
                        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </td> 
            </tr>
            <tr>
                <td class="label_pendaftaran" colspan="2">Nomor Telepon Ayah</td>
                <td class="label_pendaftaran">Nomor Telepon Ibu</td>
            </tr>
            <tr>
                <td colspan="2"><input type="text" class="isian_pendaftaran" name="no_ayah" placeholder="Nomor Telepon Ayah" required></td>
                <td><input type="text" class="isian_pendaftaran" name="no_ibu" placeholder="Nomor Telepon Ibu" required></td> 
            </tr>
            <tr>
                <td class="label_pendaftaran">Alamat</td>
            </tr>
            <tr>
                <td colspan="2"><textarea class="isian_pendaftaran" name="alamat" style="height:100px;" placeholder="Alamat" required></textarea></td>
            </tr>

            <tr>
                <td class="label_pendaftaran">Kartu Keluarga <p> (jpg, png)
                </td>
                <td colspan="2"><input class="upload_pendaftaran" type="file" name="file_kartu_keluarga" required></td>
            </tr>
            <tr>
                <td class="label_pendaftaran">Foto Siswa</td>
                <td colspan="2"><input class="upload_pendaftaran" type="file" name="file_foto" required></td>
            </tr>
            <tr>
                <td class="label_pendaftaran">Akta Kelahiran</td>
                <td colspan="2"><input class="upload_pendaftaran" type="file" name="file_akta_kelahiran" required></td>
            </tr>

            <tr>
                <td><a class="kembali_pendaftaran" href="index.html">Kembali</a> <input type="submit" name="simpan" onclick="return confirm('Yakin Data Disimpan?')" value="Simpan" id="tombol-simpan" class="simpan_pendaftaran"></td>
            </tr>
        </table>
    </form>
</body>
</html>
