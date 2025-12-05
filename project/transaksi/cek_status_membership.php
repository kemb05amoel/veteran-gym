<?php
// Pastikan path koneksi benar
include "../../include/koneksi.php";

$message = "";
$status_level = "";

// Cek apakah ada POST dan koneksi database tersedia
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);

    // --- MENGGUNAKAN MYSQLI (SESUAI KODE SEBELUMNYA) ---
    // 1. Siapkan Query (Gunakan tanda tanya '?' bukan ':email')
    $sql = "SELECT id, nama_lengkap, status_pembayaran, hadiah_diklaim, hasil_hadiah 
                FROM konfirmasi_pembayaran 
                WHERE email = ? 
                ORDER BY id DESC 
                LIMIT 1";

    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
      // 2. Binding Parameter (s = string)
      $stmt->bind_param("s", $email);

      // 3. Eksekusi
      $stmt->execute();

      // 4. Ambil Hasil
      $result_set = $stmt->get_result();
      $result = $result_set->fetch_assoc();

      if ($result) {
        $status = $result['status_pembayaran'];
        $user_name = htmlspecialchars($result['nama_lengkap']);
        $user_id = $result['id'];
        $hadiah_diklaim = $result['hadiah_diklaim'];
        $hasil_hadiah = htmlspecialchars($result['hasil_hadiah'] ?? '');

        if ($status == 'Success') {
          $status_level = "dark";

          // PERBAIKAN SYNTAX ERROR DISINI (HAPUS TANDA -)
          if ($hadiah_diklaim == 'Belum') {
            $message = "<strong><i class='bi bi-check-circle-fill'></i> Halo, $user_name!</strong><br>
                                    Pembayaran Anda telah dikonfirmasi. Anda berhak mendapatkan 1x hadiah selamat datang!<br><br>
                                    <a href='../fitur/spin_hadiah.php?token=" . base64_encode($user_id) . "' class='btn btn-light text-dark fw-bold'>
                                        <i class='bi bi-gift-fill me-2'></i> KLAIM HADIAH ANDA SEKARANG!
                                    </a>";
          } else {
            $message = "<strong><i class='bi bi-check-circle-fill'></i> Halo, $user_name!</strong><br>
                                    Pembayaran Anda sudah dikonfirmasi. Anda sebelumnya telah mengklaim hadiah dan memenangkan: 
                                    <strong class='text-warning'>$hasil_hadiah</strong>.";
          }
        } elseif ($status == 'Pending') {
          $status_level = "warning";
          $message = "<strong><i class='bi bi-clock-history'></i> Halo, $user_name!</strong><br>Status pembayaran Anda masih TERTUNDA (Pending). Admin kami sedang melakukan verifikasi. Silakan cek kembali nanti.";
        } elseif ($status == 'Failed') {
          $status_level = "danger";
          $message = "<strong><i class='bi bi-x-circle-fill'></i> Halo, $user_name!</strong><br>Pembayaran Anda GAGAL diverifikasi. Mohon hubungi admin kami via WhatsApp.";
        }
      } else {
        $status_level = "info";
        $message = "Email tidak ditemukan atau belum melakukan konfirmasi pembayaran.";
      }
      $stmt->close();
    } else {
      $status_level = "danger";
      $message = "Error query database: " . $koneksi->error;
    }
  } else {
    $status_level = "warning";
    $message = "Silakan masukkan email Anda untuk mengecek status.";
  }
}
// Tidak perlu $koneksi = null di MySQLi prosedural, cukup close di akhir jika mau, tapi opsional.
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
      </div>
    </div>
  </nav>

  <section class="py-5" style="background : url('../../image/bkgym5.jpg') no-repeat center center; 
         background-size: cover; 
         box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.6); 
         min-height: 100vh;
         display: flex;
         align-items: center;
         ">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 text-center">

          <div class="card shadow-lg p-4" data-bs-theme="dark">
            <h2 class="text-center fw-bold mb-4" style="color: var(--accent-hover);">Cek Status Membership</h2>
            <p class="mb-4"> Masukkan email yang Anda gunakan saat konfirmasi untuk melihat status pembayaran Anda.
            </p>

            <form action="cek_status_membership.php" method="POST">
              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Masukkan email Anda..." required>
                <button class="btn btn-pay" type="submit">
                  <i class="bi bi-search"></i> Cek Status
                </button>
              </div>
            </form>

            <?php if (!empty($message)): ?>
              <div class="alert alert-<?php echo $status_level; ?> mt-4 text-start">
                <?php echo $message; ?>
              </div>
            <?php endif; ?>

          </div>

        </div>
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
            <li><a href="membership.php" class="footer-link d-block py-1">Membership</a></li>
            <li><a href="pelatih.php" class="footer-link d-block py-1">Pelatih</a></li>
            <li><a href="program.php" class="footer-link d-block py-1">Program & Kelas</a></li>
            <li><a href="fasilitas.php" class="footer-link d-block py-1">Fasilitas</a></li>
            <li><a href="lokasi.php" class="footer-link d-block py-1">Lokasi</a></li>
            <li><a href="artikel.php" class="footer-link d-block py-1">Artikel</a></li>
            <li>
              <a href="cek_status_membership.php" class="footer-link d-block py-1 text-warning fw-bold">
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
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>