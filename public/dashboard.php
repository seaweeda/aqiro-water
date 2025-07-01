<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Aqiro Water</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="fullscreen-bg">
    <div class="overlay">
        <h2>Selamat Datang, <?= $_SESSION['user'] ?>!</h2>
        <a href="tambah_pelanggan.php" class="button-link">Tambah Pelanggan</a>
        <a href="daftar_pelanggan.php" class="button-link">Lihat Daftar Pelanggan</a>
        <br><br>
        <a href="logout.php" class="button-link" style="background-color:red;">Logout</a>
    </div>
</body>
</html>
