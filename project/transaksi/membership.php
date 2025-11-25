<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veteran Gym | Beranda</title>
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
          <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang Kami</a></li>
          <li class="nav-item"><a class="nav-link" href="membership.php">Membership</a></li>
          <li class="nav-item"><a class="nav-link" href="pelatih.php">Pelatih</a></li>
          <li class="nav-item"><a class="nav-link" href="program.php">Program & Kelas</a></li>
          <li class="nav-item"><a class="nav-link" href="fasilitas.php">Fasilitas</a></li>
          <li class="nav-item"><a class="nav-link" href="lokasi.php">Lokasi</a></li>
          <li class="nav-item"><a class="nav-link" href="artikel.php">Artikel</a></li>
        </ul>
      </div>
      <a href="membership.php" class="btn join-btn">Join Now</a>
    </div>
  </nav>

  <main>
    <section class="membership-section py-5" style="
        background-image: url('../../image/bkmember2.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: scroll;
        min-height: 750px;
        position: relative;
    ">

      <div style="
        position: absolute;
        background-color: rgba(0, 0, 0, 0.5);
        top: 0; left: 0; right: 0; bottom: 0;
        z-index: 1;">
      </div>
      <div class="container position-relative" style="z-index: 2;">
        <h1 class="text-center text-uppercase fw-bold mb-4" style="color: var(--accent-hover);">Pilih Paket Membershipmu
        </h1>
        <p class="text-center mb-5">Sesuaikan kebutuhan latihanmu dengan paket terbaik kami.</p>

        <div class="row g-4">
          <div class="col-md-4">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
              <div class="card-body">
                <h5 class="card-title fw-bold">Gym - 1 Bulan</h5>
                <p class="card-text">Tanpa Pelatih: <strong>Rp250.000</strong></p>
                <p class="card-text">Dengan Pelatih: <strong>Rp600.000</strong></p>
                <a href="../auth/daftar.php?paket=Gym 1 Bulan" class="btn btn-warning w-100 mt-3">Daftar Sekarang</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
              <div class="card-body">
                <h5 class="card-title fw-bold">Boxing - 1 Bulan</h5>
                <p class="card-text">Tanpa Pelatih: <strong>Rp300.000</strong></p>
                <p class="card-text">Dengan Pelatih: <strong>Rp700.000</strong></p>
                <a href="../auth/daftar.php?paket=Boxing 1 Bulan" class="btn btn-warning w-100 mt-3">Daftar Sekarang</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
              <div class="card-body">
                <h5 class="card-title fw-bold">Gym & Boxing - 1 Bulan</h5>
                <p class="card-text">Tanpa Pelatih: <strong>Rp500.000</strong></p>
                <p class="card-text">Dengan Pelatih: <strong>Rp1.200.000</strong></p>
                <a href="../auth/daftar.php?paket=Gym & Boxing 1 Bulan" class="btn btn-warning w-100 mt-3">Daftar Sekarang</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
              <div class="card-body">
                <h5 class="card-title fw-bold">Gym - 3 Bulan</h5>
                <p class="card-text">Tanpa Pelatih: <strong>Rp700.000</strong></p>
                <p class="card-text">Dengan Pelatih: <strong>Rp1.500.000</strong></p>
                <a href="../auth/daftar.php?paket=Gym 3 Bulan" class="btn btn-warning w-100 mt-3">Daftar Sekarang</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
              <div class="card-body">
                <h5 class="card-title fw-bold">Boxing - 3 Bulan</h5>
                <p class="card-text">Tanpa Pelatih: <strong>Rp800.000</strong></p>
                <p class="card-text">Dengan Pelatih: <strong>Rp1.800.000</strong></p>
                <a href="../auth/daftar.php?paket=Boxing 3 Bulan" class="btn btn-warning w-100 mt-3">Daftar Sekarang</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
              <div class="card-body">
                <h5 class="card-title fw-bold">Gym & Boxing - 3 Bulan</h5>
                <p class="card-text">Tanpa Pelatih: <strong>Rp1.300.000</strong></p>
                <p class="card-text">Dengan Pelatih: <strong>Rp4.000.000</strong></p>
                <a href="../auth/daftar.php?paket=Gym & Boxing 3 Bulan" class="btn btn-warning w-100 mt-3">Daftar Sekarang</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <main>

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