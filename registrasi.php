<?php 
require 'function.php'; // Mengimpor file function.php

if( isset($_POST["register"]) ) { // Memeriksa apakah tombol register ditekan
    if( registrasi($_POST) > 0) {
        // menampilkan alert jika registrasi berhasil
        echo "
        <Script>
            alert('User baru berhasil ditambahkan !'); 
            window.location.href = 'login.php';
        </script>";
    } else{
        echo mysqli_error($koneksi); // Menampilkan pesan error jika registrasi gagal
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="insert.css">
</head>
<body>

    <h1>Halaman Registrasi</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Confirm Password :</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Register!</button>
            </li>
        </ul>
    </form>

</body>
</html>