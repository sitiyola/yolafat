<?php
include "dbsirebu.php";

if(isset($_POST['simpan'])) {
    // Data siswa
    $nik_siswa = $_POST['nik_siswa'];
    $jenkel = $_POST['jenkel'];
    $nama_siswa = $_POST['nama_siswa'];
    $anak_ke = $_POST['anak_ke'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $nik_ayah = $_POST['nik_ayah'];
    $nm_ayah = $_POST['nm_ayah'];
    $pek_ayah = $_POST['pek_ayah'];
    $no_ayah = $_POST['no_ayah'];
    $nik_ibu = $_POST['nik_ibu'];
    $nm_ibu = $_POST['nm_ibu'];
    $pek_ibu = $_POST['pek_ibu'];
    $no_ibu = $_POST['no_ibu'];
    $alamat = $_POST['alamat'];

    // Upload file
    // $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';

    // File Kartu Keluarga
    $fileKartuKeluarga = $_FILES['file_kartu_keluarga']['name'];
    $fileTmpKartuKeluarga = $_FILES['file_kartu_keluarga']['tmp_name'];
    // $tujuanKartuKeluarga = $uploadDir . $fileKartuKeluarga;
    // move_uploaded_file($fileTmpKartuKeluarga, $tujuanKartuKeluarga);
    move_uploaded_file($fileTmpKartuKeluarga, "uploads/".$fileKartuKeluarga);
    
    // File Foto
    $fileFoto = $_FILES['file_foto']['name'];
    $fileTmpFoto = $_FILES['file_foto']['tmp_name'];
    // $tujuanFoto = $uploadDir . $fileFoto;
    // move_uploaded_file($fileTmpFoto, $tujuanFoto);
    move_uploaded_file($fileTmpFoto, "uploads/".$fileFoto);

    // File Akta Kelahiran
    $fileAktaKelahiran = $_FILES['file_akta_kelahiran']['name'];
    $fileTmpAktaKelahiran = $_FILES['file_akta_kelahiran']['tmp_name'];
    // $tujuanAktaKelahiran = $uploadDir . $fileAktaKelahiran;
    // move_uploaded_file($fileTmpAktaKelahiran, $tujuanAktaKelahiran);
    move_uploaded_file($fileTmpAktaKelahiran, "uploads/".$fileAktaKelahiran);


    // Simpan data siswa dan nama file ke dalam database
    $query = "INSERT INTO siswa (nik_siswa, nm_siswa, tempat_lahir, tanggal_lahir, jenkel, anak_ke, agama, nik_ayah, nm_ayah, pek_ayah, no_ayah, nik_ibu, nm_ibu, pek_ibu, no_ibu, alamat, file_kk, file_foto, file_akta, status)
              VALUES ('$nik_siswa', '$nama_siswa', '$tempat_lahir', '$tanggal_lahir', '$jenkel', '$anak_ke', '$agama', '$nik_ayah', '$nm_ayah', '$pek_ayah', '$no_ayah', '$nik_ibu', '$nm_ibu', '$pek_ibu', '$no_ibu', '$alamat', '$fileKartuKeluarga', '$fileFoto', '$fileAktaKelahiran', 'Belum')";
    
    $result = mysqli_query($db, $query);

    if ($result) {
        header("Location: pendaftaran.php?alert=tambah");
    } else {
        header("Location: pendaftaran.php?alert=gagal");
    }
} else {
    header("Location: pendaftaran.php?alert=gagal");
}
?>
