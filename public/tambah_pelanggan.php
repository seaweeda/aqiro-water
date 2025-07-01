<?php
require_once '../config/db.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat_input = $_POST['alamat_lengkap'];

    // Verifikasi alamat
    $verifikasi = verifikasiAlamat($pdo, $alamat_input);

    if ($verifikasi['valid']) {
        $stmt = $pdo->prepare("INSERT INTO pelanggan 
            (nama, nomor_hp, alamat_lengkap, id_alamat_referensi, status_verifikasi) 
            VALUES (?, ?, ?, ?, 'valid')");

        $stmt->execute([$nama, $nomor_hp, $alamat_input, $verifikasi['id']]);

        echo "<p class='success'>✅ Pelanggan berhasil ditambahkan dengan alamat valid.</p>";
    } else {
        echo "<p class='error'>❌ Alamat tidak cocok dengan referensi.</p>";
        if ($verifikasi['saran']) {
            echo "<p>Apakah maksud Anda: <strong>" . htmlspecialchars($verifikasi['saran']) . "</strong>?</p>";
        }
        echo "<a href='tambah_pelanggan.php'>🔙 Kembali</a>";
    }
}
?>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<body class="fullscreen-bg">
    <div class="overlay">
    <form method="POST">
        <h1>Tambah Pelanggan</h1>
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Nomor HP:</label><br>
        <input type="text" name="nomor_hp" required><br><br>

        <label>Alamat Lengkap: (contoh: Jl. Kana, 5, E, 005, 010, Hana, Bunga Raya, Bekasi)</label><br>
        <textarea name="alamat_lengkap" required></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
    <p><a href="daftar_pelanggan.php" class="button-link">Lihat Daftar Pelanggan</a></p>
    <a href="dashboard.php">⬅️ Kembali ke Dashboard</a>
    </div>
</body>