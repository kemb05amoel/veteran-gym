<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php");
    exit;
}

include '../../include/koneksi.php';

if (isset($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];

    $cek = $koneksi->query("SELECT gambar FROM artikel WHERE id_artikel = $id_hapus");
    $data = $cek->fetch_assoc();

    if ($data && !empty($data['gambar'])) {
        $path = "../../image/" . $data['gambar'];
        if (file_exists($path)) {
            unlink($path);
        }
    }

    $koneksi->query("DELETE FROM artikel WHERE id_artikel = $id_hapus");

    header("Location: kelola_artikel.php");
    exit;
}

$sql = "SELECT * FROM artikel ORDER BY tanggal DESC";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Artikel</title>

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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--accent-cyan) !important;
        }

        .dashboard-card {
            background-color: var(--card-bg);
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
            padding: 20px;
        }

        .table thead th {
            background-color: #f8f9fa;
            color: #555;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            border-bottom: 2px solid #ddd;
        }

        .table tbody td {
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .img-preview-container {
            position: relative;
            width: 80px;
            height: 80px;
            cursor: pointer;
        }

        .img-thumbnail-custom {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #dee2e6;
            transition: transform 0.2s;
        }

        .img-preview-container:hover .img-thumbnail-custom {
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%) scale(3.5);
            z-index: 999;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            border: 2px solid white;
        }

        .badge {
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 30px;
        }

        .btn-action {
            border-radius: 6px;
            padding: 5px 10px;
            font-size: 0.9rem;
        }

        .page-title {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: #777;
            font-size: 0.9rem;
            margin-bottom: 30px;
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

    <div style="height: 80px;"></div>

    <div class="container">

        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <h2 class="page-title">Manajemen Artikel</h2>
                <p class="page-subtitle">Kelola berita, tips latihan, dan informasi untuk member.</p>
            </div>
            <div class="col-md-4 text-md-end text-start">
                <a href="tambah_artikel.php" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-lg me-2"></i>Tambah Artikel Baru
                </a>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-header-custom">
                <span><i class="bi bi-newspaper me-2 text-warning"></i> Daftar Artikel</span>
                <span class="badge bg-warning text-dark"><?php echo $result->num_rows; ?> Artikel</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 15%;">Gambar</th>
                                <th style="width: 40%;">Judul & Penulis</th>
                                <th style="width: 20%;">Tanggal</th>
                                <th class="text-center" style="width: 20%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                                <?php $no = 1;
                                while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            <div class="img-preview-container">
                                                <img src="../../image/<?php echo $row['gambar']; ?>"
                                                    class="img-thumbnail-custom" alt="Thumbnail">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fw-bold d-block text-dark"><?php echo $row['judul']; ?></span>
                                            <small class="text-muted">Oleh: <span
                                                    class="text-primary"><?php echo $row['penulis']; ?></span></small>
                                        </td>
                                        <td>
                                            <i class="bi bi-calendar3 me-1 text-secondary"></i>
                                            <?php echo date('d M Y', strtotime($row['tanggal'])); ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="edit_artikel.php?id=<?php echo $row['id_artikel']; ?>"
                                                class="btn btn-warning btn-sm me-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>

                                            <a href="kelola_artikel.php?hapus=<?php echo $row['id_artikel']; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus artikel ini?');">
                                                <i class="bi bi-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted bg-light">
                                        <i class="bi bi-inbox fs-1 d-block mb-3 opacity-50"></i>
                                        Belum ada artikel yang diterbitkan.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
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