-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2025 pada 17.42
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbveterangym`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `last_login`) VALUES
(1, 'admin', '$2y$10$UisFrnSvmboSOu3iiWqu..ubIbBLNDYl1ltfiULzwrcirQvTbf4he', 'Admin Veteran', '2025-11-26 23:58:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi_artikel` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `penulis`, `tanggal`, `isi_artikel`, `gambar`) VALUES
(1, 'Veteran Gym Raih Juara 1 Boxing Tingkat Nasional!', 'Admin Veteran Gym', '2023-11-01', 'Petarung andalan Veteran Gym, Rahmat \"The Punch\" Saleh, berhasil meraih Juara 1 dalam kejuaraan Boxing tingkat Nasional. Kemenangan ini membuktikan kualitas program latihan intensif dan disiplin militer yang diterapkan di gym kami. Mari bergabung dan latih mental juaramu!', 'juaraboxing.jpg'),
(2, 'Atlet Binaraga Veteran Gym Sabet Gelar Internasional', 'Redaksi Fitness', '2023-10-25', 'Dalam kompetisi binaraga internasional, atlet kebanggaan kita, Bima Perkasa, berhasil memenangkan medali emas. Dedikasi dan penerapan teknik latihan beban yang presisi di Veteran Gym telah mengantarkannya ke podium dunia. Anda juga bisa mencapai potensi maksimal Anda di sini.', 'binaragajuara.jpg'),
(3, 'Veteran Gym Resmi Dibuka: Gym Terluas di DIY!', 'Tim Media Veteran Gym', '2023-10-20', 'Veteran Gym kini resmi dibuka sebagai fasilitas fitness terluas dan terlengkap di Daerah Istimewa Yogyakarta. Kami menyediakan medan latihan premium dengan peralatan militer grade. Datang dan rasakan pengalaman latihan yang belum pernah ada sebelumnya!', 'gym2.jpg'),
(4, 'Road to Victory: Disiplin Latihan Kunci Sukses Atlet', 'Coach Khabib', '2023-10-15', 'Kisah sukses para atlet kami berakar pada disiplin yang kuat, sebuah prinsip inti dari Veteran Gym. Kami mengajarkan bagaimana mengubah kebiasaan menjadi keunggulan kompetitif. Mulai perjuangan disiplinmu hari ini!', 'disiplinn.jpg'),
(5, 'Rahasia Pemulihan Cepat Ala Juara: Nutrisi & Istirahat', 'Nutrisionis Lisa', '2023-11-05', 'Pemulihan adalah senjata rahasia setiap juara. Pelajari strategi nutrisi dan teknik istirahat optimal yang direkomendasikan oleh tim ahli kami untuk memastikan tubuhmu siap bertempur kembali. Dapatkan panduan lengkap di sini.', 'tirta.jpg'),
(6, 'Program Latihan Baru: Persiapan Fisik Militer 2', 'Coach Basuki', '2023-11-10', 'Veteran Gym meluncurkan program latihan baru yang berfokus pada ketahanan fisik militer. Program ini dirancang untuk membangun daya tahan, kekuatan fungsional, dan ketangguhan mental. Siap untuk level perjuangan berikutnya?', 'pisikk.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `paket_membership` varchar(100) DEFAULT NULL,
  `bank_asal` varchar(50) NOT NULL,
  `nama_rekening` varchar(100) NOT NULL,
  `file_bukti` varchar(255) NOT NULL,
  `status_pembayaran` enum('Pending','Success','Failed') NOT NULL DEFAULT 'Pending',
  `hadiah_diklaim` enum('Belum','Sudah') NOT NULL DEFAULT 'Belum',
  `hasil_hadiah` varchar(100) DEFAULT NULL,
  `tanggal_konfirmasi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id`, `nama_lengkap`, `email`, `no_telepon`, `paket_membership`, `bank_asal`, `nama_rekening`, `file_bukti`, `status_pembayaran`, `hadiah_diklaim`, `hasil_hadiah`, `tanggal_konfirmasi`) VALUES
