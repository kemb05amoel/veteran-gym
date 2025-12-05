<?php
include "../../include/koneksi.php"; 

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: ../transaksi/membership.php");
  exit;
}

$paket      = $koneksi->real_escape_string($_POST['paket'] ?? '');
$nama       = $koneksi->real_escape_string($_POST['nama'] ?? '');
$email      = $koneksi->real_escape_string($_POST['email'] ?? '');
$telepon    = $koneksi->real_escape_string($_POST['telepon'] ?? '');
$pelatih    = $koneksi->real_escape_string($_POST['pelatih'] ?? '');
$pembayaran = $koneksi->real_escape_string($_POST['pembayaran'] ?? '');

if (empty($nama) || empty($paket) || empty($pembayaran)) {
    echo "<script>
            alert('Gagal! Pastikan Nama, Paket, dan Pembayaran terisi.');
            window.history.back();
          </script>";
    exit;
}

$sql = "INSERT INTO pendaftaran (paket, nama, email, telepon, pelatih, pembayaran, tanggal_daftar)
        VALUES ('$paket', '$nama', '$email', '$telepon', '$pelatih', '$pembayaran', NOW())";

if ($koneksi->query($sql)) {
  $id_pendaftaran = $koneksi->insert_id;
  
  header("Location: ../transaksi/pembayaran.php?id=$id_pendaftaran&status=success");
  exit; 
} else {
  echo "Terjadi kesalahan Database: " . $koneksi->error;
}
?>