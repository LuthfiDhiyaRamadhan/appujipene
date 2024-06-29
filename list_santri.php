<?php
include 'db.php';

$sql = "SELECT id, nama, umur, alamat, tanggal_masuk, foto FROM santri";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Santri</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Daftar Santri</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Tanggal Masuk</th>
            <th>Foto</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["nama"]. "</td>
                        <td>" . $row["umur"]. "</td>
                        <td>" . $row["alamat"]. "</td>
                        <td>" . $row["tanggal_masuk"]. "</td>
                        <td><img src='uploads/" . $row["foto"]. "' alt='Foto Santri' width='100'></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <br>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
