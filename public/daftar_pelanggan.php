<?php
require_once '../config/db.php';

$stmt = $pdo->query("SELECT p.*, a.nama_jalan FROM pelanggan p LEFT JOIN alamat_referensi a ON p.id_alamat_referensi = a.id");
$pelanggan = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pelanggan - Aqiro Water</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="fullscreen-bg">
    <div class="overlay">
        <h1>Daftar Pelanggan</h1>
        <table border="1" cellpadding="5">
            <tr>
                <th>Nama</th>
                <th>No HP</th>
                <th>Alamat Lengkap</th>
                <th>Alamat Referensi</th>
                <th>Status</th>
            </tr>
            <?php foreach ($pelanggan as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['nama']) ?></td>
                <td><?= htmlspecialchars($p['nomor_hp']) ?></td>
                <td><?= htmlspecialchars($p['alamat_lengkap']) ?></td>
                <td><?= $p['nama_jalan'] ?? '-' ?></td>
                <td>
                    <?= $p['status_verifikasi'] === 'valid' ? '✅ Valid' : '❌ Tidak Valid' ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="tambah_pelanggan.php" class="button-link">Tambah Pelanggan</a></p>
        <a href="dashboard.php">⬅️ Kembali ke Dashboard</a>
    </div>
</body>
</html>
