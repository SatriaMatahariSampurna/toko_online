<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Keranjang - Toko Sepatu</title>
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
        <h2>Keranjang Anda</h2>
        <div class="keranjang">
            <?php
            // Keranjang barang dari session
            if (isset($_SESSION['keranjang'])) {
                foreach ($_SESSION['keranjang'] as $item) {
                    echo "
                        <div class='card'>
                            <img src='images/{$item['gambar']}' alt='{$item['nama_sepatu']}'>
                            <h3>{$item['nama_sepatu']}</h3>
                            <p>Rp {$item['harga']}</p>
                            <button class='remove-button'>Hapus</button>
                        </div>
                    ";
                }
            } else {
                echo "<p>Keranjang kosong!</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>
