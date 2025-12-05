<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php");
    exit;
}

include '../../include/koneksi.php';

$jml_pending = $koneksi->query("SELECT COUNT(*) as total FROM konfirmasi_pembayaran WHERE status_pembayaran = 'Pending'")->fetch_assoc()['total'];
$jml_pelatih = $koneksi->query("SELECT COUNT(*) as total FROM pelatih")->fetch_assoc()['total'];
$jml_artikel = $koneksi->query("SELECT COUNT(*) as total FROM artikel")->fetch_assoc()['total'];
$jml_program = $koneksi->query("SELECT COUNT(*) as total FROM program_kelas")->fetch_assoc()['total'];

$pending_list = [];
$sql_pending = "SELECT * FROM konfirmasi_pembayaran WHERE status_pembayaran = 'Pending' ORDER BY id ASC";
$result_pending = $koneksi->query($sql_pending);
if ($result_pending) {
    while ($row = $result_pending->fetch_assoc()) {
        $pending_list[] = $row;
    }
}

$done_list = [];
$sql_done = "SELECT * FROM konfirmasi_pembayaran WHERE status_pembayaran != 'Pending' ORDER BY id DESC LIMIT 10";
$result_done = $koneksi->query($sql_done);
if ($result_done) {
    while ($row = $result_done->fetch_assoc()) {
        $done_list[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utama - Veteran Admin</title>

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

        /* Image Preview Logic */
        .img-preview-container {
            position: relative;
            width: 60px;
            height: 60px;
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

        .stat-card {
            border-radius: 12px;
            border: none;
            transition: transform 0.3s ease;
            color: white;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2.5rem;
            opacity: 0.3;
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

    <div style="height: 90px;"></div>

    <div class="container">

        <div class="row mb-4">
            <div class="col-12">
                <h2 class="page-title">Dashboard Pembayaran</h2>
                <p class="page-subtitle">Pantau transaksi masuk dan kelola konten website.</p>
            </div>
        </div>

        <div class="row mb-4 g-3">
            <div class="col-md-3">
                <div class="stat-card bg-warning text-dark p-3 shadow-sm h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small fw-bold opacity-75">Pending Request</h6>
                            <h2 class="fw-bold mb-0"><?php echo $jml_pending; ?></h2>
                        </div>
                        <i class="bi bi-hourglass-split stat-icon text-dark"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card p-3 shadow-sm h-100" style="background-color: #1f2833;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small fw-bold opacity-75 text-info">Total Pelatih</h6>
                            <h2 class="fw-bold mb-0"><?php echo $jml_pelatih; ?></h2>
                        </div>
                        <i class="bi bi-person-badge stat-icon text-info"></i>
                    </div>
                    <a href="kelola_pelatih.php" class="text-white-50 small text-decoration-none mt-2 d-block">Kelola
                        ></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card p-3 shadow-sm h-100" style="background-color: #1f2833;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small fw-bold opacity-75 text-success">Total Artikel</h6>
                            <h2 class="fw-bold mb-0"><?php echo $jml_artikel; ?></h2>
                        </div>
                        <i class="bi bi-newspaper stat-icon text-success"></i>
                    </div>
                    <a href="kelola_artikel.php" class="text-white-50 small text-decoration-none mt-2 d-block">Kelola
                        ></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card p-3 shadow-sm h-100" style="background-color: #1f2833;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small fw-bold opacity-75 text-primary">Total Program</h6>
                            <h2 class="fw-bold mb-0"><?php echo $jml_program; ?></h2>
                        </div>
                        <i class="bi bi-activity stat-icon text-primary"></i>
                    </div>
                    <a href="kelola_program.php" class="text-white-50 small text-decoration-none mt-2 d-block">Kelola
                        ></a>
                </div>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-header-custom">
                <div class="d-flex align-items-center">
                    <i class="bi bi-bell-fill me-2 text-secondary"></i>
                    <span>Menunggu Konfirmasi</span>
                </div>
                <div>
                    <a href="tambah_member.php" class="btn btn-sm btn-outline-light me-2">
                        <i class="bi bi-plus-lg"></i> Manual Input
                    </a>
                    <span class="badge bg-secondary text-dark"><?php echo count($pending_list); ?> Baru</span>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tanggal</th>
                                <th>User Info</th>
                                <th>Paket</th>
                                <th>Bank & Nama</th>
                                <th class="text-center">Bukti</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pending_list)): ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted bg-light">
                                        <i class="bi bi-check-circle fs-1 d-block mb-3 text-success opacity-50"></i>
                                        Tidak ada antrian pembayaran baru.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($pending_list as $item): ?>
                                    <tr>
                                        <td class="fw-bold">#<?php echo $item['id']; ?></td>
                                        <td>
                                            <small
                                                class="text-muted"><?php echo date('d/m H:i', strtotime($item['tanggal_konfirmasi'])); ?></small>
                                        </td>
                                        <td>
                                            <span
                                                class="fw-bold d-block"><?php echo htmlspecialchars($item['nama_lengkap']); ?></span>
                                            <small
                                                class="text-muted"><?php echo htmlspecialchars($item['no_telepon']); ?></small>
                                        </td>
                                        <td>
                                            <span class="badge bg-info text-dark text-wrap"
                                                style="width: 150px; text-align:left;">
                                                <?php echo htmlspecialchars($item['paket_membership']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-bold"><?php echo htmlspecialchars($item['bank_asal']); ?></span><br>
                                            <small>a.n. <?php echo htmlspecialchars($item['nama_rekening']); ?></small>
                                        </td>
                                        <td class="text-center">
                                            <div class="img-preview-container mx-auto">
                                                <a href="../../uploads/<?php echo $item['file_bukti']; ?>" target="_blank">
                                                    <img src="../../uploads/<?php echo $item['file_bukti']; ?>"
                                                        class="img-thumbnail-custom">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="update_status.php?id=<?php echo $item['id']; ?>&action=approve"
                                                    class="btn btn-success btn-sm"
                                                    onclick="return confirm('Terima pembayaran ini?');">
                                                    <i class="bi bi-check-lg"></i>
                                                </a>
                                                <a href="update_status.php?id=<?php echo $item['id']; ?>&action=reject"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Tolak pembayaran ini?');">
                                                    <i class="bi bi-x-lg"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-header-custom bg-secondary border-0">
                <span><i class="bi bi-clock-history me-2"></i> 10 Riwayat Terakhir</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0 align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Paket</th>
                                <th>Status</th>
                                <th>Hadiah</th>
                                <th class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($done_list as $item): ?>
                                <tr>
                                    <td>#<?php echo $item['id']; ?></td>
                                    <td><?php echo htmlspecialchars($item['nama_lengkap']); ?></td>
                                    <td><small><?php echo htmlspecialchars($item['paket_membership']); ?></small></td>
                                    <td>
                                        <?php if ($item['status_pembayaran'] == 'Success'): ?>
                                            <span class="badge bg-success bg-opacity-75"><i class="bi bi-check-circle"></i>
                                                Lunas</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger bg-opacity-75"><i class="bi bi-x-circle"></i>
                                                Gagal</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-primary fw-bold"><?php echo $item['hasil_hadiah'] ?? '-'; ?></td>
                                    <td class="text-center">
                                        <a href="hapus_data.php?id=<?php echo $item['id']; ?>"
                                            class="btn btn-outline-danger btn-sm border-0"
                                            onclick="return confirm('Hapus riwayat ini permanen?');">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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