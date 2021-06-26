<?php 

session_start();

// jika tidak ada session login, maka pindahkan ke login.php
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {

    // untuk debugging 
    // var_dump($_POST); die;

    // cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
            </script>
        ";
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    
    <h1>Tambah Data Mahasiswa</h1>

    <!-- untuk string akan dikelola oleh POSt -->
    <!-- dan untuk files akan dikelola oleh files -->
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" 
                    placeholder="Masukkan NRP" required>
            </li>            
            
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" 
                placeholder="Masukkan Nama" required>
            </li>            
            
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" 
                placeholder="Masukkan Email" required>
            </li>            
            
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" 
                placeholder="Masukkan Jurusan" required>
            </li>
            
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar" 
                placeholder="Masukkan Gambar" required>
            </li>
            
            <li>
                <button name="submit" type="submit">Tambah Data!</button>
            </li>
        
        
        </ul>
    </form>

</body>
</html>
