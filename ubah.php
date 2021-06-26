<?php 

session_start();

// jika tidak ada session login, maka pindahkan ke login.php
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data di URL 
$id = $_GET["id"];

// query data mahasiswa berdasarkan id 
// kita pakai 0 karena hasil dari arraynya berupa array numerik, kita
// akan langung mengambil ke dalam indeksnya
$mhs = query(" SELECT * FROM mahasiswa WHERE id = $id")[0];

// ketika tombol dipencet maka lakukan ubah data 
// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {

    // cek apakah data berhasil diubah atau tidak
    // menggunakn funcion ubah()
    
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('data gagal diubah!');
            document.location.href = 'index.php';
            </script>
        ";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <!-- untuk mengirimkan id agar bisa digunakan di dalam function -->
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" 
                    value="<?= $mhs["nrp"] ?>" required>
            </li>            
            
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" 
                    value="<?= $mhs["nama"]; ?>" required>
            </li>            
            
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" 
                value="<?= $mhs["email"]; ?>" required>
            </li>            
            
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" 
                value="<?= $mhs["jurusan"]; ?>" required>
            </li>
            
            <li>
                <label for="gambar">Gambar :</label><br>
                <img src="img/<?= $mhs['gambar']; ?>" width="50"><br>
                <input type="file" name="gambar" id="gambar" >
            </li>
            
            <li>
                <button name="submit" type="submit">Ubah Data!</button>
            </li>
        
        
        </ul>
    </form>

</body>
</html>
