<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php");
    exit;
}

include '../../include/koneksi.php';

// --- LOGIKA HAPUS PELATIH ---
if (isset($_GET['hapus'])) {
    $id_hapus = (int)$_GET['hapus'];
    
    // 1. Ambil nama file gambar lama
    $cek = $koneksi->query("SELECT foto FROM pelatih WHERE id_pelatih = $id_hapus");
    $data = $cek->fetch_assoc();
    
    // 2. Hapus file fisik
    if ($data && !empty($data['foto'])) {
        $path = "../../image/" . $data['foto'];
        // Pastikan bukan gambar default placeholder
        if (file_exists($path) && $data['foto'] != 'trainer_placeholder.jpg') { 
            unlink($path); 
        }
    }
    
    // 3. Hapus database
    $koneksi->query("DELETE FROM pelatih WHERE id_pelatih = $id_hapus");
    
    header("Location: kelola_pelatih.php");
    exit;
}

// Ambil Data Pelatih
$sql = "SELECT * FROM pelatih ORDER BY id_pelatih DESC";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Pelatih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root { --primary-dark: #0b0c10; --secondary-dark: #1f2833; --accent-cyan: #66fcf1; --text-gray: #c5c6c7; --card-bg: #ffffff; }
        body { background-color: #f3f4f6; font-family: 'Poppins', sans-serif; color: #333; }
        .navbar { background-color: var(--primary-dark) !important; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
        .navbar-brand { font-weight: 700; letter-spacing: 1px; color: var(--accent-cyan) !important; }
        .dashboard-card { background-color: var(--card-bg); border: none; border-radius: 12px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05); margin-bottom: 2rem; overflow: hidden; }
        .card-header-custom { background-color: var(--secondary-dark); color: white; padding: 15px 20px; font-weight: 600; display: flex; justify-content: space-between; align-items: center; }
        .table thead th { background-color: #f8f9fa; color: #555; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; border-bottom: 2px solid #ddd; }
        .table tbody td { vertical-align: middle; font-size: 0.95rem; }
        .img-thumbnail-custom { width: 60px; height: 60px; object-fit: cover; border-radius: 50%; border: 2px solid var(--accent-cyan); }
        .btn-action { border-radius: 6px; padding: 5px 10px; font-size: 0.9rem; }
        .page-title { font-weight: 700; color: var(--primary-dark); margin-bottom: 5px; }
        .page-subtitle { color: #777; font-size: 0.9rem; margin-bottom: 30px; }
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

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="page-title">Manajemen Pelatih</h2>
                <p class="page-subtitle text-muted">Kelola profil tim pelatih (Trainers).</p>
            </div>
            <a href="tambah_pelatih.php" class="btn btn-success shadow">
                <i class="bi bi-person-plus-fill me-2"></i>Tambah Pelatih
            </a>
        </div>

        <div class="dashboard-card">
            <div class="card-header-custom">
                <span><i class="bi bi-people-fill me-2 text-warning"></i> Daftar Pelatih</span>
                <span class="badge bg-warning text-dark"><?php echo $result->num_rows; ?> Orang</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Foto</th>
                                <th width="25%">Nama Pelatih</th>
                                <th width="20%">Spesialisasi</th>
                                <th width="20%">Kontak</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                                <?php $no=1; while($row = $result->fetch_assoc()): ?>
                                <?php $foto = !empty($row['foto']) ? $row['foto'] : 'trainer_placeholder.jpg'; ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>
                                        <img src="../../image/<?php echo $foto; ?>" class="img-thumbnail-custom">
                                    </td>
                                    <td>
                                        <span class="fw-bold d-block text-dark"><?php echo $row['nama_pelatih']; ?></span>
                                    </td>
                                    <td>
                                        <span class="badge bg-dark"><?php echo $row['spesialisasi']; ?></span>
                                    </td>
                                    <td>
                                        <?php if(!empty($row['instagram'])): ?>
                                            <i class="bi bi-instagram text-danger me-1"></i>
                                        <?php endif; ?>
                                        <?php if(!empty($row['no_wa'])): ?>
                                            <i class="bi bi-whatsapp text-success"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="edit_pelatih.php?id=<?php echo $row['id_pelatih']; ?>" class="btn btn-warning btn-action me-1">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="kelola_pelatih.php?hapus=<?php echo $row['id_pelatih']; ?>" 
                                           class="btn btn-danger btn-action"
                                           onclick="return confirm('Yakin ingin menghapus pelatih ini?');">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="6" class="text-center py-4">Belum ada data pelatih.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center py-4 text-muted small">&copy; 2025 Veteran Gym Admin Panel</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>