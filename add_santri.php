<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);

    // Pastikan direktori uploads ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO santri (nama, umur, alamat, tanggal_masuk, foto) VALUES ('$nama', '$umur', '$alamat', '$tanggal_masuk', '$foto')";

        if ($conn->query($sql) === TRUE) {
            echo "Santri berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah foto.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Santri</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Tambah Santri</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        Nama: <input type="text" name="nama" required><br><br>
        Umur: <input type="number" name="umur" required><br><br>
        Alamat: <textarea name="alamat" required></textarea><br><br>
        Tanggal Masuk: <input type="date" name="tanggal_masuk" required><br><br>
        Foto: <input type="file" name="foto" required><br><br>
        <input type="submit" value="Tambah">
    </form>
    <br>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
