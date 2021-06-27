<?php 

sleep(1);

require '../functions.php';

// mengambil keyword yang dikirimkan melalui di dalam js tadi
$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";

$mahasiswa = query($query);
?>

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
            <!-- <td>
                <a href="ubah.php?id=<?= $row["id"]?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" 
                    onclick=" return confirm('Apakah Anda Ingin Menghapusnya?');"
                    >hapus</a>
            </td> -->
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
