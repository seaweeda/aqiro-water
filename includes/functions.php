<?php
function verifikasiAlamat($pdo, $alamat_input) {
    $stmt = $pdo->query("SELECT * FROM alamat_referensi");
    $referensi = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $alamat_input_lower = strtolower($alamat_input);
    $skor_tertinggi = 0;
    $saran = null;
    $id_valid = null;

    foreach ($referensi as $row) {
        $alamat_ref = strtolower($row['nama_jalan'] . ', ' . $row['no_rumah'] .', ' . $row['blok_rumah'] .', ' . $row['rt'] .', ' . $row['rw'] .', ' . $row['kelurahan'] . ', ' . $row['kecamatan'] . ', ' . $row['kota']);
        similar_text($alamat_input_lower, $alamat_ref, $percent);

        if ($percent == 100) {
            return ['valid' => true, 'id' => $row['id'], 'saran' => null];
        }

        if ($percent > $skor_tertinggi) {
            $skor_tertinggi = $percent;
            $saran = $alamat_ref;
            $id_valid = $row['id'];
        }
    }

    if ($skor_tertinggi >= 80) {
        return ['valid' => true, 'id' => $id_valid, 'saran' => null]; // dianggap valid jika mirip
    }

    return ['valid' => false, 'id' => null, 'saran' => $saran];
}
