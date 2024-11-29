<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Profil - Toko Sepatu</title>
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
        <h2>Profil Pengguna</h2>
        <?php
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        ?>
        <p>Nama: <?= $user['name'] ?></p>
        <p>Email: <?= $user['email'] ?></p>

        <form action="ubah_password.php" method="POST">
            <label for="password">Ubah Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Ubah Password</button>
        </form>
    </section>
</body>
</html>
