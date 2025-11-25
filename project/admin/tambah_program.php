<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php");
    exit;
}
include '../../include/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = htmlspecialchars($_POST['judul']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $durasi = htmlspecialchars($_POST['durasi']);
    $level = htmlspecialchars($_POST['level']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    // Upload Gambar
    $gambar = "bkgym2.jpg";
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambar = "program_" . time() . "." . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../../image/" . $gambar);
    }

    $stmt = $koneksi->prepare("INSERT INTO program_kelas (judul, kategori, durasi, level, deskripsi, gambar) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $judul, $kategori, $durasi, $level, $deskripsi, $gambar);

    if ($stmt->execute()) {
        echo "<script>alert('Program berhasil ditambah!'); window.location='kelola_program.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
        }

        .card-custom {
            border-radius: 12px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .header-custom {
            background-color: #1f2833;
            color: #66fcf1;
            padding: 15px 20px;
            border-radius: 12px 12px 0 0;
            font-weight: bold;
        }

        .btn-save {
            background-color: #1f2833;
            color: #66fcf1;
            border: 1px solid #66fcf1;
        }

        .btn-save:hover {
            background-color: #66fcf1;
            color: #0b0c10;
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="kelola_program.php" class="btn btn-secondary mb-3">Kembali</a>
                <div class="card card-custom">
                    <div class="header-custom">Tambah Program Latihan</div>
                    <div class="card-body p-4">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Program</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Kategori</label>
                                    <select name="kategori" class="form-select">
                                        <option value="Gym">Gym</option>
                                        <option value="Boxing">Boxing</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Durasi</label>
                                    <input type="text" name="durasi" class="form-control"
                                        placeholder="Contoh: 60 Menit">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Level Kesulitan</label>
                                <input type="text" name="level" class="form-control"
                                    placeholder="Contoh: Pemula - Lanjutan">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Gambar Cover</label>
                                <input type="file" name="gambar" class="form-control" accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi Singkat</label>
                                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-save w-100 py-2 fw-bold">SIMPAN PROGRAM</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>