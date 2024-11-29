<?php
session_start();
include 'db.php';

if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

if (isset($_POST['add_sepatu'])) {
    $nama_sepatu = $_POST['nama_sepatu'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "images/$gambar");

    $query = "INSERT INTO sepatu (nama_sepatu, harga, gambar) VALUES ('$nama_sepatu', '$harga', '$gambar')";
    mysqli_query($conn, $query);
    header('Location: dashboard_admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tambah Barang</title>
</head>
<body>
<div class="navbar">
    <div>Dashboard Admin</div>
    <div>
        <a href="dashboard_admin.php">Sepatu</a>
        <a href="tambah_barang.php">Tambah Barang</a>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</div>

<h1>Tambah Barang</h1>
<div class="form-container">
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nama_sepatu" placeholder="Nama Sepatu" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="file" name="gambar" required>
        <button type="submit" name="add_sepatu" class="btn-upload">Upload</button>
    </form>
</div>
</body>
</html>
