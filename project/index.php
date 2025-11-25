<?php
// index.php
// Halaman Beranda Veteran Gym (Tema Military Strength)
?>

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
  <link rel="stylesheet" href="../asset/style.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="../image/logogym2.png" alt="Veteran Gym Logo" class="logo-img">
        <span class="brand-text">Veteran Gym</span>
      </a>
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang Kami</a></li>
          <li class="nav-item"><a class="nav-link" href="transaksi/membership.php">Membership</a></li>
          <li class="nav-item"><a class="nav-link" href="pelatih.php">Pelatih</a></li>
          <li class="nav-item"><a class="nav-link" href="program.php">Program & Kelas</a></li>
          <li class="nav-item"><a class="nav-link" href="fasilitas.php">Fasilitas</a></li>
          <li class="nav-item"><a class="nav-link" href="lokasi.php">Lokasi</a></li>
          <li class="nav-item"><a class="nav-link" href="artikel.php">Artikel</a></li>
        </ul>
      </div>
      <a href="transaksi/membership.php" class="btn join-btn">Join Now</a>
    </div>
  </nav>

  <main>

    <section id="tagline" class="d-flex align-items-center text-light" style="
        background-image: url('../image/bkgym1.jpg');
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

      <div class="container text-start ps-lg-5">
        <h1 class="fw-bold text-uppercase mb-3" style="color: var(--accent-hover); font-size: 5rem; line-height: 1;">
          LATIHAN BUKAN MAINAN,<br>INI MEDAN PERJUANGAN!
        </h1>
        <p class="lead" style="font-size: 1rem; color: var(--text-light);">
          Bangun fisik, mental, dan semangat juangmu di Veteran Gym.
        </p>
        <a href="transaksi/membership.php" class="btn join-btn mt-3">Join Sekarang</a>
      </div>
    </section>

    <section id="membership-section">
      <div class="container membership-container">
        <div class="membership-left">
          <h2 class="membership-title">VETERAN GYM MONEY BACK GUARANTEE</h2>
        </div>
        <div class="membership-right">
          <h4 class="membership-subtitle">Kami Siap Memberi Kepastian.</h4>
          <p>
            Jika sewaktu-waktu fasilitas gym kami tutup permanen, Veteran Gym akan
            memberikan <strong>pengembalian penuh</strong> untuk sisa periode membership
            dan sesi pelatihan pribadi yang belum digunakan — karena kepercayaanmu sangat berarti.
          </p>
          <a href="transaksi/membership.php" class="btn join-btn">Join Now</a>
        </div>
      </div>
    </section>

    <section id="keunggulan" class="py-5" style="background-color: var(--main-bg);">
      <div class="container text-center">
        <h2 class="section-title mb-5" style="font-size: 2.5rem; font-weight: 800;">MENGAPA HARUS KAMI?</h2>

        <div class="row g-4">

          <div class="col-md-4">
            <div class="feature-card">
              <div class="feature-icon"><i class="bi bi-geo-alt"></i></div>
              <h5>Lokasi Strategis di Medan</h5>
              <p>Dekat dari akses utama kota</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="feature-card">
              <div class="feature-icon"><i class="bi bi-gear"></i></div>
              <h5>100+ Alat Fitness Modern</h5>
              <p>Peralatan lengkap untuk semua jenis latihan</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="feature-card">
              <div class="feature-icon"><i class="bi bi-droplet"></i></div>
              <h5>Isi Ulang Air Minum Sepuasnya</h5>
              <p>Menghindari diri Anda dari dehidrasi</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="feature-card">
              <div class="feature-icon"><i class="bi bi-backpack2"></i></div>
              <h5>Handuk & Loker</h5>
              <p>Tidak perlu bingung membawa perlengkapan sendiri</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="feature-card">
              <div class="feature-icon"><i class="bi bi-person-arms-up"></i></div>
              <h5>Ruang Gym yang Luas</h5>
              <p>Berolahraga lebih leluasa tanpa antri</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="feature-card">
              <div class="feature-icon"><i class="bi bi-p-circle"></i></div>
              <h5>Parkir Luas</h5>
              <p>Kemudahan akses bagi Anda</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="pelatih" class="text-center text-light" style="
        background-image: url('../image/bkgympt1.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: scroll;
        min-height: 750px;
        position: relative;
    ">

      <div style="
        position: absolute;
        background-color: rgba(0, 0, 0, 0);
        top: 0; left: 0; right: 0; bottom: 0;
        z-index: 1;">
      </div>
      <div class="overlay">
        <div class="container py-5">
          <h2 class="section-title mb-3">Latih Dirimu Bersama Profesional</h2>
          <p class="mb-5">Pelatih kami siap memaksimalkan potensimu.</p>

          <div class="row g-4 justify-content-center">
            <div class="col-md-3 col-sm-6">
              <div class="trainer-card">
                <img src="../image/pt1.jpg" alt="Pelatih 1" class="trainer-img">
                <h5 class="trainer-name">Coach Andika</h5>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="trainer-card">
                <img src="image/pelatih2.jpg" alt="Pelatih 2" class="trainer-img">
                <h5 class="trainer-name">Coach Sinta</h5>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="trainer-card">
                <img src="image/pelatih3.jpg" alt="Pelatih 3" class="trainer-img">
                <h5 class="trainer-name">Coach Rafi</h5>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="trainer-card">
                <img src="image/pelatih4.jpg" alt="Pelatih 4" class="trainer-img">
                <h5 class="trainer-name">Coach Della</h5>
              </div>
            </div>
          </div>

          <a href="pelatih.php" class="btn join-btn mt-5">Lihat Semua Pelatih</a>
        </div>
      </div>
    </section>

    <section id="fasilitas" class="text-center" style="background-color: var(--section-bg-light);">
      <div class="container">
        <h2 class="section-title">Fasilitas Lengkap, Siap Tempur</h2>
        <p class="mb-5">Temukan area latihan terbaik untuk setiap kebutuhan fitnessmu.</p>

        <div class="row justify-content-center g-4">
          <div class="col-md-6">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
              <img src="../image/gym1.jpg" class="card-img-top" alt="Fasilitas Gym"
                style="height: 320px; object-fit: cover;">
              <div class="card-body">
                <h4 class="card-title text-uppercase" style="color: var(--accent-hover); font-weight: 700;">Fasilitas
                  Gym</h4>
                <p class="card-text text-muted">
                  Nikmati area latihan modern dengan peralatan lengkap untuk setiap level — dari pemula hingga atlet
                  profesional.
                </p>
                <a href="fasilitas.php" class="btn join-btn mt-2">Lihat Detail</a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card bg-dark text-light border-0 shadow-lg h-100">
              <img src="../image/boxing1.jpg" class="card-img-top" alt="Fasilitas Boxing"
                style="height: 320px; object-fit: cover;">
              <div class="card-body">
                <h4 class="card-title text-uppercase" style="color: var(--accent-hover); font-weight: 700;">Fasilitas
                  Boxing</h4>
                <p class="card-text text-muted">
                  Arena tinju eksklusif dengan ring standar profesional dan pelatih berpengalaman untuk melatih teknik
                  dan ketahananmu.
                </p>
                <a href="fasilitas.php" class="btn join-btn mt-2">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="temukan-kami" class="text-center text-light position-relative" style="
        background: url('../image/bkgym4.jpg') center center/cover no-repeat;
        min-height: 600px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    ">

      <div style="
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
    "></div>

      <div class="container position-relative" style="z-index: 2;">
        <h2 class="section-title mb-3" style="font-size: 2.5rem;">Temukan Kami</h2>
        <p class="lead mb-4" style="color: #ccc; max-width: 700px; margin: 0 auto;">
          Kunjungi <strong>Veteran Gym</strong> dan rasakan atmosfer perjuangan sejati —
          lokasi strategis, mudah diakses, dan siap menyambut pejuang kebugaran seperti kamu.
        </p>

        <a href="lokasi.php" class="btn join-btn mt-3 mb-5" style="padding: 12px 32px; font-weight: 600;">
          Lihat Lokasi
        </a>

        <div
          style="max-width: 900px; margin: 40px auto 0; border-radius: 20px; overflow: hidden; box-shadow: 0 0 25px rgba(102, 252, 241, 0.25);">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.1234567890123!2d110.3695!3d-7.7956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1sPLACE_ID_HERE!2sJl.%20Ps.%20Kembang%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1698600000000!5m2!1sid!2sid"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </section>
  </main>

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
            <li><a href="index.php" class="footer-link d-block py-1">Beranda</a></li>
            <li><a href="tentang.php" class="footer-link d-block py-1">Tentang Kami</a></li>
            <li><a href="transaksi/membership.php" class="footer-link d-block py-1">Membership</a></li>
            <li><a href="pelatih.php" class="footer-link d-block py-1">Pelatih</a></li>
            <li><a href="program.php" class="footer-link d-block py-1">Program & Kelas</a></li>
            <li><a href="fasilitas.php" class="footer-link d-block py-1">Fasilitas</a></li>
            <li><a href="lokasi.php" class="footer-link d-block py-1">Lokasi</a></li>
            <li><a href="artikel.php" class="footer-link d-block py-1">Artikel</a></li>
            <li>
              <a href="admin/cek_status.php" class="footer-link d-block py-1 text-warning fw-bold">
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