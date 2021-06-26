<?php

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;
    // setelah terkoneksi dengan database, maka ambil isinya, disini masih berupa tabel
    $result = mysqli_query($conn, $query);
    // mempersiapkan wadah barang dari lemari yang diambil, bukan lagi tabelnya
    $rows = [];

    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
    
}

function tambah($data) {
    global $conn;

    // gambar diupload ke dir kemudian ambil nama gambar
    // baru nama gambarnya kita insert ke dalam database
    
    // upload gambar
    $gambar = upload();
    if ( !$gambar ) {
        return false;
    }
    
    // ambil data dari tiap elemen dalam form
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan =htmlspecialchars($data["jurusan"]);

    // query untuk memasukkan data ke database
    $query = "INSERT INTO mahasiswa VALUES 
            ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')";

    mysqli_query($conn, $query);    

    return mysqli_affected_rows($conn);
}

function upload() {
    
    // ambil dahulu isi dari $_FILES  

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    // cek apakah tidak ada gambar yang diupload
    if( $error === 4  ) {
        echo "
        <script>
            alert('Silahkan Pilih Gambar Terlebih Dahulu');
        </script>";

        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "
        <script>
            alert('Yang diupload bukan gambar!');
        </script>";

        return false;
    }


    // cek jika gambar ukurannya besar
    if( $ukuranFile > 1000000 ) {
        echo "
        <script>
            alert('Ukuran file terlalu besar');
        </script>";

        return false;
    }


    // jika lolos pengecekan diatas

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}


?>
