<?php
$host = "localhost";
$user = "root";
$pass = "locos121";
$db = "toko_sepatu";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
