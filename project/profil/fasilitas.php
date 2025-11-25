<?php
// fasilitas.php
// Halaman Fasilitas Veteran Gym (Tema Military Strength)
// Menampilkan fasilitas dengan slider, kelas Gym, dan kelas Boxing

// Simulasi data fasilitas (untuk slider)
$fasilitas = [
    [
        'gambar' => '../../image/areabeban.jpg', // Ganti dengan path gambar Anda
        'keterangan' => 'Area Latihan Beban Lengkap dengan Peralatan Modern'
    ],
    [
        'gambar' => '../../image/ruangboxing.jpg',
        'keterangan' => 'Ruang Boxing dan MMA untuk Latihan Intensif'
    ],
    [
        'gambar' => '../../image/kolamdansauna.jpg',
        'keterangan' => 'Kolam Renang dan Sauna untuk Recovery'
    ],
    [
        'gambar' => '../../image/yogadanpilates.jpg',
        'keterangan' => 'Studio Kelas untuk Yoga dan Pilates'
    ],
    [
        'gambar' => '../../image/parkirluas.jpg', // Ganti dengan path gambar parkir Anda
        'keterangan' => 'Area Parkir Luas dan Aman untuk Member'
    ],
    [
        'gambar' => '../../image/mushola2.jpg', // Ganti dengan path gambar mushola Anda
        'keterangan' => 'Mushola untuk Istirahat dan Ibadah'
    ]

];

// Simulasi data kelas Gym
$kelasGym = [
    [
        'judul' => 'Zumba',
        'deskripsi' => 'Latihan aerobik dengan musik Latin yang energik, membakar kalori sambil bersenang-senang.',
        'gambar' => '../../image/zumba.jpg'
    ],
    [
        'judul' => 'Spinning',
        'deskripsi' => 'Kelas sepeda statis intensif untuk meningkatkan stamina dan kekuatan kaki.',
        'gambar' => '../../image/spinning2.jpeg'
    ],
    [
        'judul' => 'Body Combat',
        'deskripsi' => 'Kombinasi seni bela diri non-kontak untuk membangun kekuatan dan kepercayaan diri.',
        'gambar' => '../../image/bodycombat2.jpeg'
    ],
    [
        'judul' => 'Yoga',
        'deskripsi' => 'Latihan relaksasi dan fleksibilitas untuk tubuh dan pikiran yang seimbang.',
        'gambar' => '../../image/yoga2.jpg'
    ],
    [
        'judul' => 'Pilates',
        'deskripsi' => 'Fokus pada inti tubuh, meningkatkan postur dan kekuatan otot dalam.',
        'gambar' => '../../image/pilates2.jpg'
    ],
    [
        'judul' => 'Body Balance',
        'deskripsi' => 'Campuran yoga, tai chi, dan pilates untuk keseimbangan fisik dan mental.',
        'gambar' => '../../image/bodybalance2.jpg'
    ],
    [
        'judul' => 'Body Pump',
        'deskripsi' => 'Latihan beban dengan musik untuk membangun massa otot dan kekuatan.',
        'gambar' => '../../image/bodypump2.jpeg'
    ],
    [
        'judul' => 'pisik',
        'deskripsi' => 'Latihan pisik dengan musik untuk membangun pisik, otot dan kekuatan.',
        'gambar' => '../../image/pisik2.jpeg'
    ]
];

// Simulasi data kelas Boxing
$kelasBoxing = [
    [
        'judul' => 'Teknik Menyerang',
        'deskripsi' => 'Pelajari pukulan dasar dan kombinasi untuk serangan efektif di ring.',
        'gambar' => '../../image/teknikserang.jpg'
    ],
    [
        'judul' => 'Teknik Bertahan',
        'deskripsi' => 'Teknik blocking, dodging, dan counter untuk pertahanan yang kuat.',
        'gambar' => '../../image/teknikbertahan.jpg'
    ]
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

    <!-- Navbar - Sama seperti index.php -->
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

    <!-- Section Fasilitas -->
    <section id="fasilitas-section">
        <div class="container">
            <h2 class="fasilitas-title">Fasilitas Veteran Gym</h2>
            <div id="fasilitasCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($fasilitas as $index => $item): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo $item['gambar']; ?>" class="d-block w-100"
                                alt="Fasilitas <?php echo $index + 1; ?>">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo $item['keterangan']; ?></h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#fasilitasCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#fasilitasCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Section Kelas Gym -->
    <section class="kelas-section" style="background-color: var(--main-bg);">
        <div class="container">
            <h2 class="kelas-title">Kelas Gym</h2>
            <div class="kelas-grid">
                <?php foreach ($kelasGym as $kelas): ?>
                    <div class="kelas-card">
                        <img src="<?php echo $kelas['gambar']; ?>" alt="<?php echo $kelas['judul']; ?>"
                            class="kelas-gambar">
                        <div class="kelas-overlay">
                            <h3 class="kelas-judul"><?php echo $kelas['judul']; ?></h3>
                            <p class="kelas-deskripsi"><?php echo $kelas['deskripsi']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Section Kelas Boxing -->
    <section class="kelas-section" style="background-color: var(--section-bg-light);">
        <div class="container">
            <h2 class="kelas-title">Kelas Boxing</h2>
            <div class="kelas-grid">
                <?php foreach ($kelasBoxing as $kelas): ?>
                    <div class="kelas-card">
                        <img src="<?php echo $kelas['gambar']; ?>" alt="<?php echo $kelas['judul']; ?>"
                            class="kelas-gambar">
                        <div class="kelas-overlay">
                            <h3 class="kelas-judul"><?php echo $kelas['judul']; ?></h3>
                            <p class="kelas-deskripsi"><?php echo $kelas['deskripsi']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer - Sama seperti index.php -->
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