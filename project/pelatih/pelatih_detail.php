<?php
// 1. KONEKSI DATABASE
include '../../include/koneksi.php';

// 2. TANGKAP ID DARI URL
// Menggunakan (int) untuk keamanan agar yang masuk hanya angka
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 3. QUERY DATABASE BERDASARKAN ID
$sql = "SELECT * FROM pelatih WHERE id_pelatih = $id";
$result = $koneksi->query($sql);

// 4. CEK APAKAH DATA ADA?
if ($result && $result->num_rows > 0) {
    $item = $result->fetch_assoc();
    
    // Cek foto, jika kosong pakai placeholder
    $foto = !empty($item['foto']) ? $item['foto'] : 'trainer_placeholder.jpg';
} else {
    // Jika ID tidak ditemukan, tendang balik ke halaman daftar pelatih
    echo "<script>alert('Data pelatih tidak ditemukan!'); window.location.href='pelatih.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veteran Gym | <?php echo $item['nama_pelatih']; ?></title>
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
          <li class="nav-item"><a class="nav-link" href="pelatih.php">Pelatih</a></li>
          <li class="nav-item"><a class="nav-link" href="../profil/program.php">Program & Kelas</a></li>
          <li class="nav-item"><a class="nav-link" href="../profil/fasilitas.php">Fasilitas</a></li>
          <li class="nav-item"><a class="nav-link" href="../profil/lokasi.php">Lokasi</a></li>
          <li class="nav-item"><a class="nav-link" href="../artikel/artikel.php">Artikel</a></li>
        </ul>
      </div>
      <a href="../transaksi/membership.php" class="btn join-btn">Join Now</a>
    </div>
  </nav>

  <section id="detail-pelatih" style="min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
      
      <img src="../../image/<?php echo $foto; ?>" alt="<?php echo $item['nama_pelatih']; ?>" class="pelatih-foto">
      
      <h1 class="pelatih-nama"><?php echo $item['nama_pelatih']; ?></h1>
      
      <p class="pelatih-spesialisasi text-uppercase"><?php echo $item['spesialisasi']; ?></p>
      
      <div class="pelatih-deskripsi">
        <?php echo nl2br($item['deskripsi']); ?>
      </div>

      <div class="d-flex justify-content-center gap-3 mt-4" style="animation: fadeIn 1.2s ease 1.2s forwards; opacity: 0;">
          <?php if(!empty($item['instagram'])): ?>
            <a href="https://instagram.com/<?php echo $item['instagram']; ?>" target="_blank" class="btn btn-outline-light rounded-circle" style="width: 50px; height: 50px; display:flex; align-items:center; justify-content:center;">
                <i class="bi bi-instagram fs-4"></i>
            </a>
          <?php endif; ?>

          <?php if(!empty($item['no_wa'])): ?>
            <a href="https://wa.me/<?php echo $item['no_wa']; ?>" target="_blank" class="btn btn-outline-success rounded-circle" style="width: 50px; height: 50px; display:flex; align-items:center; justify-content:center;">
                <i class="bi bi-whatsapp fs-4"></i>
            </a>
          <?php endif; ?>
      </div>

      <a href="pelatih.php" class="btn-kembali mt-5">
        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Pelatih
      </a>

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
            <li><a href="pelatih.php" class="footer-link d-block py-1">Pelatih</a></li>
            <li><a href="../profil/program.php" class="footer-link d-block py-1">Program & Kelas</a></li>
            <li><a href="../profil/fasilitas.php" class="footer-link d-block py-1">Fasilitas</a></li>
            <li><a href="../profil/lokasi.php" class="footer-link d-block py-1">Lokasi</a></li>
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
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>