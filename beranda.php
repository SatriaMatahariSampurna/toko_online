<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Beranda - Toko Sepatu</title>
</head>
<body>
    <nav>
        <h1>Toko Sepatu</h1>
        <ul>
            <li><a href="beranda.php">Beranda</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <li><a href="profil.php">Saya</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="index.php">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <section>
        <form method="GET" action="beranda.php">
            <input type="text" name="search" placeholder="Cari sepatu...">
            <button type="submit">Cari</button>
        </form>

        <?php
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $query = "SELECT * FROM sepatu WHERE nama_sepatu LIKE '%$search%'";
        } else {
            $query = "SELECT * FROM sepatu";
        }

        $result = mysqli_query($conn, $query);

        while ($sepatu = mysqli_fetch_assoc($result)) {
            echo "
                <div class='banner'>
                    <img src='{$sepatu['gambar']}' alt='{$sepatu['nama_sepatu']}' class='main-image'>
                    <div class='text'>
                        <h3>{$sepatu['nama_sepatu']}</h3>
                        <p>{$sepatu['deskripsi']}</p>
                    </div>
                </div>
            ";
        }
        ?>

        <div class="catalog">
            <div class="card">
                <h3>T-Shirt</h3>
            </div>
            <div class="card">
                <h3>Sepatu</h3>
            </div>
            <div class="card">
                <h3>Celana</h3>
            </div>
            <div class="card">
                <h3>Hoodie</h3>
            </div>
            <div class="card">
                <h3>Kaos Kaki</h3>
            </div>
        </div>

        <div class="produk">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM sepatu");
            while ($sepatu = mysqli_fetch_assoc($result)) {
                echo "
                    <div class='card'>
                        <img src='images/{$sepatu['gambar']}' alt='{$sepatu['nama_sepatu']}'>
                        <h3>{$sepatu['nama_sepatu']}</h3>
                        <p>Rp {$sepatu['harga']}</p>
                        <button class='order-button'>Pesan Sekarang</button>
                    </div>
                ";
            }
            ?>
        </div>
    </section>
</body>
</html>
