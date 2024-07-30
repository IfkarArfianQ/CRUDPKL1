<?php 
// Koneksi ke database / menghubungkan ke database
$koneksi = mysqli_connect("localhost", "root", "", "bukuperpus");
function query($query) {
    global $koneksi;  // Mendefinisikan variabel $koneksi sebagai variabel global agar dapat diakses dalam fungsi ini.
    $result = mysqli_query($koneksi, $query); // mengambil data dari tabel buku / query data buku
    $rows = []; //Inisialisasi array kosong untuk menampung hasil query.
    while ( $row = mysqli_fetch_assoc($result) ) { // Mengambil setiap baris hasil query sebagai associative array
        $rows[] = $row;// Menambahkan setiap baris hasil query ke dalam array $rows.
    }
    return $rows; // Mengembalikan array $rows yang berisi data dari database.
}

function delete($no){
    global $koneksi; // Mendefinisikan variabel $koneksi sebagai variabel global agar dapat diakses dalam fungsi ini.
    mysqli_query($koneksi, "DELETE FROM buku WHERE no = $no");  // Menjalankan query untuk menghapus data buku berdasarkan nomor yang diberikan
    return mysqli_affected_rows($koneksi); // Mengembalikan jumlah baris yang terpengaruh oleh query DELETE
}

function cari($keyword) {
    // Membangun query SQL untuk mencari data dalam tabel buku
    $query = "SELECT * FROM buku WHERE
            id_buku LIKE '%$keyword%' OR
            judul_buku LIKE '%$keyword%' OR
            pengarang LIKE '%$keyword%' OR
            harga_buku LIKE '%$keyword%'
            ";
    // Mengembalikan hasil dari fungsi query dengan parameter $query
    return query($query);
}

function registrasi($data){
    global $koneksi; // Mendefinisikan variabel $koneksi sebagai variabel global agar dapat diakses dalam fungsi ini.
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    //  Cek username sudah ada atau tidak
    $result = mysqli_query($koneksi,"SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "
        <Script>
            alert('Username sudah terdaftar !');
        </script>";
        return false;
    }

    // Cek konfirmasi password
    if( $password !== $password2){
        echo "
        <Script>
            alert('Konfirmasi password tidak sesuai !');
        </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$password')");
    return mysqli_affected_rows($koneksi);
    
}
?>