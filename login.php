<?php 
session_start();
require 'function.php'; // Mengimpor file function.php

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan idnya
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}
 
// cek apa user sudah login, jika sudah akan diarahkan ke index.php
if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}


if( isset($_POST["login"]) ) { // Memeriksa apakah tombol login ditekan
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Pastikan koneksi ke database sudah dibuat sebelumnya
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    // Cek username
    if( mysqli_num_rows($result) === 1 ) {

        // Cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;

            // Cek Remember me
            if( isset($_POST['remember']) ) {
                
                // buat cookie nya
                setcookie('id', $row['id'] , time() + 60 );
                setcookie('key', hash('sha256',$row['username']), time() +60);
            }

            header("Location: index.php");
            exit;
        } else {    
            echo "<script>alert('Password salah');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="insert.css">
</head>
<body>
    <h1>Halaman Login</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <button type="submit" name="login">Sign in</button>
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </li>
        </ul>
        <div class="register-link">
         <p>Belum punya akun? <a href="registrasi.php">Register</a></p>
        </div>
    </form>
</body>
</html>
