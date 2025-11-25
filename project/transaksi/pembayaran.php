<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veteran Gym | Konfirmasi Pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../asset/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="../../image/logogym2.png" alt="Veteran Gym Logo" class="logo-img">
        <span class="brand-text">Veteran Gym</span>
      </a>
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="../index.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang Kami</a></li>
          <li class="nav-item"><a class="nav-link" href="membership.php">Membership</a></li>
          <li class="nav-item"><a class="nav-link" href="pelatih.php">Pelatih</a></li>
          <li class="nav-item"><a class="nav-link" href="program.php">Program & Kelas</a></li>
          <li class="nav-item"><a class="nav-link" href="fasilitas.php">Fasilitas</a></li>
          <li class="nav-item"><a class="nav-link" href="lokasi.php">Lokasi</a></li>
          <li class="nav-item"><a class="nav-link" href="artikel.php">Artikel</a></li>
        </ul>
  </nav>

    <section id="tagline" class="d-flex align-items-center text-light"
      style="
        background-image: url('../../image/bkgym3.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: scroll;
        min-height: 750px;
        position: relative;
    ">

    <div style="
        position: absolute;
        background-color: rgba(0, 0, 0, 0.2);
        top: 0; left: 0; right: 0; bottom: 0;
        z-index: 1;">
    </div>
  
    <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card shadow-lg p-4" data-bs-theme="dark">
          <h2 class="text-center fw-bold mb-4" style="color: var(--accent-hover);">Konfirmasi Pembayaran</h2>
        <p class="mb-4">
          Silakan lakukan pembayaran ke salah satu rekening di bawah ini untuk menyelesaikan pendaftaran membership.
        </p>

        <div class="bank-info text-start">
          <h5 class="text-warning"><i class="bi bi-bank2"></i> Informasi Rekening</h5>
          <p class="mb-1">🏦 <strong>Bank BNI</strong> — 1234567890</p>
          <p class="mb-1">👤 a.n. <strong>Veteran Gym Medan</strong></p>
          <hr style="border-color: var(--accent);">
          <p class="small text-muted mb-1">Atau scan QR berikut untuk pembayaran cepat:</p>
          <div class="text-center">
            <img src="../../image/qris.jpeg" alt="QR Pembayaran" class="qr-img">
          </div>
        </div>

        <p class="mt-4">Setelah kamu menyelesaikan pembayaran, klik tombol di bawah ini:</p>

        <button class="btn btn-pay mt-2" data-bs-toggle="modal" data-bs-target="#confirmModal">
          <i class="bi bi-check-circle-fill me-2"></i> Saya Sudah Bayar
        </button>
      </div>
    </div>
  </section>

  <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-light">
        <div class="modal-header border-0">
          <h5 class="modal-title"><i class="bi bi-shield-check text-warning me-2"></i> Konfirmasi Pembayaran</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Apakah kamu yakin sudah melakukan pembayaran ke rekening Veteran Gym?
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="konfirmasi.php" class="btn btn-success">Ya, Lanjutkan Konfirmasi</a>
        </div>
      </div>
    </div>
  </div>

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
            <li><a href="tentang.php" class="footer-link d-block py-1">Tentang Kami</a></li>
            <li><a href="membership.php" class="footer-link d-block py-1">Membership</a></li>
            <li><a href="pelatih.php" class="footer-link d-block py-1">Pelatih</a></li>
            <li><a href="program.php" class="footer-link d-block py-1">Program & Kelas</a></li>
            <li><a href="fasilitas.php" class="footer-link d-block py-1">Fasilitas</a></li>
            <li><a href="lokasi.php" class="footer-link d-block py-1">Lokasi</a></li>
            <li><a href="artikel.php" class="footer-link d-block py-1">Artikel</a></li>
            <li>
              <a href="../admin/cek_status.php" class="footer-link d-block py-1 text-warning fw-bold">
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
            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
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
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>