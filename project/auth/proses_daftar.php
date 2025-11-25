<?php
// Pastikan path koneksi benar
include "../../include/koneksi.php"; 

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  // Jika akses langsung, tendang balik ke form
  header("Location: ../transaksi/membership.php");
  exit;
}

// 1. TANGKAP DATA (Gunakan Null Coalescing Operator ?? untuk keamanan)
// Pastikan nama variabel POST di sini SAMA dengan name="" di HTML Langkah 1
$paket      = $koneksi->real_escape_string($_POST['paket'] ?? '');
$nama       = $koneksi->real_escape_string($_POST['nama'] ?? '');
$email      = $koneksi->real_escape_string($_POST['email'] ?? '');
$telepon    = $koneksi->real_escape_string($_POST['telepon'] ?? '');
$pelatih    = $koneksi->real_escape_string($_POST['pelatih'] ?? '');
$pembayaran = $koneksi->real_escape_string($_POST['pembayaran'] ?? '');

// 2. VALIDASI DATA KOSONG
// Ini mencegah data kosong masuk ke database
if (empty($nama) || empty($paket) || empty($pembayaran)) {
    echo "<script>
            alert('Gagal! Pastikan Nama, Paket, dan Pembayaran terisi.');
            window.history.back();
          </script>";
    exit;
}

// 3. QUERY INSERT
$sql = "INSERT INTO pendaftaran (paket, nama, email, telepon, pelatih, pembayaran, tanggal_daftar)
        VALUES ('$paket', '$nama', '$email', '$telepon', '$pelatih', '$pembayaran', NOW())";

// 4. EKSEKUSI
if ($koneksi->query($sql)) {
  // Ambil ID yang baru saja dibuat
  $id_pendaftaran = $koneksi->insert_id;
  
  // Redirect ke halaman pembayaran sambil membawa ID
  header("Location: ../transaksi/pembayaran.php?id=$id_pendaftaran&status=success");
  exit; 
  // PENTING: Setelah header location, script di bawah ini tidak akan jalan.
  // Jadi tidak perlu menaruh HTML di file ini.
} else {
  echo "Terjadi kesalahan Database: " . $koneksi->error;
}
?>