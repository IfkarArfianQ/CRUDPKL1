<?php 
session_start(); //memulai session
// Cek apakah user sudah login, jika belum akan diarahkan ke login.php
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'function.php'; // Mengimpor file function.php untuk menggunakan fungsi query yang ada di dalamnya

// Konfigurasi Pagination
$jumlahDataPerHalaman = 5; // Menentukan jumlah data per halaman
$jumlahData = count(query("SELECT * FROM buku")); // Menghitung jumlah total data buku
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); // Menghitung jumlah halaman yang dibutuhkan
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1; // Menentukan halaman aktif
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman; // Menentukan data awal dari setiap halaman

$buku = query("SELECT * FROM buku LIMIT $awalData, $jumlahDataPerHalaman"); // Mengambil data buku sesuai dengan halaman aktif

if( isset($_POST["cari"]) ){ // Memeriksa apakah tombol "cari" telah diklik
    $buku = cari($_POST["keyword"]); // Memanggil fungsi cari dengan parameter yang diambil dari input pengguna
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Buku</title>
    <link rel="stylesheet" href="index.css"> <!-- Style CSS nya -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>
<body>
    <h1>Daftar Buku</h1>
    <!-- Membuat Tampilan Table -->

    <!-- Fitur Search -->
        <div class="search-container">
            <form action="" method="post">
                <input type="text" id="keyword" name="keyword" size="40" autofocus 
                placeholder="Masukan Keyword Pencarian.." autocomplete="off">
                <button type="submit" name="cari"> Search </button>
            </form>
        </div>

    <!-- Pagination -->
    <section class="page">
        <div id="pagination-container" class="pagination">
            <?php if( $halamanAktif > 1) :?>
                <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
            <?php endif;?>

            <?php for($i = 1; $i <= $jumlahHalaman; $i++ ) :?>
                <?php if( $i == $halamanAktif ) :?>
                    <a href="?halaman=<?= $i; ?>" class="active" Style="font-weight: bold; color: white; "><?= $i; ?></a>
                <?php else :?>
                    <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                <?php endif ;?>
            <?php endfor;?>

            <?php if( $halamanAktif < $jumlahHalaman) :?>
                <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
            <?php endif;?>
        </div>
    </section>

    <table id="book-table">
        <!-- Membuat nama untuk tiap kolom -->
        <tr>
            <th>No.</th>
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Harga Buku</th>
            <th class="aksi">Aksi</th>
        </tr>
        <?php 
        $i = $awalData + 1; 
        foreach( $buku as $row ) :?> <!-- Melakukan pengulangan foreach untuk menampilkan data buku yang diambil dari database -->
        <tr>
            <td><?= $i; ?></td> <!-- Menampilkan no secara urut -->
            <td><?= $row["id_buku"]; ?></td> <!-- Menampilkan ID Buku dari database -->
            <td><?= $row["judul_buku"]; ?></td> <!-- Menampilkan Judul Buku dari database -->
            <td><?= $row["pengarang"]; ?></td> <!-- Menampilkan Pengarang dari database -->
            <td><?= $row["harga_buku"]; ?></td> <!-- Menampilkan Harga Buku dari database -->
            <td class="aksi">
                <!-- Mengedit data pada database-->
                <a href="edit.php?no=<?= $row["no"];?>">Edit |</a> 
                 <!-- Mendelete data pada database disertai notif confirm-->
                <a href="delete.php?no=<?= $row["no"];?>" onclick="return confirm('Apakah Anda Yakin ?');">Delete</a>
            </td>
        </tr>
        <?php 
        $i++; // Increment nilai $i setelah menampilkan baris
        endforeach; ?> <!-- Mengakhiri loop/pengulangan foreach -->
    </table>

    <br><br>
    <a href="insert.php" class="tambah">Tambahkan Buku</a> <!-- Tautan untuk menuju halaman insert.php -->
    <br>
    <a href="logout.php" class="logout">Logout</a> <!-- Tautan untuk logout -->

    <script>
        $(document).ready(function() {
            $('#keyword').on('input', function() { // Menambahkan event listener pada input search
                let keyword = $(this).val(); // Mengambil nilai input keyword
                $.ajax({
                    url: 'search.php', // URL untuk request AJAX
                    method: 'POST', // Metode request
                    data: { keyword: keyword }, // Data yang dikirimkan ke server
                    success: function(data) {
                        $('#book-table').html(data); // Mengubah isi tabel dengan data yang diterima dari server
                    }
                });
            });
        });
    </script>
</body>
</html>
