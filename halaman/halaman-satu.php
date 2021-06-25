<?php 

// jika tidak ada session login, maka pindahkan ke login.php
if(!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}


$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan 
if ( isset($_POST["cari"]) ) {

    // dollar mahasiswa akan berisi data hasil pencarian 
    // function cari akan mendapatkan data apapun yang diketikan oleh user
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Admin</title>
    <style>
        .loader {
            width: 50px;
            position: absolute;
            top: 136px;
            display: none;
        }
    </style>
</head>
<body>

    <a href="logout.php">Logout</a>
    
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="POST">
    
    <input type="text" name="keyword" size="50" autofocus
    placeholder="masukkan keyword pencarian" autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>

    <img src="img/loader.gif" class="loader">
    
    </form>


    <br>

    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0" >

            <!-- baris pertama atau header -->
            <tr>
                <th>No.</th>
                <th>Aksi </th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
        
            </tr>
            <!-- akhir dari baris pertama atau header -->

            <!-- pemberian nomor urut -->
            <?php $i = 1; ?>

            <!-- mengambil data dan dimasukkan ke dalam variabel row , dari result 
            dipecah menjadi bagian bagian
            sudah baju bajunya -->
            <?php foreach( $mahasiswa as $row ) :  ?>

                <tr>
                    <!-- baris nomor urut -->
                    <td><?= $i; ?></td>
                    <!-- baris aksi -->
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]?>">ubah</a> 
                    </td>
                    <!-- baris gambar -->
                    <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
                    <!-- baris nrp -->
                    <td><?= $row["nrp"]; ?></td>
                    <!-- baris nama -->
                    <td><?= $row["nama"]; ?></td>
                    <!-- baris email -->
                    <td><?= $row["email"]; ?></td>
                    <!-- baris jurusan -->
                    <td><?= $row["jurusan"]; ?></td>
                </tr>
            <!-- agar nomor urut bertambah -->
                <?php $i++ ?>
            <?php endforeach; ?>


        </table>
    </div>  
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/script-halaman-satu.js" ></script>
</body>
</html>
