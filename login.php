<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        h1{ overflow: hidden;
            position:relative;
            bottom:10px;
            left:0px;
            font-size: 32px;
            font-family: Verdana;
            font-weight:bold;
            color:white; 
        }
        </style>
     
    <div class="judul_login"> PAUD RESTU IBU</div>
    <div align="center" class="table_login">
        <img class="gambar_login" src="gambar/logo-PAUD.png">
        <h1>Login</h1>
        <form method="post" action="cek_sirebu.php">
            <label class="label_login">Username</label><br>
            <input type="text" class="input_login" name="user"><br><br>
            <label class="label_login">Password</label><br>
            <input type="password" class="input_login" name="pass"><br><br>
            <a href="index.html" class="kembali_login"  name="kembali">Kembali</a>
            <a href="ad_index.html"><button  class="submit_login" 
            type="submit" name="submit">Log in</button></a>
        </form>
    </div>
</body>
</html>