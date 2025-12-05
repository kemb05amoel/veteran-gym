<?php
include '../../include/koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM artikel WHERE id_artikel = $id";
$result = $koneksi->query($sql);

if ($result && $result->num_rows > 0) {
    $item = $result->fetch_assoc();
    
    $gambar = !empty($item['gambar']) ? $item['gambar'] : 'bkgym1.jpg';
    
    $tgl = date('d F Y', strtotime($item['tanggal']));
} else {
    echo "<script>alert('Maaf, artikel yang Anda cari tidak ditemukan.'); window.location.href='artikel.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veteran Gym | <?php echo $item['judul']; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../asset/style.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="../index.php">
        <img src="../../image/logogym2.png" alt="Veteran Gym Logo" class="logo-img">
        <span class="brand-text">Veteran Gym</span>
      </a>
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="../index.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="../profil/tentang.php">Tentang Kami</a></li>
          <li class="nav-item"><a class="nav-link" href="../transaksi/membership.php">Membership</a></li>
          <li class="nav-item"><a class="nav-link" href="../pelatih/pelatih.php">Pelatih</a></li>
          <li class="nav-item"><a class="nav-link" href="../profil/program.php">Program & Kelas</a></li>
          <li class="nav-item"><a class="nav-link" href="../profil/fasilitas.php">Fasilitas</a></li>
          <li class="nav-item"><a class="nav-link" href="../profil/lokasi.php">Lokasi</a></li>
          <li class="nav-item"><a class="nav-link" href="artikel.php">Artikel</a></li>
        </ul>
      </div>
      <a href="../transaksi/membership.php" class="btn join-btn">Join Now</a>
    </div>
  </nav>

  <section id="detail-artikel-section">
    <div class="detail-container">
      
      <h1 class="detail-judul text-center mb-3"><?php echo $item['judul']; ?></h1>
      
      <div class="detail-meta text-center mb-4">
         <span class="me-3"><i class="bi bi-person-fill text-warning"></i> <?php echo $item['penulis']; ?></span>
         <span><i class="bi bi-calendar-event-fill text-warning"></i> <?php echo $tgl; ?></span>
      </div>

      <div class="text-center mb-5">
          <img src="../../image/<?php echo $gambar; ?>" alt="<?php echo $item['judul']; ?>" class="detail-gambar shadow-lg w-100 rounded" style="max-height: 500px; object-fit: cover;">
      </div>
      
      <div class="detail-isi text-light" style="font-size: 1.1rem; line-height: 1.8; text-align: justify;">
        <?php echo nl2br($item['isi_artikel']); ?>
      </div>

      <div class="detail-sumber mt-5 p-4 rounded" style="background-color: var(--main-bg); border-left: 5px solid var(--accent);">
        <strong style="color: var(--accent-hover);">Veteran Gym News</strong><br>
        <span class="small">Artikel ini diterbitkan resmi oleh Veteran Gym untuk tujuan edukasi dan informasi.</span>
      </div>

      <div class="mt-5">
          <a href="artikel.php" class="btn-kembali">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Artikel
          </a>
      </div>

    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row gy-4 text-start align-items-start">

        <div class="col-lg-3 col-md-6 border-end">
          <h4 class="fw-bold text-uppercase mb-3" style="color: var(--accent-hover);">Veteran Gym</h4>
          <p class="small" style="color: var(--text-muted); text-align: justify;">
            Veteran Gym adalah tempat di mana semangat juang bertemu dengan kekuatan fisik.
            Kami membangun disiplin, kekuatan, dan mental baja untuk para pejuang sejati.
          </p>
          <p class="fst-italic small">“Perjuanganmu Dimulai di Sini.”</p>
        </div>

        <div class="col-lg-3 col-md-6 border-end border-secondary ps-lg-4">
          <h5 class="fw-bold mb-3 text-uppercase border-start border-3 border-warning ps-2">Navigasi</h5>
          <ul class="list-unstyled small mb-0">
            <li><a href="../index.php" class="footer-link d-block py-1">Beranda</a></li>
            <li><a href="../profil/tentang.php" class="footer-link d-block py-1">Tentang Kami</a></li>
            <li><a href="../transaksi/membership.php" class="footer-link d-block py-1">Membership</a></li>
            <li><a href="../pelatih/pelatih.php" class="footer-link d-block py-1">Pelatih</a></li>
            <li><a href="../profil/program.php" class="footer-link d-block py-1">Program & Kelas</a></li>
            <li><a href="../profil/fasilitas.php" class="footer-link d-block py-1">Fasilitas</a></li>
            <li><a href="../profil/lokasi.php" class="footer-link d-block py-1">Lokasi</a></li>
            <li><a href="artikel.php" class="footer-link d-block py-1">Artikel</a></li>
            <li>
              <a href="../transaksi/cek_status_membership.php" class="footer-link d-block py-1 text-warning fw-bold">
                Cek Status Pembayaran
              </a>
            </li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 border-end border-secondary ps-lg-4">
          <h5 class="fw-bold mb-3 text-uppercase border-start border-3 border-warning ps-2">Kontak Kami</h5>
          <ul class="list-unstyled small mb-0">
            <li class="mb-2"><i class="bi bi-envelope-fill me-2 text-warning"></i>
              <a href="mailto:veterangym@gmail.com" class="footer-link">veterangym@gmail.com</a>
            </li>
            <li class="mb-2"><i class="bi bi-whatsapp me-2 text-warning"></i>
              <a href="https://wa.me/6289526002733" class="footer-link">+62 895-2600-2733</a>
            </li>
            <li class="mb-2"><i class="bi bi-geo-alt-fill me-2 text-warning"></i>
              <span class="text-secondary">Jl. Ps. Kembang, Kota Yogyakarta</span>
            </li>
            <li><i class="bi bi-clock-history me-2 text-warning"></i>
              <span class="text-secondary">Buka Setiap Hari: 06.00 - 22.00</span>
            </li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 ps-lg-4">
          <h5 class="fw-bold mb-3 text-uppercase border-start border-3 border-warning ps-2">Follow Us</h5>
          <div class="d-flex gap-3 fs-4 mb-3">
            <a href="https://web.facebook.com/" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="https://x.com/" class="social-icon"><i class="bi bi-twitter"></i></a>
            <a href="https://www.linkedin.com/" class="social-icon"><i class="bi bi-linkedin"></i></a>
            <a href="https://www.instagram.com/" class="social-icon"><i class="bi bi-instagram"></i></a>
            <a href="https://www.youtube.com/" class="social-icon"><i class="bi bi-youtube"></i></a>
          </div>
          <p class="small text-secondary mb-0">
            Ikuti kami untuk promo, tips latihan, dan inspirasi perjuangan setiap hari.
          </p>
        </div>
      </div>

    </div>
    <hr class="opacity-50 mt-5">
    <div class="text-center small pb-3">
      © 2025 <strong style="color: var(--accent-hover);">Veteran Gym</strong> | Medan Perjuanganmu Dimulai di Sini
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>