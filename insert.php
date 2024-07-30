<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
}
// Koneksi ke database / menghubungkan ke database
$koneksi = mysqli_connect("localhost", "root", "", "bukuperpus");

if( isset($_POST["submit"]) ) {
    
    // ambil data dari tiap elemen dalam form
    $id_buku = htmlspecialchars($_POST["id_buku"]);
    $judul_buku = htmlspecialchars($_POST["judul_buku"]);
    $pengarang_buku = htmlspecialchars($_POST["pengarang"]);
    $harga_buku = htmlspecialchars($_POST["harga_buku"]);

    // querry insert data
    $query = "INSERT INTO buku (id_buku, judul_buku, pengarang, harga_buku) 
              VALUES ('$id_buku', '$judul_buku', '$pengarang_buku', '$harga_buku')";
    mysqli_query($koneksi, $query);
    
    // cek apakah data sudah berhasil ditambahkan atau tidak
    if( mysqli_affected_rows($koneksi) > 0 ) {
        echo "
        <Script>
            alert('Data Berhasil ditambahkan !');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "Data Gagal ditambahkan";
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
    <title>Tambahkan Buku</title>
    <!-- CSS nya -->
    <link rel="stylesheet" href="insert.css" 
</head>
<body>
    <h1>Tambahkan Buku</h1>
    <!-- Form untuk menginput data buku baru yang ingin ditambahkan -->
    <form action="" method="post">
        <ul>
            <li>
                <label for="id_buku">ID Buku : </label>
                <input type="text" id="id_buku" name="id_buku" required><br><br> 
            </li>
            <li>
                <label for="judul_buku">Judul Buku : </label>
                <input type="text" id="judul_buku" name="judul_buku" required><br><br>
            </li>
            <li>
                <label for="pengarang">Pengarang : </label>
                <input type="text" id="pengarang" name="pengarang" required><br><br>
            </li>
            <li>
                <label for="harga_buku">Harga Buku : </label>
                <input type="text" id="harga_buku" name="harga_buku" required><br><br>
            </li>
            <li>
                <button type="submit" name="submit">Submit  </button>
            </li>
        </ul>
    </form>
</body>
</html>
