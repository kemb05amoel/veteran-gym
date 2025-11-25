<?php
$lokasi = [
    [
        'nama' => 'Veteran Gym',
        'telepon' => '+62 89526002733',
        'email' => 'Veterangym@gmail.com',
        'alamat' => 'Jl. Pasar Kembang No.99, Sarkem, Yogyakarta',
        'lat' => -7.800343,
        'lng' => 110.365571
    ]
];

$fasilitas = [
    ['img' => '../../image/wifi.jpg', 'label' => 'Wifi Gratis'],
    ['img' => '../../image/kelas.jpeg', 'label' => 'Studio Kelas'],
    ['img' => '../../image/loker.jpeg', 'label' => 'Loker'],
    ['img' => '../../image/sauna.jpeg', 'label' => 'Sauna Gratis'],
    ['img' => '../../image/ac.jpg', 'label' => 'Full AC'],
    ['img' => '../../image/mushola.jpg', 'label' => 'Mushola'],
    ['img' => '../../image/parkir.jpg', 'label' => 'Parkir Luas'],
    ['img' => '../../image/kolam.jpg', 'label' => 'Kolam Renang'],
    ['img' => '../../image/smoking.jpg', 'label' => 'Smoking Area'],
    ['img' => '../../image/ringboxing.jpeg', 'label' => 'Ring Boxing'],
    ['img' => '../../image/pilates.jpeg', 'label' => 'Pilates dan Yoga'],
    ['img' => '../../image/toilet.jpg', 'label' => 'Toilet & Shower'],
];
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
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
          <li class="nav-item"><a class="nav-link" href="../transaksi/membership.php">Membership</a></li>
          <li class="nav-item"><a class="nav-link" href="../pelatih/pelatih.php">Pelatih</a></li>
          <li class="nav-item"><a class="nav-link" href="program.php">Program & Kelas</a></li>
          <li class="nav-item"><a class="nav-link" href="fasilitas.php">Fasilitas</a></li>
          <li class="nav-item"><a class="nav-link" href="lokasi.php">Lokasi</a></li>
          <li class="nav-item"><a class="nav-link" href="../artikel/artikel.php">Artikel</a></li>
        </ul>
      </div>
      <a href="../transaksi/membership.php" class="btn join-btn">Join Now</a>
    </div>
  </nav>

<section id="lokasi-section">
    <div class="lokasi-container">
        <h2 class="lokasi-title">Lokasi Veteran Gym </h2>

        <div class="lokasi-grid">
            <div id="map"></div>
            <div class="lokasi-info">
                <h3><?= htmlspecialchars($lokasi[0]['nama']) ?></h3>
                <p><i class="bi bi-telephone-fill me-2"></i><?= htmlspecialchars($lokasi[0]['telepon']) ?></p>
                <p><i class="bi bi-envelope-fill me-2"></i><?= htmlspecialchars($lokasi[0]['email']) ?></p>
                <p><i class="bi bi-geo-alt-fill me-2"></i><?= htmlspecialchars($lokasi[0]['alamat']) ?></p>
            </div>
        </div>

        <div class="fasilitas-gallery">
            <?php foreach($fasilitas as $f): ?>
                <div class="fasilitas-card">
                    <img src="<?= htmlspecialchars($f['img']) ?>" alt="<?= htmlspecialchars($f['label']) ?>" />
                    <div class="fasilitas-label"><?= htmlspecialchars($f['label']) ?></div>
                </div>
            <?php endforeach ?>
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
            <li><a href="tentang.php" class="footer-link d-block py-1">Tentang Kami</a></li>
            <li><a href="../transaksi/membership.php" class="footer-link d-block py-1">Membership</a></li>
            <li><a href="../pelatih/pelatih.php" class="footer-link d-block py-1">Pelatih</a></li>
            <li><a href="program.php" class="footer-link d-block py-1">Program & Kelas</a></li>
            <li><a href="fasilitas.php" class="footer-link d-block py-1">Fasilitas</a></li>
            <li><a href="lokasi.php" class="footer-link d-block py-1">Lokasi</a></li>
            <li><a href="../artikel/artikel.php" class="footer-link d-block py-1">Artikel</a></li>
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
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([<?= $lokasi[0]['lat'] ?>, <?= $lokasi[0]['lng'] ?>], 15);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; OpenStreetMap & CARTO',
        maxZoom: 19
    }).addTo(map);
    L.marker([<?= $lokasi[0]['lat'] ?>, <?= $lokasi[0]['lng'] ?>])
      .addTo(map)
      .bindPopup('<b><?= htmlspecialchars($lokasi[0]['nama']) ?></b><br><?= htmlspecialchars($lokasi[0]['alamat']) ?>')
      .openPopup();
</script>

</body>
</html>