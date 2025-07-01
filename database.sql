CREATE DATABASE aqiro_water;

USE aqiro_water;

-- Tabel alamat referensi
CREATE TABLE alamat_referensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_jalan VARCHAR(100) NOT NULL,
    no_rumah INT,
    blok_rumah VARCHAR(10),
    rt VARCHAR(10),
    rw VARCHAR(10),
    kelurahan VARCHAR(50),
    kecamatan VARCHAR(50),
    kota VARCHAR(50)
);

-- Tabel pelanggan
CREATE TABLE pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nomor_hp VARCHAR(15) NOT NULL,
    alamat_lengkap TEXT NOT NULL,
    id_alamat_referensi INT,
    status_verifikasi ENUM('valid', 'tidak_valid') DEFAULT 'tidak_valid';
    FOREIGN KEY (id_alamat_referensi) REFERENCES alamat_referensi(id)
);

ALTER TABLE pelanggan
ADD COLUMN status_verifikasi ENUM('valid', 'tidak_valid') DEFAULT 'tidak_valid';

-- Memasukkan data alamat referensi (dummy)
INSERT INTO alamat_referensi VALUES
('170001','Jl. Tulip','1','A','001','010','Hana','Bunga Raya','Bekasi'),
('170002','Jl. Tulip','2','A','001','010','Hana','Bunga Raya','Bekasi'),
('170003','Jl. Tulip','3','A','001','010','Hana','Bunga Raya','Bekasi'),
('170004','Jl. Tulip','4','A','001','010','Hana','Bunga Raya','Bekasi'),
('170005','Jl. Tulip','5','A','001','010','Hana','Bunga Raya','Bekasi'),
('170006','Jl. Sedap Malam','1','B','002','010','Hana','Bunga Raya','Bekasi'),
('170007','Jl. Sedap Malam','2','B','002','010','Hana','Bunga Raya','Bekasi'),
('170008','Jl. Sedap Malam','3','B','002','010','Hana','Bunga Raya','Bekasi'),
('170009','Jl. Sedap Malam','4','B','002','010','Hana','Bunga Raya','Bekasi'),
('170010','Jl. Sedap Malam','5','B','002','010','Hana','Bunga Raya','Bekasi'),
('170011','Jl. Melati','1','C','003','010','Hana','Bunga Raya','Bekasi'),
('170012','Jl. Melati','2','C','003','010','Hana','Bunga Raya','Bekasi'),
('170013','Jl. Melati','3','C','003','010','Hana','Bunga Raya','Bekasi'),
('170014','Jl. Melati','4','C','003','010','Hana','Bunga Raya','Bekasi'),
('170015','Jl. Melati','5','C','003','010','Hana','Bunga Raya','Bekasi'),
('170016','Jl. Anggrek','1','D','004','010','Hana','Bunga Raya','Bekasi'),
('170017','Jl. Anggrek','2','D','004','010','Hana','Bunga Raya','Bekasi'),
('170018','Jl. Anggrek','3','D','004','010','Hana','Bunga Raya','Bekasi'),
('170019','Jl. Anggrek','4','D','004','010','Hana','Bunga Raya','Bekasi'),
('170020','Jl. Anggrek','5','D','004','010','Hana','Bunga Raya','Bekasi'),
('170021','Jl. Kana','1','E','005','010','Hana','Bunga Raya','Bekasi'),
('170022','Jl. Kana','2','E','005','010','Hana','Bunga Raya','Bekasi'),
('170023','Jl. Kana','3','E','005','010','Hana','Bunga Raya','Bekasi'),
('170024','Jl. Kana','4','E','005','010','Hana','Bunga Raya','Bekasi'),
('170025','Jl. Kana','5','E','005','010','Hana','Bunga Raya','Bekasi'),
('170026','Jl. Anyelir','1','F','006','010','Hana','Bunga Raya','Bekasi'),
('170027','Jl. Anyelir','2','F','006','010','Hana','Bunga Raya','Bekasi'),
('170028','Jl. Anyelir','3','F','006','010','Hana','Bunga Raya','Bekasi'),
('170029','Jl. Anyelir','4','F','006','010','Hana','Bunga Raya','Bekasi'),
('170030','Jl. Anyelir','5','F','006','010','Hana','Bunga Raya','Bekasi');

-- Tabel user
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL 
);

INSERT INTO users (username, password)
VALUES ('admin', MD5('admin123'));

