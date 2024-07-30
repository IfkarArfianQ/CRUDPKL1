<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
}
require 'function.php'; // Mengimpor file function.php untuk menggunakan function delete
$no = $_GET["no"]; // Mendapatkan nilai 'no' dari URL

// Mengecek apakah fungsi delete berhasil menghapus data
if( delete($no) > 0 ){
    echo "
        <Script>
            alert('Data Berhasil Dihapus !');
            document.location.href = 'index.php';
        </script>";
}   else {
    echo "
        <Script>
            alert('Data Gagal Dihapus !');
            document.location.href = 'index.php';
        </script>";
    }
?>