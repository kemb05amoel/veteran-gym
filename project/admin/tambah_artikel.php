<?php
session_start();

// 1. Cek Login Admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php");
    exit;
}

include '../../include/koneksi.php';

// 2. PROSES SIMPAN DATA (Saat tombol Submit ditekan)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Tangkap Data Input
    $judul = htmlspecialchars($_POST['judul']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $tanggal = htmlspecialchars($_POST['tanggal']);
    $isi = htmlspecialchars($_POST['isi']); // Isi artikel boleh panjang

    // 3. PROSES UPLOAD GAMBAR
    $gambar_nama = "bkgym1.jpg"; // Default jika gagal upload

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "../../image/";

        // Cek folder, buat jika belum ada
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Rename file agar unik (mencegah nama file kembar)
        $file_ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambar_nama = "artikel_" . time() . "." . $file_ext; // Contoh: artikel_17099999.jpg
        $target_file = $target_dir . $gambar_nama;

        // Validasi tipe file
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array(strtolower($file_ext), $allowed)) {
            move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file);
        } else {
            echo "<script>alert('Format gambar harus JPG, PNG, atau WEBP!');</script>";
        }
    }

    // 4. INSERT KE DATABASE
    $stmt = $koneksi->prepare("INSERT INTO artikel (judul, penulis, tanggal, isi_artikel, gambar) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $judul, $penulis, $tanggal, $isi, $gambar_nama);

    if ($stmt->execute()) {
        // Jika sukses, kembali ke halaman kelola
        echo "<script>alert('Artikel berhasil ditambahkan!'); window.location.href='kelola_artikel.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan artikel.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel - Veteran Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-dark: #0b0c10;
            --secondary-dark: #1f2833;
            --accent-cyan: #66fcf1;
            --text-gray: #c5c6c7;
            --card-bg: #ffffff;
        }

        body {
            background-color: #f3f4f6;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        /* Navbar Styling */
        .navbar {
            background-color: var(--primary-dark) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--accent-cyan) !important;
        }

        /* Card Styling */
        .dashboard-card {
            background-color: #fff;
            /* Card putih agar form jelas */
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .card-header-custom {
            background-color: var(--secondary-dark);
            color: white;
            padding: 15px 20px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-body {
            padding: 30px;
        }

        .btn-primary-custom {
            background-color: var(--secondary-dark);
            color: var(--accent-cyan);
            border: 1px solid var(--accent-cyan);
            font-weight: 600;
        }

        .btn-primary-custom:hover {
            background-color: var(--accent-cyan);
            color: var(--primary-dark);
        }

        .form-label {
            font-weight: 600;
            color: var(--secondary-dark);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="admin.php">
                <i class="bi bi-shield-lock-fill me-2"></i>VETERAN ADMIN
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNav">
                <ul class="navbar-nav ms-auto me-4">
                    <li class="nav-item"><a class="nav-link" href="admin.php">Pembayaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="kelola_artikel.php">Kelola Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="kelola_pelatih.php">Kelola Pelatih</a></li>
                    <li class="nav-item"><a class="nav-link" href="kelola_program.php">Kelola Program</a></li>
                </ul>

                <div class="d-flex align-items-center border-start ps-3 border-secondary">
                    <span class="navbar-text me-3 text-light d-none d-md-block small">
                        Halo, Admin
                    </span>
                    <a href="logout.php" class="btn btn-outline-danger btn-sm px-3 rounded-pill">
                        <i class="bi bi-box-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div style="height: 100px;"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <a href="kelola_artikel.php" class="btn btn-outline-secondary mb-3">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>

                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <span><i class="bi bi-pencil-square me-2 text-warning"></i> Tulis Artikel Baru</span>
                    </div>

                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Judul Artikel</label>
                                <input type="text" name="judul" class="form-control"
                                    placeholder="Contoh: Tips Latihan Dada..." required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Penulis</label>
                                    <input type="text" name="penulis" class="form-control" value="Admin Veteran Gym"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Tayang</label>
                                    <input type="date" name="tanggal" class="form-control"
                                        value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gambar Utama (Cover)</label>
                                <input type="file" name="gambar" class="form-control" accept="image/*" required>
                                <div class="form-text">Format: JPG, PNG, WEBP. Maks 2MB.</div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Isi Artikel</label>
                                <textarea name="isi" class="form-control" rows="8"
                                    placeholder="Tulis konten artikel di sini..." required></textarea>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary-custom py-2">
                                    <i class="bi bi-save me-2"></i> Simpan & Terbitkan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="text-center py-4 text-muted small">
        &copy; 2025 Veteran Gym Admin Panel
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>