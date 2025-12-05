<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php"); exit;
}
include '../../include/koneksi.php';

if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    $cek = $koneksi->query("SELECT gambar FROM program_kelas WHERE id_program=$id");
    $data = $cek->fetch_assoc();
    if ($data && !empty($data['gambar']) && $data['gambar'] != 'bkgym2.jpg') {
        $path = "../../image/" . $data['gambar'];
        if (file_exists($path)) unlink($path);
    }
    $koneksi->query("DELETE FROM program_kelas WHERE id_program=$id");
    header("Location: kelola_program.php"); exit;
}

$sql = "SELECT * FROM program_kelas ORDER BY id_program DESC";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --primary-dark: #0b0c10; --secondary-dark: #1f2833; --accent-cyan: #66fcf1; --text-gray: #c5c6c7; --card-bg: #ffffff; }
        body { background-color: #f3f4f6; font-family: 'Poppins', sans-serif; color: #333; }
        .navbar { background-color: var(--primary-dark) !important; }
        .navbar-brand { font-weight: 700; letter-spacing: 1px; color: var(--accent-cyan) !important; }
        .dashboard-card { background-color: var(--card-bg); border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); overflow: hidden; }
        .card-header-custom { background-color: var(--secondary-dark); color: white; padding: 15px 20px; font-weight: 600; display: flex; justify-content: space-between; align-items: center; }
        .table thead th { background-color: #f8f9fa; color: #555; font-weight: 600; border-bottom: 2px solid #ddd; }
        .btn-action { border-radius: 6px; padding: 5px 10px; font-size: 0.9rem; }
        .img-thumb { width: 80px; height: 50px; object-fit: cover; border-radius: 4px; }
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
                <h2 class="fw-bold" style="color: var(--primary-dark);">Manajemen Program</h2>
                <p class="text-muted">Kelola kelas Gym & Boxing.</p>
            </div>
            <a href="tambah_program.php" class="btn btn-success shadow"><i class="bi bi-plus-lg me-2"></i>Tambah Program</a>
        </div>

        <div class="dashboard-card">
            <div class="card-header-custom">
                <span><i class="bi bi-activity me-2 text-warning"></i> Daftar Program</span>
                <span class="badge bg-warning text-dark"><?php echo $result->num_rows; ?> Kelas</span>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Program</th>
                            <th>Kategori</th>
                            <th>Info (Durasi/Level)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($result->num_rows > 0): ?>
                            <?php $no=1; while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><img src="../../image/<?php echo $row['gambar']; ?>" class="img-thumb"></td>
                                <td class="fw-bold"><?php echo $row['judul']; ?></td>
                                <td>
                                    <span class="badge <?php echo ($row['kategori']=='Gym') ? 'bg-dark' : 'bg-danger'; ?>">
                                        <?php echo $row['kategori']; ?>
                                    </span>
                                </td>
                                <td class="small text-muted">
                                    <i class="bi bi-clock"></i> <?php echo $row['durasi']; ?><br>
                                    <i class="bi bi-bar-chart"></i> <?php echo $row['level']; ?>
                                </td>
                                <td class="text-center">
                                    <a href="edit_program.php?id=<?php echo $row['id_program']; ?>" class="btn btn-warning btn-action me-1"><i class="bi bi-pencil-square"></i></a>
                                    <a href="kelola_program.php?hapus=<?php echo $row['id_program']; ?>" class="btn btn-danger btn-action" onclick="return confirm('Hapus program ini?');"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="text-center py-4">Belum ada program.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>