// bisa diganti dengan
// jQuery(document)

// jquery tolong ambilkan document, lalu jika
// document siap, jalankan function

$(document).ready(function(){

    // menghilangkan tombol cari
    $('#tombol-cari').hide();

    // event ketika keyword ditulis
    // jquery tolong carikan elemen keyword
    // ketika keyup lakukan function berikut ini

    $('#keyword').on('keyup', function() {

        // munculkan gif loading
        $('.loader').show();

        // jquery tolong carikan saya elemen container
        // lalu load atau ubah isinya dengan data yang kita ambil dari sumber
        // apapun yang diketikkan user di keyword
        
        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // $.get
        // jquery lakukan get ke sumber
        $.get('ajax/mahasiswa-halaman-dua.php?keyword=' + $('#keyword').val(), function(data) {

            $('#container').html(data);
            $('.loader').hide();

        });

    });


});
