<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
}
require 'function.php';

// Koneksi ke database / menghubungkan ke database
$koneksi = mysqli_connect("localhost", "root", "", "bukuperpus");
$no = $_GET["no"];
// query data buku berdasarkan no
$bk = query("SELECT * FROM buku WHERE no = $no")[0];

if( isset($_POST["submit"]) ) {
    // ambil data dari tiap elemen dalam form
    $id_buku = htmlspecialchars($_POST["id_buku"]);
    $judul_buku = htmlspecialchars($_POST["judul_buku"]);
    $pengarang = htmlspecialchars($_POST["pengarang"]);
    $harga_buku = htmlspecialchars($_POST["harga_buku"]);

    // query update data
    $query = "UPDATE buku SET
                id_buku = '$id_buku',
                judul_buku = '$judul_buku',
                pengarang = '$pengarang',
                harga_buku = '$harga_buku'
                WHERE no = $no
                ";
    mysqli_query($koneksi, $query);
    
    // cek apakah data sudah berhasil diubah atau tidak
    if( mysqli_affected_rows($koneksi) > 0 ) {
        echo "
        <Script>
            alert('Data Berhasil diubah !');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "Data Gagal Diubah !";
        echo "<br>";
        echo mysqli_error($koneksi);
    }
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pada Buku</title>
    <!-- CSS nya -->
    <link rel="stylesheet" href="insert.css" 
</head>
<body>
    <h1>Edit Data Pada Buku</h1>
    <!-- Form untuk menginput data buku baru yang ingin ditambahkan -->
    <form action="" method="post">
        <ul>
            <li>
                <label for="id_buku">ID Buku : </label>
                <input type="text" id="id_buku" name="id_buku" required
                value="<?= $bk["id_buku"] ?>"><br><br> 
            </li>
            <li>
                <label for="judul_buku">Judul Buku : </label>
                <input type="text" id="judul_buku" name="judul_buku" required
                value="<?= $bk["judul_buku"] ?>"><br><br>
            </li>
            <li>
                <label for="pengarang">Pengarang : </label>
                <input type="text" id="pengarang" name="pengarang" required
                value="<?= $bk["pengarang"] ?>"><br><br>
            </li>
            <li>
                <label for="harga_buku">Harga Buku : </label>
                <input type="text" id="harga_buku" name="harga_buku" required
                value="<?= $bk["harga_buku"] ?>"><br><br>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>
</body>
</html>
