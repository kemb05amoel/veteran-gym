<?php
$visi = "Menjadi pusat kebugaran terdepan yang membangun kekuatan fisik, mental, dan disiplin setingkat militer, melahirkan para pejuang sejati dalam kehidupan.";

$misi = [
    "Menyediakan program latihan Boxing, Fitness, dan Pertarungan yang intensif dan terstruktur.",
    "Menggunakan pelatih bersertifikasi dengan latar belakang militer atau pengalaman kompetisi tinggi.",
    "Menciptakan lingkungan gym yang disiplin, memotivasi, dan suportif.",
    "Membekali setiap anggota dengan ketahanan fisik dan mental untuk menghadapi segala tantangan."
];

$keunggulan = [
    ['icon' => 'bi-shield-fill-check', 'judul' => 'Disiplin Militer', 'deskripsi' => 'Fokus pada kedisiplinan dan mentalitas juang untuk hasil optimal.'],
    ['icon' => 'bi-lightning-charge-fill', 'judul' => 'Latihan Intensif', 'deskripsi' => 'Program yang dirancang untuk membangun kekuatan, kecepatan, dan daya tahan tubuh.'],
    ['icon' => 'bi-person-badge-fill', 'judul' => 'Pelatih Veteran', 'deskripsi' => 'Bimbingan langsung dari pelatih dengan pengalaman tempur dan kejuaraan.'],
    ['icon' => 'bi-gear-fill', 'judul' => 'Fasilitas Terdepan', 'deskripsi' => 'Peralatan modern dan area latihan yang dirancang untuk performa maksimal.'],
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

    <section class="hero-tentang" style="
        background-image: url('../../image/bkgym1.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: scroll;
        min-height: 750px;
        position: relative;
    ">
        <div class="container hero-content" data-aos="fade-up" data-aos-duration="1000">
            <h1>Veteran Gym: Medan Perjuanganmu Dimulai</h1>
            <p class="lead" style="color: var(--accent);">Kami adalah lebih dari sekadar gym. Kami adalah akademi untuk
                membangun mental, fisik, dan disiplin juang sejati.</p>
        </div>
    </section>

    <section id="sejarah-filosofi" class="section-padding">
        <div class="container section-content">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="section-title text-start mb-4">Sejarah Kami</h2>
                    <p class="lead fw-bold" style="color: var(--accent);">Dari Pengalaman Medan Tempur, Lahirlah Veteran
                        Gym.</p>
                    <p style="text-align: justify;">
                        Veteran Gym didirikan pada tahun 2020 oleh 2 orang mantan militer dan atlet kompetisi yaitu
                        Jendral Lahar Nuansa dan Kolonel. H. Fatkhan yang percaya bahwa kebugaran sejati lahir dari
                        disiplin, ketahanan mental, dan kerja keras tanpa kompromi. Kami membawa filosofi pelatihan yang
                        ketat, fokus, dan intensif ke dalam lingkungan gym sipil. Tujuannya sederhana: melatih setiap
                        anggota menjadi versi terbaik dari diri mereka, siap menghadapi tantangan apa pun di dalam ring,
                        di treadmill, maupun dalam kehidupan.
                    </p>
                    <a href="program.php" class="btn join-btn mt-3">Lihat Program Latihan</a>
                </div>
                <div class="col-lg-6">
                    <div class="filosofi-box" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                        <h4 class="mb-4">FILOSOFI</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3"><i class="bi bi-fire me-2 text-warning"></i> Mentalitas Juang: Tidak ada
                                kata menyerah. Batasan hanya ada di pikiran.</li>
                            <li class="mb-3"><i class="bi bi-lock-fill me-2 text-warning"></i> Disiplin Mutlak:
                                Konsistensi adalah kunci. Latihan yang terstruktur dan teratur.</li>
                            <li class="mb-3"><i class="bi bi-graph-up-arrow me-2 text-warning"></i> Performa Maksimal:
                                Kami tidak melatih estetika, kami melatih kekuatan dan fungsionalitas.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="container opacity-25">

    <section id="visi-misi" class="section-padding">
        <div class="container section-content">
            <div class="text-center">
                <h2 class="section-title" data-aos="zoom-in">Visi & Misi Kami</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <div class="visi-box">
                        <h3 class="mb-3"><i class="bi bi-eye-fill me-2"></i> VISI</h3>
                        <p class="lead fst-italic">
                            <?php echo $visi; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="misi-list">
                        <h3 class="mb-4 text-start" style="color: var(--accent);">MISI</h3>
                        <?php foreach ($misi as $i => $m): ?>
                            <div class="misi-item" data-aos="fade-up" data-aos-delay="<?php echo $i * 100 + 200; ?>">
                                <i class="bi bi-check-circle-fill"></i>
                                <p class="mb-0 text-start"><?php echo $m; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="container opacity-25">

    <section id="keunggulan-section" class="section-padding">
        <div class="container section-content">
            <div class="text-center">
                <h2 class="section-title" data-aos="zoom-in">Mengapa Veteran Gym?</h2>
            </div>
            <div class="row g-4">
                <?php foreach ($keunggulan as $i => $k): ?>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $i * 150; ?>">
                        <div class="keunggulan-card">
                            <i class="bi <?php echo $k['icon']; ?>"></i>
                            <h5 class="mt-3"><?php echo $k['judul']; ?></h5>
                            <p class="small"><?php echo $k['deskripsi']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                            <a href="../transaksi/cek_status_membership.php"
                                class="footer-link d-block py-1 text-warning fw-bold">
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>

</html>