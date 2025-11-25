<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php");
    exit;
}
include '../../include/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $spesialisasi = htmlspecialchars($_POST['spesialisasi']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $instagram = htmlspecialchars($_POST['instagram']);
    $no_wa = htmlspecialchars($_POST['no_wa']);

    // Upload Foto
    $foto_nama = "trainer_placeholder.jpg";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $target_dir = "../../image/";
        $file_ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $foto_nama = "trainer_" . time() . "." . $file_ext;
        $target_file = $target_dir . $foto_nama;

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array(strtolower($file_ext), $allowed)) {
            move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        } else {
            echo "<script>alert('Format foto salah!'); window.history.back();</script>";
            exit;
        }
    }

    $stmt = $koneksi->prepare("INSERT INTO pelatih (nama_pelatih, spesialisasi, deskripsi, foto, instagram, no_wa) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nama, $spesialisasi, $deskripsi, $foto_nama, $instagram, $no_wa);

    if ($stmt->execute()) {
        echo "<script>alert('Pelatih berhasil ditambahkan!'); window.location.href = 'kelola_pelatih.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal menyimpan.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelatih</title>
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

        .navbar {
            background-color: var(--primary-dark) !important;
        }

        .dashboard-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
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
                <a href="kelola_pelatih.php" class="btn btn-outline-secondary mb-3"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
                <div class="dashboard-card">
                    <h4 class="mb-4 text-primary fw-bold"><i class="bi bi-person-plus-fill"></i> Tambah Pelatih Baru
                    </h4>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Pelatih</label>
                            <input type="text" name="nama" class="form-control" placeholder="Contoh: Coach Budi"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Spesialisasi</label>
                            <input type="text" name="spesialisasi" class="form-control"
                                placeholder="Contoh: Bodybuilding & Cardio" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Username Instagram (Opsional)</label>
                                <input type="text" name="instagram" class="form-control" placeholder="tanpa @">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nomor WhatsApp (Opsional)</label>
                                <input type="text" name="no_wa" class="form-control" placeholder="628123456789">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Foto Profil</label>
                            <input type="file" name="foto" class="form-control" accept="image/*" required>
                            <div class="form-text">Format: JPG/PNG. Usahakan rasio kotak atau potret.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Deskripsi / Bio</label>
                            <textarea name="deskripsi" class="form-control" rows="5"
                                placeholder="Ceritakan pengalaman pelatih ini..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary-custom w-100 py-2">Simpan Pelatih</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>