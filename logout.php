<?php 
session_start(); //Memulai Session
$_SESSION = []; // Mengosongkan semua variabel session
session_unset(); // Menghapus semua variabel session
session_destroy(); // Menghancurkan session

// menghapus cookie 
setcookie('id', '',time() -3600);
setcookie('key', '',time() -3600);

header("Location: login.php"); // Mengarahkan pengguna ke halaman login.php
exit;

?>