(23, 'Sriyono Poerwanto', 'sriyono@gmail.com', '089526002733', 'Membership Gym 1 Bulan Tanpa Pelatih', 'BCA', 'SRIYONO', 'bukti_69272f50ac6de.jpg', 'Success', 'Sudah', 'Kaos Veteran Gym', '2025-11-26 16:48:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_membership`
--

CREATE TABLE `paket_membership` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `kategori` enum('1 Bulan','3 Bulan') DEFAULT '1 Bulan',
  `tipe_pelatih` enum('Tanpa Pelatih','Dengan Pelatih') DEFAULT 'Tanpa Pelatih',
  `foto_kartu` varchar(255) DEFAULT 'default_card.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket_membership`
--

INSERT INTO `paket_membership` (`id_paket`, `nama_paket`, `harga`, `kategori`, `tipe_pelatih`, `foto_kartu`) VALUES
(1, 'Membership Gym 1 Bulan', 250000, '1 Bulan', 'Tanpa Pelatih', 'default_card.jpg'),
(2, 'Membership Boxing 1 Bulan', 300000, '1 Bulan', 'Tanpa Pelatih', 'default_card.jpg'),
(3, 'Membership Gym & Boxing 1 Bulan', 500000, '1 Bulan', 'Tanpa Pelatih', 'default_card.jpg'),
(4, 'Membership Gym 1 Bulan (+Pelatih)', 600000, '1 Bulan', 'Dengan Pelatih', 'default_card.jpg'),
(5, 'Membership Boxing 1 Bulan (+Pelatih)', 700000, '1 Bulan', 'Dengan Pelatih', 'default_card.jpg'),
(6, 'Membership Gym & Boxing 1 Bulan (+Pelatih)', 1200000, '1 Bulan', 'Dengan Pelatih', 'default_card.jpg'),
(7, 'Membership Gym 3 Bulan', 700000, '3 Bulan', 'Tanpa Pelatih', 'default_card.jpg'),
(8, 'Membership Boxing 3 Bulan', 800000, '3 Bulan', 'Tanpa Pelatih', 'default_card.jpg'),
(9, 'Membership Gym & Boxing 3 Bulan', 4000000, '3 Bulan', 'Tanpa Pelatih', 'default_card.jpg'),
(10, 'Membership Gym 3 Bulan', 1500000, '3 Bulan', 'Tanpa Pelatih', 'default_card.jpg'),
(11, 'Membership Boxing 3 Bulan', 1800000, '3 Bulan', 'Tanpa Pelatih', 'default_card.jpg'),
(12, 'Membership Gym & Boxing 3 Bulan', 4000000, '3 Bulan', 'Tanpa Pelatih', 'default_card.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatih`
--

CREATE TABLE `pelatih` (
  `id_pelatih` int(11) NOT NULL,
  `nama_pelatih` varchar(100) NOT NULL,
  `spesialisasi` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `no_wa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelatih`
--

INSERT INTO `pelatih` (`id_pelatih`, `nama_pelatih`, `spesialisasi`, `foto`, `deskripsi`, `instagram`, `no_wa`) VALUES
(1, 'Coach Ajrun PSHT', 'Martial Arts & Strength', 'ajrun.jpeg', 'Coach Ajrun adalah ahli bela diri pencak silat dan pembentukan kekuatan otot. Cocok untuk Anda yang ingin belajar self-defense sambil membentuk tubuh.', 'ajrun_psht', '628123456789'),
(2, 'Coach Arya', 'Bodybuilding Specialist', 'arya.jpeg', 'Spesialis dalam hipertrofi otot dan persiapan kontes binaraga. Coach Arya akan membantu Anda mencapai bentuk tubuh estetis yang Anda impikan.', 'arya_gym', '628987654321'),
(3, 'Coach Azzar', 'Fat Loss &amp; Cardio', 'azzar.jpeg', 'Ahli dalam program penurunan berat badan intensif. Latihan bersama Coach Azzar dijamin membakar kalori maksimal dengan metode HIIT.', 'azzar_fit', '628555666777'),
(4, 'Trainer Fathur', 'Functional Training', 'fatur.jpeg', 'Fokus pada kekuatan fungsional tubuh agar bugar dalam aktivitas sehari-hari. Pelatih yang sabar dan detail dalam mengoreksi postur.', 'faizft', '628112233445');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `paket` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `pelatih` varchar(10) DEFAULT NULL,
  `pembayaran` varchar(50) DEFAULT NULL,
  `tanggal_daftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `paket`, `nama`, `email`, `telepon`, `pelatih`, `pembayaran`, `tanggal_daftar`) VALUES
(42, 'Membership Gym 1 Bulan', 'Sriyono Poerwanto', 'sriyono@gmail.com', '089526002733', 'Tidak', 'Transfer Bank', '2025-11-26 23:42:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_kelas`
--

CREATE TABLE `program_kelas` (
  `id_program` int(11) NOT NULL,
  `kategori` enum('Gym','Boxing') NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `durasi` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `program_kelas`
--

INSERT INTO `program_kelas` (`id_program`, `kategori`, `judul`, `deskripsi`, `gambar`, `durasi`, `level`) VALUES
(1, 'Gym', 'Strength Training', 'Bangun kekuatan fisik dan mental dengan latihan beban intensif. Program ini dirancang untuk veteran yang ingin meningkatkan massa otot dan daya tahan.', 'strength.jpg', '60 menit', 'Pemula - Lanjutan'),
(2, 'Gym', 'Cardio Blast', 'Latihan kardio tinggi untuk membakar kalori dan meningkatkan stamina. Cocok untuk yang ingin perjuangan maksimal.', 'cardio.jpg', '45 menit', 'Semua Level'),
(3, 'Gym', 'Weightlifting', 'Fokus pada teknik angkat beban yang benar untuk membangun kekuatan maksimal. Dibimbing oleh pelatih berpengalaman.', 'weightlifting.jpg', '50 menit', 'Menengah - Lanjutan'),
(4, 'Boxing', 'Boxing Fundamentals', 'Pelajari dasar-dasar tinju, teknik pukulan, dan pertahanan. Program ini membangun disiplin dan ketahanan seperti di medan perang.', 'boxing2.jpeg', '60 menit', 'Pemula'),
(5, 'Boxing', 'Kickboxing Intensive', 'Kombinasi tinju dan tendangan untuk latihan full-body yang intens. Tingkatkan kekuatan dan kecepatanmu.', 'kickboxing2.jpg', '55 menit', 'Menengah'),
(6, 'Boxing', 'MMA Conditioning', 'Latihan kondisi untuk seni bela diri campuran. Siap tempur dengan teknik grappling dan striking.', 'mma.jpg', '70 menit', 'Lanjutan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket_membership`
--
ALTER TABLE `paket_membership`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pelatih`
--
ALTER TABLE `pelatih`
  ADD PRIMARY KEY (`id_pelatih`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program_kelas`
--
ALTER TABLE `program_kelas`
  ADD PRIMARY KEY (`id_program`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `paket_membership`
--
ALTER TABLE `paket_membership`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pelatih`
--
ALTER TABLE `pelatih`
  MODIFY `id_pelatih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `program_kelas`
--
ALTER TABLE `program_kelas`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
