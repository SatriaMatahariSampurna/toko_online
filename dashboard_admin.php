<?php
session_start();
include 'db.php';

if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Hapus sepatu
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM sepatu WHERE id='$id'";
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
    <title>Dashboard Admin</title>
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

<h1>Daftar Sepatu</h1>
<table>
    <tr>
        <th>Gambar</th>
        <th>Nama Sepatu</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    <?php
    $query = "SELECT * FROM sepatu";
    $result = mysqli_query($conn, $query);
    while ($sepatu = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
                <td><img src='images/{$sepatu['gambar']}' alt='{$sepatu['nama_sepatu']}' width='50'></td>
                <td>{$sepatu['nama_sepatu']}</td>
                <td>Rp{$sepatu['harga']}</td>
                <td>
                    <a href='dashboard_admin.php?delete={$sepatu['id']}' class='btn-delete'>Hapus</a>
                </td>
            </tr>
        ";
    }
    ?>
</table>
</body>
</html>
