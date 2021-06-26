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

?>
