
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
