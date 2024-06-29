<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Santri</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Sistem Informasi Santri</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="add_santri.php">Tambah Santri</a></li>
                    <li><a href="list_santri.php">Daftar Santri</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="showcase">
        <div class="container">
            <h1>Selamat Datang di Sistem Informasi Santri</h1>
            <p>Kelola data santri dengan mudah dan efisien</p>
        </div>
    </section>
</body>
</html>
