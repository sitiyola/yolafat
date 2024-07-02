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

    // Update data siswa di database
    $query = "UPDATE siswa SET 
                jenkel = '$jenkel',
                nm_siswa = '$nama_siswa',
                anak_ke = '$anak_ke',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                agama = '$agama',
                nik_ayah = '$nik_ayah',
                nm_ayah = '$nm_ayah',
                pek_ayah = '$pek_ayah',
                no_ayah = '$no_ayah',
                nik_ibu = '$nik_ibu',
                nm_ibu = '$nm_ibu',
                pek_ibu = '$pek_ibu',
                no_ibu = '$no_ibu',
                alamat = '$alamat'
              WHERE nik_siswa = '$nik_siswa'";

    $result = mysqli_query($db, $query);

    // Cek jika ada file yang diupload
    if ($_FILES['file_kartu_keluarga']['size'] > 0) {
        $uploadDir = 'uploads/';
        $fileKartuKeluarga = $_FILES['file_kartu_keluarga']['name'];
        $fileTmpKartuKeluarga = $_FILES['file_kartu_keluarga']['tmp_name'];
        move_uploaded_file($fileTmpKartuKeluarga, $uploadDir . $fileKartuKeluarga);

        // Update nama file Kartu Keluarga di database
        $queryUpdateKK = "UPDATE siswa SET file_kk = '$fileKartuKeluarga' WHERE nik_siswa = '$nik_siswa'";
        mysqli_query($db, $queryUpdateKK);
    }

    if ($_FILES['file_foto']['size'] > 0) {
        $uploadDir = 'uploads/';
        $fileFoto = $_FILES['file_foto']['name'];
        $fileTmpFoto = $_FILES['file_foto']['tmp_name'];
        move_uploaded_file($fileTmpFoto, $uploadDir . $fileFoto);

        // Update nama file Foto di database
        $queryUpdateFoto = "UPDATE siswa SET file_foto = '$fileFoto' WHERE nik_siswa = '$nik_siswa'";
        mysqli_query($db, $queryUpdateFoto);
    }

    if ($_FILES['file_akta_kelahiran']['size'] > 0) {
        $uploadDir = 'uploads/';
        $fileAktaKelahiran = $_FILES['file_akta_kelahiran']['name'];
        $fileTmpAktaKelahiran = $_FILES['file_akta_kelahiran']['tmp_name'];
        move_uploaded_file($fileTmpAktaKelahiran, $uploadDir . $fileAktaKelahiran);

        // Update nama file Akta Kelahiran di database
        $queryUpdateAkta = "UPDATE siswa SET file_akta = '$fileAktaKelahiran' WHERE nik_siswa = '$nik_siswa'";
        mysqli_query($db, $queryUpdateAkta);
    }

    if ($result) {
        header("Location: ad_data.php?alert=edit");
    } else {
        header("Location: edit_data.php?nik_siswa=$nik_siswa&alert=gagal");
    }
} else {
    header("Location: pendaftaran.php?alert=gagal");
}
?>
