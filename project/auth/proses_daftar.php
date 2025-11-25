<?php
include "../../include/koneksi.php"; 

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: ../transaksi/membership.php");
  exit;
}

$paket      = $koneksi->real_escape_string($_POST['paket']);
$nama       = $koneksi->real_escape_string($_POST['nama']);
$email      = $koneksi->real_escape_string($_POST['email']);
$telepon    = $koneksi->real_escape_string($_POST['telepon']);
$pelatih    = $koneksi->real_escape_string($_POST['pelatih']);
$pembayaran = $koneksi->real_escape_string($_POST['pembayaran']);

$sql = "INSERT INTO pendaftaran (paket, nama, email, telepon, pelatih, pembayaran, tanggal_daftar)
        VALUES ('$paket', '$nama', '$email', '$telepon', '$pelatih', '$pembayaran', NOW())";

if ($koneksi->query($sql)) {
  $id_pendaftaran = $koneksi->insert_id;
  header("Location: ../transaksi/pembayaran.php?id=$id_pendaftaran&status=success");
  exit;
} else {
  $error = "Terjadi kesalahan: " . $koneksi->error;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konfirmasi Pendaftaran | Veteran Gym</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../asset/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="../index.php">
      <img src="../../image/logogym2.png" alt="Veteran Gym Logo" class="logo-img">
      <span class="brand-text">Veteran Gym</span>
    </a>
  </div>
</nav>

<main>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card shadow-lg p-4 text-center">

          <?php if ($status === "success") : ?>
            <i class="bi bi-check-circle-fill check-icon mb-3"></i>
            <h2 class="fw-bold" style="color: var(--accent-hover);">Pendaftaran Berhasil!</h2>
            <p class="mt-2 mb-4 text-muted">Terima kasih <strong><?= htmlspecialchars($nama) ?></strong>, pendaftaranmu telah kami terima.</p>

            <table class="table table-dark table-striped text-start">
              <tr><th>Paket</th><td><?= htmlspecialchars($paket) ?></td></tr>
              <tr><th>Email</th><td><?= htmlspecialchars($email) ?></td></tr>
              <tr><th>Telepon</th><td><?= htmlspecialchars($telepon) ?></td></tr>
              <tr><th>Pelatih</th><td><?= htmlspecialchars($pelatih) ?></td></tr>
              <tr><th>Pembayaran</th><td><?= htmlspecialchars($pembayaran) ?></td></tr>
            </table>

            <div class="alert alert-warning mt-3">
              Silakan lakukan pembayaran sesuai metode yang dipilih.  
              Tim kami akan mengonfirmasi dalam 1x24 jam melalui WhatsApp atau email.
            </div>

            <a href="../transaksi/membership.php" class="btn btn-outline-warning mt-3">
              <i class="bi bi-arrow-left"></i> Kembali ke Membership
            </a>

          <?php else : ?>
            <i class="bi bi-x-circle-fill error-icon mb-3"></i>
            <h2 class="fw-bold text-danger">Pendaftaran Gagal</h2>
            <p class="text-muted">Terjadi kesalahan saat menyimpan data. Silakan coba lagi nanti.</p>
            <a href="daftar.php" class="btn btn-outline-light mt-3">
              <i class="bi bi-arrow-left"></i> Kembali ke Formulir
            </a>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</main>

<footer class="text-center text-muted py-3 small">
  © 2025 <strong style="color: var(--accent-hover);">Veteran Gym</strong> | Medan Perjuanganmu Dimulai di Sini
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
