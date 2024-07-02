<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Utama</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <style>
      .table_pengumuman{
        position: relative;
        width:90%;
        height: 20px;
        margin: 60px auto;
        margin-bottom: 10px;
        background-color: #3ABAEA;

    } .table_pengumuman, td, tr, th{
        border-style: solid;
        border-width: 2px;
        border-color: #003C80; 
        border-collapse: collapse;
        background-color: #3ABAEA;
        font-family: Verdana;
        color: white;
        font-weight: bold;
        padding: 10px;
        max-width: 90%;
        text-align: center;

    } .table_pengumuman th{
        background-color: #0072BE;

    }.sub_judul{
        font-size:20px; 
        color: black;
        font-family: Verdana;
        font-weight: bold;
        text-align:center;
        position: relative; 
        width: 100%;
        left: 0%;
        top: 80px; 
    
    }
    </style>
            <?php include 'navbar.php';?>
            <?php include('dbsirebu.php');?>

            <div class="judul">PENGUMUMAN</div>
            <?php 
            $ambil_data = mysqli_query($db, "SELECT * FROM siswa");
            $hasil = mysqli_fetch_all($ambil_data, MYSQLI_ASSOC);
            foreach ($hasil as $hasil) {
            }

            if ($hasil['status'] == "Lulus") {
                ?>         
            <table class="table_pengumuman" id="tabel-input">
                <thead>
                <tr>
                <th>No Urut</th>
                <th>NIK</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>

                <?php $nomor=1; ?>
                <?php 
                $ambil = mysqli_query($db, "SELECT * FROM siswa WHERE status='Lulus' ORDER BY nm_siswa");
                $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
                ?>
                <?php foreach($result as $result) : ?>

                <tr>
                <td scope="row"><?php echo $nomor; ?></td>
                <td><?php echo $result["nik_siswa"]; ?></td>
                <td><?php echo $result["nm_siswa"]; ?></td>
                <td><?php echo $result["jenkel"]; ?></td>
                <td><?php echo $result["nm_ayah"]; ?></td>
                <td><?php echo $result["nm_ibu"]; ?></td>
                <td><?php echo $result["status"]; ?></td>                
                </tr>
                <?php $nomor++; ?>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php }elseif ($hasil['status'] == "Belum") { 
            ?>   <div class="sub_judul">Maaf pengumuman akan di infokan pada tanggal yang telah ditentukan.
                <p> Bagi calon siswa yang dinyatakan lulus, diminta untuk membawa beberapa persyaratan untuk melakukan daftar ulang:
                <p> 1. Fotocopy Akta Kelahiran
                <p> 2. Fotocopy Kartu Keluarga
                <p> 3. Fotocopy KTP orang tua
                <p> 4. Pas Photo berwana 3 lembar 3x4
                
            </div>
            <?php } ?>    </td>
        </div>
    </body>
</html>