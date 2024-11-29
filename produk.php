<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Produk - Toko Sepatu</title>
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
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <section>
        <form method="GET" action="produk.php">
            <input type="text" name="search" placeholder="Cari produk...">
            <button type="submit">Cari</button>
        </form>

        <div class="category-filter">
            <button class="filter-button" onclick="filterCategory('sepatu')">Sepatu</button>
            <button class="filter-button" onclick="filterCategory('tshirt')">T-Shirt</button>
            <button class="filter-button" onclick="filterCategory('celana')">Celana</button>
            <button class="filter-button" onclick="filterCategory('hoodie')">Hoodie</button>
            <button class="filter-button" onclick="filterCategory('kaos_kaki')">Kaos Kaki</button>
        </div>

        <div class="produk">
            <?php
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
                $query = "SELECT * FROM sepatu WHERE kategori = '$category'";
            } else {
                $query = "SELECT * FROM sepatu";
            }
            $result = mysqli_query($conn, $query);
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
