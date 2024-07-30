<?php
require 'function.php'; // Mengambil file function.php untuk menggunakan fungsi yang ada di dalamnya

if (isset($_POST['keyword'])) { // Memeriksa apakah ada input kata kunci dari pengguna
    $keyword = $_POST['keyword']; // Menyimpan kata kunci yang diinput oleh pengguna
    $buku = cari($keyword); // Menggunakan fungsi cari untuk mencari buku berdasarkan kata kunci

    $output = ''; // Membuat variabel untuk menyimpan hasil pencarian
    $i = 1; // Inisialisasi nomor urut

    // Menyusun header tabel
    $output .= '<tr>
                    <th>No.</th>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Harga Buku</th>
                    <th>Aksi</th>
                </tr>';

    // Menyusun baris-baris data buku berdasarkan hasil pencarian
    foreach($buku as $row) {
        $output .= '<tr>
                        <td>' . $i . '</td> <!-- Menampilkan nomor urut -->
                        <td>' . $row["id_buku"] . '</td> <!-- Menampilkan ID Buku -->
                        <td>' . $row["judul_buku"] . '</td> <!-- Menampilkan Judul Buku -->
                        <td>' . $row["pengarang"] . '</td> <!-- Menampilkan Pengarang -->
                        <td>' . $row["harga_buku"] . '</td> <!-- Menampilkan Harga Buku -->
                        <td>
                            <!-- Link untuk mengedit data buku -->
                            <a href="edit.php?no=' . $row["no"] . '">Edit</a> | 
                            <!-- Link untuk menghapus data buku dengan konfirmasi -->
                            <a href="delete.php?no=' . $row["no"] . '" onclick="return confirm(\'Apakah Anda Yakin ?\');">Delete</a>
                        </td>
                    </tr>';
        $i++; // Menambahkan nomor urut setelah setiap baris data
    }

    echo $output; // Menampilkan hasil pencarian ke layar
}
?>
